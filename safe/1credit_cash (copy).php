<?php
require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';
if(@($_SESSION['emp_id']==null || $_SESSION['emp_id']=="") && (@($_SESSION['atm']==null ||$_SESSION['atm']=="") || @($_SESSION['pin']==null ||$_SESSION['pin']=="")))
{
die(header('Location:index.php'));
}

?>

<html>
<head><link rel="stylesheet" href="main.css"/></head>
<body>

	<form action="credit_cash.php" method="POST" onsubmit="return validateForm()">
		 Amount*:&nbsp;&nbsp;<input type="text" value="" name="Amount"><br><br>
	 	<input type="submit" value="Submit">
	</form>

	<script type="text/javascript">
	function validateForm() {
 		    var amount = document.forms[0]["Amount"].value;
  		    if ( amount == null || amount == "") {
        			alert("Fields with * are compulsory");
        			return false;
        			} 
			}
	</script>

</body>
</html>

<?php

if(isset($_POST['Amount']) && !empty($_POST['Amount'])){

	$time=time();
	$date=date("Y/m/d",$time);
	$amount=$_POST['Amount'];

	if($amount>0){
	
		$acc_no=$_SESSION['acc_no'];
		$Emp_id=$_SESSION['emp_id'];
		$query4="SELECT Trans_count FROM Transaction_count";
$query4_data=mysql_query($query4);
$query4_row=mysql_fetch_assoc($query4_data);
		$Trans_id=$query4_row['Trans_count']+1;

		$query1="INSERT INTO Transactions(Trans_id,Date,Acc_no,Remark,Amount,Emp_id) VALUES('$Trans_id','$date','$acc_no','CREDIT_CASH','$amount','$Emp_id')";
		
		$query2="UPDATE CUSTOMERS SET Amount=Amount+'$amount' WHERE Acc_no='$acc_no'";
		$query5="UPDATE Transaction_count SET Trans_count=Trans_count+1";
		
		if($query1_data=mysql_query($query1) && $query2_data=mysql_query($query2) ){
			if($query5_data=mysql_query($query5)){
			echo '<br>'.'Successful';//.$query1_data;
			echo '<h4>Account Number :</h4>'.$acc_no.'<h4>Amount credited:</h4>'.$amount;
			}
		
		else { echo 'Not Done';}}
			}

		else { die('amount entered is not valid');
			}
		}
	

//<a href="index.php"><h1>home</h1></a>
//<a href="logout.php"><h1>logout</h1></a>

?>



