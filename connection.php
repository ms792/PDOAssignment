<?php
$hostName = 'sql1.njit.edu';
$username = 'ms792';
$password = 'bSzrOJUh';
$dbName = 'ms792';
$connection = null;

try {
    $connection = new PDO("mysql:host=$hostName;dbName=ms792", $username, $password);

    print_r("Connected Successfully<br>");
}
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
