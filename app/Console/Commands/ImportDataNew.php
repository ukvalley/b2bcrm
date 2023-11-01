<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Institution; // Import your models
use App\Models\User;
use App\Models\UserType;
use App\Models\Country;
use App\Models\Course;

class ImportDataNew extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-data-new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        ini_set('memory_limit', '-1');

        // Load and process your JSON data here
        $json = file_get_contents(base_path('app/Console/Commands/newdata.json')); // Load the JSON file
        $dataArray = json_decode($json, true); // Convert JSON to an associative array

        if ($dataArray) {
            

            foreach ($dataArray as $validatedData) {


              $already = Course::where('attendance_pattern','=',$validatedData['_source']['course_id'])->count();

                if($already > 0)
                {
                    continue;
                }

              
                DB::beginTransaction(); // Start a database transaction
                // Your existing code for processing and inserting records

                


                $institution = Institution::firstOrNew(['name' => $validatedData['_source']['institution_name']]);


                if (!$institution->exists) {
                    // Create a new user and institution only if it doesn't exist
                    $user = new User();
                    $user->name = $validatedData['_source']['institution_name'];
                    // Add other user-specific fields as needed

                    $user->email = $this->generateUniqueEmail(); // You can define this function
                    $user->password = bcrypt($user->email);

                    $user->save();
                    $user->userType()->associate(UserType::where('name', 'Institution')->first());
                    $user->save();

                    $institution->user_id = $user->id;
                    $institution->name = $validatedData['_source']['institution_name'];
                    $institution->email = $user->email; // Set the email from the user
                    $institution->phone_number = '88888888888';
                    $institution->password = $user->password;

                    $institution->logo = $validatedData['_source']['institution_logo'];

                    

                    $country = Country::firstOrNew(['name' => $validatedData['_source']['institution_country']]);

                    if (!$country->exists) {
                        $country->code = $validatedData['_source']['institution_country'];
                        $country->save();
                    }


                    $institution->country = $country->id;
                    $institution->city = json_encode($validatedData['_source']['cities'],true);

                    $institution->save();
                }

                $course = new Course();
                $course->country = $institution->country;
                $course->institution_id = $institution->id;
                $course->name = $validatedData['_source']['course_name'];
                $course->tuition_fee = $validatedData['_source']['cost_amount'];
                $course->application_fees = $validatedData['_source']['application_fee'];
                $course->duration = $validatedData['_source']['course_duration'];
                $course->duration_type = $validatedData['_source']['course_duration_unit'];
                $course->summary = $validatedData['_source']['course_summary'];
                $course->currency = $validatedData['_source']['course_cost_currency'];
                $course->fees_type = $validatedData['_source']['course_cost_unit'];
                $course->attendance_pattern = $validatedData['_source']['course_attendance_pattern'];
                $course->attendance_pattern = $validatedData['_source']['course_id'];
                $course->level = $validatedData['_source']['studylevel_filter_code'];
                $course->institution_type = $validatedData['_source']['course_delivery'];





                $course->save(); // Save the course to the database

                // ... (the rest of your code)

                DB::commit(); // Commit the transaction

            }

            

            $this->info('Data import completed.');
        } else {
            $this->error('Invalid JSON data.');
        }
    }


      // Function to generate a unique email
private function generateUniqueEmail()
{
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // List of uppercase letters
    $randomLetters = substr(str_shuffle($letters), 0, 3); // Get 2 random letters
    $randomNumber = mt_rand(10000, 99999); // Get a random 4-digit number
    $result = $randomLetters . $randomNumber; // Concatenate the random letters and number

    return $result . '@gmail.com';
}
}
