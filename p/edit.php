<?php require_once "../blocks/cookies.php"; ?>

<!DOCTYPE>
<html>

    <head>

        <title> AlexandreBL Services - Storage </title>
        <?php require_once "../blocks/head.php"; ?>

    </head>

    <body>

        <?php require_once "../blocks/navbar.php"; ?>
        
        <div id="content"> <?php

            if( empty( $_GET["table"] ) or empty( $_GET["row"] ) ) { ?>

                <h2 class="error"> Error 400: Bad Request. </h2>

            <?php }
            else { 
                
                $table_is = false;
                $table = -1;
                foreach( $Q_tables as $ ) {
                    if( $_GET["table"] == $t[0] ) {
                        $table_is = true;
                        $table = $t;
                    }
                }


            }

        ?> </div>

    </body>