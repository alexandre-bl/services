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
        <?php echo exec('
            curl "https://api.vultr.com/v2/products?per_page=2" \
            -X GET \
            -H "Authorization: Bearer '.$G_api.'"
        '); ?>        
    </body>