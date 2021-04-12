<?php
$hostname = "localhost";
$username = "b4026317";
$password = "Prql1996";
$database = "b4026317_db2";
$mysqli = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>