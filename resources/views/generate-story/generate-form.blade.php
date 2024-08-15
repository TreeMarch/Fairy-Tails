@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-body">
          <form method="post" action="/story-management/generate-story">
            @csrf <!-- {{ csrf_field() }} -->
            <div class="row gy-6">
              <!--Background-->
              <div class="col-md">
                <h3>Title</h3>
                <input type="text" class="form-control mt-5 mb-4" id="defaultFormControlInput" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
              </div>
            </div>
            <div class="row gy-6">
              <!--Background-->
              <div class="col-md">
                <h3>Background</h3>
                <div class="col-md row d-flex">
                  <div class="col-md">
                    <div class="form-check mt-3">
                      <input name="background" class="form-check-input" type="radio" value="Vùng quê" id="defaultCheck1"/>
                      <label class="form-check-label" for="defaultCheck1">
                        Vùng quê
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="background" class="form-check-input" type="radio" value="Thành phố" id="defaultCheck2"/>
                      <label class="form-check-label" for="defaultCheck2">
                        Thành phố
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="background" class="form-check-input" type="radio" value="Cung điện" id="defaultCheck3"/>
                      <label class="form-check-label" for="defaultCheck3">
                        Cung điện
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="background" class="form-check-input" type="radio" value="Trong một nhóm nhỏ" id="defaultCheck4"/>
                      <label class="form-check-label" for="defaultCheck4">
                        Trong một nhóm nhỏ
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="background" class="form-check-input" type="radio" value="Trong một tập thể lớn" id="defaultCheck5"/>
                      <label class="form-check-label" for="defaultCheck5">
                        Trong một tập thể lớn
                      </label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-check mt-3">
                      <input name="background" class="form-check-input" type="radio" value="Trong khu rừng" id="defaultCheck6"/>
                      <label class="form-check-label" for="defaultCheck6">
                        Trong khu rừng
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="background" class="form-check-input" type="radio" value="Dưới lòng biển" id="defaultCheck7"/>
                      <label class="form-check-label" for="defaultCheck7">
                        Dưới lòng biển
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="background" class="form-check-input" type="radio" value="Nông trại" id="defaultCheck8"/>
                      <label class="form-check-label" for="defaultCheck8">
                        Nông trại
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="background" class="form-check-input" type="radio" value="Vùng đất bí ẩn" id="defaultCheck9"/>
                      <label class="form-check-label" for="defaultCheck9">
                        Vùng đất bí ẩn
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="background" class="form-check-input" type="radio" value="Tại một khu chợ" id="defaultCheck10"/>
                      <label class="form-check-label" for="defaultCheck10">
                        Tại một khu chợ
                      </label>
                    </div>
                  </div>
                </div>
                <h6 class="mt-4"><i>Mô tả thêm về bối cảnh câu chuyện của bạn</i></h6>
                <div>
                  <textarea name="background" class="form-control" id="custom-background" rows="3" placeholder="ví dụ: trong một khu rừng huyền bí có một cái cây cổ thụ to lớn..."></textarea>
                </div>
              </div>
            </div>
            <!--Character-->
            <div class="col-md mt-6">
              <h3>Character</h3>
              <div class="col-md row d-flex">
                <div class="col-md">
                  <div class="form-check mt-3">
                    <input name="character" class="form-check-input" type="radio" value="Chó và mèo" id="defaultRadio1" />
                    <label class="form-check-label" for="defaultRadio1">
                      Chó và Mèo
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="character" class="form-check-input" type="radio" value="Rùa và Thỏ" id="defaultRadio2"  />
                    <label class="form-check-label" for="defaultRadio2">
                      Rùa và Thỏ
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="character" class="form-check-input" type="radio" value="Con người và động vật" id="defaultRadio3"  />
                    <label class="form-check-label" for="defaultRadio3">
                      Con người và động vật
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="character" class="form-check-input" type="radio" value="Giữa 2 người bạn thân" id="defaultRadio4" />
                    <label class="form-check-label" for="defaultRadio4">
                      Giữa 2 người bạn thân
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="character" class="form-check-input" type="radio" value="Công chúa và hoàng tử" id="defaultRadio5" />
                    <label class="form-check-label" for="defaultRadio5">
                      Công chúa và hoàng tử
                    </label>
                  </div>
                </div>

                <div class="col-md">
                  <div class="form-check mt-3">
                    <input name="character" class="form-check-input" type="radio" value="Người hùng và quái vật" id="defaultRadio6" />
                    <label class="form-check-label" for="defaultRadio6">
                      Người hùng và quái vật
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="character" class="form-check-input" type="radio" value="Phù thủy ác độc và nạn nhân" id="defaultRadio7"  />
                    <label class="form-check-label" for="defaultRadio7">
                      Phù thủy ác độc và nạn nhân
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="character" class="form-check-input" type="radio" value="Chó sói và cừu non" id="defaultRadio8"  />
                    <label class="form-check-label" for="defaultRadio8">
                      Chó sói và cừu non
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="character" class="form-check-input" type="radio" value="Ông lão và bà lão" id="defaultRadio9" />
                    <label class="form-check-label" for="defaultRadio9">
                      Ông lão và bà lão
                    </label>
                  </div>
                  <div class="form-check">
                    <input name="character" class="form-check-input" type="radio" value="Bà tiên và cô bé nghèo khổ" id="defaultRadio10" />
                    <label class="form-check-label" for="defaultRadio10">
                      Bà tiên và cô bé nghèo khổ
                    </label>
                  </div>
                </div>
              </div>
              <h6 class="mt-4"><i>Tự sáng tạo nhân vật của bạn </i></h6>
              <div>
                <textarea name="character" class="form-control" id="custom-character" rows="3" placeholder="Enter your character you want..."></textarea>
              </div>
            </div>


            <button onclick="getDataPrompt()" type="submit" class="btn btn-primary">
              <span class="tf-icons bx bx-send bx-18px me-2"></span>Primary
            </button>
            <input type="hidden" name="message" id="messageInput" value="">

          </form>
        </div>
      </div>
    </div>
  </div>

  <button type="button" onclick="getDataPrompt()">button</button>
{{--  <button type="button" onclick="getDataPrompt()">button</button>--}}
  <div id="selected"></div>



@endsection
{{--<script src="{{asset("resources/js/app.js")}}"></script>--}}
<script>

</script>
