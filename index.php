<?php

require_once "config.php";

if( !empty(  $_GET["logout"] ) ) {
    setcookie("loged_in", false, time() + 86400, "/");
    header('Location: /login.php');
}

if( empty( $_COOKIE["loged_in"] ) ) {

    header('Location: /login.php');

}

?>

<!DOCTYPE>
<html>

    <head>

        <title> AlexandreBL Services</title>
        <?php require_once "head.php"; ?>

    </head>

    <body>

        <div id="navbar">
            <a href="/?logout=1"> Logout </a>
            <p> <?php require_once "db.php"; ?> </p>
        </div>
        
        <div id="content">

            <?php while( $dom = $db->domains->fetch_assoc() ) { ?>

                <div class="domain">

                    <h2> <?php echo $dom["domain"]; ?> </h2>
                    <p> <?php echo $dom["description"]; ?> </p>

                    <?php 
                        $nodes = array();
                        while( $node = $db->nodes->fetch_assoc() ) {
                            if( $node["domain"] == $dom["id"] ) {
                                array_push($nodes,$node);
                            }
                        }

                        ?> <table> <?php
                            foreach( $nodes as $node ) { ?>
                                <tr>

                                    <td> <?php echo $node["sub"]; ?> </td>
                                    <td> <?php echo $node["type"]; ?> </td>
                                    <td> <?php echo $node["strg"]; ?> </td>

                                </tr>
                            <?php }
                        ?> </table> <?php

                    ?>

                </div>

            <?php } ?>

        </div>

    </body>