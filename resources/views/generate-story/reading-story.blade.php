<link href="/resources/assets/css/reading.css" rel="stylesheet">
{{--  font merryweather--}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
@extends('layouts/commonMaster' )

@section('layoutContent')
  <!-- Content -->
  @yield('content')
  <div class="container-fluid background-book">
    <div class="container background-resize fix-width">
      <div class="container m-auto fix-width">
        <h1 style="color: #8D4852;" class="">{{ $story->title }}</h1>
        {{-- Chapters --}}
        @foreach($chapters as $index => $chapter)
          <div class="position-relative relative">
            <div class="frame-img"></div>
            <img class="img-absolute" src="{{$chapter->thumbnail_url}}" alt="">
          </div>
          <h3 class="" style="color: #8D4852;">{{ $chapter->heading }}</h3>
          <p style="color: #8D4852;">{{ $chapter->description }}</p>
        @endforeach
      </div>
    </div>
  </div>
  <!--/ Content -->

@endsection
