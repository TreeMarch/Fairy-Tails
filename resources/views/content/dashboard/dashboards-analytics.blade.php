@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
@vite('resources/assets/vendor/libs/apex-charts/apex-charts.scss')
@endsection

@section('vendor-script')
@vite('resources/assets/vendor/libs/apex-charts/apexcharts.js')
@endsection

@section('page-script')
@vite('resources/assets/js/dashboards-analytics.js')
@endsection

@section('content')

  <div class="col-md">
    <small class="text-light fw-medium">STORIES</small>
    <div class="accordion mt-4" id="accordionExample">
      <div class="card accordion-item active">
        <h2 class="accordion-header" id="headingOne">
          <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
            Accordion Item 1
          </button>
        </h2>

        <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample" style="">
          <div class="accordion-body">
            Lemon drops chocolate cake gummies carrot cake chupa chups muffin topping. Sesame snaps icing marzipan gummi
            bears macaroon dragée danish caramels powder. Bear claw dragée pastry topping soufflé. Wafer gummi bears
            marshmallow pastry pie.
          </div>
        </div>
      </div>
      <div class="card accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
            Accordion Item 2
          </button>
        </h2>
        <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Dessert ice cream donut oat cake jelly-o pie sugar plum cheesecake. Bear claw dragée oat cake dragée ice
            cream halvah tootsie roll. Danish cake oat cake pie macaroon tart donut gummies. Jelly beans candy canes
            carrot cake. Fruitcake chocolate chupa chups.
          </div>
        </div>
      </div>
      <div class="card accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
            Accordion Item 3
          </button>
        </h2>
        <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Oat cake toffee chocolate bar jujubes. Marshmallow brownie lemon drops cheesecake. Bonbon gingerbread
            marshmallow sweet jelly beans muffin. Sweet roll bear claw candy canes oat cake dragée caramels. Ice cream
            wafer danish cookie caramels muffin.
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

{{--@section('content')--}}
{{--  <!-- Basic Bootstrap Table -->--}}
{{--  <div class="card">--}}
{{--    <div class="card-header">--}}
{{--      <div style="display: flex;justify-content: space-between;padding-bottom: 20px;align-items: center">--}}
{{--        <h5>Table User</h5>--}}
{{--        <form action="" method="get">--}}
{{--          <div class="input-group input-group-sm " style="width: 150px">--}}
{{--            <input style="" type="text" name="key" id="search" class="form-control pull-left"--}}
{{--                   placeholder="...." value="{{request()->input('key')}}" >--}}
{{--            <span  class="input-group-btn">--}}
{{--                <button style="" type="submit" name="search" id="search-btn" class="btn btn-default">--}}
{{--                  <i class="fa fa-search"></i>--}}
{{--                </button>--}}
{{--              </span>--}}
{{--          </div>--}}
{{--        </form>--}}
{{--      </div>--}}
{{--      <div class="table-responsive text-nowrap">--}}
{{--        <table class="table">--}}
{{--          <thead>--}}
{{--          <tr>--}}
{{--            <th>Project</th>--}}
{{--            <th>Client</th>--}}
{{--            <th>Users</th>--}}
{{--            <th>Status</th>--}}
{{--            <th>Actions</th>--}}
{{--          </tr>--}}
{{--          </thead>--}}
{{--          <tbody class="table-border-bottom-0">--}}
{{--          @foreach ( $users as $user)--}}
{{--            <tr>--}}
{{--              <td>{{ $user->user_name }}</td>--}}
{{--              <td>{{ $user->phone_number }}</td>--}}
{{--              <td>{{ $user->email }}</td>--}}
{{--              <td>{{ $user->status }}</td>--}}
{{--              <td>--}}
{{--                <div class="dropdown">--}}
{{--                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"--}}
{{--                          data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                  <div class="dropdown-menu">--}}
{{--                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i--}}
{{--                        class="bx bx-edit-alt me-2"></i>--}}
{{--                      Edit</a>--}}
{{--                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">--}}
{{--                      @csrf--}}
{{--                      @method('DELETE')--}}
{{--                      <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this user?')">--}}
{{--                        <i class="bx bx-trash me-2"></i> Delete--}}
{{--                      </button>--}}
{{--                    </form>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </td>--}}
{{--            </tr>--}}
{{--          @endforeach--}}
{{--          </tbody>--}}
{{--        </table>--}}
{{--        <div style="display:flex;justify-content:space-between;align-items:center">--}}
{{--          <div>--}}
{{--            {!!  $users->links('vendor.pagination.paginate') !!}--}}
{{--          </div>--}}
{{--          <div>--}}
{{--            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of--}}
{{--            {{ $users->total() }} entries--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <!--/ Basic Bootstrap Table -->--}}

{{--@endsection--}}
