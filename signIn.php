<?php

session_start();
include './components/header.php';

?>

<div id="sectionSignIn" class="d-flex align-items-center justify-content-between  p-4">
  <div>
    <h2 class=" py-2  fs-4 fw-bold">The smart to-do app for busy people</h2>
    <img src="./assets/images/image2.svg" class="svg pt-5" alt="svg image" data-bs-toggle="tooltip" data-bs-placement="bottom" title="create your tasks">
  </div>
  <div>
    <p class=" pt-1 fs-4">To create or mange your tasks ,please sign in </p>
    <h3 class="my-2 px-5 py-2 p-3 mb-2  text-dark ">Sign in</h3>

    <div>
    </div>
    <form id="formSignIn" method="post" class="d-flex flex-column bd-highlight mb-3 form-control" action="treatmentSignIn.php">

    <div id="message">
                <?php
                if (isset($_SESSION['error_message1'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message1'] . '</div>';
                    unset($_SESSION['error_message1']); // Remove the error message after displaying it
                }
                if (isset($_SESSION['success_message'])) {
                  echo '<div class="alert bg-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                  unset($_SESSION['success_message']); 
              }
                ?>
            </div>

      <label for="email">Email :*</label>
      <!-- i have to change the username to email  -->
      <input id="email" type="email" name="email" class="mb-3 mx-2" minlength="3" maxlength="80" placeholder="Enter your email" required>

      <label for="password">password :*</label>
      <input id="password" type="password" name="password" class="mb-3 mx-2" minlength="7" placeholder="Enter your password" required>

      <!-- <div id="message"></div> -->

      <input type="submit" name="submit" value="sign in" class="mb-3 mx-2">
      <div class="d-flex align-items-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create an account">
        <p>I don’t have an account, </p>
        <p id="buttonSignUp" class="btn btn-link "><a href="signUp.php">sign up</a></p>

      </div>
    </form>
  </div>
</div>