<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfileUpdate extends Model
{
    use HasFactory;
    protected $fillable=['address','phone','bio','dob','profile_image','cover_image','user_id'];

    
}
