<?php

namespace App\Http\Controllers\user_management\create_user;

use App\Http\Controllers\Controller;

class CreateUserControllerUi extends Controller
{
  public function index(){
    return view('content.form-layout.form-layouts-horizontal');
  }
}
