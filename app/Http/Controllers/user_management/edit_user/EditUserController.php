<?php

namespace App\Http\Controllers\user_management\edit_user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class EditUserController extends Controller
{
  public function edit($id)
  {
    $user = User::findOrFail($id);
    return view('content.tables.edit-user', compact('user'));
  }

  public function update(UpdateUserRequest $request, $id)
  {
    $user = User::findOrFail($id);
    $user->update($request->all());

    return redirect('/tables/basic');
  }
}
