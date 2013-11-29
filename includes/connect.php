<?php
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=yuriib_assesment', 'yuriib', '239238hH');
}
catch (PDOException $e)
{
  echo 'Unable to connect to the database server.';
  exit;	
}


?>
