import './bootstrap';
/*
  Add custom scripts here
*/
function getFormData() {
  // Lấy dữ liệu từ textarea
  var background_custom = document.getElementById("custom-background").value;
  var character_custom = document.getElementById("character_custom").value;

  // Lấy dữ liệu từ radio button
  var character = document.querySelector('input[name="character"]:checked').value;
  var gender = document.querySelector('input[name="gender"]:checked').value;

  // Lấy dữ liệu từ checkbox
  var hobbies = [];
  var checkboxes = document.querySelectorAll('input[name="hobbies"]:checked');
  checkboxes.forEach((checkbox) => {
    hobbies.push(checkbox.value);
  });

  // Ghép các dữ liệu thành một chuỗi
  var result = "Name: " + name + "\n";
  result += "Gender: " + gender + "\n";
  result += "Hobbies: " + hobbies.join(", ");

  // Hiển thị kết quả
  document.getElementById("result").textContent = result;
}
// forEach
// var message_summarize = "hãy viết cho toi 3 doan tom tắt của một câu chuyện, có bối cảnh là" + name + ", có nhân vật là" + character + "có bài học là:" + lessons.join(",") + " có độ tuổi là:" + age_range + "có độ dài là:" + size_type + " chia thành nhiều chapter khác nhau khác nhau trong một chapter có tối thiểu 2 trang truyện và tối đa 5 trang truyện" + "Trả về định dạng json, có các trường thông tin như sau:\n" +
//   "- \"Title\" chứa thông tin tên câu truyện.\n" +
//   "- \"Description\" mô tả gắn gọn câu chuyện.\n" +
//   "- \"img_url\" chứa link ảnh thumbanails của truyện.";
//
// const result_summarize = "ở đây là lưu kết quả người dùng chọn từ summarize trước đó ";
//
// var message_reading = "dựa vào câu truyện trên" + result_summarize + " hãy viết cho tôi một câu chuyện, có bối cảnh là" + name + ", có nhân vật là" + character + "có bài học là:" + lessons.join(",") + " có độ tuổi là:" + age_range + "có độ dài là:" + size_type + " chia thành nhiều chapter khác nhau khác nhau trong một chapter có tối thiểu 2 trang truyện và tối đa 5 trang truyện" + "Trả về định dạng json, có các trường thông tin như sau:\n" + "Trả về định dạng json, có các trường thông tin như sau:\n" +
//   "- \"Title\" chứa thông tin tên câu truyện.\n" +
//   "- \"Chapter\" Trong chapter chứa 3 trường thông tin bên trong, \"Content\" chứa thông tin về lời dẫn truyện, \"Character\" chứa thông tin nhân vật, \"Dialogue\" chứa lời thoại của từng nhân vật.\n" +
//   "- \"img_url\" hứa link ảnh thumbanails của truyện.\n" +
//   "- \"Lesson\" chứa thông tin bài học rút ra sau câu truyện.\n" +
//   "- \"Size_type\" chứa thông tin độ dài câu truyện.\n" +
//   "- \"Age_range\" chứa thông tin độ tuổi câu truyện.\n" +
//   "- \"Background\" chứa thông tin bối cảnh câu truyện.\n" +
//   "- \"Use_coin\" chứa thông tin số tiền sử dụng để tạo câu truyện";


import.meta.glob([
  '../assets/img/**',
  // '../assets/json/**',
  '../assets/vendor/fonts/**'
]);
