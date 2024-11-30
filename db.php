<?php
$SERVER='';
$USER_NAME='';
$PASSWORD='';
$DB_NAME = "";
$conn=mysqli_connect($SERVER,$USER_NAME,$PASSWORD,"$DB_NAME");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}

