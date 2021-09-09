<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'role_id',
        'enrollfor',
        'joining_date',
        'first_name',
        'last_name',
        'father_name',
        'father_occupation',
        'mother_name',
        'mother_occupation',
        'address',
        'aadhar_address',
        'pincode',
        'tehasil',
        'email',
        'dob',
        'contact_no',
        'cast',
        'categories',
        'birth_place',
        'disability',
        'aadhar_no',
        'documents_proof',
        'account_name',
        'bank_name',
        'bank_branch',
        'account_number',
        'ifsc_code',
        'profile_photo',
    ];

}
