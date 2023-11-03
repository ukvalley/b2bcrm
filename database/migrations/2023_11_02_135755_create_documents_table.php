<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });







        
        


        DB::table('documents')->insert([
            ['name' => 'Transcripts & Certificates', 'type' => 'Application'],
            ['name' => 'Application Form', 'type' => 'Application'],
            ['name' => 'GTE Screening Form/SSVF', 'type' => 'Application'],
            ['name' => 'English Proficiency Transcript/Results', 'type' => 'Application'],
            ['name' => 'Letter of Employment', 'type' => 'Application'],
            ['name' => 'Passport Certified Adventus for University Application', 'type' => 'Application'],
            ['name' => 'Permission to share and process personal data', 'type' => 'Application'],
            ['name' => 'English Proficiency Transcript/Results', 'type' => 'Acceptance'],
            ['name' => 'Letter of Employment', 'type' => 'Acceptance'],
            ['name' => 'Agent Change / Nomination Form', 'type' => 'Acceptance'],
            ['name' => 'Current Electronic Confirmation of Enrolment (if already studying in Aus - eCoE)', 'type' => 'Acceptance'],
            ['name' => 'Syllabus Outline', 'type' => 'Acceptance'],
            ['name' => 'CV', 'type' => 'Acceptance'],
            ['name' => 'Letter of Reference', 'type' => 'Acceptance'],
            ['name' => 'Sponsor Declaration', 'type' => 'Acceptance'],
            ['name' => 'Consent Letter (required only for under 18 students)', 'type' => 'Acceptance'],
            ['name' => 'Marriage Certificate', 'type' => 'Acceptance'],
            ['name' => 'Passport of Dependents', 'type' => 'Acceptance'],
            ['name' => 'Previous Visa Grants and Refusals', 'type' => 'Acceptance'],
            ['name' => 'Statement of Purpose', 'type' => 'Acceptance'],
            ['name' => 'Other', 'type' => 'Acceptance'],
            ['name' => 'Transcripts & Certificates', 'type' => 'Visa'],
            ['name' => 'Confirmation of Enrolment CoE', 'type' => 'Visa'],
            ['name' => 'Online Visa Application', 'type' => 'Visa'],
            ['name' => 'English Proficiency Transcript/Results', 'type' => 'Visa'],
            ['name' => 'CV', 'type' => 'Visa'],
            ['name' => 'Additional Funds and Assets', 'type' => 'Visa'],
            ['name' => 'Affidavit of Financial Support', 'type' => 'Visa'],
            ['name' => 'Bank Balance Confirmations and Statements', 'type' => 'Visa'],
            ['name' => 'Health Insurance Policy', 'type' => 'Visa'],
            ['name' => 'Loan Grant and Disbursement Letters', 'type' => 'Visa'],
            ['name' => 'Proof of Income', 'type' => 'Visa'],
            ['name' => 'Relationship Evidence of the Sponsors', 'type' => 'Visa'],
            ['name' => 'Sponsor Declaration', 'type' => 'Visa'],
            ['name' => 'Form 956a Appointment or withdrawal of an authorised recipient', 'type' => 'Visa'],
            ['name' => 'Biometrics Appointment Booking', 'type' => 'Visa'],
            ['name' => 'Birth Certificate', 'type' => 'Visa'],
            ['name' => 'National Identity Card (NIC) / Aadhar Card', 'type' => 'Visa'],
            ['name' => 'Passport Certified Lawyer for Visa Application', 'type' => 'Visa'],
            ['name' => 'Photograph', 'type' => 'Visa'],
            ['name' => 'Sponsors Passport and/or Birth Certificate', 'type' => 'Visa'],
            ['name' => 'Statement of Purpose', 'type' => 'Visa'],
            ['name' => 'Medical Clearance', 'type' => 'Visa'],
            ['name' => 'Letter of Employment', 'type' => 'Visa'],
            ['name' => 'Professional Accreditation', 'type' => 'Visa'],
            ['name' => 'Visa Application Fee', 'type' => 'Visa'],
            ['name' => 'CAAW Letter (Confirmation of Appropriate Accommodation and Welfare) for under 18 students', 'type' => 'Visa'],
            ['name' => 'CV of Dependents', 'type' => 'Visa'],
            ['name' => 'Consent Letter (required only for under 18 students)', 'type' => 'Visa'],
            ['name' => 'Marriage Certificate', 'type' => 'Visa'],
            ['name' => 'Passport of Dependents', 'type' => 'Visa'],
            ['name' => 'Previous Visa Grants and Refusals', 'type' => 'Visa'],
            ['name' => 'Sponsor Affidavit and Tax Return (if applicable)', 'type' => 'Visa'],
            ['name' => 'Dependent Statement of Purpose', 'type' => 'Visa'],
            ['name' => 'Other', 'type' => 'Visa'],
            ['name' => 'Application', 'type' => 'Visa'],
            ['name' => 'Grant Notification', 'type' => 'Visa'],
            ['name' => 'Refusal Notification', 'type' => 'Visa'],
        ]);
        
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
