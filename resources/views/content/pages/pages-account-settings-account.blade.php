@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
  @vite(['resources/assets/js/pages-account-settings-account.js'])
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="nav-align-top">
        <ul class="nav nav-pills flex-column flex-md-row mb-6">
          <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-sm bx-user me-1_5"></i> Account</a></li>
          <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class="bx bx-sm bx-link-alt me-1_5"></i> Connections</a></li>
        </ul>
      </div>
      <div class="card mb-6">
        <!-- Account -->
        <div class="card-body">
          <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
            <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
            <div class="button-wrapper">
              <label for="upload" class="btn btn-primary me-3 mb-4" tabindex="0">
                <span class="d-none d-sm-block">Upload new photo</span>
                <i class="bx bx-upload d-block d-sm-none"></i>
                <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
              </label>
              <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
            </div>
          </div>
        </div>
        <div class="card-body pt-4">
          <form id="formAccountSettings" method="POST" action="{{ route('users.detail', $user->id) }}">
            @csrf
              <div class="card-header">
                <h5>Detail</h5>
                <hr>
              </div>
              <div class="card-body">
              <p><strong>First Name:</strong> {{ $user->first_name }}</p>
              <p><strong>Last Name:</strong> {{ $user->last_name }}</p>
              <p><strong>Email:</strong> {{ $user->email }}</p>
              <p><strong>Favourite:</strong> {{ $user->favourite }}</p>
              <p><strong>Phone:</strong> {{ $user->phone_number }}</p>
              <p><strong>Status:</strong>
                @if($user->status == -1 )
                  <span style="color:#F44336" class="badge badge-danger">Banned</span>
                @elseif($user->status == 0)
                  <span  style="color:#424242" class="badge badge-secondary">Pending</span>
                @elseif($user->status == 1)
                  <span  style="color:#2CFA1F" class="badge badge-success">Active</span>
                @endif
              </p>
              </div>
            <div class="mt-6">
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
              <a href="{{ route('tables.basic')}}" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      <div class="card">
        <h5 class="card-header">Delete Account</h5>
        <div class="card-body">
          <div class="mb-6 col-12 mb-0">
            <div class="alert alert-warning">
              <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
              <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
            </div>
          </div>
          <form id="formAccountDeactivation" onsubmit="return false">
            <div class="form-check my-8 ms-2">
              <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
              <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
            </div>
            <button type="submit" class="btn btn-danger deactivate-account" disabled>Deactivate Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
