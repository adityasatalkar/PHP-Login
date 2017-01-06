<?php
	session_start();

	if(isset($_SESSION['usr_id'])!="")
	{
		header("Location: index.php");
	}

	include_once 'dbconnect.php';

	//check if form is submitted
	if (isset($_POST['login'])) 
	{

		$fname = mysqli_real_escape_string($con, $_POST['fname']);
		$lname = mysqli_real_escape_string($con, $_POST['lname']);

		//MySQLi 
		$result = mysqli_query($con, "SELECT * FROM users WHERE fname = '" . $fname. "' ");


//		$result = mysqli_query($con, "SELECT * FROM users WHERE fname = '" . $fname. "'");

//		$result = mysqli_query($con, "SELECT * FROM users WHERE fname = '" . $fname. "' and lname = '" . $lname . "'");

		if ($row = mysqli_fetch_array($result)) 
		{
			//MySqli Update Query
			$results = mysqli_query($con, "UPDATE users SET lname='" .$_POST["lname"]. "' WHERE fname = '" .$_GET["fname"]. "'");
			echo "updated";
		}
		else 
		{
			$errormsg = "Incorrect fname or Password!!!";
		}

	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP Update Script</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport" >
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	</head>
	<body>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			
			<!-- add header -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img src="njedge200.png" alt="njedge logo"></a>
			</div>

			<!-- menu items -->
			<div class="collapse navbar-collapse" id="navbar1">
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="login.php">Login</a></li>
					<li><a href="register.php">Sign Up</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 well">
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
					<fieldset>
						<legend>Update Information</legend>
						
						<div class="form-group">
							<label for="name">Update First Name</label>
							<input type="text" name="fname" placeholder="Update First Name" required class="form-control" />
						</div>

						<div class="form-group">
							<label for="name">Update Last Name</label>
							<input type="lname" name="lname" placeholder="Update Last Name" required class="form-control" />
						</div>

						<div class="form-group">
							<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
						</div>
					</fieldset>
				</form>
				<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
			</div>
		</div>
	</div>

	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>