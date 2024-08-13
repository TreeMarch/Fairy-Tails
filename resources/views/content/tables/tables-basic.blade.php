@extends('layouts/contentNavbarLayout')

@section('title', 'Table Users')

@section('content')
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <div class="card-header">
      <div style="display: flex;justify-content: space-between;padding-bottom: 20px;align-items: center">
        <h5>User</h5>
        <form action="" method="get">
          <div class="input-group input-group-sm " style="width: 150px">
            <input style="" type="text" name="key" id="search" class="form-control pull-left"
                   placeholder="...." value="{{request()->input('key')}}" >
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
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
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
                  <span style="color:#F44336" class="badge badge-danger">Banned</span>
                @elseif($user->status == 0)
                  <span  style="color:#424242" class="badge badge-secondary">Pending</span>
                @elseif($user->status == 1)
                  <span  style="color:#2CFA1F" class="badge badge-success">Active</span>
                @endif
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                          data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i
                        class="bx bx-edit-alt me-2"></i>
                      Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this user?')">
                        <i class="bx bx-trash me-2"></i> Delete
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
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of
            {{ $users->total() }} entries
          </div>
          <div>
            {!!  $users->links('vendor.pagination.paginate') !!}
          </div>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

@endsection


