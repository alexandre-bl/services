<?php

$conn = new mysqli("localhost", $Q_user, $Q_pass) or die("Connection to database failed: " . $conn->connect_error);

if( $conn->connect_error ) {
    die("Connection to database failed: " . $conn->connect_error);
}

echo "Connected to database";

$res = $conn->query(
    "CREATE DATABASE IF NOT EXISTS $Q_db"
);
if ($res === FALSE) {
    echo "; Error creating database: " . $conn->error;
}

$res = $conn->query( "USE $Q_db" );

foreach( $Q_tables as $table ) {

    $sql = "CREATE TABLE IF NOT EXISTS $table[0] ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY";
    foreach( $table[1] as $col ) {
        $sql .= ", ".$col[0]." ".$col[1];
    }
    $sql .= " )";

    $res = $conn->query( $sql );
    if ($res === FALSE) {
        echo "; Error creating table: " . $conn->error;
    }
}

$conn->close(); ?>