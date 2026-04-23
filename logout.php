<?php
require_once 'auth.php';
startAuthSession();

$_SESSION=[];
session_destroy();

setcookie('username', '', time() - 3600, '/');
setcookie('user_role', '', time() - 3600, '/');

header("Location: login.php");
exit;
?>