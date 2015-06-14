<?php

ob_start();
session_start();

$current_file=$_SERVER['SCRIPT_NAME'];
@$http_referer=$_SERVER['HTTP_REFERER'];


function loginemp(){
		if(isset($_SESSION['emp_id']) && !empty($_SESSION['emp_id'])){
		return true;
		}
	else{
		echo 'invalid id/password';
		return false;
		}
	}


function loginatm(){
		if(isset($_SESSION['acc_no']) && !empty($_SESSION['acc_no'])){
		return true;
		}
	else{
		return false;
		}
	}
?>

