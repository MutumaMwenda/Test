<?php
 require_once 'db_functions.php';
 $db = new Db_Functions();
 $row = $db->getUserDetails();

  $response= $row;
  echo json_encode($response);

 

?>