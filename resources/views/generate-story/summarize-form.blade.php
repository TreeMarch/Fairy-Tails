{{-- @php --}}
{{-- $all_summarizes = session('all_summarizes'); --}}
{{-- @endphp --}}
@extends('layouts/contentNavbarLayout')

@section('title', 'Horizontal Layouts - Forms')

@section('content')
  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-body">
          <div class="d-flex row">
            @if(isset($summarizes) && count($summarizes) > 0)
              @foreach($summarizes as $index => $chapter)
                <form method="post" action="{{ route('generate.story.summarize-form') }}" class="d-flex row">
                  @csrf
                  <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                      <img class="card-img-top" src="{{ asset('assets/img/elements/2.jpg') }}" alt="Card image cap" />
                      <div class="card-body">
                        <h5 class="card-title">{{ $chapter->title }}</h5>
                        <input type="hidden" name="summarize_title" value="{{ $chapter->title }}">
                        <p class="card-text">{{ $chapter->description }}</p>
                        <input type="hidden" name="summarize_description" value="{{ $chapter->description }}">
                        <input type="submit" class="btn btn-outline-primary" value="Choice this story"/>
                      </div>
                    </div>
                  </div>
                </form>
              @endforeach
            @else
              <p>Không có câu chuyện nào để hiển thị.</p>
            @endif
          </div>

          <div class="d-flex w-100 justify-content-center mt-6">
            <button type="button" class="btn btn-primary m-2" onclick="window.location='{{ url("/story-management/generate-story-ui") }}'">
              <span class="tf-icons bx bx-book bx-18px me-2"></span>Back to Generate
            </button>
            <button type="button" class="btn btn-primary m-2" onclick="event.preventDefault(); document.getElementById('reset-story-form').submit();">
              <span class="tf-icons bx bx-reset bx-18px me-2"></span>Reset
            </button>
          </div>

          <!-- Form để reset câu chuyện -->
          <form id="reset-story-form" action="{{ route('generate.story.reset') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="title-story" value="{{ $title }}">
            <input type="hidden" name="description" value="{{ $description }}">
          </form>
        </div>
      </div>
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

