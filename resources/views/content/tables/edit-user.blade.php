@extends('layouts/contentNavbarLayout')

@section('title', 'Horizontal Layouts - Forms')

@section('content')
  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Basic Layout</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-company">UserName</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-company" name="user_name" value="{{ $user->user_name }}" placeholder="johndoe123" />
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-company">Password</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-company" name="user_password" value="{{ $user->user_password}}" placeholder="password" />
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-name">First Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-name" name="first_name" value="{{ $user->first_name }}" placeholder="John" />
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Last Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-name" name="last_name" value="{{ $user->last_name }}" placeholder="Doe" />
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" id="basic-default-email" class="form-control" name="email" value="{{ $user->email }}" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
                  <span class="input-group-text" id="basic-default-email2">@gmail.com</span>
                </div>
                <div class="form-text"> You can use letters, numbers & periods </div>
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-company">Favourite</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-company" name="favourite" value="{{ $user->favourite }}" placeholder="cat, dog, etc..." />
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-birthday">Birthday</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="basic-default-birthday" name="birth" value="{{ $user->birth }}" />
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
              <div class="col-sm-10">
                <input type="text" id="basic-default-phone" class="form-control phone-mask" name="phone_number" value="{{ $user->phone_number }}" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
