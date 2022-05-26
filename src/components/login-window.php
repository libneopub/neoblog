<?php
session_start();

// Set the session the first time to false
if(!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
}

// Check if the user is logged in
if($_SESSION['login'] == false) {

    // Show login screen
    ?>
    <div class="login-main">
        <div class="login-main-inner">

            <!-- The header -->

            <header class="login-header">

                <p><a href="../index.php">&larr; Back</a></p>

            </header>   

            <!-- Login form -->

            <main class="login-form" id="loginform">
                <div class="login-form-inner">

                    <h2>Sign in</h2>

                    <input type="button" onclick="window.location = 'auth.php?start'" value="Login using this domain" /><br>

                    <?php
                        // If the authentication failed the user will get a warning
                        if(isset($_GET['auth-failed'])) {
                            ?>
                                <p class="red">Authentication failed, try again.</p>
                            <?php
                        }
                    ?>
                </div>
            </main>
            
            <!-- The footer -->

            <footer class="login-footer">

                <center>
                    <p>Made by <a href="https://github.com/RobinBoers" >Robin Boers</a></p>    
                </center>

            </footer>

        </div>
    </div>
    <?php
}
?>