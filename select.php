<?php
$hostName = 'sql1.njit.edu';
$username = 'ms792';
$password = 'bSzrOJUh';
$dbName = 'ms792';
$connection = null;

try
{
    $connection = new PDO("mysql:host=$hostName;dbname=$dbName", $username, $password);
    $sql = "SELECT id,email,fname,lname,phone,birthday,gender,password FROM accounts where id<6";
    foreach ($connection->query($sql) as $row)
    {
        print "Id: ".$row["id"]."<br>";
        print "Email: " .$row["email"]."<br>";
        print "FirstName : " .$row["fname"]."<br>";
        print "LastName : " .$row["lname"]."<br>";
        print "Phone : " .$row["phone"]."<br>";
        print "Birthday : ".$row["birthday"]."<br>";
        print "Gender : ". $row["gender"]."<br>";
        print "Password : ".$row["password"]."<br>";
    }
}
catch(PDOException $ex)
{
    echo "Error: " . $ex->getMessage();
}

?>