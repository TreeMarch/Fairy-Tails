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

            <!--Lessons-->
            <div class="row gy-6 mt-6">
              <div class="col">
                <h3>Lessons</h3>
                <div class="col-md row d-flex">
                  <div class="col-md">
                    <div class="form-check mt-3">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Lòng dũng cảm" id="brave" />
                      <label class="form-check-label" for="brave">
                        Lòng dũng cảm
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Tình bạn" id="friendship"  />
                      <label class="form-check-label" for="friendship">
                        Tình bạn
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Tình cảm gia đình" id="family-love"  />
                      <label class="form-check-label" for="family-love">
                        Tình cảm gia đình
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Tình yêu động vật" id="love-for-animals"  />
                      <label class="form-check-label" for="love-for-animals">
                        Tình yêu động vật
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Khiêm tốn" id="humble"  />
                      <label class="form-check-label" for="humble">
                        Khiêm tốn
                      </label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-check mt-3">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Tham lam" id="greed" />
                      <label class="form-check-label" for="greed">
                        Tham lam
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Ích kỷ" id="selfish"  />
                      <label class="form-check-label" for="selfish">
                        Ích kỷ
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Ghen tỵ" id="envy"  />
                      <label class="form-check-label" for="envy">
                        Ghen tỵ
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Tức giận" id="angry"  />
                      <label class="form-check-label" for="angry">
                        Tức giận
                      </label>
                    </div>
                    <div class="form-check">
                      <input name="lesson" class="form-check-input" type="checkbox" value="Tham ăn" id="Voracious"  />
                      <label class="form-check-label" for="Voracious">
                        Tham ăn
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row gy-6 mt-6">
              <!--Age range-->
              <div class="col-md">
                <h3>Độ tuổi</h3>
                <div class="form-check mt-3">
                  <input name="age-range" class="form-check-input" type="radio" value="3 đến 6 tuổi" id="baby" />
                  <label class="form-check-label" for="baby">
                    3 - 6 tuổi
                  </label>
                </div>
                <div class="form-check">
                  <input name="age-range" class="form-check-input" type="radio" value="6 đến 9 tuổi" id="kids"  />
                  <label class="form-check-label" for="kids">
                    6 - 9 tuổi
                  </label>
                </div>
                <div class="form-check">
                  <input name="age-range" class="form-check-input" type="radio" value="9 đến 11 tuổi" id="children"  />
                  <label class="form-check-label" for="children">
                    9 - 11 tuổi
                  </label>
                </div>
              </div>
              <!--Size type-->
              <div class="col-md">
                <h3>Độ dài câu chuyện</h3>
                <div class="form-check mt-3">
                  <input name="size-type" class="form-check-input" type="radio" value="từ 300 đến 600 từ ngữ" id="short" />
                  <label class="form-check-label" for="short">
                    Ngắn (300 - 600 từ)
                  </label>
                </div>
                <div class="form-check mt-3">
                  <input name="size-type" class="form-check-input" type="radio" value="từ 600 đến 900 từ ngữ" id="medium" />
                  <label class="form-check-label" for="medium">
                    Vừa (600 - 900 từ)
                  </label>
                </div>
                <div class="form-check mt-3">
                  <input name="size-type" class="form-check-input" type="radio" value="hơn 1000 từ ngữ" id="large" />
                  <label class="form-check-label" for="large">
                    Dài (1000+ từ ngữ)
                  </label>
                </div>
              </div>
            </div>
            <!--chapter-->
            <div class="col-md mt-6">
              <h3>Số lượng chương truyện</h3>
              <div class="form-check mt-3">
                <input name="chapter" class="form-check-input" type="radio" value="từ 5 - 10 chương truyện" id="short-chapter" />
                <label class="form-check-label" for="short-chapter">
                  Từ 5 - 10 chương truyện
                </label>
              </div>
              <div class="form-check mt-3">
                <input name="chapter" class="form-check-input" type="radio" value="từ 10 - 15 chương truyện" id="medium-chapter" />
                <label class="form-check-label" for="medium-chapter">
                  Từ 10 - 15 chương truyện
                </label>
              </div>
              <div class="chapter">
                <input name="chapter" class="form-check-input" type="radio" value="từ 15 - 20 chương truyện" id="large-chapter" />
                <label class="form-check-label" for="large-chapter">
                  Từ 15 - 20 chương truyện
                </label>
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
{{--  <button type="button" onclick="getDataPrompt()">button</button>--}}


  <div id="selected"></div>
@endsection

<script>
  function getDataPrompt(){
    // background
    const backgroundSelected = document.querySelector('input[name="background"]:checked').value;
    const customBackground = document.querySelector('textarea[name="background"]').value;

    //character
    const characterSelected = document.querySelector('input[name="character"]:checked').value;
    const customCharacter = document.querySelector('textarea[name="character"]').value;

    // lessons
    const lessonSelected=[];
    const lesson = document.querySelectorAll('input[name="lesson"]:checked');
    lesson.forEach((checkbox)=> {
      lessonSelected.push(checkbox.value);
    })

    //Age range
    const ageRange = document.querySelector('input[name="age-range"]:checked').value;

    //size type
    const sizeType = document.querySelector('input[name="size-type"]:checked').value;

    //chapter number
    const chapter = document.querySelector('input[name="chapter"]:checked').value;

    // window.alert(backgroundSelected + customBackground + characterSelected + lessonSelected + ageRange + sizeType +  chapter);

    var message_summarize = "hãy viết cho tôi 3 câu truyện tóm tắt ," +
      "có bối cảnh là" + backgroundSelected + customBackground +
      ",có nhân vật là" + characterSelected +
      "có bài học là:" + lessonSelected.join(",") +
      " có độ tuổi là:" + ageRange +
      "có độ dài là:" + sizeType +
      "có số lượng chapter là: " + chapter +
      "Trả về định dạng json, có các trường thông tin như sau:\n" +
  "- \"Title\" chứa thông tin tên câu truyện.\n" +
  "- \"Description\" mô tả gắn gọn câu chuyện.\n" +
  "- \"img_url\" chứa link ảnh thumbanails của truyện.";

    document.getElementById('messageInput').value = message_summarize

    console.log(document.getElementById('messageInput').value = message_summarize)
  }
</script>
