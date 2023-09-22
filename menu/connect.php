<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "db_safe_box";

$conn = mysqli_connect($serverName, $username, $password, $dbName);
if ($conn) {
    // echo "Connection successful";
    // header("Location: http://localhost/registration2/test.php");
} else {
    die("Connection failed: " . mysqli_connect_error());
}

?>