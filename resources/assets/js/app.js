/**
 * UI Toasts
 */

'use strict';


function getDataPrompt(){
  // alert("hello")
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

  var prompt_choices = "có bối cảnh là" + backgroundSelected + customBackground +
    ",có nhân vật là" + characterSelected +
    "có bài học là:" + lessonSelected.join(",") +
    " có độ tuổi là:" + ageRange +
    "có độ dài là:" + sizeType +
    "có số lượng chapter là: " + chapter;

  var message_summarize = "hãy viết cho tôi 3 câu truyện tóm tắt ," + prompt_choices + "\nTrả về định dạng json, có các trường thông tin như sau:\n" +
    "- \"Title\"(chữ T trong luôn viết hoa) chứa thông tin tên câu truyện.\n" +
    "- \"Description\" (chữ D luôn viết hoa) mô tả gắn gọn câu chuyện.\n" +
    "- \"img_url\" chứa link ảnh thumbanails của truyện.";

  var reading_message = prompt_choices + "";
  window.alert(message_summarize);

  console.log(document.getElementById('messageInput').value = message_summarize)
}
window.getDataPrompt = getDataPrompt;
