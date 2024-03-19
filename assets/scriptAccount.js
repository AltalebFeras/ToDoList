
// let sectionMyTasks = document.getElementById("sectionMyTasks");
// let sectionMyAccount = document.getElementById("sectionMyAccount");
// let myAccountNavbarButton = document.getElementById("myAccountNavbarButton");
// let myTaskNavbarButton = document.getElementById("myTaskNavbarButton");
// myAccountNavbarButton.addEventListener("click", function () {
//   sectionMyTasks.classList.add("none");
//   sectionMyAccount.classList.remove("none");
// });
// myTaskNavbarButton.addEventListener("click", function () {
//   sectionMyTasks.classList.remove("none");
//   sectionMyAccount.classList.add("none");
// });


document.addEventListener("DOMContentLoaded", function() {
  const nameInput = document.getElementById('name');
  const surnameInput = document.getElementById('surname');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  const editButton = document.getElementById('buttonEditAccount');
  const saveButton = document.createElement('button');
  const cancelButton = document.createElement('button');
  
  saveButton.textContent = 'Save';
  saveButton.className = 'btn btn-success mx-2 my-2';
  cancelButton.textContent = 'Cancel';
  cancelButton.className = 'btn btn-secondary mx-2 my-2';
  saveButton.style.display = 'none';
  cancelButton.style.display = 'none';

  editButton.addEventListener('click', function() {
      nameInput.disabled = false;
      surnameInput.disabled = false;
      emailInput.disabled = false;
      passwordInput.disabled = false;
      editButton.style.display = 'none';
      saveButton.style.display = 'inline-block';
      cancelButton.style.display = 'inline-block';
  });

  cancelButton.addEventListener('click', function() {
      nameInput.disabled = true;
      surnameInput.disabled = true;
      emailInput.disabled = true;
      passwordInput.disabled = true;
      editButton.style.display = 'inline-block';
      saveButton.style.display = 'none';
      cancelButton.style.display = 'none';
  });

  saveButton.addEventListener('click', function() {
      // Trigger form submission when Save button is clicked
      document.getElementById('formAccount').submit();
  });

  document.getElementById('formAccount').appendChild(saveButton);
  document.getElementById('formAccount').appendChild(cancelButton);
});




$(document).ready(function() {
  $('#formAccount').submit(function(event) {
      // Prevent default form submission
      event.preventDefault();
      
      // Serialize form data
      var formData = $(this).serialize();

      // AJAX request
      $.ajax({
          type: 'POST',
          url: 'src/treatment/updateUser.php', // Change the URL to your server-side script handling the update
          data: formData,
          dataType: 'json', // Expected data type from the server
          success: function(response) {
              // Handle success response
              if (response.success) {
                  alert('Profile updated successfully');
                  // You can redirect the user or perform any other action here
              } else {
                  alert('Failed to update profile');
              }
          },
          error: function(xhr, status, error) {
              // Handle error
              console.error(xhr.responseText);
          }
      });
  });
});
