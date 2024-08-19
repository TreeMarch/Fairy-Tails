@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Story')

@section('content')
  <h5 class="mb-4">Edit Story</h5>

  <div class="row">
    <div class="col-md">
      <form method="post" action="{{ route('generate.story.update', ['id' => $story->story_id]) }}">
        @csrf
        @method('PUT') {{-- PUT cập nhật --}}

        {{-- Story Title --}}
        <div class="card mb-4">
          <div class="card-header">
            <h5>Story Title</h5>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{ $story->title }}" required>
            </div>
          </div>
        </div>

        {{-- Chapters --}}
        @foreach($chapters as $chapter)
          <div class="card mb-4">
            <div class="card-body">
              <h5>Chapter {{ $loop->iteration }}: {{ $chapter->heading }}</h5>

              <div class="form-group mb-3">
                <label for="heading">Chapter Heading:</label>
                <input type="text" class="form-control" name="headings[]" value="{{ $chapter->heading }}">
              </div>

              <div class="form-group mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control" name="descriptions[]" rows="4">{{ $chapter->description }}</textarea>
              </div>

              <input type="hidden" name="chapter_ids[]" value="{{ $chapter->id }}">
            </div>
          </div>
        @endforeach

        {{-- Submit Button --}}
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary">Update Story</button>
        </div>
      </form>
    </div>
  </div>
@endsection
