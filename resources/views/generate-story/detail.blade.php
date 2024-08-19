@extends('layouts/contentNavbarLayout')

@section('title', 'Story Details')

@section('content')
  <div class="col-md">
    <small class="text-light fw-medium">CHAPTER</small>
    <div class="accordion mt-4" id="accordionExample">
{{--      action goi den trang reading--}}
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
                <img src="{{ $chapter->thumbnail_url }}" alt="{{ $chapter->title }} " class="img-fluid mb-3" />
              @endif
            </div>
          </div>
        </div>
      @endforeach
      </form>
    </div>
    <div class="d-flex ">
{{--         Nút Export --}}
      <form method="get" action="{{ route('reading.story.detail', ['id' => $chapter->story_id]) }}" target="_blank" class="btn btn-primary m-0">
        @csrf
        <button type="submit" class="btn btn-primary" >xuất bản </button>
      </form>
      {{-- Nút Edit --}}
      <form method="get" action="{{ route('generate.story.edit', ['id' => $chapter->story_id]) }}" class="btn btn-primary m-0">
        @csrf
        <button type="submit" class="btn btn-primary">Edit</button>
      </form>
  </div>
@endsection

<script>

  // You can add any additional JavaScript here if needed.
</script>
