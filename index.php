<?php
/*if logged in via employee goes to emp workspace
 * if logged in via atm pin goes to ATM workspace
 * */
require 'server_connect.inc.php';
require 'get_logged.inc.php';

	if(loginemp()){
		require 'emp_wspace.php';
		}

	else if(loginatm()){
		require 'account_summary.php';
		}
	else{
		require 'home.php';
		}

?>

