<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersendMessage extends Model
{
    use HasFactory;
    protected $fillable=['your_name','your_email','your_subject','your_message'];
}
