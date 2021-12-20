<?php

if( !empty(  $_GET["logout"] ) ) {
    setcookie("loged_in", false, time() + 86400, "/");
    header('Location: /p/login.php');
}

if( empty( $_COOKIE["loged_in"] ) ) {

    header('Location: /p/login.php');

}

?>