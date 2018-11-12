<!-- this code includes seller class having two methods uploaditem() to upload an item and viewItem() to see details of item which are uploaded-->
<?php
error_reporting(0);
session_start();
include("../User.php");//INCLUDES USER CLASS
	
class Seller extends User
{		
	public $confirmation;
	public $mail;	
	public $con;
	function __construct()
	{
		$dbServer = 'localhost'; 	//Define database server host
		$dbUsername = 'id3736692_nitkit'; 		//Define database username
		$dbPassword = 'nitkit'; 		//Define database password
		$dbName = 'id3736692_nitkit'; 		//Define database name		
		$con = new mysqli($dbServer,$dbUsername,$dbPassword,$dbName);
		
		if(mysqli_connect_errno())
                {
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
 //FUNCTION TO UPLOAD ITEM BY SELLER	
public function uploadItem()
		{				
			if(isset($_POST['sub']))
			{		
				$itemname=$_POST['item_name'];
				$itemcat=$_POST['item_cat'];
				$itemprice=$_POST['item_price'];
				$itemdescp=$_POST['item_descp'];
				$itemstatus=$_POST['item_status'];
				$target_dir = "image/";
				$target_file = $target_dir.basename($_FILES["Upload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			    $check = getimagesize($_FILES["Upload"]["tmp_name"]);
			    if($check !== false)
				{
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
					echo"<script>window.location=('index.php?loggein=true&seller=1');</script>";
			    }
				else
				{
					echo "File is not an image.";
                                        echo '<a href="index.php?loggein=true&seller=1" >Upload Again</a>';
                                        die();
					$uploadOk = 0;
    			}
				if (file_exists($target_file))
				{
					echo "Sorry, file already exists.";
                                        echo '<a href="index.php?loggein=true&seller=1">Upload Again </a>';
                                        die();
					$uploadOk = 0;
				}
				if ($_FILES["Upload"]["size"] > 5000000)
				{
					echo "Sorry, your file is too large.";
                                        echo '<a href="index.php?loggein=true&seller=1">Upload Again </a>';
                                        die();
					$uploadOk = 0;
				}
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" )
				{
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                         echo '<a href="index.php?loggein=true&seller=1">Upload Again </a>';
                                        die();
					$uploadOk = 0;
				}
				if ($uploadOk == 0)
				{
					echo "Sorry, your file was not uploaded.";
                                        echo '<a href="index.php?loggein=true&seller=1">Upload Again </a>';
                                        die();
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
				$sql="INSERT INTO `item` values('NULL','$itemname','$target_file','$itemdescp','$itemprice','$itemcat','Not Available Create New','$aa')";
				$run=mysqli_query($this->connect,$sql);
				
				if($run){
					header('location:index.php?loggein=true&seller=1&uploaded');
				}
			}
		}
//FUNCTION TO VIEW ITEMS UPLOADED BY SELLER
	public function viewItem($email)
	{        
		echo 'result for email --'.$email;
		$sql = "SELECT * FROM `item` WHERE  `uploadedBy` = '$email'";		
		$result  = mysqli_query($this->connect,$sql);
		$rowcount=mysqli_num_rows($result);
		if($rowcount)
		{	
		
			echo '<table class="table-responsive">';
			echo '<tr>
					<th>Item Id</th>
					<th>Item Name </th>
					<th>Picture</th>
					<th>Description</th>
					<th>Price</th>
					<th>Category</th>
					<th>Status</th>	
                                        <th>New/Update</th>
                                       
                                        <th>View</th>															
			    </tr>';	
		while($r =$result->fetch_assoc())
			{
				echo '<tr>
				<td>'.$r['itemid'].'</td>
				<td>'.$r['itemname'].'</td>
				<td><img src="'.$r['itempicture'].'" height="100" width="100"></td>
				<td style="word-wrap: break-word; width:20%;">'.$r['itemdesc'].'</td>
				<td>'.$r['itemprice'].'</td>
				<td>'.$r['itemcategory'].'</td>
				<td>'.$r['itemstatus'].'</td>';

                                $tt = $r['itemid'];
					$sql2 = "SELECT `ctime` FROM `bid` WHERE `itemid` = '$tt'";		
					$relult2 =mysqli_query($this->connect,$sql2);
					if(mysqli_num_rows($relult2)==0){

						echo '<td><a href="bidding.php?itemid='.$r['itemid'].'">Create Bid</a></td>';
					}else{
						echo '<td><a href="update.php?itemid='.$r['itemid'].'">Update Bid</a></td>';
					}

					echo '<td><a href="view.php?itemid='.$r['itemid'].'">view Bid</a></td></tr>';
				
			}
			echo '</table>';	
		
		}else{				
			echo 'NO RESULT FOUND ...';
		}
	 }  
}

$obj=new Seller();    //OBJECT CREATED OF CLASS SELLER
$obj->uploadItem();	

if(isset($_POST['show_uploaded_by_me'])){
	$obj->viewItem($_SESSION['google_data']['email']);				
}

?>
