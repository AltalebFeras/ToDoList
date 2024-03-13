

<div id="header">
        <?php if (isset($_SESSION['connecté'])) { ?>
            <a href="/signOut.php" class=" badge rounded-pill  text-white bg-dark mb-3 mx-2">Sign out</a>
            <a href="#" class=" badge rounded-pill  text-white bg-dark mb-3 mx-2" >home</a>
        <?php } else { ?>
            <nav class="mt-2 navbar navbar-dark bg-secondary">
                <a href="/signIn.php" class=" badge rounded-pill  text-white bg-dark mb-3 mx-2">Sign in</a>
                <a href="/signUp.php" class="badge rounded-pill  text-white bg-dark mb-3 mx-2">Sign up</a>
            </nav>
        <?php } ?>
    </div>