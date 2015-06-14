<?php
require 'server_connect.inc.php';
require 'get_logged.inc.php';
if(@($_SESSION['emp_id']==null || $_SESSION['emp_id']=="") && (@($_SESSION['atm']==null ||$_SESSION['atm']=="") || @($_SESSION['pin']==null ||$_SESSION['pin']=="")))
{
die(header('Location:index.php'));
}
?>


<html>
<head>
  <meta charset="utf-8">
  <title>Workspace</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">
</head>



<?php if(@$_SESSION['atm']==null){
echo '<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Employee Workspace</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>';
echo' <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
      
  <li class="active"><a href="debit.php"><i class="fa fa-cubes"></i><!--<span class="badge pull-right">9</span>-->Debit</a></li>

  <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-database"></i>Credit <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="credit_cash.php">Cash</a></li>
              <li><a href="credit_cheque.php">Cheque</a></li>
            </ul>
          </li>
  <li><a href="transfer.php"><i class="fa fa-users"></i>Transfer</a></li>
  <li><a href="account_summary.php"><i class="fa fa-users"></i>Account Summary</a></li>
  <li><a href="update_info.php"><i class="fa fa-cog"></i>Edit Details</a></li>

        </ul>
      </div>';}
else {
echo '<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>ATM Workspace</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>';
echo' <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
      
  <li class="active"><a href="debit.php"><i class="fa fa-cubes"></i><!--<span class="badge pull-right">9</span>-->Cash Withdrawal</a></li>

 
  <li><a href="transfer.php"><i class="fa fa-users"></i>Transfer</a></li>
  <li><a href="account_summary.php"><i class="fa fa-users"></i>Account Summary</a></li>
  

        </ul>
      </div>';}


echo '  <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
              <a href="logout.php" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>

      
    </div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/templatemo_script.js"></script>
';



?>


   


<!--/.navbar-collapse -->
<?php if(@$_SESSION['atm']==null){
      echo'<div class="templatemo-content-wrapper">
        <div class="templatemo-content">

	<div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li><a href="new_customer.php">New Customer</a></li>
                <li class="active"><a href="transaction.php">Transactions </a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Logout</a></li>
              </ul>          
            </div>
          </div>'; 
}
else{
 echo'<div class="templatemo-content-wrapper">
        <div class="templatemo-content">

	<div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                
                <li class="active"><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Logout</a></li>
              </ul>          
            </div>
          </div>'; 

}

?>



<?php if(isset($_POST['Amount']) && !empty($_POST['Amount'])){

	$time=time();
	$date=date("Y/m/d",$time);
	$amount=$_POST['Amount'];
	$_SESSION['amount']=$amount;

	if($amount>0){
		@$atm=$_SESSION['atm'];
		@$pass=$_SESSION['pass'];
		$acc_no=$_SESSION['acc_no'];
		@$Emp_id=$_SESSION['emp_id'];
		if(($Emp_id==null || $Emp_id=="")){
			$remark="ATM_DEBIT";
			$Emp_id="ATM_banker";
			}
		else{
			$remark="DEBIT";
			}
	//echo"$acc_no1";
	$query3="SELECT * FROM CUSTOMERS WHERE Acc_no='$acc_no'";

	if($query3_data=mysql_query($query3)){
		$query3_row=mysql_fetch_assoc($query3_data);
		$a=$query3_row['Amount'];
		//echo"$Emp_id";

		if($amount<=$a){
		if($amount<=100000){
		if($atm!=null || $atm!="" && $amount>10000){
		die('<h4>you cannot withdraw amount more than 10000<br></h4><h2>transaction declined</h2> ');
		}
$query4="SELECT Trans_count FROM Transaction_count";
$query4_data=mysql_query($query4);
$query4_row=mysql_fetch_assoc($query4_data);
		$Trans_id=$query4_row['Trans_count']+1;
$query1="INSERT INTO Transactions(Trans_id,Date,Acc_no,Remark,Amount,Emp_id) VALUES('$Trans_id','$date','$acc_no','$remark','$amount','$Emp_id')";
$query2="UPDATE CUSTOMERS SET Amount=Amount-'$amount' WHERE Acc_no='$acc_no'";
$query5="UPDATE Transaction_count SET Trans_count=Trans_count+1";

			if($query1_data=mysql_query($query1) && $query2_data=mysql_query($query2) ){
				if($query5_data=mysql_query($query5)){
				echo '<span style="color:#0F0691;"><h2>Successful</h2>';//.$query1_data;
				echo '<h4>Account Number :</h4>'.$acc_no.'<h4>Amount debited:</h4>'.$amount;
				}
			else { echo 'Couldnot perform!!<br> Internal error';
				}
				

  			  }
		
		
		}
		else{
		if($atm!=null || $atm!="" && $amount>10000){
		die('<h4>you cannot withdraw amount more than 10000<br></h4><h2>transaction declined</h2> ');
		}
		header('Location:manager_permission.php');
		}
		
	  }
	  else{
			echo 'Your account does not have sufficient balance for this transaction'.'<br>';
			echo 'Your present account balance is'.' '.$a.'<br>';
			  }
	  }
	


}
else{
		die('amount entered is not valid');
	  }
	
}
else {
echo '<h1 align="center"> Debit</h1>
<form role="form" action="debit.php" id="templatemo-preferences-form" method="POST" onsubmit="return validateForm()">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="Amount" class="control-label">Amount</label>
                    <input type="number" class="form-control" id="Amount" name="Amount" placeholder="Enter Amount">                  
                  </div>
</div>
 
<div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>    
                </div>
              </div>
</form>
<script type="text/javascript">
function validateForm() {
	var amount = document.forms[0]["Amount"].value;
    
	if ( amount == null || amount == "") {
	        alert("Fields with * are compulsory");
	        return false;
            } 
	}
</script>';
}?>



</body>
</html>





