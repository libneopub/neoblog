<?php
// A component to show the login
// window if user isn't logged in.

require __DIR__ . "/../functions/auth.php";

if (!isLoggedIn()) {
?>
    <div class="login-main">
        <div class="login-main-inner">
            <header class="login-header">
                <p><a href="../index.php"><i class="fa fas fa-arrow-left"></i> Back</a></p>
            </header>

            <main class="login-form" id="loginform">
                <div class="login-form-inner">

                    <h2>Sign in</h2>

                    <input type="button" onclick="window.location = 'auth.php?start'" value="Login using this domain" /><br>

                    <?php
                    // If the authentication failed the user will get a warning
                    if (isset($_GET['auth-failed'])) {
                    ?>
                        <p class="red">Authentication failed, try again.</p>
                    <?php
                    }
                    ?>
                </div>
            </main>

            <footer class="login-footer">
                <center>
                    <p>Made by <a href="https://github.com/RobinBoers">Robin Boers</a></p>
                </center>
            </footer>
        </div>
    </div>
<?php
}
?>