// let name = document.getElementById("name");
// let surname = document.getElementById("surname");
// let email = document.getElementById("email");
// let password = document.getElementById("password");
// let passwordVerify = document.getElementById("passwordVerify");
// let message = document.getElementById("message");
// let buttonFormSignUp = document.getElementById("buttonFormSignUp");

// buttonFormSignUp.addEventListener("click", function () {
//   let password = document.getElementById("password").value;
//   let passwordVerify = document.getElementById("passwordVerify").value;
//   let name = document.getElementById("name").value;
// let surname = document.getElementById("surname").value;
// let email = document.getElementById("email").value;

// console.log(name);
// console.log(surname);
// console.log(email);
// console.log(password);
// console.log(passwordVerify);
//   if (

//     password !== passwordVerify) {
//     message.innerText = "Passwords do not match! Please verify your password.";
//     console.log("hello");
//   }
// });

function validateForm() {
  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var passwordVerify = document.getElementById("passwordVerify").value;
  var errorMessage = "";

  // Check if any field is empty
  if (
    name === "" ||
    surname === "" ||
    email === "" ||
    password === "" ||
    passwordVerify === ""
  ) {
    errorMessage += "All fields are required.<br>";
  }

  // Check if password matches verification
  if (password !== passwordVerify) {
    errorMessage += "Passwords do not match.<br>";
  }

  // Display error message if any
  if (errorMessage !== "") {
    document.getElementById("message").innerHTML = errorMessage;
    return false;
  } else {
    return true;
  }
}

let buttonSignUp = document.getElementById("buttonSignUp");
let buttonFormSignUp = document.getElementById("buttonFormSignUp");
let sectionSignIn = document.getElementById("sectionSignIn");
let myAccountNavbarButton = document.getElementById("myAccountNavbarButton");
let myTaskNavbarButton = document.getElementById("myTaskNavbarButton");
let sectionSignUp = document.getElementById("sectionSignUp");
let sectionMyTasks = document.getElementById("sectionMyTasks");
let sectionMyAccount = document.getElementById("sectionMyAccount");

buttonSignUp.addEventListener("click", function () {
  sectionSignIn.classList.add("none");
  sectionSignUp.classList.remove("none");
});

buttonFormSignUp.addEventListener("click", function () {
  sectionSignIn.classList.remove("none");
  sectionSignUp.classList.add("none");
});

// myAccountNavbarButton.addEventListener("click", function () {
//   sectionMyTasks.classList.add("none");
//   sectionMyAccount.classList.remove("none");
// });
// myTaskNavbarButton.addEventListener("click", function () {
//   sectionMyTasks.classList.remove("none");
//   sectionMyAccount.classList.add("none");
// });
