<!--this code enables the seller to update bid for the item for which bid is already created by him-->
<!DOCTYPE html>
<?php
  session_start();
  $email=$_SESSION['google_data']['email'];
 if(isset($_GET['itemid']))
   {
     $itemid=$_GET['itemid'];
     $_SESSION['itemid']=$itemid;
   } 
              $itemid=$_SESSION['itemid'];
              $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit"); //variable to store connection to the db.
              $query = mysqli_query($conn,"SELECT * FROM `bid`"); 
	      $row = mysqli_fetch_array($query);
	      $startTime = $row['name'];
	      $closeTime = $row['ctime']; 
	      $bidAmount = $row['initialamount'];
  ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Bid</title>
   
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
   
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/seller.css" rel="stylesheet" />
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
     <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css' />
    
</head>
<body>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="right-div">
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                             <li><a href="index.php?loggein=true&buyer=1" class="menu-top-active" >Home</a></li>
                            <li><a href="logout.php?logout" class="menu-top-active" >Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    	<div id="header" style="height:500px;">	
    		<form action="update.php" method="post">
				<div class="form-group">
    				<label for="email">Start time</label>
    					<input type="datetime-local" class="form-control" name="stime" placeholder="<?php echo $startTime; ?>" id="datepicker">

				</div>
				<div class="form-group">
    				<label for="pwd">Close Time</label>
    					<input type="datetime-local" class="form-control" name="ctime" placeholder="<?php echo $closeTime; ?>" id="datepicker2">
				
				<div class="form-group">
    				<label for="pwd">Initial Amount</label>
					<input type="text" class="form-control" name="amt" placeholder="<?php echo $bidAmount; ?>">
				</div>
				<div class="form-group">
    			</div>
  				<lable><input id="m_input" type="submit"  name="update" value="update"></label>
		</form>
    </div>
   
    
    <script src="assets/js/jquery-1.11.1.min.js"></script>
       <script src="assets/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <script>
         $(function() {
            $( "#datepicker").datetimepicker({
                    locale: 'ru'
                });
         });
        $(function() {
            $( "#datepicker2" ).datepicker();
         });
         
    </script>


 
   
	<?php 
	 if (isset($_POST['update'])) //check whether a variable is set or not
	 {
	  $stime=$_POST['stime'];
	  $ctime=$_POST['ctime'];
          $itemid=$_SESSION['itemid'];
	  $a = strtotime($ctime); 
	  $b =  strtotime($stime);

	  $diff = $a-$b; // check  difference between start time and end time.
	  $years = floor($diff / (365*60*60*24)); // Calculating year
	  $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); //Calculating month
          $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); //Calculating Days
	  $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); //calculating Hours

if($diff<0) //Check end date should greater than start date or not
{
    echo '<script type="text/javascript">alert("Close date time should be greater than start date time");</script>';
}
else if($days==0 && $hours<2) // check start date and end date is minimum 2 hours or not
{
    echo '<script type="text/javascript">alert("Bidding will be done for minimum 2 hour");</script>';
}
else
{ 
     $amt=$_POST['amt'];
     $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit"); //open a connection to a mysql server
     $run=mysqli_query($conn,"UPDATE `bid` SET `stime`='$stime',`ctime`='$ctime',`initialamount`='$amt' WHERE itemid='$itemid'"); //function to update into bid table.
	 if($run)
     {
	 echo"<script>alert('Bid updated successfully');
	 window.location=('index.php?loggein=true&seller=1');</script>";
     }
     else
         echo '<script type="text/javascript">alert("Bid not updated");</script>'; //message displayed
  }       		
	 }
?>
</body>
</html>
