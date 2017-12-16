<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$dsn = 'mysql:host=localhost;dbname=maddencl_account';
$username_Login = "maddencl_tommy";
$password_Login = "vfgtyxk37sit";

// Connect to server and select database.
try {
	$account_db = new PDO($dsn, $username_Login, $password_Login);
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	exit();
}
?>