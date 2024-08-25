<?php

namespace App\Http\Controllers\user_management\show_user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\user_management\show_user\ShowUserControllerUi as ShowAll;

class ShowUserController extends Controller
{
  public function index(Request $request)
  {
    $key = request('key');
    $statusMapping = [
      'pending' => 0,
      'active' => 1,
      'banned' => -1,
    ];

    if ($key) {
      $users = User::where('user_name', 'like', '%' . $key . '%')
        ->orWhere('phone_number', 'like', '%' . $key . '%')
        ->orWhere('last_name', 'like', '%' . $key . '%')
        ->orWhere('email', 'like', '%' . $key . '%')
        ->orWhere(function ($query) use ($key, $statusMapping) {
          // Convert key to lowercase for comparison
          $keyLower = strtolower($key);

          if (isset($statusMapping[$keyLower])) {
            // Search by the mapped status value
            $query->where('status', $statusMapping[$keyLower]);
          } else {
            // Search normally if not a mapped status
            $query->where('status', 'like', '%' . $key . '%');
          }
        })
        ->paginate(4);
    } else {
      $users = ShowAll::ShowAll();
    }

    return view('content.tables.tables-basic', compact('users'));
  }
}
