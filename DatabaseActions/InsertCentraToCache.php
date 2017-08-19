<?php
require 'DbConnect.php';
$db = getDb();

if (isset($_POST["centraPos"])) {
    $centra = $_POST["centraPos"];
    $sql = 'INSERT INTO centralocationcache (Longitude, Latitude, CentraId) VALUES (' . $centra[2] . ', ' . $centra[1] . ',' . $centra[0] . ')';
    $result = mysqli_query($db, $sql);
    if ($result) {
        http_response_code(201);
        echo 'Succes\n';
    } else {
        http_response_code(409);
        $http_response_header = [

        ];
        die("SQL command failed. Reason: " . mysqli_error($db)."<br />SQL Statement: ".$sql);
    }
}