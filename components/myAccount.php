
<div>
<h3 class="my-2 px-5 py-2 p-3 mb-2  text-dark ">Hello $surname</h3>

<form id="formAccount" class="d-flex flex-column bd-highlight mb-3 form-control" method="post">

   <label for="name">Name :*</label>
   <input id="name" type="text" name="name" class="mb-3 mx-2" minlength="3" maxlength="50" placeholder="Enter your name" required>

   <label for="surname">Surname :*</label>
   <input id="surname" type="text" name="surname" class="mb-3 mx-2" minlength="3" maxlength="50" placeholder="Enter your surname" required>

   <label for="email">Email :*</label> 
   <input id="email" type="text" name="email" class="mb-3 mx-2" minlength="3" maxlength="80" placeholder="Enter your email" required>

   <label for="password">password :*</label>
   <input id="password" type="password" name="password" class="mb-3 mx-2" minlength="7" placeholder="Create a password" required>

   <button  id="buttonEditAccount" class="btn btn-primary my-3">Edit your account</button>
   
   <button id="buttonDeleteAccount"  class="btn bg-danger mb-3">Delete your account
    </button>



</form>
</div>


<div>
   <img src="./assets/images/image.svg" class="svg pt-5" alt="svg image" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Organise your time with our app">
</div>