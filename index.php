<?php require_once "blocks/cookies.php"; ?>

<!DOCTYPE>
<html>

    <head>

        <title> AlexandreBL Services</title>
        <?php require_once "blocks/head.php"; ?>

    </head>

    <body>

        <?php require_once "blocks/navbar.php"; ?>
        
        <div id="content">

            <?php $i = 0; while( $dom = $db->domains->fetch_assoc() ) { $i += 1; ?>

                <div class="domain">

                    <h2> <?php echo $dom["domain"]; ?> </h2> <a class="edit" href="/p/edit.php?table=domains&row=<?php echo $i; ?>"> Edit </a>
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