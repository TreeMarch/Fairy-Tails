<?php

namespace App\Http\Controllers\generate_story\summarize;

use App\Http\Controllers\Controller;

class SummarizeControllerUi extends Controller
{
  public function index()
  {
    return view("generate-story.summarize-form");
  }
}
