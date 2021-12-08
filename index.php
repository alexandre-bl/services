<?php

setcookie("loged_in", false, time() + 86400, "/");

if( !empty( $_COOKIE["loged_in"] ) ) {

    echo $_COOKIE["loged_in"];

}

?>