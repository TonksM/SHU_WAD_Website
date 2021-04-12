<?php
if(!isset($_SESSION['login'])){
header('Location: '.$_SERVER['HTTP_REFERER']);
exit;
}
?>