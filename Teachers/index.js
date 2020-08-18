var button = document.getElementById("add_button");
button.addEventListener("click", () => {
  var popup = document.getElementById("popup");
  popup.classList.toggle("none");
  console.log(classList);
  var submitButton = document.getElementById("submit_button");
  submitButton.addEventListener("click", () => {
    popup.classList.toggle("none");
  });
});
