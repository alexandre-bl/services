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
            <p> <?php require_once "db.php"; ?> </p>
        </div>
        
        <div id="content">

            <?php while( $row = $db->domains->fetch_assoc() ) { ?>

                <div class="domain">
                    <h2> <?php echo $row["domain"]; ?> </h2>
                </div>

            <?php } ?>

        </div>

    </body>