<!--defines user class-->
<?php
ERROR_REPORTING(0);
session_start();
class User
{  
    public $userId;
    public $password;
    public $userContact;
    public $userAddress;
    public $userType;
    
    public function __construct()
    {
	$dbServer = 'localhost'; 	//Define database server host
	$dbUsername = 'id3736692_nitkita'; 		//Define database username
	$dbPassword = 'nitkit'; 		//Define database password
	$dbName = 'id3736692_nitkit'; 		//Define database name
			
	$con = new mysqli($dbServer,$dbUsername,$dbPassword,$dbName);
	if(mysqli_connect_errno()){
		die("Failed to connect with MySQL: ".mysqli_connect_error());
	}else{
		$this->connect = $con;
	}	
    }

    //######################################################################

    public function updateProfile($a,$b,$c)
    {
        //echo $a;
        $this->userType = $a;
        $this->userAddress  =$b;
        $this->userContact = $c;
        //echo $this->userContact;
        
        if($this->userType=="S"){
              
              $sql  = "UPDATE `seller` SET `contact` = '$this->userContact' WHERE `seller`.`email` = '$this->userAddress'";
              if(mysqli_query($this->connect,$sql)){                
                    echo 'Contact Number Updated Successfully ..  .. .';
              }else{
                   echo 'Error While Updating Contact Numner ';
              }
        }else if($this->userType=="B"){
              $sql  = "UPDATE `buyer` SET `contact` = '$this->userContact' WHERE `buyer`.`email` = '$this->userAddress'";
              if(mysqli_query($this->connect,$sql)){                 
                    echo 'Contact Number Updated Successfully ..  .. .';
              }else{
                   echo 'Error While Updating Contact Numner ';
              }
        }else{
             echo 'Invalid User Cant Update Contact Number ...';   
        }  
    }
    //######################################################################
    public function getDetail()
    {
        
    } 
}


if(isset($_POST['update_phone'])){  
  $obj = new User();
    if(!preg_match('/[789]\d{9}/',$_POST['contact'])){ echo 'Contact Number is Not valid ';}
    else{ $obj->updateProfile($_POST['user'],$_SESSION['google_data']['email'],$_POST['contact']); }
    
}
