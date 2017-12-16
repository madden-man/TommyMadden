<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$server = "localhost";
$username_server = "maddencl_tommy";
$password_server = "vfgtyxk37sit";
$database = "maddencl_guitar";

// Connect to server and select database.
$guitar_db = new mysqli($server, $username_server, $password_server, $database);
if ($guitar_db->connect_error) {
    die("Connection failed: " . $guitar_db->connect_error);
}
?>