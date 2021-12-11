<?php

$conn = new mysqli("localhost", $Q_user, $Q_pass) or die("Connection to database failed: " . $conn->connect_error);

if( $conn->connect_error ) {
    die("Connection to database failed: " . $conn->connect_error);
}

echo "Connected to database."

?>