<!--
this page contains all the forms required for logging inside for transactions via atm, or as employee...
this page even gives you a link to go to the lighter version our bank
-->



<?php
require 'server_connect.inc.php';
session_start();							//to start login session
?>
<?php
/*
 * takes data  from user.....recives atm number and pin*/
if(isset($_POST['ATM_NO']) && !empty($_POST['ATM_NO']) && isset($_POST['PIN']) && !empty($_POST['PIN']) ){
		
		$atm_no=$_POST['ATM_NO'];
		$pin=$_POST['PIN'];
		$query1="SELECT Acc_no FROM CUSTOMERS WHERE ATM_NO='$atm_no' AND PIN='$pin'";	//query to check weather atm number and pin 
		
		if($query1_data=mysql_query($query1)){
			
			if(mysql_num_rows($query1_data)==1){
					$_SESSION['atm']=$atm_no;
					$_SESSION['pin']=$pin;
					$acc_no=mysql_result($query1_data,0,'Acc_no');
					$_SESSION['acc_no']=$acc_no;
										
					header('Location:index.php');
					
			}
			
			else if(mysql_num_rows($query1_data)==0){
					echo 'Invalid ATM NUMBER and/or PIN';
				}
		}

}
	
	?>
        
<?php
/*
 * takes data  from user.....recives employee id and password*/
if(isset($_POST['Emp_id']) && !empty($_POST['Emp_id']) && isset($_POST['Password']) && !empty($_POST['Password'])){
			$Emp_id=$_POST['Emp_id'];
			$Password=$_POST['Password'];
			$Password_new=MD5($Password);

			$query1="SELECT Emp_id FROM Employee WHERE Emp_id='$Emp_id' AND Password='$Password_new'";		//query to check employee in office

			if($query1_data=mysql_query($query1)) {

				if(mysql_num_rows($query1_data)==1){
						$emp_id=mysql_result($query1_data,0,'Emp_id');
						
						$_SESSION['emp_id']=$emp_id;
						header('Location:index.php');

				    }
						
				else if(mysql_num_rows($query1_data)==0){ 
						echo 'Invalid username and/or password';
				    }
			}
	
    }

			
?>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a responsive product landing page.">

<title>MONETA BANK</title>
<link rel="stylesheet" href="pure-release-0.5.0/pure.css">
<link rel="stylesheet" href="pure-release-0.5.0/grids-responsive.css">
<link rel="stylesheet" href="css/layouts/marketing.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
</head>


<body>
<a name="Home"></a>

<div class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="http://students.iitmandi.ac.in/~v_kumar/BankMan_final/home.php">MONETA BANK</a>

        <ul>
            <li class="pure-menu-selected"><a href="#Home">Home</a></li>
            <li><a href="#ATM">ATM</a></li>
            <li><a href="#Employee">Employee</a></li>
	    <li><a href="http://students.iitmandi.ac.in/~naman_g/BankMan_final/BanKMan/">Lite Edition</a></li>
           <li><a href="http://students.iitmandi.ac.in/~naman_g/BankMan_final/about/index.html">About us </a></li>
        </ul>
    </div>
</div>
<style>.anchor{padding-top: 1px;}
</style>

<img   width="100%" height="600" src="online_banking.jpg">
        
<div class="content-wrapper">
<style>.anchor{padding-top: 1px;}</style>
<a class="anchor" name="Employee"></a>
    <div class="content">
        <h2 class="content-head is-center">EMPLOYEE LOGIN</h2>
	<div class="pure-g">
		<div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                <h4>Warning:</h4>
                <p>
                   IF YOU ARE NOT ONE OF THE AUTHORIZED PERSON TO USE THIS FACILITY, THEN DON'T TRY TO USE IT. 
                </p>

                <h4>Instructions:</h4>
                <p>
                   1. Use your Employee ID and Password here.
		   2. Use this facility at secure locations only.
		   3. If there is an issue with your login, contact your supervior immediately.	
                </p>
		</div>
		
		<div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <form class="pure-form pure-form-stacked" role="form" action="home.php" method="POST">
                    <fieldset>

                        <label for="name">Employee ID</label>
                        <input type="text" id="Emp_id" name="Emp_id" placeholder="Employee ID" required>

                        <label for="password">Your Password</label>
                        <input type="password" id="Password" name="Password"  placeholder="Your Password" required>

                        <button type="submit" class="pure-button">Sign in</button>
                    </fieldset>
                </form>
		</div>
        </div>

    </div>
    
    

<style>
.color{color: white;}
.color1{color: red;}
</style>
<a class="anchor" name="ATM"></a>
    <div class="ribbon l-box-lrg pure-g">
		<h2 class="content-head is-center"><div class="color">ATM Login</div></h2>

        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <form class="pure-form pure-form-stacked" role="form" action="home.php" method="POST" >
                    <fieldset>

                        <label for="name"><div class="color">ATM Number</div></label>
                        <input type="text" id="ATM_NO" name="ATM_NO" placeholder="Your ATM Number" required>

                        <label for="password"><div class="color">PIN</div></label>
                        <input type="password" id="PIN" name="PIN" placeholder="Your PIN" required>
			
                        <button type="submit" class="pure-button">Login</button>
                    </fieldset>
                </form>
            </div>


            <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                <h4 class="color1">Instructions:</h4>
                <p> 1. Keep your PIN secure. 
		    2. In case you have lost it, contact our employees for generation of a new PIN.
                    
                </p>

                <h4 class="color1">Need Help?</h4>
                <p>	If you are using ATM for first time, then you are welcome to seek help from our customer service.
		</p>
            </div>
</div>
      
    </div>


<div class="content">
        <h2 class="content-head is-center">COMMITED TO EXCELLENCE.</h2>

        <div class="pure-g">
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">

                <h3 class="content-subhead">
                    <i class="fa fa-rocket"></i>
                    Get Started Quickly
                </h3>
                <p>
                    Contact our front-end representatives to open an account with us.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-mobile"></i>
                    Immediate Registration 
                </h3>
                <p>
                    As you join us, you are provided with an Account Number, ATM Number and PIN.
                </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-th-large"></i>
                    Security
                </h3>

                <p>
                    All our money transactions are safe, secure and organised.
                 </p>
            </div>
            <div class="l-box pure-u-1 pure-u-md-1-2 pure-u-lg-1-4">
                <h3 class="content-subhead">
                    <i class="fa fa-check-square-o"></i>
                    Your satisfaction is our motto.
                </h3>
                <p><a name="ATM"></a>
                    Our representatives will be available 24X7 to your issues.
                </p>
            </div>
        </div>
    </div>






    <div class="footer l-box is-center">
        Powered by BankMan Systems
	copyrights@BankMan Team
    </div>

</div>






</body>
</html>


