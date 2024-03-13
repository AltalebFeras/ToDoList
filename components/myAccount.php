





<div>
<h3 class="my-2 px-5 py-2 p-3 mb-2  text-dark ">Hello $surname</h3>

<form id="formAccount" class="d-flex flex-column bd-highlight mb-3 form-control" method="post" action="src/treatment.php" onsubmit="return Validation()">

   <label for="name">Name :*</label>
   <input id="name" type="text" name="name" class="mb-3 mx-2" minlength="3" maxlength="50" placeholder="Enter your name" required>

   <label for="surname">Surname :*</label>
   <input id="surname" type="text" name="surname" class="mb-3 mx-2" minlength="3" maxlength="50" placeholder="Enter your surname" required>

   <label for="email">Email :*</label> <!-- i have to change the username to email  -->
   <input id="email" type="text" name="email" class="mb-3 mx-2" minlength="3" maxlength="80" placeholder="Enter your email" required>

   <label for="password">password :*</label>
   <input id="password" type="password" name="password" class="mb-3 mx-2" minlength="7" placeholder="Create a password" required>

   <input type="submit" name="submit" value="Edit your account" class="btn btn-primary my-3">
   

   <button id="tasksField" type="button" class="list-group-item list-group-item-action btn bg-danger mb-3  " data-bs-toggle="modal" data-bs-target="#exampleModal" > 
   Delete your account
    </button>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete your account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="taskDescription" class="modal-body">
                    <!-- THE taskDescription -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Confirme</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>


<div>
   <img src="./assets/images/image.svg" class="svg pt-5" alt="svg image" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Organise your time with our app">
</div>