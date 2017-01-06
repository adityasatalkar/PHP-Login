<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<body>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
					<span class="sr-only">Toggle navigation</span>
				</button>
<!--				<a class="navbar-brand" href="index.php"><img src="njedge200.png" alt="njedge logo"></a>-->
			</div>
			<div class="collapse navbar-collapse" id="navbar1">
				<ul class="nav navbar-nav navbar-right">
					<?php if (isset($_SESSION['usr_id'])) { ?>
					<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
					<li><a href="logout.php">Log Out</a></li>
					<?php } else { ?>
					<li><a href="login.php">Login</a></li>
					<li><a href="register.php">Sign Up</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<br>
	<!-- this is what i added to print hello username ! -->
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
			<?php if (isset($_SESSION['usr_id'])) { ?>
				<h2> Hello <?php echo $_SESSION['usr_name']; ?>, </h2>
				<h3> Welcome to NJEdge !</h3>
			<?php } ?>	
		</div>
	</div>

<!--			<div style="width:100%;height:310px;overflow:hidden;">	-->
			<div>
				<iframe src="http://ars75.github.io/" height="600px" width="99%"></iframe>
			</div>

	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

