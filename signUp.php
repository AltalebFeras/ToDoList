




<div>
   <h2 class=" py-2  fs-4 fw-bold">The smart to-do app for busy people</h2>
   <img src="./assets/images/image1.svg" class="svg pt-5" alt="svg image" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Organise your time with our app">
</div>

<div>
<h3 class="my-2 px-5 py-2 p-3 mb-2  text-dark ">Sign Up</h3>

<form id="formSignUp" class="d-flex flex-column bd-highlight mb-3 form-control" method="post" action="treatmentSignUp.php" >

      <div id="message" ></div>

   <label for="name">Name :*</label>
   <input id="name" type="text" name="name" class="mb-3 mx-2" minlength="3" maxlength="50" placeholder="Enter your name" required>

   <label for="surname">Surname :*</label>
   <input id="surname" type="text" name="surname" class="mb-3 mx-2" minlength="3" maxlength="50" placeholder="Enter your surname" required>

   <label for="email">Email :*</label> 
   <input id="email" type="text" name="email" class="mb-3 mx-2" minlength="3" maxlength="80" placeholder="Enter your email" required>

   <label for="password">password :*</label>
   <input id="password" type="password" name="password" class="mb-3 mx-2" minlength="7" placeholder="Create a password" required>

   <label for="passwordVerify">Verify your password :*</label>
   <input type="password" id="passwordVerify" name="passwordVerify" class="mb-3 mx-2"  minlength="7" placeholder="cofirme your password" required>

   <input id="buttonFormSignUp" type="submit" name="submit" value="sign up" class="mb-3 mx-2">
</form>
</div>