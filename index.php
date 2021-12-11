<?php

require_once "config.php";

if( !empty(  $_GET["logout"] ) ) {
    setcookie("loged_in", false, time() + 86400, "/");
    header('Location: /login.php');
}

if( empty( $_COOKIE["loged_in"] ) ) {

    header('Location: /login.php');

}

?>

<!DOCTYPE>
<html>

    <head>

        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <div id="navbar">
            <a href="/?logout=1"> Logout </a>
            <p> Welcome back <?php echo ucwords( $G_user ); ?> </p>
        </div>
        
        <?php require_once "db.php"; ?>

    </body>