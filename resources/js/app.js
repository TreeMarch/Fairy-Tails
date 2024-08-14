import './bootstrap';






// function getFormData() {
//   // Lấy dữ liệu từ textarea
//   var custome_background = document.getElementById("custom_background").value;
//   var custome_character = document.getElementById("custom_character").value;
//
//   // Lấy dữ liệu từ radio button
//   var character = document.querySelector('input[name="character"]:checked').value;
//   var age_baby = document.querySelector('input[name="baby"]:checked').value;
//   var age_kid = document.querySelector('input[name="kids"]:checked').value;
//   var age_children = document.querySelector('input[name="children"]:checked').value;
//   var size_short = document.querySelector('input[name="short"]:checked').value;
//   var size_medium = document.querySelector('input[name="medium"]:checked').value;
//   var size_large = document.querySelector('input[name="larges"]:checked').value;
//
//
//   // Lấy dữ liệu từ checkbox
//   // Lấy dữ liệu từ các checkbox "background"
//   var backgrounds = [];
//   var backgroundCheckboxes = document.querySelectorAll('input[name="background"]:checked');
//   backgroundCheckboxes.forEach((checkbox) => {
//     backgrounds.push(checkbox.value);
//   });
//
//   // Lấy dữ liệu từ các checkbox "lesson"
//   var lessons = [];
//   var lessonCheckboxes = document.querySelectorAll('input[name="lesson"]:checked');
//   lessonCheckboxes.forEach((checkbox) => {
//     lessons.push(checkbox.value);
//   });
//
//   // Ghép các dữ liệu thành một chuỗi
//   var result = "Name: " + name + "\n";
//   result += "Gender: " + gender + "\n";
//   result += "Hobbies: " + hobbies.join(", ");
//
//   // Hiển thị kết quả
//   document.getElementById("result").textContent = result;
// }


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
