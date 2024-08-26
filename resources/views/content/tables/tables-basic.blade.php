@extends('layouts/contentNavbarLayout')

@section('title', 'Table Users')

@section('content')
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <div class="card-header">
      <div style="display: flex;justify-content: space-between;padding-bottom: 20px;align-items: center">
        <h5>Toàn bộ người dùng</h5>
        <form action="" method="get">
          <div class="input-group input-group-sm " style="width: 150px">
            <input style="" type="text" name="key" id="search" class="form-control pull-right"
                   placeholder="Tìm kiếm" value="{{request()->input('key')}}" >
            <span  class="input-group-btn">
                <button style="" type="submit" name="search" id="search-btn" class="btn btn-default">
                  <i class="fa fa-search"></i>
                </button>
              </span>
          </div>
        </form>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
          <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Trạng thái</th>
            <th>Tuỳ chỉnh</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach ( $users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td><a href="{{ route('users.detail', $user->id) }}">{{ $user->user_name }}</a></td>
              <td>{{ $user->last_name }}</td>
              <td>{{ $user->phone_number }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @if($user->status == -1 )
                  <span  class="badge bg-label-danger me-1">Đã chặn</span>
                @elseif($user->status == 0)
                  <span  class="badge bg-label-warning me-1">Cảnh báo</span>
                @elseif($user->status == 1)
                  <span  class="badge bg-label-success me-1">Hoạt động</span>
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                          data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i
                        class="bx bx-edit-alt me-2"></i>
                      Chỉnh sửa</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="dropdown-item" onclick="return confirm('Bạn có chắc muốn xoá người dùng này ?')">
                        <i class="bx bx-trash me-2"></i> Xoá
                      </button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div style="display:flex;justify-content:space-between;align-items:center;padding-top: 20px" >
          <div>
            Hiển thị {{ $users->firstItem() }} đến {{ $users->lastItem() }} của
            {{ $users->total() }} người dùng
          </div>
          <div>
            {!!  $users->links('vendor.pagination.paginate') !!}
          </div>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

@endsection


