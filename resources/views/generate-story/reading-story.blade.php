<link href="/resources/assets/css/reading.css" rel="stylesheet">
@extends('layouts/commonMaster' )

@section('layoutContent')
  <!-- Content -->
  @yield('content')
  <div class="container-fluid background-book">
    <div class="container background-resize">
      <div class="container m-auto ">
        <h1 style="color: #8D4852;">{{ $story->title }}</h1>
        {{-- Chapters --}}
        @foreach($chapters as $index => $chapter)
          <div class="position-relative relative">
            <div class="frame-img"></div>
            <img class="img-absolute" src="{{$chapter->thumbnail_url}}" alt="">
          </div>
          <h3 style="color: #8D4852;">{{ $chapter->heading }}</h3>
          <p style="color: #8D4852;">{{ $chapter->description }}</p>
        @endforeach
      </div>
    </div>
  </div>
  <!--/ Content -->

@endsection
