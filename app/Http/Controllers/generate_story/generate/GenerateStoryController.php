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
        'model' => 'gpt-4',
        'messages' => [
          [
            'role' => 'system',
            'content' => 'You are a helpful assistant.'
          ],
          [
            'role' => 'user',
            'content' => 'What is the capital of France?'
          ],
        ],
        'max_tokens' => 50,
      ],
    ]);

    $responseData = json_decode($response->getBody(), true);

    $answer = $responseData['choices'][0]['message']['content'];

    return view('generate-story.test', compact('answer'));
  }
}
