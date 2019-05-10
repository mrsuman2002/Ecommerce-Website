
<!DOCTYPE html>
<html lang="en">
<head>
    <title >Feedback</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <style>
            .error {
          color: #ccffcc;
						}
						
			body { 	
					background-image: url("media/background.jpg");
					text-align:center;
					color: white;
                    
					}
					input, button {
					margin-bottom: 0.5em;
					color:black;
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

</head>

<body >
	<?php session_start(); ?>
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
		<li ><a href="Shoppers_Island.php">Home</a></li>
		<?php 
		if($_SESSION["type"] =="admin" ){ ?>
			<li><a href="admin_page.php">Profile</a></li>
			<?php 
		} else if($_SESSION["type"] =="user"){?>
			<li><a href="user_page.php">Profile</a></li>
			<?php 
		} else{ ?>
				<li><a href="login_page.php">Profile</a></li>
				<?php
		}  
		if($_SESSION["type"] =="admin" ){ ?>
			<li><a href="all_users.php"><span class="glyphicon glyphicon-user">Users</a></li>
			<?php 
		} ?>
		<li class="active"><a href="#">Contact</a></li>
		<li>
					<i id="sea1"class="glyphicon glyphicon-search"></i>
					<input id="sea" type="text" placeholder="Search" />
				</li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
  <?php
		if($_SESSION["type"] =="admin" || $_SESSION["type"] =="user"){ ?>
    	<li><a href="logout_page.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
			<?php  
		}  ?>
	</ul>
  </div>
</div>
</nav>
    <h1  style="color: white; text-align=center">Feedback Page</h1>
    <p  style="color: white; text-align=center" ><span class="error">All form fields must be completed to submit the feedback.</span></p>

	<?php

	$forename = $surname= $email = "";
	$forenameErr = $surnameErr= $emailErr="";

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
	
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		if (preg_match('/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]+$/',$_POST['email']) == true )
		{
		$emailErr = "";
		}
	
		else
		{
			$emailErr = "You must provide a valid email address";
		}
	}
	
	
	}
	if(($forenameErr=="") && ($surnameErr=="") && ($emailErr=="") ){
		$formErr="Form Submission Success";
		$to      = 'sumanadhikari04@gmail.com';
		$message = '$_POST["feedback"]';
		$headers = 'From: $_POST["email"]' . "\r\n" .
				'Reply-To: $_POST["email"]' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
		
		mail($to,"From Shoppers Island", $message, $headers);
				
		error_reporting(E_ALL);
		ini_set('display_errors', 1);

			  
	}


	?>
    <form method="post" action="feedback.php" >
    Forename: <input type="text" size="35" name="forename" >
		<span class="error"> <?php echo $forenameErr; ?> </span>
        <br>
		<br>
		Surname: <input type="text" size="35" name="surname" >
		<span class="error"> <?php echo $surnameErr; ?> </span>
        <br>
		<br>
		email: <input type="text" size="35" name="username" placeholder = "letters and numbers only" >
		<span class="error"> <?php echo $emailErr; ?> </span>
        <br>
		<br>
		Please provide feedback for our website:<br>
		<textarea name = "feedback" rows="5" cols="50" style="color:black"></textarea >
		<br>
		<span class="error" style="color: white";> <?php echo $formErr; ?>Once account is created, it will redirect to login Page</span>
		<br>
		<br>
    <input type="submit" name="submit" value="Submit" style="color:black">
    </form>
	
</body>
</html>
