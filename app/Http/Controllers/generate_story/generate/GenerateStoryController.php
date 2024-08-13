<?php

namespace App\Http\Controllers\generate_story\generate;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class GenerateStoryController extends Controller
{
  public function index()
  {
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
            'content' => 'Hãy viết cho toi 3 doan tom tắt của một câu chuyện, có bối cảnh là cung điện, kể về tình cảm gia đình
                          Trả về định dạng json, có các trường thông tin như sau:
                          - "Title" chứa thông tin tên câu truyện.
                          - "Description" mô tả gắn gọn câu chuyện.
                          - "img_url" chứa link ảnh thumbanails của truyện.'
          ],
        ],
      ],
    ]);

    $responseData = json_decode($response->getBody(), true);
    $answer = json_decode($responseData['choices'][0]['message']['content']);

    return $answer;
//    return view('generate-story.test', compact('answer'));
  }
}
