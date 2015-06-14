<?php
require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';
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
      
  <li><a href="debit.php"><i class="fa fa-cubes"></i>Debit</a></li>

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
  <li  class="active"><a href="update_info.php"><i class="fa fa-cog"></i>Update Details</a></li>

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







<?php

	$acc_no=$_SESSION['acc_no'];
	
	$query1="SELECT * FROM CUSTOMERS WHERE Acc_no=$acc_no";
	
	if(isset($_POST['fname']) && !empty($_POST['fname']))
		{	$fname=$_POST['fname'];	
			
			$query="UPDATE CUSTOMERS set First_name='$fname' where Acc_no='$acc_no'";
			$query_=mysql_query($query);
			

		}
	
	if(isset($_POST['lname']) && !empty($_POST['lname']))
		{	$lname=$_POST['lname'];	
			$query="UPDATE CUSTOMERS set Last_name='$lname' where Acc_no='$acc_no'";
			$query_=mysql_query($query);
			

		}
	
	if(isset($_POST['contactno']) && !empty($_POST['contactno']))
		{	$contact_no=$_POST['contactno'];	
			$query="UPDATE CUSTOMERS set Contact_No='$contact_no' where Acc_no='$acc_no'";
			$query_=mysql_query($query);
			

		}


	if(isset($_POST['address']) && !empty($_POST['address']))
		{	$address=$_POST['address'];	
			$query="UPDATE CUSTOMERS set Address='$address' where Acc_no='$acc_no'";
			$query_=mysql_query($query);
			
		}


if($query2=mysql_query($query1)){
	$query4=mysql_fetch_assoc($query2);
	echo'<h1>Update account details here.</h1> 
		<p class="margin-bottom-15">&nbsp;&nbsp;&nbsp;&nbsp;*Please update carefully!</p>
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="update_info.php" id="templatemo-preferences-form" method="POST">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="fname" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="'.$query4['First_name'].'">                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lname" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="'.$query4['Last_name'].'">                 
                  </div>
                </div> 
		<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="contactno" class="control-label">Contact Number</label>
                    <input type="number" class="form-control" id="contactno" name="contactno" placeholder="'.$query4['Contact_No'].'">                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="address" class="control-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="'.$query4['Address'].'">                 
                  </div>
                </div>
		
		<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label>Date of Birth</label>
                    <p class="form-control-static" id="acc_no">'.$query4['DOB'].'</p>
                  </div>
		  <div class="col-md-6 margin-bottom-15">
                    <label>Amount(in Rupees)</label>
                    <p class="form-control-static" id="acc_no">'.$query4['Amount'].'</p>
                  </div>
		
               </div>


		 <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label>Account Number</label>
                    <p class="form-control-static" id="acc_no">'.$query4['Acc_no'].'</p>
                  </div>

                  <div class="col-md-6 margin-bottom-15">
                    <label>ATM Number</label>
                    <p class="form-control-static" id="ATM">'.$query4['ATM_NO'].'</p>
                  </div>
                </div>



 <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn btn-default">Reset</button>    
                </div>
              </div>
			';
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
</body>
</html>
