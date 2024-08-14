<?php

namespace App\Http\Controllers\generate_story\summarize;

use App\Http\Controllers\Controller;
use App\Models\Summarize;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SummarizeController extends Controller
{
  public function index()
  {
    $story_id = session()->get('story_id');

    $all_summarizes = Summarize::all()->where("story_id", "$story_id");

//    return $all_summarizes;
    return view("generate-story.summarize-form", compact("all_summarizes"));
  }
}
