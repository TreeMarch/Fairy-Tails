<?php
namespace App\Http\Controllers\generate_story\generate;

use App\Http\Controllers\Controller;
use App\Models\Summarize;
use App\Models\Chapter;
use App\Models\Story;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class GenerateStoryController extends Controller
{
  // Xử lý message người dùng nhập vào và save vào DB
  public function index(Request $request)
  {
    // Nhận dữ liệu từ form
    $title = $request->input('title');
    $description = $request->input('description');
    $character = $request->input('character');
    $thumbnail = $request->input('thumbnail');

    // Tạo message dựa trên input người dùng
    $message = 'Viết cho tôi 3 câu truyện có tên là "' . $title . '", nội dung câu chuyện xoay quanh nhân vật '.$character.', bối cảnh câu chuyện trong ' . $description . '.
     Trả về định dạng json, có các trường thông tin như sau:
     Trường "Title" chứa tên câu truyện.
     Trường "Description" chứa mô tả câu truyện.
     Trường "thumbnail_url" chứa thông tin về url ảnh.';

    // Gửi request đến OpenAI API
    $client = new Client();
    $response = $client->post('https://api.openai.com/v1/chat/completions', [
      'headers' => [
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        'Content-Type' => 'application/json',
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

    // Giả sử response từ OpenAI là dạng JSON với các trường Title, Description, thumbnail_url
    $responseData = json_decode($response->getBody(), true);
    $answers = json_decode($responseData['choices'][0]['message']['content'], true);

    // Tạo một story_id ngẫu nhiên
    $random_story_id = "100" . Str::random(4);

    // Lưu kết quả vào cơ sở dữ liệu
    foreach ($answers as $answer) {
      $summarizes = new Summarize();
      $summarizes->story_id = $random_story_id;
      $summarizes->title = $answer['Title'];
      $summarizes->description = $answer['Description'];
      $summarizes->status = 1;
      $summarizes->thumbnail_url = $answer['thumbnail_url'];
      $summarizes->created_at = Carbon::now();
      $summarizes->updated_at = Carbon::now();
      $summarizes->deleted_at = Carbon::now();
      $summarizes->created_by = "user";
      $summarizes->updated_by = "user";
      $summarizes->deleted_by = null; // Không xóa thì set null

      $summarizes->save();
    }
    $story_id = $random_story_id;
    // Chuyển hướng đến trang chi tiết với story_id
    return redirect()->route('generate.story.detail', ['id' => $random_story_id]);
  }

  public function generateDetail(Request $request, $id)
  {
    // Lấy dữ liệu từ cơ sở dữ liệu dựa trên story_id
    $summarize = Summarize::where('story_id', $id)->firstOrFail();

    // call api chatgpt câu lệnh chi tiết - Detail

    // JSON của các chương (Description)
    $chapters = json_decode($summarize->description, true);

    // Kiểm tra JSON
    if (!is_array($chapters)) {
      $chapters = [];

    }
    // Lấy dữ liệu từ bảng summarizes dựa trên story_id
    $summarizes = DB::table('summarizes')->where('story_id', $id)->get();

    return view('generate-story.detail', compact('summarizes'),[
      'summarizes' => [$summarize],
      'title' => $summarize->title,
      'description' => $summarize->description,
      'thumbnail_url' => $summarize->thumbnail_url,
      'chapters' => $chapters,
    ]);
  }
}
