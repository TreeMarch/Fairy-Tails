{{--@php--}}
{{--  $all_summarizes = session('all_summarizes');--}}
{{--@endphp--}}
@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')

  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-body">
          <div class="d-flex row">
            @foreach($summarizes as $index => $chapter)
              <form method="post" action="/generate-story-detail" class="d-flex row">
                @csrf <!-- {{ csrf_field() }} -->
                <div class="col-md-6 col-lg-4">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
                    <div class="card-body">
                      <h5 class="card-title">{{$chapter->title}}</h5>
                      <input type="hidden" name="summarize_title" value="{{$chapter->title}}">
                      <p class="card-text">
                        {{$chapter->description}}
                      </p>
                      <input type="submit" class="btn btn-outline-primary" value="Choice this story"/>
                      <input type="hidden" name="summarize_description" value="{{$chapter->description}}">
                    </div>
                  </div>
                </div>
              </form>
            @endforeach
          </div>
          <div class="d-flex w-100 justify-content-center mt-6">
            <button type="button" class="btn btn-primary m-2">
              <span class="tf-icons bx bx-book bx-18px me-2"></span>Back to Generate
            </button>
            <button type="button" class="btn btn-primary m-2">
              <span class="tf-icons bx bx-reset bx-18px me-2"></span>Reset
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>

</script>

