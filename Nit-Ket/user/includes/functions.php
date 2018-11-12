<?php
error_reporting(E_ALL);
class Users 
{
	public $tableName = 'users';
	
	function __construct(){
		$dbServer = 'localhost'; 	//Define database server host
		$dbUsername = 'id3736692_nitkit'; 		//Define database username
		$dbPassword = 'nitkit'; 		//Define database password
		$dbName = 'id3736692_nitkit'; 		//Define database name
		
		//connect databse
		$con = new mysqli($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
	function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender,$locale,$link,$picture)
	{
		$prevQuery = mysqli_query(
					$this->connect,
					"SELECT * FROM $this->tableName 
					 WHERE oauth_provider = '".$oauth_provider."' 
					 AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
					 
		if(mysqli_num_rows($prevQuery) > 0)
		{

			echo '<script>console.log("UserFound ");</script>';
			$update = mysqli_query($this->connect,"UPDATE $this->tableName SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', gpluslink = '".$link."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		
		
		}else{
//session_destroy();
			$insert = mysqli_query($this->connect,"INSERT INTO $this->tableName SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', gpluslink = '".$link."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'") or die(mysqli_error($this->connect));			
		
		}
		
		$query = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		$result = mysqli_fetch_array($query);
		return $result;
	}
}
?>
