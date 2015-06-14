<?php
require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';
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

<body>
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
    </div>
    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
      
  <li><a href="debit.php"><i class="fa fa-cubes"></i><!--<span class="badge pull-right">9</span>-->Debit</a></li>

  <li  class="active" class="sub">
            <a href="javascript:;">
              <i class="fa fa-database"></i>Credit <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li   class="active"><a href="credit_cash.php">Cash</a></li>
              <li><a href="credit_cheque.php">Cheque</a></li>
            </ul>
          </li>
  <li><a href="transfer.php"><i class="fa fa-users"></i>Transfer</a></li>
  <li><a href="account_summary.php"><i class="fa fa-users"></i>Account Summary</a></li>
  <li><a href="update_info.php"><i class="fa fa-cog"></i>Edit Details</a></li>

        </ul>
      </div>


<!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
<div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li><a href="new_customer.php">New Customer <span class="badge"></span></a></li>
                <li class="active"><a href="transaction.php">Transactions <span class="badge"></span></a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Logout <span class="badge"></span></a></li>
              </ul>          
            </div>
          </div> 

<h1 align="center"> Credit by Cheque</h1>


<?php

if(isset($_POST['Amount']) && !empty($_POST['Amount']) && isset($_POST['Acc_no1']) && !empty($_POST['Acc_no1']) ){

	$time=time();
	$date=date("Y/m/d",$time);
	$amount=$_POST['Amount'];
	
	if($amount>0){
		$acc_no_debit=$_POST['Acc_no1'];
		$acc_no=$_SESSION['acc_no'];
		$Emp_id=$_SESSION['emp_id'];
		$query3="SELECT * FROM CUSTOMERS WHERE Acc_no='$acc_no_debit'";
		$query3_data=mysql_query($query3);
		if(mysql_num_rows($query3_data)==1){
			$query3_row=mysql_fetch_assoc($query3_data);
			$a=$query3_row['Amount'];
			if($amount<=$a){
			$query7="SELECT Trans_count FROM Transaction_count";
$query7_data=mysql_query($query7);
$query7_row=mysql_fetch_assoc($query7_data);
		$Trans_id=$query7_row['Trans_count']+1;
				$query1="INSERT INTO Transactions(Trans_id,Date,Acc_no,Remark,Amount,Emp_id) VALUES('$Trans_id','$date','$acc_no','CREDIT_CHEQUE','$amount','$Emp_id')";
				$query6="INSERT INTO Transactions(Trans_id,Date,Acc_no,Remark,Amount,Emp_id) VALUES('$Trans_id','$date','$acc_no_debit','DEBIT_CHEQUE','$amount','$Emp_id')";
				$query4="UPDATE CUSTOMERS SET Amount=Amount-'$amount' WHERE Acc_no='$acc_no_debit'";
				$query2="UPDATE CUSTOMERS SET Amount=Amount+'$amount' WHERE Acc_no='$acc_no'";
				$query5="UPDATE Transaction_count SET Trans_count=Trans_count+1";

				if($query1_data=mysql_query($query1) && $query2_data=mysql_query($query2) && $query4_data=mysql_query($query4) && $query6_data=mysql_query($query6)){
					if($query5_data=mysql_query($query5)){
					echo '<span style="color:#0F0691;"><h2>successful</h2>'; //$query1_data;
					echo '<h4>Account Number :</h4>'.$acc_no.'<h4>Amount credited:</h4>'.$amount.'<h4>Cheque bearer:</h4>'.$acc_no_debit;
					}
				else { echo '<h2>Cannot Credit</h2>';
					}
				}}
			else{ 
				echo '<h1>CHEQUE BOUNCED</h1>';
				}
			}
		else{
			echo '<h2>Account number does not exist </h2>';
			}
		}
	else{
		die('<h2>Amount entered is not valid</h2>'); }
		}
		else{
		echo '<form role="form" action="credit_cheque.php" id="templatemo-preferences-form" method="POST" onsubmit="return validateForm()">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="Amount" class="control-label">Amount</label>
                    <input type="number" class="form-control" id="Amount" name="Amount" placeholder="Enter Amount">                  
                  </div>
</div>
          <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="Acc_no1" class="control-label">Account Number</label>
                    <input type="number" class="form-control" id="Acc_no1" name="Acc_no1" placeholder="Account Number">                  
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
			var acc_no1 = document.forms[0]["Acc_no1"].value;
    
		        if ( amount == null || amount == "" || acc_no1== null || acc_no1=="" ) {
        			alert(" All Fields  are compulsory");
			        return false;
        
    				} 
			}
	</script>

</body>
</html>';
		}


echo '      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


