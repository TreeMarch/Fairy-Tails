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
  <small class="text-light fw-medium">RECENT STORIES</small>
  <div class="card">
    <div class="card-header">
      <div style="display: flex;justify-content: space-between;padding-bottom: 20px;align-items: center">
        <h5>Stories</h5>
        <form action="" method="get">
          <div class="input-group input-group-sm " style="width: 150px">
            <input type="text" name="key" id="search" class="form-control pull-left"
                   placeholder="Search stories..." value="{{request()->input('key')}}">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-default">
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
            <th>Story ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Thumbnail</th>
            <th>Created At</th>
          </tr>
          </thead>
          <tbody class="table-border-bottom-0">
          @foreach ($stories as $story)
            <tr>
              <td>{{ $story->id }}</td>
              <td>{{ $story->story_id }}</td>
              <td style="white-space: normal;">{{ $story->title }}</td>
              <td style="white-space: normal;">{{ $story->content }}</td>
              <td>
                <img src="{{ $story->thumbnails_url }}" alt="Thumbnail" style="width: 100px; height: auto;">
              </td>
              <td>{{ $story->created_at }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
        <div style="display:flex;justify-content:space-between;align-items:center;padding-top: 20px">
          <div>
            Showing {{ $stories->firstItem() }} to {{ $stories->lastItem() }} of
            {{ $stories->total() }} entries
          </div>
          <div>
            {!!  $stories->links('vendor.pagination.paginate') !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
