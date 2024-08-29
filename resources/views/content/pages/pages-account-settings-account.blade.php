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
          <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-sm bx-user me-1_5"></i> Tài khoản</a></li>
          <li class="nav-item"><a class="nav-link" href="/share-story"><i class="bx bx-sm bx-link-alt me-1_5"></i>Kết nối</a></li>
        </ul>
      </div>
      <div class="card mb-6">
        <!-- Account -->
        <div class="card-body">
          <form id="formAccountSettings" method="POST" action="{{ route('user.updateAvatar', $user->id) }}">
            @csrf
            <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
              <img src="{{ $user->url_avatar ?? asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
              <div class="button-wrapper">
                <button id="upload_widget" type="button" class="btn btn-primary me-3 mb-4">
                  <span class="d-none d-sm-block">Tải ảnh mới</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                </button>

                <!-- Nút Save -->
                <button id="save_avatar" type="submit" class="btn btn-success me-3 mb-4">
                  <span class="d-none d-sm-block">Lưu</span>
                  <i class="bx bx-save d-block d-sm-none"></i>
                </button>

                <input type="hidden" id="url_avatar" name="url_avatar" value="{{ $user->url_avatar }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
              </div>
            </div>

            <div class="card-body pt-4">
              <div class="card-header">
                <h5>Chi tiết người dùng</h5>
                <hr>
              </div>
              <div class="card-body">
                <h4 class="card-text"><strong>Tên riêng:</strong> {{ $user->first_name }}</h4>
                <h4 class="card-text"><strong>Tên họ:</strong> {{ $user->last_name }}</h4>
                <h4 class="card-text"><strong>Email:</strong> {{ $user->email }}</h4>
                <h4 class="card-text"><strong>Sở thích:</strong> {{ $user->favourite }}</h4>
                <h4 class="card-text"><strong>Số điện thoại:</strong> {{ $user->phone_number }}</h4>
                <h4 class="card-text"><strong>Trạng thái:</strong>
                  @if($user->status == -1 )
                    <span style="color:#F44336" class="badge badge-danger">Đã chặn</span>
                  @elseif($user->status == 0)
                    <span style="color:#424242" class="badge badge-secondary">Cảnh báo</span>
                  @elseif($user->status == 1)
                    <span style="color:#2CFA1F" class="badge badge-success">Hoạt động</span>
                  @endif
                </h4>
              </div>
              <div class="mt-6">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                <a href="{{ route('tables.basic')}}" class="btn btn-outline-secondary">Huỷ bỏ</a>
              </div>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
      <div class="card">
        <h5 class="card-header">Xoá tài khoản</h5>
        <div class="card-body">
          <div class="mb-6 col-12 mb-0">
            <div class="alert alert-warning">
              <h5 class="alert-heading mb-1">Bạn có chắc chắn xoá tài khoản này?</h5>
              <p class="mb-0">Một khi đã xoá, sẽ không thể phục hồi, xin hãy cân nhắc kỹ.</p>
            </div>
          </div>
          <form id="formAccountDeactivation" onsubmit="return false">
            <div class="form-check my-8 ms-2">
              <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
              <label class="form-check-label" for="accountActivation">Tôi xác nhận việc hủy kích hoạt tài khoản của tôi</label>
            </div>
            <button type="submit" class="btn btn-danger deactivate-account" disabled>Hủy kích hoạt tài khoản</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Cloudinary Upload Widget Script -->
  <script src="https://upload-widget.cloudinary.com/global/all.js" type="text/javascript"></script>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
      var myWidget = cloudinary.createUploadWidget({
          cloudName: 'dgv1uwtra',
          uploadPreset: 'my_preset'},
        (error, result) => {
          if (!error && result && result.event === "success") {
            const imageUrl = result.info.secure_url;
            document.getElementById("url_avatar").value = imageUrl;
            document.getElementById("uploadedAvatar").src = imageUrl;
            alert('Upload successful!');
          }
        });

      document.getElementById("upload_widget").addEventListener("click", function(){
        myWidget.open();
      }, false);
    });
  </script>
@endsection
