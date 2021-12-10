<?php

require_once "config.php";

if( empty( $_COOKIE["loged_in"] ) ) {

    header('Location: /login.php');

}

$cmd = 'curl "https://api.vultr.com/v2/domains" \
        -X GET \
        -H "Authorization: Bearer '.$G_api.'"';
$results = json_decode( exec($cmd) );

?>

<!DOCTYPE>
<html>

    <head>

        <link rel="stylesheet" href="style.css">

    </head>

    <body>
        <h1> Welcome back </h1>
        <?php
            print_r($results);
        ?>        
    </body>