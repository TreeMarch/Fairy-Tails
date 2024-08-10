<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ShowAllUserCotroller as ShowAll;


class ShowAllUserControllerUi extends Controller
{
    public function index(Request $request){
//      dd($request->key);
      if (request('key')) {
        $users = User::where('user_name', 'like', '%' . request('key') . '%')
          ->orWhere('phone_number', 'like', '%' . request('key') . '%')
          ->orWhere('email', 'like', '%' . request('key') . '%')
          ->paginate(10);
      } else {
        $users = ShowAll::ShowAll();
      }
      return view('content.tables.tables-basic',compact('users'));

    }
}
