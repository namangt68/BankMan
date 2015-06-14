	<?php require_once 'server_connect.inc.php';
require_once 'get_logged.inc.php';
if(@($_SESSION['emp_id']==null || $_SESSION['emp_id']==""))
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
    <br><br><br><br><br>
<?php
		echo '<div align="center"><div class="template-page-wrapper"><div class="table-responsive">'.
      
      '<table class="table table-striped table-hover table-bordered">'.
                  '<thead>'.
                    '<tr>'.
                      '<th><a href="new_customer.php"><div align="center">New Customer</div></a></th>
                    </tr>
                  </thead>';
		
    echo '<div class="table-responsive">'.
      
      '<table class="table table-striped table-hover table-bordered">'.
                  '<thead>'.
                    '<tr>'.
                      '<th><a href="transaction.php"><div align="center">Transactions</div></a></th>
                    </tr>
                  </thead>';

    echo'<table class="table table-striped table-hover table-bordered">'.
                  '<thead>'.
                    '<tr>'.
                      '<th><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><div align="center"><i class="fa fa-sign-out"></i>Logout</div></a></th>
                    </tr>
                  </thead></div>';
  
  

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

