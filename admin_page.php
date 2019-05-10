<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<title>Administrator Page</title>
		<title>User Page</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link type="text/css" rel="stylesheet" href="button.css">
		
		<style>
			body { 
					background-color: #A29393; 
					background-image: url("media/background.jpg");
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
				<li ><a href="Shoppers_Island.php">Home</a></li>
				<li class="active"><a href="#">Profile</a></li>
				<li><a href="feedback.php">Contact</a></li>
				<li><a href="all_users.php"><span class="glyphicon glyphicon-user">Users</a></li>
				<li>
					<i id="sea1"class="glyphicon glyphicon-search"></i>
					<input id="sea" type="text" placeholder="Search" />
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logout_page.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
			</ul>
			</div>
		</div>
		</nav>
		<button type="button" class="btn-add" onclick = "location ='form_inventory.php'" ><i class="glyphicon glyphicon-plus-sign"></i>Add Item</button>
		<button type="button" class="btn-account" onclick = "location ='form_page.php'" ><i class="glyphicon glyphicon-upload"></i>Create Account</button>
		<button type="button" class="btn-update" onclick = "location ='form_inventory.php'" ><i class="glyphicon glyphicon-refresh"></i>Update Item</button>
  </body>
</html>