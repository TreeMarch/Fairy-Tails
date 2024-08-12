@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-body">
          <form>
            <img src="{{asset('assets/img/elements/13.jpg')}}" alt="">

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
