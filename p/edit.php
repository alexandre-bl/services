<?php require_once "../blocks/cookies.php"; ?>

<?php

    if(
        isset($_GET["update"]) and isset($_POST["table"]) and isset($_POST["row"])
    ){

        $table = -1;
        foreach( $Q_tables as $t ) {
            if( $_GET["table"] == $t[0] ) {
                $table_is = true;
                $table = $t[1];
            }
        }

        $cols = true;
        foreach( $table as $col ) {
            if( !isset($_POST[$col]) ) {
                $cols = false;
            }
        }

        if( $cols ) {

            $sql  = "UPDATE ". $_POST[$table] ." SET ";
            foreach( $table as $col ) {

                if( $col != $table[0] ) {
                    $sql .= ", ";
                }

                $sql .= "$col = '". $_POST[$col] ."'";
            }
            $sql .= " WHERE id=".$_POST["row"];

            $res = $conn->query( "SELECT * FROM domains WHERE id IN($row)" )->fetch_assoc();

        }

    }

?>

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
                        $table = $t[1];
                    }
                }

                if( !$table_is ) { ?>

                    <h2 class="error"> Error 404: Table `<?php echo $_GET["table"]; ?>` doesn't exist. </h2>

                <?php } else { ?> 

                    <form action="/p/edit.php?update=1" method="post">

                        <input type="hidden" name="table"  value="<?php echo $_GET["table"]; ?>">
                        <input type="hidden" name="row"    value="<?php echo $_GET["row"];   ?>">

                        <?php 
                        
                            $row = (int)$_GET["row"];
                            $res = $conn->query( "SELECT * FROM domains WHERE id IN($row)" )->fetch_assoc();

                            foreach( $table as $col ) { ?>

                                <label for="<?php echo $col[0]; ?>"><?php echo $col[0]; ?></label><br>
                                <input type="text" name="<?php echo $col[0]; ?>" value="<?php echo $res[$col[0]]; ?>"><br>

                            <?php } 
                        
                        ?>

                        <input type="submit" value="Save">

                    <form>

                <?php } 

            }

        ?> </div>

        <?php require_once "../blocks/navbar.php"; ?>

    </body>