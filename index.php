<?php

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
        <h1> Welcome back </h1>
    </body>