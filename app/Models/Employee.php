<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'dob',
        'age',
        'gender',
        'nic',
        'address',
        'email',
        'password'];

        protected $hidden = [
            'password',
        ];

        protected $casts = [
            'password' => 'hashed',
        ];
}
