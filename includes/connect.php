<?php
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=database_name', 'username', 'password');
}
catch (PDOException $e)
{
  echo 'Unable to connect to the database server.';
  exit;	
}

?>
