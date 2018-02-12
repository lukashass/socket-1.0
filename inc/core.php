<?php

require_once ("config.php");

require_once ("mysql.php");

$db = new Mysql ( $db_name, $db_host, $db_user, $db_password, "" );
$db->open (); // creates a mysql connection

?>
