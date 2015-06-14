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
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
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
        <!--  <li>
            <form class="navbar-form">
              <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
              <span class="btn btn-default">Go</span>
            </form>
          </li>-->
<!--
          <li><a href="index.html"><i class="fa fa-home"></i>Dashboard</a></li>-->
         <!-- <li class="sub">
            <a href="javascript:;">
              <i class="fa fa-database"></i> Nested Menu <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="#">Aenean</a></li>
              <li><a href="#">Pellentesque</a></li>
              <li><a href="#">Congue</a></li>             
              <li><a href="#">Interdum</a></li>
              <li><a href="#">Facilisi</a></li>
            </ul>
          </li>-->

  <li><a href="debit.php"><i class="fa fa-cubes"></i><!--<span class="badge pull-right">9</span>-->Debit</a></li>

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
  <li class="active"><a href="account_summary.php"><i class="fa fa-users"></i>Account Summary</a></li>
  <li><a href="update_info.php"><i class="fa fa-cog"></i>Edit Details</a></li>
   <!--<li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>-->
        </ul>
      </div><!--/.navbar-collapse -->
<style>.align{align="right"}
</style>
      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
<div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li><a href="new_customer.php">New Customer <span class="badge">42</span></a></li>
                <li class="active"><a href="transaction.php">Transactions <span class="badge">107</span></a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Logout <span class="badge">3</span></a></li>
              </ul>          
            </div>
          </div> 
<?php

$acc_no=$_SESSION['acc_no'];
$query1="SELECT * FROM Transactions  WHERE Acc_no='$acc_no' ";
$query2="SELECT First_name,Amount FROM CUSTOMERS WHERE Acc_no='$acc_no'";
$query1_data=mysql_query($query1);
$query2_data=mysql_query($query2);

if( mysql_num_rows($query1_data)!=0){
	$query2_row=mysql_fetch_assoc($query2_data);
	$first_name =$query2_row['First_name'];
	$amount =$query2_row['Amount'];

	echo 'Name:           '.$first_name.'<br>';
	echo 'Account number:'.$acc_no.'<br>';
	echo 'Balance:       '.$amount.'<br><br><br>';

 echo '<div class="table-responsive">'.
      
      '<table class="table table-striped table-hover table-bordered">'.
                  '<thead>'.
                    '<tr>'.
                      '<th>#</th>'.
                      '<th>Transaction</th>'.
                      '<th>Date</th>'.
                      '<th>Amount</th>
                      <th>Remark</th>
                      <th>Employee ID</th>
                    </tr>
                  </thead>';

	$i=0;
	echo '<tbody>';
	while($query1_row=mysql_fetch_assoc($query1_data)){
		$i+=1;
		$trans_id=$query1_row['Trans_id'];
		$remark=$query1_row['Remark'];
		$amount=$query1_row['Amount'];
		$date=$query1_row['Date'];
		$emp_id=$query1_row['Emp_id'];
		
		if($remark=='CREDIT_CASH'||$remark=='CREDIT_CHEQUE') $color=='success';
		else $color='danger';	


		echo' <tr class='.$color.'>
                      <td>'.$i.'</td>
                      <td>'.$trans_id.'</td>
                      <td>'.$date.'</td>
                      <td>'.$amount.'</td>
                      <td>'.$remark.'</td>
		      <td>'.$emp_id.'</td>	
                      </tr>';
		
			}
		echo '<br>'.'Total number of transactions:   '.$i;
		}

        else {
		echo '<h4>No Transactions have been made</h4>';
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


  </body>
</html>

