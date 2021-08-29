<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'branch_id',
        'role_id',
        'contact_no',
        'qualification',
        'address',
        'aadhar_no',
        'profile_photo',
    ];
}
