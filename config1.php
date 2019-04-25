<?php
define('dbhost','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','db_group_e_cm004');
//define('rootdir','/cfass');
$db=mysqli_connect(dbhost,dbuser,dbpass,dbname);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

session_start();



?>
