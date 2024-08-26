@extends('layouts/contentNavbarLayout')

@section('title', 'Horizontal Layouts - Forms')

@section('content')
  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Chỉnh sửa người dùng</h5>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row mb-6 @error('user_name') has-error @enderror">
              <label class="col-sm-2 col-form-label" for="basic-default-company">UserName</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-company" name="user_name" value="{{ $user->user_name }}" placeholder="Quang123" />
                @error('user_name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row mb-6 @error('user_password') has-error @enderror">
              <label class="col-sm-2 col-form-label" for="basic-default-company">Mật khẩu</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-company" name="user_password" value="{{ $user->user_password}}" placeholder="Quang123@..." />
                @error('user_password')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row mb-6 @error('first_name') has-error @enderror">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Tên riêng</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-name" name="first_name" value="{{ $user->first_name }}" placeholder="Quang" />
                @error('first_name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row mb-6 @error('last_name') has-error @enderror">
              <label class="col-sm-2 col-form-label" for="basic-default-name">Tên họ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-name" name="last_name" value="{{ $user->last_name }}" placeholder="Nguyen Minh"/>
                @error('last_name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row mb-6 @error('email') has-error @enderror">
              <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
              <div class="col-sm-10">
                <div class="input-group input-group-merge">
                  <input type="text" id="basic-default-email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Quang123@gmail.com" aria-label="john.doe" aria-describedby="basic-default-email2" />
                </div>
                @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-sm-2 col-form-label" for="basic-default-company">Sở thích</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="basic-default-company" name="favourite" value="{{ $user->favourite }}" placeholder="chó,mèo,...."  />
              </div>
            </div>

            <div class="row mb-6 @error('birth') has-error @enderror">
              <label class="col-sm-2 col-form-label" for="basic-default-birthday">Ngày sinh</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="basic-default-birthday" name="birth" value="{{ $user->birth }}" />
                @error('birth')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row mb-6 @error('phone_number') has-error @enderror">
              <label class="col-sm-2 col-form-label" for="basic-default-phone">Số điện thoại</label>
              <div class="col-sm-10">
                <input type="text" id="basic-default-phone" class="form-control phone-mask" name="phone_number" value="{{ $user->phone_number }}" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-default-phone" />
                @error('phone_number')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
