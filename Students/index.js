function lectureLinkHandler() {
  this.event.preventDefault();
  var div = document.getElementById("video_player");
  div.classList.remove("none");
  var lecture_list = document.querySelectorAll(".link");
  lecture_list.forEach((lecture) => {
    lecture.addEventListener("click", (e) => {
      var src = lecture.firstChild.getAttribute("href");

      var iframe = document.getElementById("video");
      iframe.setAttribute("src", src);
    });
  });
}

function showSuccess() {
    alert('File Submitted Successfully');
}
