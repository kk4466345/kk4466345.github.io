<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'remotemysql.com');
define('DB_USERNAME', '5fT23ZsLmB');
define('DB_PASSWORD', '236O3mdWvi');
define('DB_NAME', '5fT23ZsLmB');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>