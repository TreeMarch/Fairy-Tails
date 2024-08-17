@extends('layouts/contentNavbarLayout')

@section('title', 'Story Details')

@section('content')
  <!-- Basic Layout & Basic with Icons -->
  <h5>Detail Story</h5>
  <div class="row">
    <!-- Basic Layout -->
    
    <div class="col-md">
      <div class="accordion mt-4" id="accordionExample">
        @foreach($summarizes as $index => $chapter)
          <div class="card accordion-item @if($index == 0) active @endif">
            <h2 class="accordion-header" id="heading{{ $index }}">
              <button type="button" class="accordion-button @if($index != 0) collapsed @endif" data-bs-toggle="collapse" data-bs-target="#accordion{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="accordion{{ $index }}">
                <input type="text" name="title" class="form-control" value="{{ $chapter->title }}">
              </button>
            </h2>

            <div id="accordion{{ $index }}" class="accordion-collapse collapse @if($index == 0) show @endif" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <h6>Description:</h6>
                <textarea name="description" class="form-control">{{ $chapter->description }}</textarea>
                @if($chapter->thumbnail_url)
                  <img src="{{ $chapter->thumbnail_url }}" alt="{{ $chapter->title }} " class="img-fluid mb-3" />
                @endif

                {{--Nút Save--}}
                <form method="post" action="/story/save-page">
                  @csrf
                  <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                  <input type="hidden" name="story_id" value="{{ $chapter->story_id }}">

                  <div>
                    <button type="submit" class="btn btn-primary">Save</button>
   
                  </div>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  </div>
@endsection

<script>
  // You can add any additional JavaScript here if needed.
</script>
