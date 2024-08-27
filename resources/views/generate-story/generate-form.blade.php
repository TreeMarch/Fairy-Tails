<!-- generate-form.blade.php -->
@extends('layouts/contentNavbarLayout')

@section('title', ' Horizontal Layouts - Forms')

@section('content')
  <style>
    textarea {
      resize: none;
    }
  </style>
  <div class="row">
    <div class="col-xxl">
      <div class="card mb-6">
        <div class="card-body">
          <form method="post" action="{{ route('generate.story') }}">
            @csrf
            <div class="row gy-6">
              <!-- Title -->
              <div class="col-md @error('title-story') has-error @enderror">
                <h3>Tên truyện</h3>
                <div>
                  <textarea name="title-story" class="form-control" id="custom-background" rows="3" placeholder="ví dụ: Quang và bí ẩn dưới lớp băng..."></textarea>
                  @error('title-story')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <!-- description -->
              <div class="col-md @error('description') has-error @enderror">
                <h3>Mô tả</h3>
                <div>
                  <textarea name="description" class="form-control" id="custom-background" rows="3" placeholder="ví dụ: Quang và đồng đội là những người bạn trẻ có khao khát khám phá, cậu ấy cùng những người bạn đã phát hiện có bí ẩn gí đó dưới lớp băng ở bắc cực nên đã quyết định lên đường khám phá,..."></textarea>
                  @error('description')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row gy-6">
              <!--Lessons-->
              <div class="col-md">
                <div class="col">
                  <h3>Bài học</h3>
                  <div class="col-md row d-flex">
                    <div class="col-md">
                      <div class="form-check mt-3">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Lòng dũng cảm" id="brave" />
                        <label class="form-check-label" for="brave">
                          Lòng dũng cảm
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Tình bạn" id="friendship"  />
                        <label class="form-check-label" for="friendship">
                          Tình bạn
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Tình cảm gia đình" id="family-love"  />
                        <label class="form-check-label" for="family-love">
                          Tình cảm gia đình
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Tình yêu động vật" id="love-for-animals"  />
                        <label class="form-check-label" for="love-for-animals">
                          Tình yêu động vật
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Khiêm tốn" id="humble"  />
                        <label class="form-check-label" for="humble">
                          Khiêm tốn
                        </label>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-check mt-3">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Tham lam" id="greed" />
                        <label class="form-check-label" for="greed">
                          Tham lam
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Ích kỷ" id="selfish"  />
                        <label class="form-check-label" for="selfish">
                          Ích kỷ
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Ghen tỵ" id="envy"  />
                        <label class="form-check-label" for="envy">
                          Ghen tỵ
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Tức giận" id="angry"  />
                        <label class="form-check-label" for="angry">
                          Tức giận
                        </label>
                      </div>
                      <div class="form-check">
                        <input name="lessons[]" class="form-check-input" type="checkbox" value="Tham ăn" id="Voracious"  />
                        <label class="form-check-label" for="Voracious">
                          Tham ăn
                        </label>
                      </div>
                    </div>
                    <h6 class="mt-4"><i>Mô tả thêm về bài họ bạn muốn truyền tải</i></h6>
                    <div>
                      <textarea name="lessons-2" class="form-control" id="custom-background" rows="3" placeholder="ví dụ: Bài học truyền tải giá trị về tình cảm gia đình giữa gấu và thỏ..."></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!--Background-->
              <div class="col-md">
                <h3>Bối cảnh</h3>
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
                <div class="@error('background-2') has-error @enderror">
                  <textarea name="background-2" class="form-control" id="custom-background" rows="3" placeholder="ví dụ: trong một khu rừng huyền bí có một cái cây cổ thụ to lớn..."></textarea>
                  @error('background-2')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!--Character-->
            <div class="col-6">
              <div class="col-md mt-6">
                <h3>Nhân vật</h3>
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
                <div class="@error('character-2') has-error @enderror">
                  <textarea name="character-2" class="form-control" id="custom-character" rows="3" placeholder="Ví dụ: Trình và Trung là 2 người bạn rất thân thiết, họ làm gì cũng có nhau..."></textarea>
                  @error('character-2')
                  <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-6">
              <span class="tf-icons bx bx-send bx-18px me-2"></span>Tạo truyện
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
