@extends('layouts/contentNavbarLayout')

@section('title', 'Trang Chủ')

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
  <style>
    h3{
      font-size: 1.75rem!important;
      font-weight: 700!important;
    }
    p{
      font-size: 16px!important ;
      padding: 0!important;
      margin-bottom: 8px;
    }
    .btn{
      font-size: 12px!important;
    }
  </style>
  <small class="text-light fw-medium">RECENT STORIES</small>
  <div class="row mb-12">
    @foreach($stories as $story)
      <form action="/reading-story-detail/{{$story->story_id}}" method="get" class="col-lg-6 col-md-12 mb-6">
        <div class="card">
          <div class="d-flex">
            <div>
              <img class="card-img card-img-left h-100 w-100 object-fit-cover" src="{{$story->thumbnails_url}}" alt="Card image">
            </div>
            <div>
              <div class="card-body">
                <h3 class="card-title mt-4 mb-4">{{ Str::limit($story->title, 12, '...') }}</h3>
                <p class="card-text">
                  {{ Str::limit($story->content, 120, '...') }}
                </p>
                <p class="card-text"><small class="text-muted">{{$story->created_at}}</small></p>
               <div class="d-flex g-2 justify-content-start row">
                 <button type="submit" class="btn btn-primary me-4 col-lg col-md col-sm">Đọc truyện</button>
                 <a href="/generate-story-detail/{{$story->story_id}}/edit" class="btn btn-primary col-lg col-md col-sm">Chỉnh sửa</a>
               </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    @endforeach
  </div>
@endsection
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Lấy tất cả các form trên trang
    const forms = document.querySelectorAll('form');

    // Gán sự kiện submit cho từng form
    forms.forEach(function(form) {
      form.addEventListener('submit', function () {
        const loading = document.getElementById('loading');
        if (loading) {
          loading.style.display = 'block';
        }
      });
    });
  });
</script>
