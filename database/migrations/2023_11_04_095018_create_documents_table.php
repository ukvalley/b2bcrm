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
            $table->string('type');
            $table->timestamps();
        });
        
        DB::table('documents')->insert([
            ['name' => 'Academic: Transcripts & Certificates', 'type' => 'A1'],
            ['name' => 'Application: Application Form', 'type' => 'A1'],
            ['name' => 'Application: GTE Screening Form/SSVF', 'type' => 'A1'],
            ['name' => 'English Language: English Proficiency Transcript/Results', 'type' => 'A1'],
            ['name' => 'Experience: Letter of Employment', 'type' => 'A1'],
            ['name' => 'Identity: Passport Certified Adventus for University Application', 'type' => 'A1'],
            ['name' => 'Student Authorization: Permission to share and process personal data', 'type' => 'A1'],
            ['name' => 'English Language: English Proficiency Transcript/Results', 'type' => 'A2'],
            ['name' => 'Experience: Letter of Employment', 'type' => 'A2'],
            ['name' => 'Academic: Agent Change / Nomination Form', 'type' => 'A2'],
            ['name' => 'Academic: Current Electronic Confirmation of Enrolment (if already studying in Aus - eCoE)', 'type' => 'A2'],
            ['name' => 'Academic: Syllabus Outline', 'type' => 'A2'],
            ['name' => 'Experience: CV', 'type' => 'A2'],
            ['name' => 'Experience: Letter of Reference', 'type' => 'A2'],
            ['name' => 'Financial: Sponsor Declaration', 'type' => 'A2'],
            ['name' => 'Identity: Consent Letter (required only for under 18 students)', 'type' => 'A2'],
            ['name' => 'Identity: Marriage Certificate', 'type' => 'A2'],
            ['name' => 'Identity: Passport of Dependents', 'type' => 'A2'],
            ['name' => 'Identity: Previous Visa Grants and Refusals', 'type' => 'A2'],
            ['name' => 'Intention: Statement of Purpose', 'type' => 'A2'],
            ['name' => 'Academic: Signed Offer Acceptance Form', 'type' => 'B1'],
            ['name' => 'Financial: Matrix', 'type' => 'B1'],
            ['name' => 'Financial: Bank Balance Confirmations and Statements', 'type' => 'B1'],
            ['name' => 'Financial: Payment Receipt', 'type' => 'B1'],
            ['name' => 'Financial: Proof of Income', 'type' => 'B1'],
            ['name' => 'Academic: Statement of Purpose', 'type' => 'B2'],
            ['name' => 'Financial: Additional Funds and Assets', 'type' => 'B2'],
            ['name' => 'Financial: Bank Balance Confirmations and Statements', 'type' => 'B2'],
            ['name' => 'Financial: Loan Grant and Disbursement Letters', 'type' => 'B2'],
            ['name' => 'Financial: Payment Receipt', 'type' => 'B2'],
            ['name' => 'Financial: Proof of Income', 'type' => 'B2'],
            ['name' => 'Financial: Relationship Evidence of the Sponsors', 'type' => 'B2'],
            ['name' => 'Financial: Sponsor Declaration', 'type' => 'B2'],
            ['name' => 'Financial: Sponsor Letter', 'type' => 'B2'],
            ['name' => 'Identity: Birth Certificate', 'type' => 'B2'],
            ['name' => 'Identity: Sponsors Passport and/or Birth Certificate', 'type' => 'B2'],
            ['name' => 'Intention: GTE Check', 'type' => 'B2'],
            ['name' => 'Academic: Transcripts & Certificates', 'type' => 'B2'],
            ['name' => 'Application: Confirmation of Enrolment CoE', 'type' => 'B2'],
            ['name' => 'Application: Online Visa Application', 'type' => 'B2'],
            ['name' => 'English Language: English Proficiency Transcript/Results', 'type' => 'B2'],
            ['name' => 'Experience: CVDB', 'type' => 'B2'],
            ['name' => 'Financial: Additional Funds and Assets', 'type' => 'B2'],
            ['name' => 'Financial: Affidavit of Financial Support', 'type' => 'B2'],
            ['name' => 'Financial: Bank Balance Confirmations and Statements', 'type' => 'B2'],
            ['name' => 'Financial: Health Insurance Policy', 'type' => 'B2'],
            ['name' => 'Financial: Loan Grant and Disbursement Letters', 'type' => 'B2'],
            ['name' => 'Financial: Proof of Income', 'type' => 'B2'],
            ['name' => 'Financial: Relationship Evidence of the Sponsors', 'type' => 'B2'],
            ['name' => 'Financial: Sponsor Declaration', 'type' => 'B2'],
            ['name' => 'Form 956a Appointment or withdrawal of an authorised recipient', 'type' => 'C1'],
            ['name' => 'Identity: Biometrics Appointment Booking', 'type' => 'C1'],
            ['name' => 'Identity: Birth Certificate', 'type' => 'C1'],
            ['name' => 'Identity: National Identity Card (NIC) / Aadhar Card', 'type' => 'C1'],
            ['name' => 'Identity: Passport Certified Lawyer for Visa Application', 'type' => 'C1'],
            ['name' => 'Identity: Photograph', 'type' => 'C1'],
            ['name' => 'Identity: Sponsors Passport and/or Birth Certificate', 'type' => 'C1'],
            ['name' => 'Intention: Statement of Purpose', 'type' => 'C1'],
            ['name' => 'Medical: Medical Clearance', 'type' => 'C1'],
            ['name' => 'Experience: Letter of Employment', 'type' => 'C1'],
            ['name' => 'Experience: Professional Accreditation', 'type' => 'C2'],
            ['name' => 'Financial: Visa Application Fee', 'type' => 'C2'],
            ['name' => 'Identity: CAAW Letter (Confirmation of Appropriate Accommodation and Welfare) for under 18 students', 'type' => 'C2'],
            ['name' => 'Identity: CV of Dependents', 'type' => 'C2'],
            ['name' => 'Identity: Consent Letter (required only for under 18 students)', 'type' => 'C2'],
            ['name' => 'Identity: Marriage Certificate', 'type' => 'C2'],
            ['name' => 'Identity: Passport of Dependents', 'type' => 'C2'],
            ['name' => 'Identity: Previous Visa Grants and Refusals', 'type' => 'C2'],
            ['name' => 'Identity: Sponsor Affidavit and Tax Return (if applicable)', 'type' => 'C2'],
            ['name' => 'Intention: Dependent Statement of Purpose', 'type' => 'C2'],
            ['name' => 'Visa: Application', 'type' => 'C2'],
            ['name' => 'Visa: Grant Notification', 'type' => 'C2'],
            ['name' => 'Visa: Refusal Notification', 'type' => 'C2']
        ]);
        
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
};

