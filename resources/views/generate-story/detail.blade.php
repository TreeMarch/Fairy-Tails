@extends('layouts/contentNavbarLayout')

@section('title', 'Story Details')

@section('content')
  <div class="col-md">
    <small class="text-light fw-medium">CHAPTER</small>
    <div class="accordion mt-4" id="accordionExample">
      @if($summarizes->isEmpty())
        <p>No chapters available.</p>
      @else
        <form action="" method="post">
          @foreach($summarizes as $index => $chapter)
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
                    <img src="{{ $chapter->thumbnail_url }}" alt="{{ $chapter->title }}" class="img-fluid mb-3" />
                  @endif

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
                </div>
              </div>
            </div>
          @endforeach
        </form>

        <!-- Buttons for publication and editing -->
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
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả các form trên trang
    const forms = document.querySelectorAll('form');

    // Gán sự kiện submit cho từng form
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
