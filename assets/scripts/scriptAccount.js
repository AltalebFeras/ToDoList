
myAccountNavbarButton.addEventListener("click", function () {
  sectionMyTasks.classList.add("none");
  sectionMyAccount.classList.remove("none");
});

myTaskNavbarButton.addEventListener("click", function () {
  sectionMyTasks.classList.remove("none");
  sectionMyAccount.classList.add("none");
});

document
  .getElementById("buttonDeleteAccount")
  .addEventListener("click", function (event) {
    if (confirm("Are you sure you want to delete your account?")) {
      // Get the user ID from the hidden input field
      var userID = document.getElementById("userIDInput").value;

      // Send AJAX request with user ID
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "src/treatment/deleteUser.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            alert(xhr.responseText); 
            // Redirect user or do any other action
            window.location.replace("signOut.php");
          } else {
           
            alert("Error occurred: " + xhr.status);
          }
        }
      };
      // Send the user ID in the request body
      xhr.send("userID=" + encodeURIComponent(userID));
    } else {
      // Prevent the default action of the button click event
      event.preventDefault();
      // User clicked cancel, do nothing or provide feedback
      alert("Account deletion canceled.");
    }
  });

document
  .getElementById("buttonEditAccount")
  .addEventListener("click", function () {
    enableField("name");
    enableField("surname");
    enableField("email");
    enableField("password");
    document.getElementById("buttonEditAccount").disabled = true;

    // Create Confirm and Cancel buttons
    var confirmButton = document.createElement("input");
    confirmButton.value = "Confirm";
    confirmButton.className = "btn btn-primary mb-3";
    confirmButton.id = "confirmEditButton";
    confirmButton.type = "submit";

    var cancelButton = document.createElement("button");
    cancelButton.textContent = "Cancel";
    cancelButton.className = "btn btn-secondary ml-2";
    cancelButton.id = "cancelEditButton";

    // Append buttons to the form
    var form = document.getElementById("formAccount");
    form.appendChild(confirmButton);
    form.appendChild(cancelButton);

    
    document
      .getElementById("confirmEditButton")
      .addEventListener("click", function () {
        if (validateInputs()) {
          submitForm();
        } else {
          alert("Please enter at least 3 characters in each field.");
        }
      });

    document
      .getElementById("cancelEditButton")
      .addEventListener("click", function () {
        disableField("name");
        disableField("surname");
        disableField("email");
        disableField("password");
        document.getElementById("buttonEditAccount").disabled = false;

        // Remove Confirm and Cancel buttons
        confirmButton.remove();
        cancelButton.remove();
      });
  });

function enableField(fieldName) {
  document.getElementById(fieldName).disabled = false;
}

function disableField(fieldName) {
  document.getElementById(fieldName).disabled = true;
}

function validateInputs() {
  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  return (
    name.length >= 3 &&
    surname.length >= 3 &&
    email.length >= 3 &&
    password.length >= 3
  );
}

function submitForm() {

  var name = document.getElementById("name").value;
  var surname = document.getElementById("surname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  // Send AJAX request to update user details
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "src/treatment/updateUser.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        alert(xhr.responseText); 
        window.location.reload();
      } else {
        window.location.reload();
      }
    }
  };

  // Construct the request body
  var formData =
    "name=" +
    encodeURIComponent(name) +
    "&surname=" +
    encodeURIComponent(surname) +
    "&email=" +
    encodeURIComponent(email) +
    "&password=" +
    encodeURIComponent(password);
  xhr.send(formData);
}

// ********************************************************************************************

document.getElementById("buttonDeleteTask").addEventListener("click", function (event) {
  var taskTitle = document.getElementById("taskIDInput").value;
  var taskDeadline = document.getElementById("taskDeadlineInput").value;
  var taskPriority = document.getElementById("taskPriorityInput").value;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "src/treatment/deleteTask.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              window.location.replace("index.php");
          } else {
              console.error("Error occurred: " + xhr.status);
          }
      }
  };
  xhr.send("taskTitle=" + encodeURIComponent(taskTitle) + "&taskDeadline=" + encodeURIComponent(taskDeadline) + "&taskPriority=" + encodeURIComponent(taskPriority));

  // Prevent the default action of the button (e.g., form submission)
  event.preventDefault();
});
