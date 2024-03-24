<?php

session_start();
require_once "./src/Repositories/UserRepository.php";

$userRepository = new UserRepository();
?>
<?php
if (isset($_SESSION['connected'])) { ?>

    <?php
    include './components/header.php';
    ?>
    <div>
        <?php
        include './components/navbar.php';
        ?>
    </div>
    <div id="sectionMyTasks" class="p-5 d-flex justify-content-between   ">
        <?php
        include './components/createTask.php';
        include './components/myTasks.php';
        ?>
    </div>

    <div id="sectionMyAccount" class="p-4 p-5 d-flex align-items-center justify-content-between none ">
        <?php
        include './components/myAccount.php';
        ?>
    </div>

<?php } else {
?>
    <?php
    include './components/header.php';
    include './signUp.php';
    ?>
<?php } ?>