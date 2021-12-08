<?php

if( empty( $_COOKIE["loged_in"] ) ) {

    header('Location: /login.php');

} else { ?>

    <h1> Welcome back </h1>

<?php } ?>