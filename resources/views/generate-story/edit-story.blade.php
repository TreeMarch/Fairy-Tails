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
          <h5>Story title:</h5>
          <input type="text" class="form-control" name="title" value="{{ $story->title }}" required>
        </div>

        @foreach($chapters as $chapter)
          <div class="card mb-4">
            <div class="card-body">
              <h5>{{ $chapter->heading }}</h5>
              <div class="form-group mb-3">
                <label for="heading">Chapter:</label>
                <input type="text" class="form-control" name="headings[]" value="{{ $chapter->heading }}">
              </div>

              <div class="form-group mb-3">
                <label for="description">Description:</label>
                <textarea class="form-control" name="descriptions[]">{{ $chapter->description }}</textarea>
              </div>
            </div>
          </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Update Story</button>
      </form>
    </div>
  </div>
@endsection
