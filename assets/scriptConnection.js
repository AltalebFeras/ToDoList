
document.addEventListener("DOMContentLoaded", function() {




// let name = document.getElementById("name");
// let surname = document.getElementById("surname");
// let email = document.getElementById("email");
// let password = document.getElementById("password");
// let passwordVerify = document.getElementById("passwordVerify");
// let message = document.getElementById("message");
let buttonFormSignUp = document.getElementById("buttonFormSignUp");




let buttonSignUp = document.getElementById("buttonSignUp");
let sectionSignIn = document.getElementById("sectionSignIn");
let myAccountNavbarButton = document.getElementById("myAccountNavbarButton");
let myTaskNavbarButton = document.getElementById("myTaskNavbarButton");
let sectionSignUp = document.getElementById("sectionSignUp");
let sectionMyTasks = document.getElementById("sectionMyTasks");
let sectionMyAccount = document.getElementById("sectionMyAccount");

buttonSignUp.addEventListener("click", function () {
  // Check if form is valid before proceeding
  sectionSignIn.classList.add("none");
  sectionSignUp.classList.remove("none");
});

buttonFormSignUp.addEventListener("click", function () {
  if (validateForm()) {
    sectionSignIn.classList.remove("none");
    sectionSignUp.classList.add("none");
  }
});

myAccountNavbarButton.addEventListener("click", function () {
  sectionMyTasks.classList.add("none");
  sectionMyAccount.classList.remove("none");
});
myTaskNavbarButton.addEventListener("click", function () {
  sectionMyTasks.classList.remove("none");
  sectionMyAccount.classList.add("none");
});

});