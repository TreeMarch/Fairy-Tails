<div class="accordion-body">
  <h6>Title:</h6>
  <input type="text" name="title" class="form-control" value="titlte cua truyen ">

  <h6>Description:</h6>
  <textarea name="description" class="form-control">Mo ta cua truyen</textarea>

{{--  @if($chapter->thumbnail_url)--}}
{{--    <img src="{{ $chapter->thumbnail_url }}" alt="{{ $chapter->title }}" class="img-fluid mb-3" />--}}
{{--    <input type="hidden" name="thumbnail_url" value="{{ $chapter->thumbnail_url }}">--}}
{{--  @endif--}}

  <form method="post" action="/story/save-page">
    @csrf
    <input type="hidden" name="chapter_id" value="1">
    <input type="hidden" name="story_id" value="1">
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>
