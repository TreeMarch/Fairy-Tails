<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShowAllUserCotroller extends Controller
{
  public static function showAll(){
    return User::paginate(10);
  }
}
