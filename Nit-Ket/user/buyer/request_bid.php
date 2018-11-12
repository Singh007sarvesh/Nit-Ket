<?php
     session_start();
     $email=$_SESSION['google_data']['email'];
?>
<html>
    <head>
        <title>Request Bid</title>
        <style>
            #container{
                width:100%;
                height:100%;
            }
            #wrapper{
                width:50%;
                height:auto;
                border:1px solid;
                margin-left:20%;
                margin-top:5%;
                box-shadow: 10px 10px 5px 3px;
            }
            label{
                margin-left:15%;
                font-style:bold;
                margin-top:10px;
            }
            form{
                margin-top:6%;
            }
            input{
                margin-top:10px;
            }
            a{
                text-decoration:none;
                color:black;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <a href="index.php?loggein=true&buyer=1" style="margin-left:20%;">Back</a>
            <div id="wrapper">
                <form method="POST" action="request_bid.php">
                    <label>Start Time</label>
                    <input style="margin-left:15px;" type="datetime-local"  name="stime"></br>
                    <label>Close Time</label>
                    <input style="margin-left:10px;" type="datetime-local" name="ctime"></br>
                    <label>Item Request</label>
                    <input type="text" placeholder="Enter Request For Item" name="req_item" required></br>
                    <input style="margin-left:55%;"  type="submit"  name="sub" value="Submit">
                    <a href="viewRequest.php" style="margin-left:70%;">View Request</a>
                </form>
            </div>
        </div>
        <?php 
            $email=$_SESSION['google_data']['email'];
    		$conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit") or die('Cant Connect To server ....');
        	if (isset($_POST['sub'])) //check whether a variable is set or not
        	{
        	    $stime=$_POST['stime'];
        	    $ctime=$_POST['ctime'];
                date_default_timezone_set('Asia/Kolkata');
                $now=date('d-m-Y H:i');
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
                        $name=$_POST['req_item'];
                        $stime;
                        $ctime;
                        $query = mysqli_query($conn, "SELECT * FROM `item` WHERE itemname='$name'");
                        $row = mysqli_fetch_array($query);
                        if($row){
                        $run=mysqli_query($conn,"insert into request values ('NULL','$name','$stime','$ctime','$email','1')"); //function to insert into request table after creating a bid  perform a query against the db.
                    	if($run)
                        {
                            echo"<script>alert('Request successfull');
                    		   window.location=('index.php?loggein=true&buyer=1');</script>";
                        }
                        else
                             echo '<script type="text/javascript">alert("Request not successfull");</script>'; //message displayed
                        }
                        else
                            echo '<script type="text/javascript">alert("Please Request For Valid Item, Its Not Available");</script>';
                    }       		
                }
                else echo '<script type="text/javascript">alert("Start time or close time should be greater than now");</script>'; //message displayed
            }
        ?>
    </body>
</html>