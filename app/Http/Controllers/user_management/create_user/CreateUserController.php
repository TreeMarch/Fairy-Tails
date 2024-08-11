<?php

namespace App\Http\Controllers\user_management\create_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUserController extends Controller
{
  public function index(){
    $dateNow = Carbon::now() -> toDateString();

    $user = new User();
    $user -> account_id = '251265'. Str::random(5);
    $user -> user_name = request('user_name');
    $user -> user_password = hash::make(request('user_password'));
    $user -> first_name = request('first_name');
    $user ->last_name = request('last_name');
    $user ->email = request('email');
    $user ->phone_number = request('phone_number');
    $user ->favourite = request('favourite');
    $user ->birth = request('birth');
    $user ->salt = 'no';
    $user ->current_coin = 500;
    $user ->is_admin = false;
    $user ->status = 0;
    $user ->created_at = "$dateNow";
    $user ->updated_at = $dateNow;
    $user ->deleted_at = $dateNow;
    $user ->created_by = $dateNow;
    $user ->updated_by = $dateNow;
    $user ->deleted_by = $dateNow;

    $user -> save();
    return redirect('/tables/basic');

  }
}
