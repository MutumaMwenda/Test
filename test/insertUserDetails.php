<?php
 require_once 'db_functions.php';
 $db = new Db_Functions();

 $response = array();

if (
	isset($_POST['name']) &&
	isset($_POST['email']) &&
	isset($_POST['phone']) &&
	isset($_POST['home_address']) &&
	isset($_POST['office_address'])
	) 
	
	
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$home_address = $_POST['home_address'];
	$office_address = $_POST['office_address'];
   


	$row = $db->insertUserDetails($name,$email,$phone,$home_address,$office_address);
	if($row)
	{
		
		$response["message"]= "success";
		//echo json_encode($row);	
		header("Location: display.html");

}
else
{
   $error["error_msg"] = "required parameter(username,email,password) is missing";

   echo json_encode($error);
}


 
}
 
 



?>