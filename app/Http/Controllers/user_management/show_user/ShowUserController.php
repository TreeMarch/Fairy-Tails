<?php

namespace App\Http\Controllers\user_management\show_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\user_management\show_user\ShowUserControllerUi as ShowAll;

class ShowUserController extends Controller
{
  public function index(Request $request){
//      dd($request->key);
    if (request('key')) {
      $users = User::where('user_name', 'like', '%' . request('key') . '%')
        ->orWhere('phone_number', 'like', '%' . request('key') . '%')
        ->orWhere('last_name', 'like', '%' . request('key') . '%')
        ->orWhere('email', 'like', '%' . request('key') . '%')
        ->orWhere('status', 'like', '%' . request('key') . '%')
        ->paginate(10);
    } else {
      $users = ShowAll::ShowAll();
    }
    return view('content.tables.tables-basic',compact('users'));

  }
}
