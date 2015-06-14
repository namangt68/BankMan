<?php
require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';
?>

<!DOCTYPE html>	

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


<div class="row margin-bottom-30">
            <div class="col-md-12">
              <ul class="nav nav-pills">
                <li class="active"><a href="new_customer.php">New Customer </a></li>
                <li><a href="transaction.php">Transactions</a></li>
                <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Logout</a></li>
              </ul>          
            </div>
          </div> 

<?php
echo'<div align="center">';
echo'<h1>Create a new Customer Account here.</h1> 
		<p class="margin-bottom-15">Please verify the details.</p>
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="new_customer.php" id="templatemo-preferences-form" method="POST" onsubmit="return validateForm()">
                <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="First_name" class="control-label">First Name</label>
                    <input type="text" class="form-control" id="First_name" name="First_name" placeholder="First Name"" required>                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="Last_name" class="control-label">Last Name</label>
                    <input type="text" class="form-control" id="Last_name" name="Last_name" placeholder="Last Name">                 
                  </div>
                </div> 

		 <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="contactno" class="control-label">Contact Number</label>
                    <input type="text" class="form-control" id="contactno" name="Contact_no" placeholder="Contact Number" required>                  
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="Address" class="control-label">Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" placeholder="Address">                 
                  </div>
                </div>
		
		<div class="row">
                 <div class="col-md-2 margin-bottom-15" align="center"><label>Date of Birth:</label></div>

	        <div class="col-md-2 margin-bottom-15">
                  <label for="month">Month</label>
                  <select class="form-control margin-bottom-15" id="month" name="month" placeholder="MONTH">';
		
		    $i=1;
		while($i<=12)
		  {   echo'<option>'.$i.'</option>';
                   	$i=$i+1;
			}
		echo'</select>
                  
                </div>
		<div class="col-md-2 margin-bottom-15">
                  <label for="day">Day</label>
                  <select class="form-control margin-bottom-15" id="day" name="day" placeholder="DAY">';
		
		    $i=1;
		while($i<=31)
		  {   echo'<option>'.$i.'</option>';
                   	$i=$i+1;
			}
		echo'</select>
                  
                </div>
		<div class="col-md-2 margin-bottom-15">
                  <label for="year">Year</label>
                  <select class="form-control margin-bottom-15" id="year" name="year" placeholder="YEAR">';
		
		    $i=1900;
		while($i<=2005)
		  {   echo'<option>'.$i.'</option>';
                   	$i=$i+1;
			}
		echo'</select>                  
                </div>                  
                  <div class="col-md-2 margin-bottom-15">
                  <label for="Amount" class="control-label">Amount</label>
                  <input type="text" class="form-control" id="Amount" name="Amount" placeholder="Amount">  
                    </div></div>';

			
		 echo '
			
		
               </div><div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>    
                </div>
              </div>
            </form></div>';
