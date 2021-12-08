<?php

require_once "db.php";

setcookie("loged_in", false, time() + 86400, "/");

if( empty( $_COOKIE["loged_in"] ) ) {

    header('Location: '.$db.'/login.php');

} else { ?>

    <h1> Welcome back </h1>

<?php } ?>