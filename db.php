<?php

$Q_tables = [
    [
        "servers",
        [
            ["ip",   "BINARY(4)"], # https://stackoverflow.com/questions/1385552/datatype-for-storing-ip-address-in-sql-server#1385701
            ["type", "INT(6)"],
            ["user", "VARCHAR(32)"],
            ["pass", "VARCHAR(64)"]
        ]
    ],
    [
        "nodes",
        [
            ["type",   "INT(6)"],
            ["domain", "INT(6)"],
            ["sub",    "VARCHAR(8)"],
            ["strg",   "INT(6)"]
        ]
    ],
    [
        "domains",
        [
            ["domain",      "VARCHAR(32)"],
            ["description", "VARCHAR(128)"],
        ]
    ],
    [
        "storage",
        [
            ["name",     "VARCHAR(8)"],
            ["size",     "INT(16)"],
            ["attached", "INT(6)"]
        ]
    ],
    [
        "types",
        [
            ["name",     "VARCHAR(32)"],
            ["script",     "VARCHAR(64)"]
        ]
    ]

];

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

$db = new stdClass;
$db->domains = $conn->query( "SELECT * FROM domains" );
$db->nodes = $conn->query( "SELECT * FROM nodes" );

$conn->close(); ?>