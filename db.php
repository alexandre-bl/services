<?php

$conn = new mysqli("localhost", $Q_user, $Q_pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>