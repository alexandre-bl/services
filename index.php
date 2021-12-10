<?php

require_once "config.php";

if( empty( $_COOKIE["loged_in"] ) ) {

    header('Location: /login.php');

}

$cmd = 'curl "https://api.vultr.com/v2/domains" \
        -X GET \
        -H "Authorization: Bearer '.$G_api.'"';
$results = json_decode( exec($cmd) );

foreach( $results->domains as $domain ) {
    $domain->nodes = 0;
}

?>

<!DOCTYPE>
<html>

    <head>

        <link rel="stylesheet" href="style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>

    </head>

    <body>
        <table id="domains">
            <tr>
                <th>Domain Name</th>
                <th>Creation Date</th>
                <th>Nodes</th>
            </tr>
            <?php $i = 0; foreach( $results->domains as $domain ) { ?>
                <tr onclick="showHideRow('hidden_row<?php echo $i; ?>');" class="domain">
                    <td class="title"><?php echo $domain->domain; ?></td>
                    <td class="date">( created <?php echo substr(
                        $domain->date_created, 0, 10
                    ); ?>,</td>
                    <td class="nodes"><?php echo $domain->nodes; ?> nodes )</td>
                </tr>
                <tr id="hidden_row<?php echo $i; ?>" class="hidden_row">
                    <td>
                        Test
                    </td>
                </tr>
            <?php $i++; }; ?>
        </table>  
    </body>