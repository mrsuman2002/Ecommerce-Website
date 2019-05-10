<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inventory</title>
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
                    color: black;

                    }
            input, select {
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
      <li><a href="admin_page.php">Profile</a></li>
      <li><a href="feedback.php">Contact</a></li>
      <li>
			<i id="sea1"class="glyphicon glyphicon-search"></i>
			<input id="sea" type="text" placeholder="Search" />
		</li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout_page.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
    </ul>
  </div>
</div>
</nav>

    <h3 style="color: white; text-align: center;">Add Item </h3>
    <p style="color: white; text-align: center;"><span class="error">All form fields must be completed to add the item.</span></p>

	<?php



	if ($_SERVER['REQUEST_METHOD']=== 'POST'){
        $item_id = $_POST['item_id'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];

		if (isset($_POST['item_name'])) 	{
			$item_name = $_POST['item_name'];
			if (preg_match('/^[a-zA-Z ]+$/',$_POST['item_name']) == true)		{
			$item_nameErr = "";
			}
			//Throws an error message
			else{
			$item_nameErr = "You must provide a Item Name";
			}
        }

		if (isset($_POST['price'])) 	{
			$price = $_POST['price'];
			if (preg_match('/^[0-9]+\.[0-9]+$/',$_POST['price']) == true)		{
			$priceErr = "";
			}
			//Throws an error message
			else{
			$priceErr = "You must provide a price. Eg:2.99";
			}
        }

    	if(($item_nameErr=="") && ($priceErr=="") ){
            $formErr="Account created Success!!!";

            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            require_once 'login.php';
            $connection = new mysqli($hn, $un, $pw, $db);


            if ($connection->connect_error) {
                die('Connect Error (' . $connection->connect_errno . ') '
                        . $connection->connect_error);
            }

            $query = "SELECT item_id FROM inventory WHERE item_id = '$item_id'";
            $result= $connection->query($query);
            if (!$result){
                echo $connection->error;
                die($connection->error);
            }

            $row = $result->fetch_assoc();
            if($row){
                //updating the already exiting database
                $query  = "UPDATE inventory SET item_name='$item_name', category='$category',quantity='$quantity', price='$price' WHERE item_id='$item_id'";
                $result= $connection->query($query);
                if (!$result){
                    echo $connection->error;
                    die($connection->error);
                }
            }
            else {

                // adding the new item to the database
                $query  = "INSERT INTO inventory (item_id, item_name, category, quantity, price) VALUES('$item_id', '$item_name', '$category', '$quantity', '$price')";
                $result= $connection->query($query);
                if (!$result){
                    echo $connection->error;
                    die($connection->error);
                }
           }

           // echo 'Success... ' . $connection->host_info . "\n";
            $connection->close();

          //header('Location: login_page.php');
         //exit();

        }
	}
    ?>

    <br>
    <form method="post" action="form_inventory.php" style="color: white; position: absolute; left: 40%;" >
        Item ID: <input type="number" size="35" name="item_id" >
        <br>
        <br>

        Item Name: <input type="text" size="35"  name="item_name" >
		<span class="error"> <?php echo $item_nameErr; ?> </span>
        <br>
        <br>

        Category:
        <select name="category" style="color:black;">
        <option value="electronics">Electronics</option>
        <option value="beauty_and_health">beauty and health</option>
        <option value="books">Books</option>
        <option value="clothing">Clothing</option>
        <option value="unknown" selected > Unknown </option>
        </select>
        <br>
        <br>
        Quantity: <input type="number" size="35" name="quantity" >

        <br>
		<br>
        Price: <input type="text" size="35" name="price"  >
		<span class="error"> <?php echo $priceErr; ?> </span>
        <br>
        <br>

        <input type="submit"  name="submit" value="Submit">
    </form>


</body>
</html>
