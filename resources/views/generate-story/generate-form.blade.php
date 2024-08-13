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
                <div class="form-check mt-3">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
                  <label class="form-check-label" for="defaultCheck1">
                    Countryside
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2"  />
                  <label class="form-check-label" for="defaultCheck2">
                    City
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"  />
                  <label class="form-check-label" for="defaultCheck3">
                    Royal palace
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck4"  />
                  <label class="form-check-label" for="defaultCheck4">
                    In a small group
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck5"  />
                  <label class="form-check-label" for="defaultCheck5">
                    In a large group
                  </label>
                </div>
                <div>
                  <textarea class="form-control" id="custom-background" rows="3" placeholder="Enter your background you want..."></textarea>
                </div>
              </div>

              <!--Character-->
              <div class="col-md">
                <h3>Character</h3>
                <div class="form-check mt-3">
                  <input name="character" class="form-check-input" type="radio" value="Dog and Cat" id="defaultRadio1" />
                  <label class="form-check-label" for="defaultRadio1">
                    Dog and Cat
                  </label>
                </div>
                <div class="form-check">
                  <input name="character" class="form-check-input" type="radio" value="Turtle and Rabbit" id="defaultRadio2"  />
                  <label class="form-check-label" for="defaultRadio2">
                    Turtle and Rabbit
                  </label>
                </div>
                <div class="form-check">
                  <input name="character" class="form-check-input" type="radio" value="Human and animals" id="defaultRadio3"  />
                  <label class="form-check-label" for="defaultRadio3">
                    Human and animals
                  </label>
                </div>
                <div class="form-check">
                  <input name="character" class="form-check-input" type="radio" value="Between two best friend" id="defaultRadio4" />
                  <label class="form-check-label" for="defaultRadio4">
                    Between two best friend
                  </label>
                </div>
                <div class="form-check">
                  <input name="character" class="form-check-input" type="radio" value="Kitty cat and your friends" id="defaultRadio5" />
                  <label class="form-check-label" for="defaultRadio5">
                    Kitty cat and your friends
                  </label>
                </div>
                <div>
                  <textarea name="character" class="form-control" id="custom-character" rows="3" placeholder="Enter your character you want..."></textarea>
                </div>
              </div>
            </div>

            <div class="row gy-6 mt-6">
              <!--Lessons-->
              <div class="col">
                <h3>Lessons</h3>
                <div class="col-md row d-flex">
                  <div class="col-md">
                    <div class="form-check mt-3">
                      <input class="form-check-input" type="checkbox" value="" id="brave" />
                      <label class="form-check-label" for="brave">
                        Brave
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="friendship"  />
                      <label class="form-check-label" for="friendship">
                        Friendship
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="family-love"  />
                      <label class="form-check-label" for="family-love">
                        Family love
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="love-for-animals"  />
                      <label class="form-check-label" for="love-for-animals">
                        Love for animals
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="humble"  />
                      <label class="form-check-label" for="humble">
                        Humble
                      </label>
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-check mt-3">
                      <input class="form-check-input" type="checkbox" value="" id="greed" />
                      <label class="form-check-label" for="greed">
                        Greed
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="selfish"  />
                      <label class="form-check-label" for="selfish">
                        selfish
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="envy"  />
                      <label class="form-check-label" for="envy">
                        Envy
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="angry"  />
                      <label class="form-check-label" for="angry">
                        Angry
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="Voracious"  />
                      <label class="form-check-label" for="Voracious">
                        Voracious
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row gy-6 mt-6">
              <!--Age range-->
              <div class="col-md">
                <h3>Age range</h3>
                <div class="form-check mt-3">
                  <input name="default-radio-1" class="form-check-input" type="radio" value="" id="baby" />
                  <label class="form-check-label" for="baby">
                    3 - 6
                  </label>
                </div>
                <div class="form-check">
                  <input name="default-radio-1" class="form-check-input" type="radio" value="" id="kids" checked />
                  <label class="form-check-label" for="kids">
                    6 - 9
                  </label>
                </div>
                <div class="form-check">
                  <input name="default-radio-1" class="form-check-input" type="radio" value="" id="children" checked />
                  <label class="form-check-label" for="children">
                    9 - 11
                  </label>
                </div>
              </div>
              <!--Size type-->
              <div class="col-md">
                <h3>Size type</h3>
                <div class="form-check mt-3">
                  <input name="default-radio-1" class="form-check-input" type="radio" value="" id="short" />
                  <label class="form-check-label" for="short">
                    Short (150 - 300 words)
                  </label>
                </div>
                <div class="form-check mt-3">
                  <input name="default-radio-1" class="form-check-input" type="radio" value="" id="medium" />
                  <label class="form-check-label" for="medium">
                    Medium (300 - 600 words)
                  </label>
                </div>
                <div class="form-check mt-3">
                  <input name="default-radio-1" class="form-check-input" type="radio" value="" id="large" />
                  <label class="form-check-label" for="large">
                    Large (600 - 1000 words)
                  </label>
                </div>
              </div>
            </div>
            <div class="w-100 align-items-center d-flex justify-content-center mt-6">
              <button type="submit" class="btn btn-primary">
                <span class="tf-icons bx bx-send bx-18px me-2"></span>Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <button type="button" onclick="data()">button</button>
  <div id="selected"></div>
@endsection
<script>
  // function data(){
  //   const selected = document.querySelector('input[name="character"]:checked').value;
  //   const textarea = document.querySelector('textarea[name="character"]').value;
  //   window.alert(selected + textarea)
  // }

  document.getElementById('custom-character').addEventListener('input', function() {
    let radioButtons = document.querySelectorAll('input[name="character"]');
    radioButtons.forEach(function(radio) {
      radio.checked = false;
    });
  });

  let radioButtons = document.querySelectorAll('input[name="character"]');
  radioButtons.forEach(function(radio) {
    radio.addEventListener('change', function() {
      if (this.checked) {
        document.getElementById('custom-character').disabled = true;
        document.getElementById('custom-character').value = ''; // Optional: Clear the textarea when a radio is selected
      } else {
        document.getElementById('custom-character').disabled = false;
      }
    });
  });


  // document.getElementById('custom-character').addEventListener('input', function() {
  //   alert("hello")
    // let radioButtons = document.querySelectorAll('input[name="character"]');
    // radioButtons.forEach(function(radio) {
    //   radio.checked = false;
    // });
  // });
  // window.alert(selected);
  // var character = document.querySelector('input[name="character"]:checked').value;
</script>
