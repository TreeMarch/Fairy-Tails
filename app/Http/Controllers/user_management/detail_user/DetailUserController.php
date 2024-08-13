<?php

namespace App\Http\Controllers\user_management\detail_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DetailUserController extends Controller
{
    public function detail($id){
      $user = User::findOrFail($id);
      return view('content.pages.pages-account-settings-account', compact('user'));
    }
}
