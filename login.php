<?php

    require_once "config.php";

    $empty = false;
    $incorrect = false;

    if( isset( $_POST["name"] ) ) {

        if( !empty( $_POST["name"] ) and !empty( $_POST["password"] ) ) {

            if(
                $_POST["name"] == $G_user or $_POST["password"] == $G_pass
            ) {

                setcookie("loged_in", true, time() + 86400, "/");
                header('Location: /');
                
            } else {
                $incorrect = true;
            }

        } else {
            $empty = true;
        }

    }

?>

<!DOCTYPE html>
<html>

    <head>

        <link rel="stylesheet" href="style.css">

    </head>

    <body id="login">

        <form id="box" method="post">

            <h1 class="title">Login</h1>

            <?php if( $empty or $incorrect ) { ?>
                <p id="error">
                    <?php
                        if( $empty ) {
                            echo "All field should be filled in.";
                        } else {
                            if( $incorrect ) {
                                echo "Either the username or the password are incorrect.";
                            }
                        }
                    ?>
                </p>
            <?php } ?>

            <label for="name">Username</label><br>
            <input type="text" name="name"><br>

            <label for="password">Password</label><br>
            <input type="password" name="password"><br>

            <input type="submit" value="Login">

        </form>

    </body>

</html>