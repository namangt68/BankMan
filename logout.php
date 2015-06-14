<?php
require 'get_logged.inc.php';
session_destroy();
header('Location:index.php');
?>
