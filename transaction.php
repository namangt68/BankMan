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
<div align="center">

<div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li><a href="new_customer.php">New Customer </a></li>
                <li class="active"><a href="transaction.php">Transactions</a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Logout</a></li>
              </ul>          
            </div>
          </div> 

		<br><br>
		<!--<form action="transaction.php" method="POST" onsubmit="return validateForm()">
		
			 Account_Number*:&nbsp;&nbsp;<input type="text" value="" name="Acc_no"><br>
			 First name*:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="" name="First_name"><br> 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit">
		</form>-->

		<script type="text/javascript">
			function validateForm() {
				var first_name = document.forms[0]["First_name"].value;
				var acc_no = document.forms[0]["Acc_no"].value;
    				if (first_name == null || first_name == "" || acc_no == null || acc_no == "") {
        				alert("Fields with * are compulsory");
        				return false;
        					} 
					}	
		</script>
<h1> Existing Customer Transactions.</h1> 
		<p class="margin-bottom-15">Please enter Account Number.</p>
          <div class="row">
            <div class="col-md-12"><div align="center">
              <form role="form" action="transaction.php" id="templatemo-preferences-form" method="POST" onsubmit="return validateForm()">
                
                <div class="col-md-6 margin-bottom-15">
                    <label for="Acc_no" class="control-label">Account Number</label>
                    <input type="text" class="form-control" id="Acc_no" name="Acc_no" placeholder="Account Number" required>                 
               </div> 
		<div class="col-md-6 margin-bottom-15">
                    <label for="First_name" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="First_name" name="First_name" placeholder="First Name" required>                  
                  </div>
                  
                </div> 
		</div><div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>    
                </div>
              </div></div>
            </form></div>
      </body>

</html>

<?php


	
if(isset($_POST['First_name']) && !empty($_POST['First_name']) && isset($_POST['Acc_no']) && !empty($_POST['Acc_no'])){

	/*variable from form*/
	$first_name=$_POST['First_name'];
	$acc_no=$_POST['Acc_no'];
	$_SESSION['acc_no']=$acc_no;

	$query1="SELECT * FROM CUSTOMERS WHERE First_name='$first_name' AND Acc_no='$acc_no'";
	$query1_data=mysql_query($query1);
	
	if(mysql_num_rows($query1_data)==1){
		//echo 'successful'.$query1_data;
		header('Location:debit.php');
		}
	else {
		echo 'Combination of account number/name doesnot exist';}
		}

	//<a href="index.php"><h1>home</h1></a>
        //<a href="logout.php"><h1>logout</h1></a>
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



