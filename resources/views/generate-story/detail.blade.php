@extends('layouts/contentNavbarLayout')

@section('title', 'Story Details')

@section('content')
  <div class="col-md">
    @include('alert-message')
    <small class="text-light fw-medium">CHAPTER</small>
    <div class="accordion mt-4" id="accordionExample">
      @if($summarizes->isEmpty())
        <p>No chapters available.</p>
      @else
        @foreach($summarizes as $index => $chapter)
          <form action="{{ route('generate.story.uploadImage', ['id' => $chapter->story_id]) }}" method="post" id="form_{{ $chapter->id }}">
            @csrf
            <!-- Hidden Input for Chapter ID -->
            <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">

            <div class="card accordion-item @if($index == 0) active @endif">
              <h2 class="accordion-header" id="heading{{ $index }}">
                <button type="button" class="accordion-button @if($index != 0) collapsed @endif" data-bs-toggle="collapse" data-bs-target="#accordion{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="accordion{{ $index }}" style="font-size: 1.25rem;">
                  {{ $chapter->heading }}
                </button>
              </h2>

              <div id="accordion{{ $index }}" class="accordion-collapse collapse @if($index == 0) show @endif" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <h6>Description:</h6>
                  <p>{{ $chapter->description }}</p>

                  @if($chapter->thumbnail_url)
                    <img id="uploaded_image_preview_{{ $index }}" src="{{ $chapter->thumbnail_url }}" alt="{{ $chapter->title }}" class="img-fluid mb-3" />
                  @else
                    <img id="uploaded_image_preview_{{ $index }}" src="" alt="No Image" class="img-fluid mb-3" style="display:none;" />
                  @endif

                  <input type="hidden" id="thumbnail_url_{{ $index }}" name="thumbnail_url" value="{{ $chapter->thumbnail_url ?? '' }}">

                  <h6>Dialogues:</h6>
                  @if($chapter->dialogues && $chapter->dialogues->isNotEmpty())
                    <ul>
                      @foreach($chapter->dialogues as $dialogue)
                        <li>{{ $dialogue->content }}</li>
                      @endforeach
                    </ul>
                  @else
                    <p>No dialogues available for this chapter.</p>
                  @endif
                  <button id="upload_widget_{{ $index }}" type="button" class="cloudinary-button btn btn-primary mb-3">Tải ảnh lên</button>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        @endforeach
        <div class="d-flex">
          @if(isset($chapter))
            <form method="get" action="{{ route('reading.story.detail', ['id' => $chapter->story_id]) }}" target="_blank" class="btn btn-primary m-0">
              <button type="submit" class="btn btn-primary">Xuất bản</button>
            </form>
            <form method="get" action="{{ route('generate.story.edit', ['id' => $chapter->story_id]) }}" class="btn btn-primary m-0">
              <button type="submit" class="btn btn-primary">Edit</button>
            </form>
          @endif
        </div>
      @endif
    </div>
  </div>
@endsection

<!-- Cloudinary Upload  -->
<script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
    @foreach($summarizes as $index => $chapter)
    var myWidget_{{ $index }} = cloudinary.createUploadWidget({
        cloudName: 'dgv1uwtra',
        uploadPreset: 'my_preset'},
      (error, result) => {
        if (!error && result && result.event === "success") {
          const imageUrl = result.info.secure_url;
          // Gán URL vào hidden input để lưu vào database
          document.getElementById("thumbnail_url_{{ $index }}").value = imageUrl;

          // Hiển thị ảnh vừa upload
          var imgPreview = document.getElementById("uploaded_image_preview_{{ $index }}");
          imgPreview.src = imageUrl;
          imgPreview.style.display = "block"; // Hiển thị ảnh nếu chưa có

          alert('Upload successful!');
        }
      });

    document.getElementById("upload_widget_{{ $index }}").addEventListener("click", function(event){
      event.preventDefault();  // Ngăn chặn form submit tự động
      myWidget_{{ $index }}.open();
    }, false);
    @endforeach
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form');

    forms.forEach(function(form) {
      form.addEventListener('submit', function () {
        const loading = document.getElementById('loading');
        if (loading) {
          loading.style.display = 'block';
        }
      });
    });
  });
</script>
