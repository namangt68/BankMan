<?php
if(!mysql_connect('localhost','your_username','yourpassword') || !mysql_select_db('your_db_name'))
{	$error='Cant connect'; 
	die($error);
}
?>
