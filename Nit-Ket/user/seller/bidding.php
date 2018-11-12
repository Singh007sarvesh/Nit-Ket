<!--this code enables the seller to create bid for the item uploaded-->
<!DOCTYPE html>
<?php
    error_reporting(0);
    session_start();
    $email=$_SESSION['google_data']['email'];
    if(isset($_GET['itemid']))
    {
      $itemid=$_GET['itemid'];
      $_SESSION['itemid']=$itemid;
    } 
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
    <link href="assets/css/font-awesome.css" rel="stylesheet" />    
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/seller.css" rel="stylesheet" />    
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
                             <li><a href="index.php?loggein=true&seller=1" class="menu-top-active" >Home</a></li>
                            <li><a href="logout.php?logout" class="menu-top-active" >Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    	<div id="header" style="height:500px;">	
    		<form action="bidding.php" method="post">
				<div class="form-group">
    				        <label for="email">Start time</label>
    					<input type="datetime-local" class="form-control" name="stime">
				</div>
				
                                <div class="form-group">
    				        <label for="pwd">Close Time</label>
    					<input type="datetime-local" class="form-control" name="ctime">				
				<div class="form-group">
    				        <label for="pwd">Initial Amount</label>
					<input type="text" class="form-control" name="amt">
				</div>
				<div class="form-group">
                                        <lable><input id="m_input" type="submit"  name="sub" value="Submit"></label>
    			        </div>
  				
		</form>
    </div>
     <!-- MENU SECTION END-->
   

     <script src="assets/js/jquery-1.11.1.min.js"></script>
     <script src="assets/js/bootstrap.js"></script> 
     <script src="assets/js/wow.js"></script>
     <script src="assets/js/custom.js"></script>


	<?php 
	 if (isset($_POST['sub'])) //check whether a variable is set or not
	 {
	  $stime=$_POST['stime'];
	  $ctime=$_POST['ctime'];
          date_default_timezone_set('Asia/Kolkata');
          $now=date('d-m-Y H:i');
          $itemid=$_SESSION['itemid'];
	  $a = strtotime($ctime); 
	  $b =  strtotime($stime);
          $current_timestamp =  strtotime($now);

     if($current_timestamp<$a && $current_timestamp<$b)
       {
         

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
     $run=mysqli_query($conn,"insert into bid values ('$itemid','$stime','$ctime','$amt')"); //function to insert into bid table after creating a bid  perform a query against the db.
	 if($run)
     {
	 $run1=mysqli_query($conn,"update item set itemstatus='Available' where itemid='$itemid'"); //function to update item status into item  table after creating a bid perform a query against the db.
       echo"<script>alert('Bid created successfull');
		   window.location=('index.php?loggein=true&seller=1');</script>";
     }
     else
         echo '<script type="text/javascript">alert("Bid not created");</script>'; //message displayed
   }       		
  }
 else echo '<script type="text/javascript">alert("Start time or close time should be greater than now");</script>'; //message displayed
 }
?>
</body>
</html>