/*
<body>
<br><br>
<div align="left">
<div align="center">
	<form action="new_customer.php" method="POST" onsubmit="return validateForm()">
			 First name*:&nbsp;&nbsp;<input type="text" value="" name="First_name"><br><br>
			 Last name*:&nbsp;&nbsp;&nbsp;<input type="text" value="" name="Last_name"><br><br>
			 Address*:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="" name="Address"><br><br>
			
			 Date of Birth:&nbsp;&nbsp; <select name="month"><option>MONTH</option>
			 	 <option value="1">January</option>
	 			 <option value="2">February</option>
				 <option value="3">March</option>
				 <option value="4">April</option>
				 <option value="5">May</option>
				 <option value="6">June</option>
				 <option value="7">July</option>
				 <option value="8">August</option>
				 <option value="9">September</option>
				 <option value="10">October</option>
				 <option value="11">November</option>
				 <option value="12">December</option>
 					</select>
 					<select name="day"><option>DATE</option>
 				 <option value="1">1</option>
				 <option value="2">2</option>
				 <option value="3">3</option>
				 <option value="4">4</option>
				 <option value="5">5</option>
				 <option value="6">6</option>
				 <option value="7">7</option>
				 <option value="8">8</option>
				 <option value="9">9</option>
				 <option value="10">10</option>
				 <option value="11">11</option>
				 <option value="12">12</option>
				 <option value="13">13</option>
				 <option value="14">14</option>
				 <option value="15">15</option>
				 <option value="16">16</option>
				 <option value="17">17</option>
				 <option value="18">18</option>
				 <option value="19">19</option>
				 <option value="20">20</option>
				 <option value="21">21</option>
				 <option value="22">22</option>
				 <option value="23">23</option>
				 <option value="24">24</option>
				 <option value="25">25</option>
				 <option value="26">26</option>
				 <option value="27">27</option>
				 <option value="28">28</option>
				 <option value="29">29</option>
				 <option value="30">30</option>
				 <option value="31">31</option>
 					</select>
					<select name="year">
				 <option>YEAR</option>
				 <option value="2000">2000</option><option value="2001">2001</option>
				 <option value="2002">2002</option>
				 <option value="2003">2003</option>
				 <option value="2004">2004</option>
				 <option value="2005">2005</option>
				 <option value="2006">2006</option>
				 <option value="2007">2007</option>
				 <option value="2008">2008</option>
				 <option value="2009">2009</option>
				 <option value="2010">2010</option>
				 <option value="2011">2011</option>
				 <option value="2012">2012</option>
				 <option value="2013">2013</option>
					</select><br><br>
 				Contact number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" value="" name="Contact_no" max="9999999999" min="7000000000"><br><br>
				Enter initial amount:&nbsp;&nbsp;<input type="number" value="" name="Amount"><br><br>
 <br>
				<input type="submit" value="Submit">
				</form>
</div>
</div>*/?>
<script type="text/javascript">
	function validateForm() {
		var first_name = document.forms[0]["First_name"].value;
		var last_name = document.forms[0]["Last_name"].value;
		var address = document.forms[0]["Address"].value;
    
        if (first_name == null || first_name == "" || last_name == null || last_name == "" || address == null || address == "") {
    	        alert("All Fields are Compulsory");
                return false;
        
    			} 
		}
</script>


</body>
</html>

<?php

if(isset($_POST['First_name']) && !empty($_POST['First_name']) && isset($_POST['Last_name']) && !empty($_POST['Last_name']) && isset($_POST['day']) && !empty($_POST['day']) && isset($_POST['Address']) && !empty($_POST['Address']) && isset($_POST['month']) && !empty($_POST['month']) && isset($_POST['Amount']) && !empty($_POST['Amount']) && isset($_POST['Contact_no']) && !empty($_POST['Contact_no'])){

/*variable from form*/

$first_name=$_POST['First_name'];
$last_name=$_POST['Last_name'];
$address=$_POST['Address'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$amount=$_POST['Amount'];
$contact_no=$_POST['Contact_no'];
$time=time();
$created_on=date("Y/m/d",$time);
$pin=rand(1000,9999);
$i=0;
$Emp_id=$_SESSION['emp_id'];


/*generate random numbers*/
while(1){
	$atm_no=rand(4591000000000000,4591999999999999);
	$acc_no=rand(1230000001,1239999991);


/*concatenating stings*/
	$dob=$year."/".$month."/".$day;

	$query2="SELECT Acc_no,ATM_NO FROM CUSTOMERS WHERE Acc_no='$acc_no' OR ATM_NO='$atm_no'";
	$query2_data=mysql_query($query2);
	//echo $query2_data;

	if(mysql_num_rows($query2_data)==0){
		$query1="INSERT INTO CUSTOMERS(Acc_no,First_name,Last_name,DOB,Contact_no,Address,Created_on,Amount,ATM_NO,PIN,Emp_id) VALUES('$acc_no','$first_name','$last_name','$dob','$contact_no','$address','$created_on','$amount','$atm_no','$pin','$Emp_id')";

		if($query1_data=mysql_query($query1)){
			$query3="SELECT * FROM CUSTOMERS WHERE Acc_no='$acc_no'";
			$query3_data=mysql_query($query3);
			$query3_row=mysql_fetch_assoc($query3_data);
			$first_name=$query3_row['First_name'];
			echo '<h3>Welcome to Moneta Family</h3>'.'<br>';
			echo 'Name :'.$first_name.' '.$last_name.'<br>';
			echo 'Account number:'.$acc_no.'<br>';
			echo 'ATM No:'.$atm_no.'<br>';
			echo 'PIN :'.$pin.'<br>';
			break;
				}
		//else { echo 'not done';
		//		}
			}

	$i=$i+1;
	if($i==1000000){
		echo 'no unique account number exists';
		break;
		   }
	}

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

