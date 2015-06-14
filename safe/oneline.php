
<div align="center">Choose an option from navigation.</div>	

<?php
require_once 'get_logged.inc.php';
require_once 'server_connect.inc.php';
@$acc_no=$_SESSION['acc_no'];
if(!($acc_no==null || $acc_no=="")){
$query1="SELECT * FROM CUSTOMERS WHERE Acc_no='$acc_no'";
$query1_data=mysql_query($query1);
$query1_row=mysql_fetch_assoc($query1_data);
$first_name=$query1_row['First_name'];
$last_name=$query1_row['Last_name'];
$contact_no=$query1_row['Contact_No'];
$dob=$query1_row['DOB'];
$address=$query1_row['Address'];
$amount=$query1_row['Amount'];


echo '<h3>Name:'.$first_name.' '.$last_name.'</h3>';
echo '<h4>Amount:'.$amount.'</h4>';}
?>
