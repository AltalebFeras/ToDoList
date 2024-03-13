



<?php if ($_SESSION['connected']) { ?>


    <div class="listsAndForm">
        <?php
        include './components/header.php';
        include './components/navbar.php';
        include './components/lists.php';
        include './components/form.php';
        ?>
    </div>

    <?php } else {
    ?>
    <div>
    <?php
        include './components/header.php';
        include './components/navbar.php';
        ?>
    </div>
<?php } ?>



<div class="listsAndForm">
        <?php
        // include './components/header.php';
        // include './components/navbar.php';
        // include './components/lists.php';
        // include './components/form.php';
        ?>
    </div>