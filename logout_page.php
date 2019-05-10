<!DOCTYPE html>
<html class="html_logout">
    <head>
        <title>Logged Out</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="button.css">
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
    <?php
		session_start();
		session_unset();
		session_destroy();

    ?>
    <body class="nav" style="color:white ; text-align:center">

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
              <li><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>
      </nav>

        <h1>Logged Out</h1>
        <p>
            You are now logged out of the website.<br>
        </p>
    </body>
</html>
