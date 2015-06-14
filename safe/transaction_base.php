<html>
<head>

<style>
header {
    background-color:black;
    color:white;
    text-align:center;
    padding:0px;	 
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

</style>
</head>

<body>

<nav>
<br>
<a href="debit.php" target="iframe_b" style="text-decoration:none"><font color=blue>Debit</font></a><br><br>
<a href="credit.php" target="iframe_b" style="text-decoration:none"><font color=blue>Credit</font></a><br><br>
<a href="transfer.php" target="iframe_b" style="text-decoration:none"><font color=blue>Transfer</font></a><br><br>
<a href="account_summary.php" target="iframe_b" style="text-decoration:none"><font color=blue>Account Summary</font></a><br><br>
<a href="update_info.php" target="iframe_b" style="text-decoration:none"><font color=blue>Update Info</font></a><br><br>
</nav>

<section>
<iframe width="1090px" height="400px" src="oneline.php" frameborder="0" name="iframe_b"></iframe>
</section>

</body>
</html>
