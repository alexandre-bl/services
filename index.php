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
        <table id="domains">
            <tr>
                <th>Domain Name</th>
                <th>Creation Date</th>
            </tr>
            <?php foreach( $results->domains as $domain ) { ?>
                <tr class="domain">
                    <td class="title"><?php echo $domain->domain; ?></td>
                    <td class="date"> <?php echo substr(
                        $domain->date_created, 0, 10
                    ); ?></td>
                </tr>
            <?php }; ?>
        </table>  
    </body>