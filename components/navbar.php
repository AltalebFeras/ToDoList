<div id="navbar" class="mt-5" >
    <?php if ($_SESSION['connected']) { ?>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid ">
                <a id="myAccountNavbarButton" class="navbar-brand " href="#">My account</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse  justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a id="myTaskNavbarButton" class="nav-link active" aria-current="page" href="#">My tasks</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="signOut.php">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php } else { ?>
        <div id="sectionSignIn" class="d-flex p-4">
            <?php
            include './signIn.php';
            ?>
        </div>
    <?php } ?>
</div>