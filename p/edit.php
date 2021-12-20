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

                    <form>

                        <?php 
                        
                            $row = (int)$_GET["row"]-1;
                            $res = $conn->query( "SELECT * FROM domains WHERE id IN($row)" );

                            foreach( $table[1] as $col ) { ?>

                                <label for="<?php echo $col[0]; ?>"><?php echo $col[0]; ?></label><br>
                                <input type="text" name="<?php echo $col[0]; ?>" value="<?php echo $res[$col[0]]; ?>"><br>

                            <?php } 
                        
                        ?>

                        <input type="submit" value="Save">

                    <form>

                <?php } 

            }

        ?> </div>

    </body>