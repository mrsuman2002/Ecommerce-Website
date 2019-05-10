<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
				<title>Log in to Shoppers Island</title>
				<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="button.css">
        <style>
		

					body {
	  			background-image: url("media/background.jpg");
					color: white;
					text-align: center;
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
    <body>

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
							<li><a href="login_page.php">Profile</a></li>
							<li><a href="feedback.php">Contact</a></li>
							<li>
								<i id="sea1"class="glyphicon glyphicon-search"></i>
								<input id="sea" type="text" placeholder="Search" />
							</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
						<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> View Cart</a></li>
              <li class="active"><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>
      </nav>

        <?php
		session_start();
		
		if(isset($_SESSION["type"])){
			if($_SESSION["type"] =="admin"){
				header('Location: admin_page.php');
				exit();
			}
			else{
				header('Location: user_page.php');
				exit();
			}
		}
		
		require_once 'login.php';
		$connection = new mysqli($hn, $un, $pw, $db);

		if ($connection->connect_error) die($connection->connect_error);
		  $Error = "";
		  if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
		  $Error = "";
		  $input_username = $_POST['username'];
		  $input_password = $_POST['password'];
		  $salt1    = "%jqk+";
		  $salt2    = "@mcbc+";
          $input_token = hash('ripemd128', "$salt1$input_password$salt2");
		  
		  $query = "SELECT * FROM project_users WHERE username = '$input_username' AND password = '$input_token' ";
          $search_user = $connection->query($query);
          
		  if ($search_user->num_rows){
			  $Error = "";
			 $row = $search_user->fetch_assoc();
			 $record_token = $row['password'];
		
				  $record_type = $_SESSION['type'] = $row['type'];
				  $record_username = $_SESSION['username'] = $row['username'];
				  $record_forename = $_SESSION['forename'] = $row['forename'];
				  
				  if($record_type == "user")
				  {
				  header('Location: user_page.php');
				  exit();
				  } 
				  else if ($record_type == "admin")
				  {
				  header('Location: admin_page.php');
				  exit();
				  }
				  
			  }
			  else
			  {
				$Error = "Username or Password incorrect";  
			  }
		  }
				
	         
        ?>
        <h1 style="text-align:center; color:white"><span style=" font-weight:bold; color: maroon">
                Sign in !</span></h1>
                


		<?php
		echo "$Error";
        ?> </p>
        
        <form method="post" action="login_page.php" style="text-align:center; color:white">
            <label >Username: </label>
            <input type="text" name="username"> <br>
            <label >Password: </label>
            <input type="password" name="password"> <br>
            <input type="submit" value="Log in"><br>
			<button type="button" name="create_account" onclick = "location ='form_page.php'" style="text-align:center; color:black">Create Account</button>
			
        </form>
		

		
</html>
