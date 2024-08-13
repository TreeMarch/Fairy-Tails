<?php

namespace App\Http\Controllers\generate_story\generate;

use App\Http\Controllers\Controller;

class GenerateStoryControllerUi extends Controller
{
  public function index()
  {
    return view("generate-story.generate-form");
  }
}
