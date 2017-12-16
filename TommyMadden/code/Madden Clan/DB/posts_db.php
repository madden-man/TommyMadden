<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$server = "localhost";
$username_server = "maddencl_tommy";
$password_server = "vfgtyxk37sit";
$database = "maddencl_posts";

// Connect to server and select database.
$posts_db = new mysqli($server, $username_server, $password_server, $database);
if ($posts_db->connect_error) {
    die("Connection failed: " . $thingoftheday_db->connect_error);
}

?>