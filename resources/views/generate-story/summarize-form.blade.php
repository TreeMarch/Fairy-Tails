@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-body">
          <form method="post" action="/tables/add-user" class="d-flex row">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="col-md-6 col-lg-4">
              <div class="card h-100">
                <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-outline-primary">Choice this story</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-outline-primary">Choice this story</a>
                </div>
                <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card h-100">
                <img class="card-img-top" src="{{asset('assets/img/elements/2.jpg')}}" alt="Card image cap" />
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-outline-primary">Choice this story</a>
                </div>
              </div>
            </div>
          </form>

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
