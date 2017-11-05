<?php
$hostName = 'sql1.njit.edu';
$username = 'ms792';
$password = 'bSzrOJUh';
$dbName = 'ms792';
$connection = null;
try
{
    $connection = new PDO("mysql:host=$hostName;dbname=$dbName", $username, $password);
    $sql = "SELECT id,email,fname,lname,phone,birthday,gender,password FROM accounts";
    $result = $connection->query($sql);
    print ("Number of Records : ".$result->rowCount()."<br>");

}
catch(PDOException $ex)
{
    echo "Error: " . $ex->getMessage();
}
?>