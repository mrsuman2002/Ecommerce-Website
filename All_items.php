<?php

 require_once 'login.php';
 $connect = mysqli_connect($hn, $un, $pw, $db);

 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Shopping Cart of Shoppers Island </title>

           <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

          <link type="text/css" rel="stylesheet" href="button.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

          <style>
        	body {
          background-image: url("media/background.jpg"); }
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

      <body style="color: white">
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
                    <li><a href="Shoppers_Island.php">Home</a></li>
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
		               } ?>
                    <li class="active"><a href="feedback.php">Contact</a></li>
                    <li>
					<i id="sea1"class="glyphicon glyphicon-search"></i>
					<input id="sea" type="text" placeholder="Search" />
				</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> View Cart</a></li>
                    <?php
                    if($_SESSION["type"] =="admin" || $_SESSION["type"] =="user"){
                         ?>
                         <li><a href="logout_page.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
                         <?php
                    }
                    ?>
                    </ul>
                    </div>
               </div>
          </nav>

           <br />
           <div class="container" style="width:700px;">
                <h3 align="center">All Items</h3><br />
                <?php
                $query = "SELECT * FROM inventory ORDER BY item_id ASC";
                $result = mysqli_query($connect, $query);
                if(mysqli_num_rows($result) > 0)
                {
                     while($row = mysqli_fetch_array($result))
                     {
                ?>
                <div class="col-md-4">
                     <form method="post" action="cart.php?action=add&id=<?php echo $row["item_id"]; ?>">
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">

                               <h4 class="text-info"><?php echo $row["item_name"]; ?></h4>
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
                               <input type="text" name="quantity" class="form-control" value="1" />
                               <input type="hidden" name="hidden_name" value="<?php echo $row["item_name"]; ?>" />
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                          </div>
                     </form>
                </div>
                <?php
                     }
                }
                ?>
                <div style="clear:both"></div>
                <br />


           </div>
           <br />
      </body>
 </html>
