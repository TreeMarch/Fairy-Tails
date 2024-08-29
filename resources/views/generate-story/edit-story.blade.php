@extends('layouts/contentNavbarLayout')

@section('title', 'Edit Story')

@section('content')
  <style>
    textarea{
      resize: none;
    }

  </style>
  @include('alert-message')
  <h5 class="mb-4">Chỉnh sửa truyện</h5>

  <div class="row">
    <div class="col-md">
      <form method="post" action="{{ route('generate.story.update', ['id' => $story->story_id]) }}">
        @csrf
        @method('PUT') {{-- PUT cập nhật --}}

        {{-- Story Title --}}
        <div class="card mb-4">
          <div class="card-header">
            <h4>Tiêu đề truyện</h4>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="title">Tên câu truyện:</label>
              <input type="text" class="form-control" name="title" value="{{ $story->title }}" required>
            </div>
          </div>
        </div>

        {{-- Chapters --}}
        @foreach($chapters as $chapter)
          <div class="card mb-4">
            <div class="card-body">
              <h4>Chương {{ $loop->iteration }}: {{ $chapter->heading }}</h4>

              <div class="form-group mb-3">
                <label for="heading">Tiêu đề chương:</label>
                <input type="text" class="form-control" name="headings[]" value="{{ $chapter->heading }}">
              </div>

              <div class="form-group mb-3">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" name="descriptions[]" rows="4">{{ $chapter->description }}</textarea>
              </div>

              <input type="hidden" name="chapter_ids[]" value="{{ $chapter->id }}">
            </div>
          </div>
        @endforeach

        {{-- Submit Button --}}
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Cập nhật thay đổi truyện </button>
        </div>
      </form>
    </div>
  </div>
@endsection
