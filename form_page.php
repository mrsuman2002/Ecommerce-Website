<!DOCTYPE html>
<html lang="en">
<head>
    <title >Create Account</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="button.css">
        <style>
            .error {
          color: #ccffcc;
            }
			body { 
					background-color: #A29393; 
          background-image: url("media/background.jpg");
					color: white; 
					text-align: center;
					}
			input{
				color: black;
			}
			#sea{
				text-align: center;
				width: 30em;
				position: absolute;
				top: 1em;
				left: 7em;

			}
			#sea1{
				position: absolute;
				top: 1.4em;
				left: 5.5em;
				color:white;
			}
		</style>
    </style>
</head>

<body >
<nav class="navbar navbar-inverse" ; >

<div class="container-fluid" >

  <div class="navbar-header" >
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
	  <span class="icon-bar" ></span>
	  <span class="icon-bar"></span>
	  <span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="Shoppers_Island.php" >Shoppers Island</a>
  </div>

  <div class="collapse navbar-collapse" id="myNavbar" >
	<ul class="nav navbar-nav">
	  <li><a href="Shoppers_Island.php">Home</a></li>
	  <li><a href="admin_page.php">Profile</a></li>
		<li><a href="feedback.php">Contact</a></li>
		<li>
			<i id="sea1"class="glyphicon glyphicon-search"></i>
			<input id="sea" type="text" placeholder="Search" />
		</li>
	</ul>
  </div>
</div>
</nav>
    <h1 align="center" style="color: white">Create Account page</h1>
    <p align="center" style="color: white" ><span class="error">All form fields must be completed to create a new account.</span></p>

	<?php

	$forename = $surname= $username=$password = "";
	$forenameErr = $surnameErr= $usernameErr=$passwordErr = $formErr="";

	if ($_SERVER['REQUEST_METHOD']=== 'POST'){
		if (isset($_POST['forename'])) 	{
			$forename = $_POST['forename'];
			if (preg_match('/^[a-zA-Z ]+$/',$_POST['forename']) == true)		{
			$forenameErr = "";
			}
			//Throws an error message
			else{
			$forenameErr = "You must provide a forename";
			}
	}
	
		if (isset($_POST['surname'])) 	{
		$surname = $_POST['surname'];
		if (preg_match('/^[a-zA-Z ]+$/',$_POST['surname']) == true)		{
		$surnameErr = "";
		}
		//Throws an error message
		else{
		$surnameErr = "You must provide a surname";
		}
	}
	
		if (isset($_POST['username'])) 	{
		$username = $_POST['username'];
		if (preg_match('/^[a-zA-Z0-9]*$/',$_POST['username']) == true)		{
		$usernameErr = "";
		}
		//Throws an error message
		else{
		$usernameErr = "You must provide a  username";
		}
	}
	
		if (isset($_POST['password'])) 	{
		$password = $_POST['password'];
		if (preg_match('/^[a-zA-Z0-9]*$/',$_POST['password']) == true)		{
		$passwordErr = "";
		}
		//Throws an error message
		else{
		$passwordErr = "You must provide a  password";
		}
	}
	if(($forenameErr=="") && ($surnameErr=="") && ($usernameErr=="") && ($passwordErr=="")){
		$formErr="Account created Success!!!";
				
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

		require_once 'login.php';
		$connection = new mysqli($hn, $un, $pw, $db);
		$salt1    = "%jqk+";
		$salt2    = "@mcbc+";
		$token    = hash('ripemd128', "$salt1$password$salt2");
		$type="user";



		if ($connection->connect_error) {
			die('Connect Error (' . $connection->connect_errno . ') '
					. $connection->connect_error);
		}


		
		$query  = "INSERT INTO project_users (forename, surname, type, username, password) VALUES('$forename', '$surname', '$type', '$username', '$token')";
		$result= $connection->query($query);
		if (!$result){
			echo $connection->error;
			die($connection->error);
		}
		 
		

		echo 'Success... ' . $connection->host_info . "\n";
		$connection->close();

		header('Location: login_page.php');
		exit();
	  
	}

	
	}
	?>
    <form method="post" action="form_page.php" style="color: white">
        Forename: <input type="text" size="35" name="forename" >
		<span class="error"> <?php echo $forenameErr; ?> </span>
        <br>
		<br>
		Surname: <input type="text" size="35" name="surname" >
		<span class="error"> <?php echo $surnameErr; ?> </span>
        <br>
		<br>
		Username: <input type="text" size="35" name="username" placeholder = "letters and numbers only" >
		<span class="error"> <?php echo $usernameErr; ?> </span>
        <br>
		<br>
		Password: <input type="password" size="35" name="password" placeholder = "letters and numbers only" >
		<span class="error"> <?php echo $passwordErr; ?> </span>
        <br>
		<br>
		<span class="error"> <?php echo $formErr; ?>Once account is created, it will redirect to login Page</span>
		<br>
		<br>
        <input type="submit" name="submit" value="Submit">
    </form>
	
</body>
</html>
