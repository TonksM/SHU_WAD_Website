<?php
// check login and create SESSION and count attempts
session_start();
require('../includes/conn.inc.php');
//check login / password combination
$stmt = $mysqli->prepare("SELECT userName, passWord FROM login WHERE admin = 1");
$stmt->execute();
$stmt->bind_result($userName, $passWord);
$stmt->fetch();
$stmt->close();
echo $userName." ".$passWord;
if ($_POST['username'] == $userName && $_POST['password'] == $passWord){
$_SESSION['login'] = 1;
}
// redirect browser
header("Location: ".$_SERVER['HTTP_REFERER']);
?>