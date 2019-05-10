<?php //setupusers.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once 'login.php';
  $con = new mysqli($hn, $un, $pw, $db);

  if ($con->connect_error) die($con->connect_error);

  $query = "CREATE TABLE inventory (
    item_id INT(32) NOT NULL UNIQUE,
    item_name  VARCHAR(32) NOT NULL,
    category   VARCHAR(32) NOT NULL,
    quantity INT(32),
    price FLOAT(10,2) NOT NULL
  )";
  $result = $con->query($query);
  if (!$result) die($con->error);

  $item_id = '12345';
  $item_name  = 'iphone X';
  $category     = 'electronics';
  $quantity = '50';
  $price = '1000.99';



  add_item($con, $item_id, $item_name, $category, $quantity, $price);

  $item_id = '12346';
  $item_name = 'Amazon echo';
  $category  = 'electronics';
  $quantity     = '20';
  $price = '30.99';
  

  add_item($con, $item_id, $item_name, $category, $quantity, $price);

  echo 'Table project_users created and populated';
  $con->close();

  function add_item($con, $fn, $sn, $ty, $un, $pw)
  {
    $query  = "INSERT INTO inventory (item_id, item_name, category, quantity, price) "
            . "VALUES('$fn', '$sn', '$ty', '$un', '$pw')";
    $result = $con->query($query);
    if (!$result) die($con->error);
  }
?>
