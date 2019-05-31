<?php
 
  class Db_Functions  
  {
  	private $conn;
  	function __construct()
  	{
  		require_once 'db_connect.php';
  		$db = new DB_Connect();
  		$this->conn = $db->connect();

  	}

  	function __destruct()
  	{

  		
  	}
        public function insertUserDetails($name,$email,$phone,$home_address,$office_address)
      {
        $id=0;
        $stmt = $this->conn->prepare("INSERT INTO test_user(name,email,phone)VALUES(?,?,?)");
        $stmt->bindValue(1,$name);
        $stmt->bindValue(2,$email);
        $stmt->bindValue(3,$phone);
        $result = $stmt->execute();

        if ($result) {

               $id =  $this->conn->lastInsertId();
               $stmt2 = $this->conn->prepare("INSERT INTO test_address(user_id,home_address,office_address)VALUES(?,?,?)");
               $stmt2->bindValue(1,$id);
               $stmt2->bindValue(2,$home_address);
               $stmt2->bindValue(3,$office_address);
               $result = $stmt2->execute();
               return $id;
               
        }

      }

      public function getUserDetails()
    {
      $query = "SELECT name,email,phone,home_address,office_address FROM  test_user
      join test_address ON test_address.user_id=test_user.user_id";
      
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      $users = array();

      if($stmt->execute())
      {
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
        
          $users[] = $row;
          return $users;
      
      }
      
    }


  }

  ?>