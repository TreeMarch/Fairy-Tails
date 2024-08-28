<?php

namespace App\Http\Controllers\user_management\delete_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
  public function destroy($id)
  {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect('/tables/basic')->with('success', 'Xoá người dùng thành công ');
  }
}
