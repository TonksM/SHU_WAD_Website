<?php
// check login and create SESSION and count attempts
session_start();
//logout code
if(isset($_COOKIE[session_name()])){
// match PHPSESSID settings
setcookie(session_name(), '', time()-3600, '/~b4026317', 'homepages.shu.ac.uk', 1, 1);
}
$_SESSION = array();
// empty the array
session_destroy();
//destroy the session
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
?>