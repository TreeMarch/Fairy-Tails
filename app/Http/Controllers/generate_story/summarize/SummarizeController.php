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
    $dt = Carbon::now();
    $dateNow = $dt->toDateTimeString();
    $answers = session("answers");
    foreach ($answers['stories'] as $answer) {
//      $summarize = new Summarize();
//      $summarize -> title = $answer['Title'];
//      $summarize -> description = $answer['Description'];
//      $summarize -> img_url = $answer['img_url'];
//      $summarize -> story_id = "000".Str::random(4);
//      $summarize -> status = 1;
//      $summarize -> created_at = "$dateNow";
//      $summarize -> updated_at = "$dateNow";
//      $summarize -> deleted_at = "$dateNow";
//      $summarize -> created_by = "user";
//      $summarize -> updated_by = "user";
//      $summarize -> deleted_by = "user";
//
//      $summarize -> save();
    }
    return "done";
  }
}
