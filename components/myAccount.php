<?php


require_once "./src/Repositories/UserRepository.php";

$userRepository = new UserRepository();
?>
<div>
    <h3 class="my-2 px-5 py-2 p-3 mb-2  text-dark ">Hello
        <?php
        $loggedInUserID = $_SESSION['user'];
        $users = $userRepository->getAll();
        foreach ($users as $user) {
            if ($user->getUserID() == $loggedInUserID) {
                echo   $user->getSurname();
            }
        }
        ?></h3>

    <form id="formAccount" class="d-flex flex-column bd-highlight mb-3 form-control" method="post" action="
      ./../src/treatment/updateUser.php">

        <div id="message">
            <?php
            if (isset($_SESSION['error_message3'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message3'] . '</div>';
                unset($_SESSION['error_message3']); 
            }
            ?>
        </div>
        <label for="name">Name :*</label>
        <input id="name" type="text" name="name" class="mb-3 mx-2" minlength="3" maxlength="
        50" placeholder="<?php
                            $loggedInUserID = $_SESSION['user'];
                            $users = $userRepository->getAll();
                            foreach ($users as $user) {
                                if ($user->getUserID() == $loggedInUserID) {
                                    echo   $user->getName();
                                }
                            }
                            ?>" required disabled>

        <label for="surname">Surname :*</label>
        <input id="surname" type="text" name="surname" class="mb-3 mx-2" minlength="3" maxlength="
        50" placeholder="<?php
                            $loggedInUserID = $_SESSION['user'];
                            $users = $userRepository->getAll();
                            foreach ($users as $user) {
                                if ($user->getUserID() == $loggedInUserID) {
                                    echo   $user->getSurname();
                                }
                            }
                            ?>" required disabled>

        <label for="email">Email :*</label>
        <input id="email" type="email" name="email" class="mb-3 mx-2" minlength="3" maxlength="
        80" placeholder="<?php
                            $loggedInUserID = $_SESSION['user'];
                            $users = $userRepository->getAll();
                            foreach ($users as $user) {
                                if ($user->getUserID() == $loggedInUserID) {
                                    echo   $user->getEmail();
                                }
                            }
                            ?>" required disabled>

        <label for="password">password :*</label>
        <input id="password" type="password" name="password" class="
        mb-3 mx-2" minlength="7" placeholder="*******" required disabled>




        <button id="buttonEditAccount" class="btn btn-primary my-3">Edit your account</button>

        <?php
        // var_dump($users = $userRepository->getAll());
        // var_dump($_SESSION);


        ?>
    </form>
    <form id="deleteForm" action="" method="post">
        <input type="hidden" name="userID" id="userIDInput" value="<?php echo $_SESSION['user']; ?>">
        <button type="submit" id="buttonDeleteAccount" class="btn bg-danger mb-3">Delete your account</button>
    </form>

</div>
<div>
    <img src="./assets/images/image.svg" class="svg pt-5" alt="svg image" data-bs-toggle="
    tooltip" data-bs-placement="bottom" title="Organise your time with our app">
</div>