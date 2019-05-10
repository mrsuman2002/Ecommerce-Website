<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<title>User Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<style>
			body { 
					background-color: #A29393; 
					background-image: url("media/background.jpg")
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

	<body class="nav" style="color:white; text-align:center">
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
				<li class="active"><a href="#">Profile</a></li>
				<li><a href="feedback.php">Contact</a></li>
				<li>
					<i id="sea1"class="glyphicon glyphicon-search"></i>
					<input id="sea" type="text" placeholder="Search" />
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> View Cart</a></li>
				<li><a href="logout_page.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
				
			</ul>
			</div>
		</div>
		</nav>

        <h2>User Page</h2>
        <?php

			session_start();
 
            if ($_SESSION["type"] == "user"){
					echo "<h1>Welcome back " . $_SESSION["forename"] . ".</h1>";				
				}
			else {
				echo "You do not have permission. Pleas Login First.";
				}          
        ?>
    </body>
</html>
