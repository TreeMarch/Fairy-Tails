<?php

namespace App\Http\Controllers\generate_story\reading;

use App\Http\Controllers\Controller;

class ReadingControllerUi extends Controller
{
  public function index()
  {
    return view("generate-story.reading-story");
  }
}
