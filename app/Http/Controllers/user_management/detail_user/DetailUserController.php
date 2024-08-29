<?php

namespace App\Http\Controllers\user_management\detail_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailUserController extends Controller
{
    public function detail($id){
      $user = User::findOrFail($id);
      return view('content.pages.pages-account-settings-account', compact('user'));
    }
  public function updateAvatar(Request $request)
  {
    $user = User::findOrFail($request->input('user_id')); // Tìm người dùng theo id

    // Cập nhật URL avatar
    $user->url_avatar = $request->input('url_avatar');
    $user->save();

    return redirect()->back()->with('success', 'Avatar updated successfully!');
  }


}
