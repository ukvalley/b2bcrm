<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->timestamps();
        });
        
        DB::table('documents')->insert([
            ['name' => 'Academic: Transcripts & Certificates'],
            ['name' => 'Application: Application Form'],
            ['name' => 'Application: GTE Screening Form/SSVF'],
            ['name' => 'English Language: English Proficiency Transcript/Results'],
            ['name' => 'Experience: Letter of Employment'],
            ['name' => 'Identity: Passport Certified Adventus for University Application'],
            ['name' => 'Student Authorization: Permission to share and process personal data'],
            ['name' => 'English Language: English Proficiency Transcript/Results'],
            ['name' => 'Experience: Letter of Employment'],
            ['name' => 'Academic: Agent Change / Nomination Form'],
            ['name' => 'Academic: Current Electronic Confirmation of Enrolment (if already studying in Aus - eCoE)'],
            ['name' => 'Academic: Syllabus Outline'],
            ['name' => 'Experience: CV'],
            ['name' => 'Experience: Letter of Reference'],
            ['name' => 'Financial: Sponsor Declaration'],
            ['name' => 'Identity: Consent Letter (required only for under 18 students)'],
            ['name' => 'Identity: Marriage Certificate'],
            ['name' => 'Identity: Passport of Dependents'],
            ['name' => 'Identity: Previous Visa Grants and Refusals'],
            ['name' => 'Intention: Statement of Purpose'],
            ['name' => 'Academic: Signed Offer Acceptance Form'],
            ['name' => 'Financial: Matrix'],
            ['name' => 'Financial: Bank Balance Confirmations and Statements'],
            ['name' => 'Financial: Payment Receipt'],
            ['name' => 'Financial: Proof of Income'],
            ['name' => 'Academic: Statement of Purpose'],
            ['name' => 'Financial: Additional Funds and Assets'],
            ['name' => 'Financial: Bank Balance Confirmations and Statements'],
            ['name' => 'Financial: Loan Grant and Disbursement Letters'],
            ['name' => 'Financial: Payment Receipt'],
            ['name' => 'Financial: Proof of Income'],
            ['name' => 'Financial: Relationship Evidence of the Sponsors'],
            ['name' => 'Financial: Sponsor Declaration'],
            ['name' => 'Financial: Sponsor Letter'],
            ['name' => 'Identity: Birth Certificate'],
            ['name' => 'Identity: Sponsors Passport and/or Birth Certificate'],
            ['name' => 'Intention: GTE Check'],
            ['name' => 'Academic: Transcripts & Certificates'],
            ['name' => 'Application: Confirmation of Enrolment CoE'],
            ['name' => 'Application: Online Visa Application'],
            ['name' => 'English Language: English Proficiency Transcript/Results'],
            ['name' => 'Experience: CVDB'],
            ['name' => 'Financial: Additional Funds and Assets'],
            ['name' => 'Financial: Affidavit of Financial Support'],
            ['name' => 'Financial: Bank Balance Confirmations and Statements'],
            ['name' => 'Financial: Health Insurance Policy'],
            ['name' => 'Financial: Loan Grant and Disbursement Letters'],
            ['name' => 'Financial: Proof of Income'],
            ['name' => 'Financial: Relationship Evidence of the Sponsors'],
            ['name' => 'Financial: Sponsor Declaration'],
            ['name' => 'Form 956a Appointment or withdrawal of an authorised recipient'],
            ['name' => 'Identity: Biometrics Appointment Booking'],
            ['name' => 'Identity: Birth Certificate'],
            ['name' => 'Identity: National Identity Card (NIC) / Aadhar Card'],
            ['name' => 'Identity: Passport Certified Lawyer for Visa Application'],
            ['name' => 'Identity: Photograph'],
            ['name' => 'Identity: Sponsors Passport and/or Birth Certificate'],
            ['name' => 'Intention: Statement of Purpose'],
            ['name' => 'Medical: Medical Clearance'],
            ['name' => 'Experience: Letter of Employment'],
            ['name' => 'Experience: Professional Accreditation'],
            ['name' => 'Financial: Visa Application Fee'],
            ['name' => 'Identity: CAAW Letter (Confirmation of Appropriate Accommodation and Welfare) for under 18 students'],
            ['name' => 'Identity: CV of Dependents'],
            ['name' => 'Identity: Consent Letter (required only for under 18 students)'],
            ['name' => 'Identity: Marriage Certificate'],
            ['name' => 'Identity: Passport of Dependents'],
            ['name' => 'Identity: Previous Visa Grants and Refusals'],
            ['name' => 'Identity: Sponsor Affidavit and Tax Return (if applicable)'],
            ['name' => 'Intention: Dependent Statement of Purpose'],
            ['name' => 'Visa: Application'],
            ['name' => 'Visa: Grant Notification'],
            ['name' => 'Visa: Refusal Notification']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};

