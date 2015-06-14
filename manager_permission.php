
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
    
    <?php if(@$_SESSION['atm']==null){echo' <div class="template-page-wrapper">
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
else {echo' <div class="template-page-wrapper">
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
<?php
require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';

			if(isset($_POST['Man_id']) && !empty($_POST['Man_id']) && isset($_POST['Password']) && !empty($_POST['Password'])){
			$Man_id=$_POST['Man_id'];
			$Password1=$_POST['Password'];
			$Password1_new=MD5($Password1);
			$time=time();
			$date=date("Y/m/d",$time);
			$amount=$_SESSION['amount'];
			$acc_no=$_SESSION['acc_no'];
			$remark="DEBIT";
			@$Emp_id=$_SESSION['emp_id'];
			$query11="SELECT Emp_id FROM Bank_Manger WHERE Emp_id='$Man_id'";
			$query11_data=mysql_query($query11);
			if(mysql_num_rows($query11_data)==1){
			$query10="SELECT Emp_id FROM Employee WHERE Emp_id='$Man_id' AND Password='$Password1_new'";
			$query10_data=mysql_query($query10);
		
			if(1) {
			

				if(mysql_num_rows($query10_data)==1){
						$emp_id1=mysql_result($query10_data,0,'Emp_id');
						
						$_SESSION['man_id']=$emp_id1;
						}
						
				else if(mysql_num_rows($query10_data)==0){ 
						echo 'Invalid Id and/or password';
						}
					}
	
			if(@($_SESSION['man_id']!=null || $_SESSION['man_id']!="")){
			$query4="SELECT Trans_count FROM Transaction_count";
			$query4_data=mysql_query($query4);
			$query4_row=mysql_fetch_assoc($query4_data);
			$Trans_id=$query4_row['Trans_count']+1;
			$query1="INSERT INTO Transactions(Trans_id,Date,Acc_no,Remark,Amount,Emp_id) VALUES('$Trans_id','$date','$acc_no','$remark','$amount','$Man_id')";
			$query2="UPDATE CUSTOMERS SET Amount=Amount-'$amount' WHERE Acc_no='$acc_no'";
			$query5="UPDATE Transaction_count SET Trans_count=Trans_count+1";

			if($query1_data=mysql_query($query1) && $query2_data=mysql_query($query2) ){
				if($query5_data=mysql_query($query5)){
				echo '<span style="color:#720707;"><h2>Successful</h2>';
				echo '<h4>Account Number :</h4>'.$acc_no.'<h4>Amount debited:</h4>'.$amount;
				}
			else { echo 'Couldnot perform!!<br> Internal error';
				}
				

  			  }
		
		}
		}
		else{
		echo "<h2>Employee is not authorised</h2>";
		}	
		}
		else {
		echo '<h1 align="center"> Debit-Manager login</h1>
<form role="form" action="manager_permission.php" id="templatemo-preferences-form" method="POST" onsubmit="return validateForm2()">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="Manager ID" class="control-label">Manager ID </label>
                    <input type="text" class="form-control" id="Manager ID" name="Man_id" placeholder="Enter ID"> 
		     <label for="Password" class="control-label">Password </label>
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">                                   
                  </div>
</div>
 
<div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Proceed</button>
                  <button type="reset" class="btn btn-default">Reset</button>    
                </div>
              </div>
</form>
	<script type="text/javascript">
		function validateForm2() {
	    		var man=document.forms[0]["Man_id"].value;
	    		var password=document.forms[0]["Password"].value;
    	    		if ( man == null || man == "" || password== null || password=="" ) {
        				alert("Enter Manager id/password");
        				return false;
       					} 
				}
	</script>
	
';
		}
?>



		

