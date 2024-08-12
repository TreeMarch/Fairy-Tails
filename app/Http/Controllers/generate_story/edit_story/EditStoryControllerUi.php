<?php

namespace App\Http\Controllers\generate_story\edit_story;

use App\Http\Controllers\Controller;

class EditStoryControllerUi extends Controller
{
  public function index()
  {
    return view("generate-story.edit-story");
  }
}
