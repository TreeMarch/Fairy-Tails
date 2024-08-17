<!-- generate-form.blade.php -->
@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-body">
          <form method="post" action="{{ route('generate.story') }}">
            @csrf
            <div class="row gy-6">
              <!-- Title -->
              <div class="col-md">
                <h3>Title</h3>
                <input name="title" type="text" class="form-control mt-5 mb-4" id="title" placeholder="Title" aria-describedby="defaultFormControlHelp">
              </div>

              <!-- Description -->
              <div class="col-md">
                <h3>Description</h3>
                <input name="description" type="text" class="form-control mt-5 mb-4" id="description" placeholder="Description" aria-describedby="defaultFormControlHelp">
              </div>

              <!-- Thumbnail -->
              <div class="col-md">
                <h3>Thumbnail</h3>
                <input name="thumbnail" type="text" class="form-control mt-5 mb-4" id="thumbnail" placeholder="Thumbnail" aria-describedby="defaultFormControlHelp">
              </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">
              <span class="tf-icons bx bx-send bx-18px me-2"></span>Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
