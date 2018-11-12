<?php
	//session_start();
	include("../User.php");
	
	class Seller extends User
	{		
		public $confirmation;	
		function __construct()
		{
			$dbServer = 'localhost'; 	//Define database server host
			$dbUsername = 'id3736692_nitkit'; 		//Define database username
			$dbPassword = 'nitkit'; 		//Define database password
			$dbName = 'id3736692_nitkit'; 		//Define database name
			
			$con = new mysqli($dbServer,$dbUsername,$dbPassword,$dbName);
			if(mysqli_connect_errno()){
				die("Failed to connect with MySQL: ".mysqli_connect_error());
			}else{
				$this->connect = $con;
			}
		}
		
		public function uploadItem()
		{				
			if(isset($_POST['sub']))
			{		
				$itemname=$_POST['item_name'];
				$itemcat=$_POST['item_cat'];
				$itemprice=$_POST['item_price'];
				$itemdescp=$_POST['item_descp'];
				//$itemstatus=$_POST['item_status'];
				$target_dir = "image/";
				$target_file = $target_dir.basename($_FILES["Upload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			    $check = getimagesize($_FILES["Upload"]["tmp_name"]);
			    if($check !== false)
				{
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
			    } 
				else
				{
					echo "File is not an image.";
					$uploadOk = 0;
    			}
				if (file_exists($target_file))
				{
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				}
				if ($_FILES["Upload"]["size"] > 5000000)
				{
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
				{
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				if ($uploadOk == 0)
				{
					echo "Sorry, your file was not uploaded.";
				} 
				else
				{
					if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) 
					{
					}
					else 
					{
						echo "Sorry, there was an error uploading your file.";
					}
				}
				$aa =$_SESSION['google_data']['email'];
				$sql="INSERT INTO `item` values('NULL','$itemname','$target_file','$itemdescp','$itemprice','$itemcat','NOT AVAILABLE','$aa')";
				$run=mysqli_query($this->connect,$sql);
				
				if($run){
					header('location:index.php?loggein=true&seller=1&uploaded');
				}
			}
		}
	
    public function viewItem($email)
    {        
		$sql = "SELECT * FROM `item` WHERE 1 `uploadedBy` = '$email'";		
		$result  = $conn->query($sql);
		if($result->num_rows>0)
		{		
			while($r =$result->fetch_assoc())
			{
				echo '<tr><td>'
					.$r['itemid'].'</td><td>'
					.$r['itemname'].'</td><td><img src="'
					.$r['itempicture'].'"></td><td>'
					.$r['itemdesc'].'</td><td>'
					.$r['itemprice'].'</td></tr>'
					.$r['itemcategory'].'</td></tr>'
					.$r['itemstatus'].'</td></tr>';
			}
				echo '</tbody></table>';	
		
		}else{				
			echo 'NO RESULT FOUND ...';
		}
	 } 
      		//view function sends here -----


	 //show upload form 	    
}

$obj=new Seller();
$obj->uploadItem();	

if(isset($_POST['show_uploaded_by_me'])){
	echo '<script>alert("function call");</script>';
	$obj->viewItem($_SESSION['google_data']['email']);				
}

if(isset($_POST['show_uploaded_by_me'])){
	$obj->show_upload_form();	  
}

?>
