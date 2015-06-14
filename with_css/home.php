<?php
require_once 'server_connect.inc.php';
?>

<!DOCTYPE html>	
<html>
	<head>
		<style type="text/css">
		</style>

		<style>
			header {
			    background-color:#0B4C5F;
			    color:white;
			    text-align:center;
			    padding:5px;	 
				}
			nav {
			    line-height:30px;
			    background-color:#eeeeee;
			    height:480px;
			    width:150px;
			    float:left;
			    padding:5px;	      
				}
			aside{
			    float: left;
		            width: 45%;
		   	    min-height: 480px;	
	 		    background: url(../images/aside-bg.png) center top no-repeat;
		  	    margin: 0 0 20px 0;
				}
			section {
			    width:45%;
			    float:left;
			    padding:10px;	 	 
				}
			footer {
    			    background-color:#610B0B;
			    color:white;
			    clear:both;
			    text-align:center;
			    padding:0px;	 	 
				}
		</style>

		<title>Moneta Bank</title>
		<meta charset="utf-8" />
		

	</head>

	<body>

	<header>
	<h1> MONETA BANK</h1> <!--style="text-font:"-->
	</header>

	<section>
	<br><br><br><br><br><br>	
	<div id="enroll" align="center">
	<h4>EMPLOYEE LOGIN</h4>
	<form action="<?php echo $current_file;?>" method="POST" onsubmit="return validateForm1()">
		 Employee ID:&nbsp;<input type="text" value="" name="Emp_id"><br>
		 Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" value="" name="Password"><br><br>
		<input type="submit" value="Sign in">
	</form></section>

	<script type="text/javascript">
		function validateForm1() {
	    		var emp=document.forms[0]["Emp_id"].value;
	    		var password=document.forms[0]["Password"].value;
    	    		if ( emp == null || emp == "" || password== null || password=="" ) {
        				alert("Enter Employee id/password");
        				return false;
       					} 
				}
	</script>
	

<?php

if(isset($_POST['Emp_id']) && !empty($_POST['Emp_id']) && isset($_POST['Password']) && !empty($_POST['Password'])){
			$Emp_id=$_POST['Emp_id'];
			$Password=$_POST['Password'];
			$Password_new=MD5($Password);

			$query1="SELECT Emp_id FROM Employee WHERE Emp_id='$Emp_id' AND Password='$Password_new'";

			if($query1_data=mysql_query($query1)) {

				if(mysql_num_rows($query1_data)==1){
						$emp_id=mysql_result($query1_data,0,'Emp_id');
						//echo 'Welcome,'.$emp_id;
						$_SESSION['emp_id']=$emp_id;
						header('Location:index.php');

						}
						
				else if(mysql_num_rows($query1_data)==0){ 
						echo 'Invalid username and/or password';
						}
					}
	
				}

			
?>

	</section>
	
	<aside>
	<br><br><br><br><br><br>
	<div id="enroll" align="center">
	<h4>ATM LOGIN</h4>
	<form action="<?php echo $current_file;?>" method="POST"  onsubmit="return validateForm()">
 	ATM NUMBER:&nbsp;<input type="text" value="" name="ATM_NO"><br>
 	PIN:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" value="" name="PIN"><br><br>
	<input type="submit" value="Sign in">
	</form>

	<script type="text/javascript">
		function validateForm() {
    			var atm_no= document.forms[1]["ATM_NO"].value;
    			var pin = document.forms[1]["PIN"].value;
    	                if ( atm_no == null || atm_no == "" || pin== null || pin=="" ) {
        				alert("Enter ATM number/pin");
        				return false;
            				} 
			}
	</script>
<?php
if(isset($_POST['ATM_NO']) && !empty($_POST['ATM_NO']) && isset($_POST['PIN']) && !empty($_POST['PIN']) ){

		$atm_no=$_POST['ATM_NO'];
		$pin=$_POST['PIN'];
		$query1="SELECT Acc_no FROM CUSTOMERS WHERE ATM_NO='$atm_no' AND PIN='$pin'";
		
		if($query1_data=mysql_query($query1)){

			if(mysql_num_rows($query1_data)==1){
					$_SESSION['atm']=$atm_no;
					$_SESSION['pin']=$pin;
					$acc_no=mysql_result($query1_data,0,'Acc_no');
					$_SESSION['acc_no']=$acc_no;
					//echo $_SESSION['acc_no'];					
					header('Location:index.php');
						}
			
			else if(mysql_num_rows($query1_data)==0){
					echo 'Invalid ATM NUMBER and/or PIN';
						}
				}

			}
	
	?>
	</aside>
	<footer>
	<h5> Powered by BankMan Systems<br>copyright @samya,sparsh</h5>
	</footer>

	</body>

</html>

<?php
/*
if(isset($_POST['Emp_id']) && !empty($_POST['Emp_id']) && isset($_POST['Password']) && !empty($_POST['Password'])){
			$Emp_id=$_POST['Emp_id'];
			$Password=$_POST['Password'];
			$Password_new=MD5($Password);

			$query1="SELECT Emp_id FROM Employee WHERE Emp_id='$Emp_id' AND Password='$Password_new'";

			if($query1_data=mysql_query($query1)) {

				if(mysql_num_rows($query1_data)==1){
						$emp_id=mysql_result($query1_data,0,'Emp_id');
						echo 'Welcome,'.$emp_id;
						$_SESSION['emp_id']=$emp_id;
						header('Location:index.php');

						}
						
				else if(mysql_num_rows($query1_data)==0){ 
						echo 'Invalid username and password';
						}
					}
	
				}*/

			
?>


<?php /*

if(isset($_POST['ATM_NO']) && !empty($_POST['ATM_NO']) && isset($_POST['PIN']) && !empty($_POST['PIN']) ){

		$atm_no=$_POST['ATM_NO'];
		$pin=$_POST['PIN'];
		$query1="SELECT Acc_no FROM CUSTOMERS WHERE ATM_NO='$atm_no' AND PIN='$pin'";

		if($query1_data=mysql_query($query1)){

			if(mysql_num_rows($query1_data)==1){
					$acc_no=mysql_result($query1_data,0,'Acc_no');
					$_SESSION['acc_no']=$acc_no;
					header('Location:index.php');
						}
			
			else if(mysql_num_rows($query1_data)==0){
					echo 'Invalid ATM NUMBER and PIN';
						}
				}

			}

*/?>


