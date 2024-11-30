<?php
$SERVER='';
$USER_NAME='';
$PASSWORD='';
$DB_NAME = "";
$conn=mysqli_connect($SERVER,$USER_NAME,$PASSWORD,"$DB_NAME");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
//cms located outside public html, specify username before deploy
$basePath = "/home/$username/public_html/admin/sristi_page/";
$base_image_url='https://www.shibpursristi.in/admin/sristi_page/project_image/';
