<?php 
error_reporting(1);
class Bid //Creating class for bid
{	
   //List of Attributes of Bid Class
       public $itemId;
       private $bidAmount;
       private $startTime;
       private $closeTime;
       public $temp1,$conn;
       function __construct() //constructor function to initiallize the class attributes 
       {
	      $this->itemId = $_SESSION['itemid'];
              $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit"); //variable to store connection to the db.
              $query = mysqli_query($conn,"SELECT * FROM bid WHERE itemid = $this->itemId") or die (mysqli_error()); 
	      $row = mysqli_fetch_array($query);
	      $this->itemId = $row['itemid'];
	      $this->startTime = $row['stime'];
	      $this->closeTime = $row['ctime']; 
	      $this->bidAmount = $row['initialamount'];
	      $query = mysqli_query($conn,"SELECT max(amount) FROM participant WHERE itemid = $this->itemId");
	      $row = mysqli_fetch_array($query);
	      $temp= $row[0];
	     if ($temp > $this->bidAmount)
            {
	         $this->bidAmount= $temp;
		 $query=mysqli_query($conn,"select email from participant where itemid='$this->itemId' and amount='$temp'");
                 $row = mysqli_fetch_array($query);
	         $this->temp1= $row['email'];
            }
	}	  
	  

   public function updateBid() //function to update bid when entered  amount is greater then bid amount.
    {
	     $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit");
             $amt=$_POST['amt'];
	     if($amt >$this->bidAmount){
		   $this->bidAmount=$amt; //Updating bid amount
		   $email=$_SESSION['google_data']['email']; 
		   mysqli_query($conn,"insert into participant values ('$email','$this->itemId',now(),'$amt')"); //inserting participation details of the user for the item.
		   echo"<script>alert('Congratulations!!! you are the highest Bidder');
		   window.location=('bid.php');</script>";
		
				
     }
		 else echo '<script type="text/javascript">alert("You have to bid more than higher bid price");</script>';
     }

   public function sendConfirmationSeller($email)
    {
		$conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit");
                $query = mysqli_query($conn,"SELECT itemname,uploadedBy FROM item WHERE itemid = $this->itemId") or die (mysqli_error()); 
	        $row = mysqli_fetch_array($query);
	        
                $to      = $row['uploadedBy'];
                $subject = 'Status of Auction';
                $headers = 'Bidding Has Done Congratulation ';
                $message = 'Winner of the bid for your Product $abid->temp1';
                mail($to, $subject, $message, $headers);		
		echo '<script type="text/javascript">alert("Congfirmation to seller send successfull");</script>';
    }

    public function sendConfirmationBuyer($buyer)
    {
                $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit");
                $query = mysqli_query($conn,"SELECT itemname FROM item WHERE itemid = $this->itemId") or die (mysqli_error()); 
	        $row = mysqli_fetch_array($query);
	        $name = $row['itemname'];
		$to = "$buyer";
		$subject = "Status Of Auction";
                $headers = 'Bidding Has Done Congratulation ';
		$message = "!!  Congratulations !! You are the winner of the bid for :Product id : ".$this->itemId."Product name :". $name. "please pay the amount of RS :". $this->bidAmount. " Thank You For Participating  ---Team Nitket";

		mail($to, $subject, $messsage, $headers);
		echo '<script type="text/javascript">alert("Congfirmation to buyer send successfull");</script>';
    }
	
    public function printbid() // function to retrieve bid amount from  class
    {
		echo $this->bidAmount;
    }
	
    public function viewTime() // function to retrieve close time from  class
    {
		return $this->closeTime;
    }
	
}

$abid = new Bid; //creating an object of the class Bid.

?>
