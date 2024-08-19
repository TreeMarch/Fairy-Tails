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
  protected $random_story_id;
  public function __construct(){
    // Tạo một story_id ngẫu nhiên
    $this->random_story_id = "100" . Str::random(4);
  }
  // Xử lý message người dùng nhập vào và save vào DB
  public  function index(Request $request)
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



    // Lưu kết quả vào cơ sở dữ liệu
    foreach ($answers as $answer) {
      $summarizes = new Summarize();
      $summarizes->story_id = $this->random_story_id;
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

    // Chuyển hướng đến trang chi tiết với story_id
    return redirect()->route('generate.story.detail', ['id' => $this->random_story_id]);
  }

  public function generateDetail(Request $request, $id)
  {
    // Lấy dữ liệu từ cơ sở dữ liệu dựa trên story_id -> 3 summarizes => summarizes-form
    $summarize = Summarize::where('story_id', $id)->firstOrFail();

    // call api chatgpt câu lệnh chi tiết - Detail => lưu vào stories,chapter(mỗi chapter là một bản ghi -> db

    // JSON của các chương (Description)
//    $chapters = json_decode($summarize->description, true);

    // Kiểm tra JSON
//    if (!is_array($chapters)) {
//      $chapters = [];
//
//    }
    // Lấy dữ liệu từ bảng summarizes dựa trên story_id
    $summarizes = DB::table('summarizes')->where('story_id', $id)->get();

    return view('generate-story.summarize-form', compact('summarizes'),[
      'summarizes' => [$summarize],
      'title' => $summarize->title,
      'description' => $summarize->description,
      'thumbnail_url' => $summarize->thumbnail_url,
    ]);
  }


  public function sendPromptDetail(Request $request)
  {
    // Lấy dữ liệu từ form
    $title = $request->input('summarize_title');
    $background = $request->input('summarize_description');

    // Tạo message gửi đến OpenAI API
    $message_detail = 'Từ câu truyện '.$title.', có tóm tắt là '.$background. ' , bạn có thể
Trả về định dạng json, có các trường thông tin như sau:
Trường "Title" chứa tên câu truyện .
Trường "Content" chứa lời lời dẫn truyện .
Trường "Chapter" chứa 2 trường thông tin bên trong: "Heading" chứa tiêu để của chapter, "Description" chứa thông tin về lời dẫn truyện. Trường thông tin này có nhiều hơn 5 chapter';
    // Gửi request đến OpenAI API
    $client_detail = new Client();
    $response = $client_detail->post('https://api.openai.com/v1/chat/completions', [
      'headers' => [
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        'Content-Type' => 'application/json',
      ],
      'json' => [
        'model' => 'gpt-3.5-turbo',
        'messages' => [
          [
            'role' => 'user',
            'content' => $message_detail,
          ],
        ],
      ],
    ]);

    // Xử lý phản hồi từ OpenAI API
    $responseData = json_decode($response->getBody(), true);
    $answers = json_decode($responseData['choices'][0]['message']['content'], true);

    // Lưu các chapters vào cơ sở dữ liệu
    foreach ($answers['Chapter'] as $answer) {
      $chapter = new Chapter();
      $chapter->story_id = $this->random_story_id;
      $chapter->heading = $answer['Heading'];
      $chapter->description = $answer['Description'];
      $chapter->thumbnail_url = "https://inkythuatso.com/uploads/thumbnails/800/2022/05/hinh-anh-gai-xinh-toc-ngan-15-tuoi-07-10-23-26.jpg";
      $chapter->created_at = Carbon::now();
      $chapter->updated_at = Carbon::now();
      $chapter->deleted_at = Carbon::now();
      $chapter->created_by = "user";
      $chapter->updated_by = "user";
      $chapter->deleted_by = null; // Không xóa thì set null

      $chapter->save();
    }

    // Lưu vào bảng stories
    $story = new Story();
    $story->story_id = $this->random_story_id;
    $story->account_id = "aido123123";
    $story->title = $answers['Title'];
    $story->content = $answers['Content'];
    $story->thumbnails_url = "https://inkythuatso.com/uploads/thumbnails/800/2022/05/hinh-anh-gai-xinh-toc-ngan-15-tuoi-07-10-23-26.jpg";
    $story->created_at = Carbon::now();
    $story->updated_at = Carbon::now();
    $story->deleted_at = Carbon::now();
    $story->created_by = "user";
    $story->updated_by = "user";
    $story->deleted_by = null; // Không xóa thì set null

    $story->save();

    // Chuyển hướng đến trang chi tiết với story_id
    return redirect()->route('generate.story.chapter', ['id' => $this->random_story_id]);
  }



  public function showChapter(Request $request,$id){
    // Lấy tất cả các chương từ bảng chapters dựa trên story_id
    $chapters = Chapter::where('story_id', $id)->get();

    // Lấy thông tin của story từ bảng stories
    $story = Story::where('story_id', $id)->firstOrFail();

    return view('generate-story.detail', [
      'summarizes' => $chapters,
      'title' => $story->title,
      'description' => $story->content,
      'thumbnail_url' => $story->thumbnails_url
    ]);
  }

  public function editChapter(Request $request,$id){

    $chapters = Chapter::where('story_id', $id)->get();
    $story = Story::where('story_id', $id)->firstOrFail();

    // Truyền dữ liệu vào view edit-story.blade.php
    return view('generate-story.edit-story', [
      'chapters' => $chapters,
      'story' => $story,
      'thumbnail_url' => $story->thumbnails_url
    ]);
  }
  public function updateChapter(Request $request, $id){
    // Lấy story dựa trên ID
    $story = Story::where('story_id', $id)->firstOrFail();

    $title = $request->input('title');
    $content = $request->input('content');

    // Cập nhật thông tin story
    $story->title = $title;
    $story->content = $content;
    $story->updated_at = now();
    $story->save();

    // Cập nhật các chương (chapters)
    $chapters = $request->input('headings');
    $descriptions = $request->input('descriptions');
    foreach ($chapters as $index => $heading) {
      $chapter = Chapter::where('story_id', $id)->skip($index)->first();
      if ($chapter) {
        $chapter->heading = $heading;
        $chapter->description = $descriptions[$index];
        $chapter->save();
      }
    }

    return redirect()->route('generate.story.chapter', ['id' => $id]);
  }

}
