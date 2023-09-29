<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddLeaves extends Model
{
    use HasFactory;
    protected $table = 'addleaves';

    protected $fillable = [
        'leave_type',
        'leave_days'
    ];
}
