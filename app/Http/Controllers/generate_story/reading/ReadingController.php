<?php

namespace App\Http\Controllers\generate_story\reading;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
  public function showAllReading(Request $request,$id)
  {
    // Lấy tất cả các chương từ bảng chapters dựa trên story_id
    $chapters = Chapter::where('story_id', $id)->get();

    // Lấy thông tin của story từ bảng stories
    $story = Story::where('story_id', $id)->firstOrFail();

    return view('generate-story.reading-story', [
      'chapters' => $chapters,
      'story' => $story
    ]);
  }
}
