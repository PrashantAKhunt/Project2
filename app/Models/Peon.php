<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'branch_id',
        'contact_no',
        'address',
        'aadhar_no',
        'profile_photo',
    ];
}
