<?php
session_start();

require_once "./src/Repositories/UserRepository.php";

$userRepository = new UserRepository();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/scriptConnection.js" defer></script>

</head>

<?php 
 if (isset($_SESSION['connected']) && $_SESSION['connected']) { ?>
    
    <div>
        <?php
        include './components/navbar.php';
        ?>
    </div>
    <div id="sectionMyTasks"  class="p-5 d-flex  justify-content-between   ">
        <?php
        include './components/createTask.php';
        include './components/myTasks.php';
        ?>
    </div>
    
    <div id="sectionMyAccount" class="p-4 p-5 d-flex align-items-center justify-content-between  ">
        <?php
    include './components/myAccount.php';
    ?>
</div>

<?php } else {
    ?>
    <div id="sectionSignIn" class="d-flex p-4  ">
        <?php
        include './signIn.php';
        ?>
    </div>
    <div id="sectionSignUp" class="d-flex p-4 none">
    <?php
    include './signUp.php';
    ?>
</div>
    <?php } ?>
    