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
        <?php foreach( $results->domains as $domain ) { ?>
            <div class="domain">
                <h2 class="title"><?php echo $domain->domain; ?>      </h2>
                <p  class="date"> <?php echo substr(
                    $domain->date_created, 0, 10
                ); ?></p>
            </div>
        <?php }; ?>        
    </body>