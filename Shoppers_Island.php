<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shoppers Island</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
	body {
	background-image: url("media/backg.jpg");
	background-color: #DDDDDD;
	}

    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
	  
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #494848;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 50%; /* Set width to 50% */
	  top: 20px;
      margin: auto;
      min-height:200px;	  
  }
  

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  
  .container text-center {

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
<?php session_start();?>
<nav class="navbar navbar-inverse" ; >

  <div class="container-fluid" >

    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
        <span class="icon-bar" ></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" >Shoppers Island</a>
    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar" >
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
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
        <li><a href="All_items.php">All Items</a></li>
        
        <li><a href="feedback.php">Contact</a></li>
        <li>
			<i id="sea1"class="glyphicon glyphicon-search"></i>
			<input id="sea" type="text" placeholder="Search" />
		</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <?php
        if($_SESSION["type"] =="user" ){ ?>
			 <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> View Cart</a></li>
			<?php 
		} ?>
        <?php
            if($_SESSION["type"] =="admin" || $_SESSION["type"] =="user"){
            ?>
                <li><a href="logout_page.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
             <?php
            } else{ ?> 
             <li><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php
            }
            ?>
			
		</ul>
    </div>
  </div>
</nav>



  <!-- This is slide show -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" style= "background: #705858";>
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="media/ferrero.jpg" style="width:80%; height:80%"  alt="Image">
        <div class="carousel-caption">
          

        </div>      
      </div>

      <div class="item">
        <img src="media/armani.jpg" style="width:58%; height:60%"  alt="Image">
        <div class="carousel-caption">
          
        </div>      
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>


<div class="container text-center" > 

  <h3 style="color:white">What We Sell</h3><br>
  <div class="row">
  
    <div class="col-sm-4">
       <img src="media/lamps.jpg" class="img-responsive" style="width:97%" style="height:100%" alt="Image">
       <form method="post" action="cart.php?action=add&id=21">  
          <div text-align="center">  
               
               <h4 class="text-info">Lamp</h4>  
               <h4 class="text-danger">$ 10.99</h4>  
               <input type="text" name="quantity" class="form-control" value="1" />  
               <input type="hidden" name="hidden_name" value="Lamp" />  
               <input type="hidden" name="hidden_price" value="10..99" />  
               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
          </div>  
     </form> 
    </div>
	
    <div class="col-sm-4"> 
      <img src="media/camera.jpg" class="img-responsive" style="width:95%" style="height:100%" alt="Image">
      <form method="post" action="cart.php?action=add&id=211">  
          <div text-align="center">  
               
               <h4 class="text-info">DSLR</h4>  
               <h4 class="text-danger">$ 500.99</h4>  
               <input type="text" name="quantity" class="form-control" value="1" />  
               <input type="hidden" name="hidden_name" value="DSLR" />  
               <input type="hidden" name="hidden_price" value="500.99" />  
               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
          </div>  
     </form>   
    </div>
	
    <div class="col-sm-4"> 
      <img src="media/boot.jpg" class="img-responsive" style="width:97%" style="height:100%" alt="Image">
      <form method="post" action="cart.php?action=add&id=201">  
          <div text-align="center">  
               
               <h4 class="text-info">Soccer Shoes</h4>  
               <h4 class="text-danger">$ 50.99</h4>  
               <input type="text" name="quantity" class="form-control" value="1" />  
               <input type="hidden" name="hidden_name" value="Soccer Shoes" />  
               <input type="hidden" name="hidden_price" value="50.99" />  
               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
          </div>  
     </form>    
    </div>

	  </div>
</div><br>

<div class="container text-center" > 

 <br>
  <div class="row">
  
    <div class="col-sm-4">
	<video width="600" height="300" autoplay loop muted>
	  <source src="media/Apple's_Macbook_Commercial.mp4" type="video/mp4">
	Your browser does not support the video tag.
	</video>
    </div>
	
	<div class="col-sm-4"></div>
	
    <div class="col-sm-4"> 
      <img src="media/phn.jpg" class="img-responsive" style="width:100%" style="height:100%" alt="Image">
      <form method="post" action="cart.php?action=add&id=12345;" >  
          <div text-align="center">  
               
               <h4 class="text-info">Iphone X</h4>  
               <h4 class="text-danger">$ 1000.99</h4>  
               <input type="text" name="quantity" class="form-control" value="1" />  
               <input type="hidden" name="hidden_name" value="iphone X" />  
               <input type="hidden" name="hidden_price" value="1000.99" />  
               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
          </div>  
     </form>   
    </div>
	
    
	  
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p style="color:white">@ Shoppers Island</p>
</footer>

</body>
</html>
