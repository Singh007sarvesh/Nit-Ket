<?php 
error_reporting(1);
class Bid //Creating class for bid
{	
   //List of Attributes of Bid Class
    public $itemId;
    public $itemName;
    private $bidAmount;
    private $startTime;
    private $closeTime;
    public $email,$conn;
   function __construct() //constructor function to initiallize the class attributes 
   {
        $this->itemId = $_SESSION['itemid'];
        $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit"); //variable to store connection to the db.
        $query = mysqli_query($conn,"SELECT * FROM request WHERE r_Id = $this->itemId") or die (mysqli_error()); 
        $row = mysqli_fetch_array($query);
        $this->itemId = $row['r_Id'];
        $this->itemName = $row['name'];
        $this->startTime = $row['start'];
        $this->closeTime = $row['end']; 
        // $this->bidAmount = $row['amount'];
        $query = mysqli_query($conn,"SELECT min(amount) FROM revparticipant WHERE r_Id = $this->itemId");
        $row = mysqli_fetch_array($query);
        $temp= $row[0];
        if ($temp!=NULL)
        {
            $this->bidAmount= $temp;
            $query=mysqli_query($conn,"select email from revparticipant where r_Id='$this->itemId' and amount='$temp'");
             $row = mysqli_fetch_array($query);
            $this->email= $row[0];
        }
	}	  
    public function updateBid() //function to update bid when entered  amount is greater then bid amount.
    {
        $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit");
        $amt=$_POST['amt'];
       
        if($this->bidAmount==NULL || $amt <$this->bidAmount)
        {
            $this->bidAmount=$amt; //Updating bid amount
            $email=$_SESSION['google_data']['email']; 
            mysqli_query($conn,"insert into revparticipant values ('$email','$this->itemId',now(),'$amt')"); //inserting participation details of the user for the item.
            echo"<script>alert('Congratulations!!! you are the Lowsest Bidder');
            window.location=('bid.php');</script>";
        }
        else echo '<script type="text/javascript">alert("You have to bid less than the bid price");</script>';
    }
    public function sendConfirmationSeller($temail,$email)
    {
        $to      = $temail;
        $subject = 'Status of Auction';
        $headers = 'Bidding Has Done Congratulation ';
        $message = "Winner of the bid for your Product "." ".$email;
        mail($to, $subject, $message, $headers);		
        echo '<script type="text/javascript">alert("Congfirmation to seller send successfull");</script>';
    }
    public function printbid() // function to retrieve bid amount from  class
    {
		echo $this->bidAmount;
    }
    public function viewTime() // function to retrieve close time from  class
    {
		return $this->closeTime;
    }
    
    public function viewStartTime() // function to retrieve close time from  class
    {
		return $this->startTime;
    }
}
$bid = new Bid; //creating an object of the class Bid.
?>