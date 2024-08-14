<?php

namespace App\Http\Controllers\generate_story\generate;

use App\Http\Controllers\Controller;
use App\Http\Controllers\generate_story\summarize\SummarizeController;
use App\Models\Summarize;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class GenerateStoryController extends Controller
{
  public function index(Request $request)
  {
    $message = $request->input('message');

    $client = new Client();

    $response = $client->post('https://api.openai.com/v1/chat/completions', [
      'headers' => [
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        'Content-Type'  => 'application/json',
      ],
      'json' => [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
          [
            'role' => 'user',
            'content' => $message,
          ],
        ],
      ],
    ]);

    $responseData = json_decode($response->getBody(), true);

    // Lấy nội dung phản hồi từ ChatGPT và kiểm tra xem nó có phải là mảng không
    $answers = json_decode($responseData['choices'][0]['message']['content'], true);

//    $jsonData = $answers;

    $random_story_id = rand(100,10000);
     ;//se chinh lai story_id thanh kieu du lieu string de lay id co random ca chu cai
    foreach ($answers as $answer) {
        $summarizes = new Summarize();
        $summarizes -> story_id = $random_story_id;
        $summarizes -> title = $answer['Title'];
        $summarizes -> description = $answer['Title'];//$answer['Description'] vi dai qua khong luu duoc vao database
        $summarizes -> prompt_message = "null - this will be delete";// se xoa di
        $summarizes -> status = 1;
        $summarizes -> img_url = $answer['img_url'];
        $summarizes -> deleted_at = Carbon::now();
        $summarizes -> created_by = "user";
        $summarizes -> updated_by = "user";
        $summarizes -> deleted_by = "user";

        $summarizes -> save();
    }
    $story_id = $random_story_id;
    session(['story_id' => $random_story_id]);

    return redirect()->action([SummarizeController::class, 'index'])->with('story_id', $story_id);
  }
}
