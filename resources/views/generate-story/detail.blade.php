@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
  <!-- Basic Layout & Basic with Icons -->
  <h5>Detail Story</h5>
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-body">
          <div class="accordion mt-4" id="accordionExample">
{{--            // active--}}
            @foreach($chapters as $chapter)
              <div class="card accordion-item">
                <form action="/story/save-page">
                  <input type="hidden" name="page" value="1">
                  <input type="hidden" name="story_id" value="1">
                  <h2 class="accordion-header" id="headingOne">
                    <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                      Trang 1
                    </button>
                  </h2>

                  <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                  <textarea name="page1_content" class="form-control mb-2" rows="7">
                      {{$chapter['Content']}}
                    </textarea>
                      <img src="https://th.bing.com/th/id/R.df15156a7cf3d61b0e42f15d314b9dd4?rik=M14bF7eJmAtirw&pid=ImgRaw&r=0" alt="" class="img-fluid"/>
                      <input type="hidden" name="page1_image" value="https://th.bing.com/th/id/R.df15156a7cf3d61b0e42f15d314b9dd4?rik=M14bF7eJmAtirw&pid=ImgRaw&r=0">
                    </div>
                    <button class="btn btn-primary m-2">Save</button>
                  </div>
                </form>

              </div>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>



@endsection
<script>

</script>
