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
                foreach( $Q_tables as $table ) {
                    if( $_GET["table"] == $table[0] ) {
                        $table_is = true;
                    }
                }

                if( !$table_is ) { ?>

                    <h4 class="error"> Error 404: Table `<?php echo $_GET["table"]; ?>` doesn't exist. </h2>

                <?php }

            }

        ?> </div>

    </body>