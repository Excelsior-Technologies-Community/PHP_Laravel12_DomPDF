<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    // Table name 
    protected $table = 'user_data';

    // Mass assignable fields
    protected $fillable = [
        'name',
        'email',
        'course',
    ];
}