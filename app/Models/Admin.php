<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected  $fillable = [
      'admin_name',
      'email',
      'phone_number',
      'status',
      'user_name',
      'email',
      'admin_password',
      'first_name',
      'last_name',
      'phone_number',
      'favourite',
      'birth',
      'url_avatar',
    ];
}
