<!DOCTYPE html>
<html>

    <head>

        <link rel="stylesheet" href="style.css">

    </head>

    <body id="login">

        <form id="box" method="post">

            <h1 class="title">Login</h1>

            <label for="name">Username</label><br>
            <input type="text" name="name"><br>

            <label for="password">Password</label><br>
            <input type="password" name="password"><br>

            <input type="submit" value="Login">

        </form>

    </body>

</html>

<?php

    /* setcookie("loged_in", false, time() + 86400, "/"); */

?>