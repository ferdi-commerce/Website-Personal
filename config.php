<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mis_group9";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(!$con) {
    die("Connection failed: ". mysqli_connect_error());
}
echo "  Connected successfully";
?>