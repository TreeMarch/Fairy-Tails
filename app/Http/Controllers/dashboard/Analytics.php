<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class Analytics extends Controller
{
  public function index()
  {
    $stories = Story::paginate(10);

    // Truyền biến $stories đến view
    return view('content.dashboard.dashboards-analytics', compact('stories'));
  }
}
