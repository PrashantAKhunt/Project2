<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('role_id');
            $table->string('enrollfor');
            $table->string('joining_date');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->string('mother_occupation');
            $table->string('address');
            $table->string('aadhar_address');
            $table->string('pincode');
            $table->string('tehasil');
            $table->string('email')->unique();
            $table->string('dob');
            $table->string('contact_no');
            $table->string('cast');
            $table->string('categories');
            $table->string('birth_place');
            $table->string('disability');
            $table->string('aadhar_no');
            $table->string('documents_proof');
            $table->string('account_name');
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('account_number');
            $table->string('ifsc_code');
            $table->string('profile_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
