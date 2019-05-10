<?php //setupusers.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);

  if ($connection->connect_error) die($connection->connect_error);

  $query = "CREATE TABLE project_users (
    forename VARCHAR(32) NOT NULL,
    surname  VARCHAR(32) NOT NULL,
    type     VARCHAR(10) NOT NULL,
    username VARCHAR(32) NOT NULL UNIQUE,
    password VARCHAR(32) NOT NULL
  )";
  
  $result = $connection->query($query);
  if (!$result) die($connection->error);

  $salt1    = "%jqk+";
  $salt2    = "@mcbc+";

  $forename = 'Jon';
  $surname  = 'Snow';
  $type     = 'user';
  $username = 'jsnow';
  $password = 'dragongirl';
  $token    = hash('ripemd128', "$salt1$password$salt2");



  add_user($connection, $forename, $surname, $type, $username, $token);

  $forename = 'Super';
  $surname  = 'User';
  $type     = 'admin';
  $username = 'admin';
  $password = 'admin';
  $token    = hash('ripemd128', "$salt1$password$salt2");

  add_user($connection, $forename, $surname, $type, $username, $token);

  echo 'Table project_users created and populated';
  $connection->close();

  function add_user($connection, $fn, $sn, $ty, $un, $pw)
  {
    $query  = "INSERT INTO project_users (forename, surname, type, username, password) "
            . "VALUES('$fn', '$sn', '$ty', '$un', '$pw')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
?>
