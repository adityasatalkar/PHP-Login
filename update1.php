<!--
-->
<?php
/*	session_start();

	if(isset($_SESSION['usr_id'])!="")
	{
		header("Location: index.php");
	}

	include_once 'dbconnect.php';

	//set validation error flag as false
	$error = false;

	//check if form is submitted
	if (isset($_POST['login'])) 
	{

		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

		if ($row = mysqli_fetch_array($result)) 
		{
			$_SESSION['usr_id'] = $row['id'];
			$_SESSION['usr_name'] = $row['name'];
			header("Location: index.php");
		}
		else 
		{
			$errormsg = "Incorrect Email or Password!!!";
		}
	}
*/
?>


<?php
	$servername = "localhost";
	$username = "aditya";
	$password = "aditya";
	$dbname = "xyz";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) 
	{
	    die("Connection failed: " . $conn->connect_error);
	} 

	mysqli_query($con,"UPDATE users SET lname =  '" . $name . "'");

//	$sql = "UPDATE users SET lname='Doe' WHERE id=2";

	if ($conn->query($sql) === TRUE) 
	{
	    echo "Record updated successfully";
	} 
	else 
	{
	    echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>


<!DOCTYPE html>
<html>
	<head>
		<title>PHP Login Script</title>
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

	<br>
	<br>
	<br>
	<br>


	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 well">
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
					<fieldset>
						<legend>Update details</legend>
						
						<div class="form-group">
							<label for="name">Enter First Name</label>
							<input type="text" name="fname" placeholder="First Name" required class="form-control" />
						</div>

				<!--	Originally used for password
						<div class="form-group">
							<label for="name">Last Name</label>
							<input type="password" name="password" placeholder="Your Password" required class="form-control" />
						</div>
				-->
						<div class="form-group">
							<label for="lname">Update Last Name</label>
							<input type="text" name="lname" placeholder="Last Name" required class="form-control" />
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