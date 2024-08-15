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
        $summarizes -> description = $answer['Description'];//$answer['Description'] vi dai qua khong luu duoc vao database
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

    return redirect()->route('/story-management/summarize-story',['id'=> $story_id]);
  }

  public function generateDetail(Request $request)
  {
    $summarizeId = $request->input('summarize_id');
    $summary = Summarize::findOrFail($summarizeId);

//    $client = new Client();
//    $message = 'Viết cho tôi một câu truyện có tên là "Câu chuyện cáo và thỏ",  nội dung câu chuyện xoay quanh 2 nhân vật cáo, thỏ và bạn bè, bối cảnh câu chuyện trong khu rừng sâu, bài học rút ra sau câu chuyện là về tình cảm bạn bè giữa thỏ và cáo. Độ dài câu truyện khoảng 600 từ, chia thành nhiều chapter khác nhau khác nhau trong một chapter có tối thiểu 2 trang truyện và tối đa 5 trang truyện, có lời thoại cho các nhân vật trong truyện, độ tuổi câu chuyện là khoang 6 tuổi.
//    Trả về định dạng json, có các trường thông tin như sau:
//    - "Title" chứa thông tin tên câu truyện.
//    - "Chapter" Trong chapter chứa 3 trường thông tin bên trong, "Content" chứa thông tin về lời dẫn truyện, "Character" chứa thông tin nhân vật, "Dialogue" chứa lời thoại của từng nhân vật.
//    - "Lesson" chứa thông tin bài học rút ra sau câu truyện.
//    - "Size_type" chứa thông tin độ dài câu truyện.
//    - "Age_range" chứa thông tin độ tuổi câu truyện.
//    - "Background" chứa thông tin bối cảnh câu truyện.
//    - "Use_coin" chứa thông tin số tiền sử dụng để tạo câu truyện';
//
//    $response = $client->post('https://api.openai.com/v1/chat/completions', [
//      'headers' => [
//        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
//        'Content-Type'  => 'application/json',
//      ],
//      'json' => [
//        'model' => 'gpt-3.5-turbo',
//        'messages' => [
//          [
//            'role' => 'user',
//            'content' => $message,
//          ],
//        ],
//      ],
//    ]);
//
//    $responseData = json_decode($response->getBody(), true);
    // Lấy nội dung phản hồi từ ChatGPT và kiểm tra xem nó có phải là mảng không
    //$content = json_decode($responseData['choices'][0]['message']['content'], true);

//    return $content['Chapter'];
//    $chapters = $content['Chapter'];
    $chapters = json_decode('[
    {
        "Content": "Trong khu rừng sâu, có hai người bạn thân là cáo và thỏ. Họ luôn luôn bên cạnh nhau và chia sẻ mọi điều trong cuộc sống.",
        "Character": "Cáo, Thỏ",
        "Dialogue": {
            "Cáo": "Chúng ta sẽ không bao giờ rời xa nhau đúng không, thỏ?",
            "Thỏ": "Đúng vậy, chúng ta là bạn tốt của nhau mà."
        }
    },
    {
        "Content": "Một ngày, thỏ bị mắc kẹt trong một cái bẫy do đội rừng sâu đặt. Cáo đã tìm ra và đã giúp thỏ thoát ra khỏi tình thế nguy hiểm đó.",
        "Character": "Cáo, Thỏ, Đội rừng sâu",
        "Dialogue": {
            "Cáo": "Đừng lo lắng, mình sẽ cứu bạn ra.",
            "Thỏ": "Cảm ơn bạn rất nhiều, cáo."
        }
    },
    {
        "Content": "Sau sự việc đó, tình cảm giữa cáo và thỏ trở nên mạnh mẽ hơn. Họ hiểu rằng tình bạn đích thực sẽ luôn giúp đỡ đối phương trong lúc cần.",
        "Character": "Cáo, Thỏ",
        "Dialogue": {
            "Cáo": "Chúng ta là bạn tốt nhất đúng không, thỏ?",
            "Thỏ": "Đúng vậy, không gì có thể chia lìa chúng ta cả."
        }
    }
]', true);
    // save du lieu tra ve vao database
    return view("generate-story.detail", compact('chapters'));
  }
}
