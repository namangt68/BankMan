

<html>
	<head>
	
	<style>
	header {
	    background-color:#0B4C5F;
	    color:white;
	    text-align:center;
	    padding:5px;	 
	}
	nav {
	    line-height:30px;
	    background-color:#eeeeee;
	    height:400px;
	    width:150px;
	    float:left;
	    padding:5px;	      
	}
	section {
	    width:400px;
	    height:400px;
	    float:left;
	    padding:10px;	 	 
	}

	footer {
    		 background-color:#610B0B;
		 color:white;
		 clear:both;
		 text-align:center;
		 padding:0px;	 	 
			}

	</style>
	</head>

	<body>
	<header>
	<h1>MONETA BANK</h1>
	<div align="right"><a href="logout.php" style="text-decoration:none"><font color=white>Logout</font></a></div>
	</header>
	
	<nav>
	<br>
	<a href="debit.php" target="iframe_b" style="text-decoration:none"><font color=blue>Cash Withdrawal</font></a><br><br>
	<a href="transfer.php" target="iframe_b" style="text-decoration:none"><font color=blue>Transfer</font></a><br><br>
	<a href="account_summary.php" target="iframe_b" style="text-decoration:none"><font color=blue>Account Summary</font></a><br><br>
	</nav>

	<section>
	<iframe width="1090px" height="400px" src="oneline.php" frameborder="0" name="iframe_b"></iframe>
	</section>
	
	<footer>
	<h5> Powered by BankMan Systems</h5>
	</footer>

	</body>
	</html>		


