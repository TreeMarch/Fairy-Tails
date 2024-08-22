<?php
namespace App\Http\Controllers\generate_story\generate;

use AllowDynamicProperties;
use App\Http\Controllers\Controller;
use App\Models\Summarize;
use App\Models\Chapter;
use App\Models\Story;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

#[AllowDynamicProperties] class GenerateStoryController extends Controller
{
  protected $random_story_id;
  public function __construct(Request $request){
    // Tạo một story_id ngẫu nhiên
    $this->random_story_id = "100" . Str::random(4);
    $this->random_chapter_id = "001" . Str::random(6);

    // Nhận dữ liệu từ form
    $this->title = $request->input('title-story');
    $this->description = $request->input('description');

    $this->thumbnail = $request->input('thumbnail');

    $lessons = $request->input('lessons',[]);
    $this->lessons_des = $request->input('lessons-2');
    $this->lessons_string = implode(', ', $lessons);

    $this->background = $request->input('background');
    $this->background_des = $request->input('background-2');

    $this->character = $request->input('character');
    $this->character_des = $request->input('character-2');
  }
  // Xử lý message người dùng nhập vào và save vào DB
  public  function index()
  {
    // Tạo message dựa trên input người dùng
    $message = 'Viết cho tôi 3 câu truyện tóm tắt từ những gợi ý dưới đây tên truyện có gợi ý là "' . $this->title . '", Mô tả thêm về câu truyện có gợi ý là: "' . $this->description . '" nội dung câu chuyện xoay quanh nhân vật có gợi ý là'.$this->character.' (mô tả thêm: '.$this->character_des.' ) , bối cảnh câu truyện có gợi ý là trong  ' . $this->background ."(mô tả thêm:" . $this->background_des . "), Bài học rút ra sau câu truyện là:" . $this->lessons_string ."(mô tả thêm:" . $this->lessons_des ."). Chữ cái đầu luôn viết hoa ".'.
     Trả về định dạng json, có các trường thông tin như sau:
     Trường "Title" chứa tên câu truyện.
     Trường "Description" chứa mô tả câu truyện.
     Trường "Thumbnail_url" chứa thông tin về url ảnh.';

    // Gửi request đến OpenAI API
    $client = new Client();
    $response = $client->post('https://api.openai.com/v1/chat/completions', [
      'headers' => [
        'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        'Content-Type' => 'application/json',
      ],
      'json' => [
        'model' => 'gpt-4',
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



//     Lưu kết quả vào cơ sở dữ liệu
    foreach ($answers as $answer) {
      $summarizes = new Summarize();
      $summarizes->story_id = $this->random_story_id;
      $summarizes->title = $answer['Title'];
      $summarizes->description = $answer['Description'];
      $summarizes->status = 1;
      $summarizes->thumbnail_url = $answer['Thumbnail_url'];
      $summarizes->created_at = Carbon::now();
      $summarizes->updated_at = Carbon::now();
      $summarizes->deleted_at = Carbon::now();
      $summarizes->created_by = "user";
      $summarizes->updated_by = "user";
      $summarizes->deleted_by = null; // Không xóa thì set null
//
      $summarizes->save();
    }

//    return $message;
//    return $answers;
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
    $description = $request->input('summarize_description');

    // Tạo message gửi đến OpenAI API
    $message_detail = 'Từ câu truyện '.$title.', có tóm tắt là '.$description. ', , Mô tả thêm về câu truyện có gợi ý là: "' . $this->description . '" nội dung câu chuyện xoay quanh nhân vật có gợi ý là'.$this->character.' (mô tả thêm: '.$this->character_des.' ) , bối cảnh câu truyện có gợi ý là trong  ' . $this->background ."(mô tả thêm:" . $this->background_des . "), Bài học rút ra sau câu truyện là:" . $this->lessons_string ."(mô tả thêm:" . $this->lessons_des ."). Chữ cái đầu luôn viết hoa ".'. bạn có thể viết một câu chuyện đầy đủ chi tiết, bao gồm cả lời dẫn truyện và lời đối thoại thoại của các nhân vật.
Trả về định dạng json, có các trường thông tin như sau:
Trường "Title" chứa tên câu truyện.
Trường "Content" chứa lời lời dẫn truyện.
Trường "Character" chứa tên nhân vật, trường này là một mảng, mỗi nhân vật là một phần tử trong mảng.
Trường "Chapter" chứa 3 trường thông tin bên trong,Trường thông tin này có 5 chapter.:
    "Heading" chứa số chapter và tiêu đề của chapter,
    "Description" chứa thông tin về lời dẫn truyện.
    "Dialogue" chứa thông tin nội dung cuộc hội thoại, Trường "Dialogue"là một mảng, mỗi lời thoại là một phần tử trong mảng .

Trường "Background" chứa thông tin bối cảnh.
Trường "Lessons" chứa thông tin bài học rút ra sau câu chuyện.';
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

//     Xử lý phản hồi từ OpenAI API
    $responseData = json_decode($response->getBody(), true);
    $answers = json_decode($responseData['choices'][0]['message']['content'], true);

//     Lưu các chapters vào cơ sở dữ liệu
    foreach ($answers['Chapter'] as $answer) {
      $chapter = new Chapter();
      $chapter->story_id = $this->random_story_id;
      $chapter->chapter_id = $this->random_chapter_id;
      $chapter->heading = $answer['Heading'];
      $chapter->description = $answer['Description'];
      $chapter->thumbnail_url = "https://res.cloudinary.com/dzxsq1qig/image/upload/v1724060252/img-example_kz7ttf.png";
      $chapter->created_at = Carbon::now();
      $chapter->updated_at = Carbon::now();
      $chapter->deleted_at = Carbon::now();
      $chapter->created_by = "user";
      $chapter->updated_by = "user";
      $chapter->deleted_by = null; // Không xóa thì set null

      $chapter->save();
    }

    // Lưu vào bảng stories
//    $story = new Story();
//    $story->story_id = $this->random_story_id;
//    $story->account_id = "aido123123";
//    $story->title = $answers['Title'];
//    $story->content = $answers['Content'];
//    $story->thumbnails_url = "https://res.cloudinary.com/dzxsq1qig/image/upload/v1724060252/img-example_kz7ttf.png";
//    $story->created_at = Carbon::now();
//    $story->updated_at = Carbon::now();
//    $story->deleted_at = Carbon::now();
//    $story->created_by = "user";
//    $story->updated_by = "user";
//    $story->deleted_by = null; // Không xóa thì set null

//    $story->save();
      return $answers;
    // Chuyển hướng đến trang chi tiết với story_id
//    return redirect()->route('generate.story.chapter', ['id' => $this->random_story_id]);
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

    // Lấy request
    $title = $request->input('title');
    $chapterHeadings = $request->input('headings');
    $chapterDescriptions = $request->input('descriptions');
    $chapterIds = $request->input('chapter_ids');

    // Cập nhật thông tin story
    $story->title = $title;
    $story->updated_at = now();
    $story->save();

    // Cập nhật các chương (chapters)
    foreach ($chapterIds as $index => $chapterId) {
      $chapter = Chapter::find($chapterId);
      if ($chapter) {
        $chapter->heading = $chapterHeadings[$index];
        $chapter->description = $chapterDescriptions[$index];
        $chapter->updated_at = now();
        $chapter->save();
      }
    }

    return redirect()->route('generate.story.chapter', ['id' => $id]);
  }
}
