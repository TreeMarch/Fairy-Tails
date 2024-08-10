<?php

namespace App\Http\Controllers\user_management\show_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowUserControllerUi extends Controller
{
  public static function ShowAll(){
    return User::paginate(10);
  }
}
