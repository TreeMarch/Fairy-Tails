<?php

namespace App\Http\Controllers\generate_story\generate;

use App\Http\Controllers\Controller;
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

    foreach ($answers as $answer) {
      Summarize::create([
        'story_id' => "000".Str::random(4),
        'title' => $answer['title'],
        'description' => $answer['Description'],
        'img_url' => $answer['img_url'],
      ]);
    }
    return "done";
  }
}
