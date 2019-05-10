<?php   
 session_start();  
 require_once 'login.php';
 $connect = mysqli_connect($hn, $un, $pw, $db);  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           if(!array_key_exists($_GET["id"],$_SESSION["shopping_cart"]) )
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
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
          background-image: url("media/background.jpg");
          background-color: black;
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
   
      <body style="color: white">  
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
		          } ?>
                    <li><a href="feedback.php">Contact</a></li>
                    <li>
					<i id="sea1"class="glyphicon glyphicon-search"></i>
					<input id="sea" type="text" placeholder="Search" />
				</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
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
                <h3 align="center">Shopping Cart</h3><br />  
                <p align="center">Top Selling Items</p><br /> 
                <?php  
                $query = "SELECT * FROM inventory where item_name like 'Gift%'";  
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
                <h3 style="color:red">Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered" style="background-color: black">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>