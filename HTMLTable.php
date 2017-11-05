<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Email</th><th>FirstName</th><th>LastName</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";

class HTMLTable extends RecursiveIteratorIterator {
    function __construct($r) {
        parent::__construct($r, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$hostName = 'sql1.njit.edu';
$username = 'ms792';
$password = 'bSzrOJUh';
$dbName = 'ms792';
$connection = null;

try {
    $connection = new PDO("mysql:host=$hostName;dbname=$dbName", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $connection->prepare("SELECT id,email,fname,lname,phone,birthday,gender,password FROM accounts");
    $statement->execute();

    $result = $statement->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new HTMLTable(new RecursiveArrayIterator($statement->fetchAll())) as $p=>$q) {
        echo $q;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo "</table>";