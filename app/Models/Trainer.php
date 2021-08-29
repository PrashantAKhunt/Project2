<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'password',
        'branch_id',
        'role_id',
        'enroll_for',
        'contact_no',
        'address',
        'qualification',
        'aadhar_no',
        'profile_photo',
    ];
}
