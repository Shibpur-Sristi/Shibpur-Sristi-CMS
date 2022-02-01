<?php
include_once '../config_server.php';

$conn=mysqli_connect($SERVER, $USER_NAME, $PASSWORD, "$DB_NAME");
if (!$conn) {
    die('Could not Connect My Sql:' .mysql_error());
}
