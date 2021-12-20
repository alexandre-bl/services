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
                foreach( $Q_tables as $t ) {
                    if( $_GET["table"] == $t[0] ) {
                        $table_is = true;
                        $table = $t;
                    }
                }

                if( !$table_is ) { ?>

                    <h2 class="error"> Error 404: Table `<?php echo $_GET["table"]; ?>` doesn't exist. </h2>

                <?php } else { ?>

                    <h2> Table: <?php echo $table[0]; ?> </h2>
                    <h2> Row: <?php echo $_GET["row"]; ?> </h2>

                <?php } 

            }

        ?> </div>

    </body>