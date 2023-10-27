<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Institution; // Import your models
use App\Models\User;
use App\Models\UserType;
use App\Models\Country;
use App\Models\Course;

class ImportData extends Command
{
    protected $signature = 'import:data';
    protected $description = 'Import data from JSON file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        ini_set('memory_limit', '-1');

        // Load and process your JSON data here
        $json = file_get_contents(base_path('app/Console/Commands/data.json')); // Load the JSON file
        $dataArray = json_decode($json, true); // Convert JSON to an associative array

        if ($dataArray) {
            

            foreach ($dataArray as $validatedData) {
                DB::beginTransaction(); // Start a database transaction
                // Your existing code for processing and inserting records

                $institution = Institution::firstOrNew(['name' => $validatedData['Institution Name']]);

                if (!$institution->exists) {
                    // Create a new user and institution only if it doesn't exist
                    $user = new User();
                    $user->name = $validatedData['Institution Name'];
                    // Add other user-specific fields as needed

                    $user->email = $this->generateUniqueEmail(); // You can define this function
                    $user->password = bcrypt($user->email);

                    $user->save();
                    $user->userType()->associate(UserType::where('name', 'Institution')->first());
                    $user->save();

                    $institution->user_id = $user->id;
                    $institution->name = $validatedData['Institution Name'];
                    $institution->email = $user->email; // Set the email from the user
                    $institution->phone_number = '88888888888';
                    $institution->password = $user->password;

                    $country = Country::firstOrNew(['name' => $validatedData['Destination Country']]);

                    if (!$country->exists) {
                        $country->code = $validatedData['Destination Country'];
                        $country->save();
                    }

                    $institution->country = $country->id;
                    $institution->city = $validatedData['Nearest City'];

                    $institution->save();
                }

                $course = new Course();
                $course->country = $institution->country;
                $course->institution_id = $institution->id;
                $course->name = $validatedData['Course Name'];
                $course->tuition_fee = $validatedData['Tuition Fees'];
                $course->application_fees = $validatedData['Application Fee'];
                $course->duration = $validatedData['Course Duration'];
                $course->admission_requirements = $validatedData['Entry Requirements'];

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
    $randomLetters = substr(str_shuffle($letters), 0, 2); // Get 2 random letters
    $randomNumber = mt_rand(1000, 9999); // Get a random 4-digit number
    $result = $randomLetters . $randomNumber; // Concatenate the random letters and number

    return $result . '@gmail.com';
}

}
