<?php
$host = "localhost"; // change if needed
$user = "root";      // your MySQL username
$pass = "";          // your MySQL password
$db   = "uploadimg"; // your DB name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
