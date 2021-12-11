<?php

require_once "config.php";

if( !empty(  $_GET["logout"] ) ) {
    setcookie("loged_in", false, time() + 86400, "/");
    header('Location: /login.php');
}

if( empty( $_COOKIE["loged_in"] ) ) {

    header('Location: /login.php');

}

$cmd = 'curl "https://api.vultr.com/v2/domains" \
        -X GET \
        -H "Authorization: Bearer '.$G_api.'"';
$results = json_decode( exec($cmd) );

foreach( $results->domains as $domain ) {
    $domain->records = json_decode( exec('
        curl "https://api.vultr.com/v2/domains/'.$domain->domain.'/records" \
        -X GET \
        -H "Authorization: Bearer '.$G_api.'"
    ') )->records;
    $domain->nodes = count( $domain->records );
}

?>

<!DOCTYPE>
<html>

    <head>

        <link rel="stylesheet" href="style.css">
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function showHideRow(row) {
                $("." + row).toggle();
            }
        </script> -->

    </head>

    <body>

        <div id="navbar">
            <a href="/?logout=1"> Logout </a>
            <p> Welcome back <?php echo ucwords( $G_user ); ?> </p>
        </div>

        <!--<table id="domains">
            <tr>
                <th>0</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
            </tr>
            <?php $i = 0; foreach( $results->domains as $domain ) { ?>
                <tr class="domain">
                    <td onclick="showHideRow('hidden_row<?php echo $i; ?>');" class="pm">+/-</td>
                    <td class="title"><?php echo $domain->domain; ?></td>
                    <td></td>
                    <td class="nodes">( created <?php echo substr(
                        $domain->date_created, 0, 10
                    ); ?>, <?php echo $domain->nodes; ?> nodes )</td>
                </tr>
                <?php foreach( $domain->records as $record ) { 
                    if(
                        $record->type == "NS" or $record->type == "TXT"
                    ) {
                        continue;
                    };
                ?>
                    <tr class="hidden_row<?php echo $i; ?> hidden_row">
                        <td></td>
                        <td class="type"><?php echo $record->type; ?></td>
                        <td><?php echo $record->name; ?></td>
                        <td><?php echo $record->data; ?></td>
                    </tr>
                <?php } ?>
            <?php $i++; }; ?>
        </table> -->
    </body>