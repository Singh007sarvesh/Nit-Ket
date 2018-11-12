<?php
 session_start();
 $email=$_SESSION['google_data']['email'];

if(isset($_GET['itemid']))
   {
     $itemid=$_GET['itemid'];
     $_SESSION['itemid']=$itemid;
   }

include_once "../bidclass.php";
$abid = new Bid;
$ctime=$abid->viewTime();
 ?>

  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <style>

         
      </style>

      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <![endif]-->
      <title>View Log</title>      
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <link href="assets/css/font-awesome.css" rel="stylesheet" />
      
     
      <link href="assets/css/style.css" rel="stylesheet" />
     

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

  <!-- Right Div  END-->
  <section class="menu-section">
      <div class="container">
          <div class="row ">
              <div class="col-md-12">
                  <div class="navbar-collapse collapse">
                      <a class="navbar-brand" href="#" style="line-height:50px;">
                        <span style="font-weight:bolder;">Bidding Section</span>
                      </a>

                      <ul id="menu-top" class="nav navbar-nav navbar-right">
                          <li class="pull-left"></li>
                          <li><a href="index.php?loggein=true&buyer=1#" class="menu-top-active" >HOME</a></li>
                          
                            <?php
                                if(isset($authUrl)) {
                                  echo '<li id="glogin"><a href="'.$authUrl.'">Login With Google</a></li>';
                                } else {
                                  echo '<li><a href="logout.php?logout">Logout</a></li>';
                                }
                            ?>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- MENU SECTION END-->
  
  <!-- Slide Show  -->
	<div id="bid2">  
		<center><table border="10">		
		
				<tr >
				
					<th colspan=3><h2 align="center">Winner For Item Id :  <?php echo $itemid; ?> </th></h2> <!--fetch item ID-->
					
				</tr>		
				<tr>
					<th>User</th>
					<th>Date Of Bid</th>
					<th>Amount</th>					
				</tr>				
			<?php
                           $itemid=$_SESSION['itemid'];
			   $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit"); //open a connection to a mysql server
			   $query = mysqli_query($conn,"select max(amount) FROM participant WHERE itemid ='$itemid'");
			   $row = mysqli_fetch_array($query); //fetch a result row as an associated array
			   $maxamount = $row[0]; 
                           $query = mysqli_query($conn,"select email,dateofbid from participant WHERE itemid ='$itemid' and amount='$maxamount'") or die (mysqli_error());
			   $row = mysqli_fetch_array($query);
                           $email = $row['email'];

			   $dateofbid = $row['dateofbid'];
			   $amount = $maxamount
            ?>			
				<tr>
					<td><?php echo $email; ?></td> <!--display User-->
					<td><?php echo $dateofbid; ?> </td> <!--display date of Bid-->
					<td><?php echo $amount; ?> </td> <!--display Amount-->
				</tr>	
					</table></center>
					
		                <form action="view.php" method="post" id="bok2">				
				     <input type="submit" value="Send mail to Winner" name="wmail">				
				</form>




 <script>
      
                                                        
	var t= ("<?php echo $ctime; ?>".split(/[- :]/));  
			var end = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]); 
			   
			var _second = 1000;
			var _minute = _second * 60;
			var _hour = _minute * 60;
			var _day = _hour * 24;
			var timer;
				function showRemaining() {
				   var now = new Date();
				   var distance = end - now;
						if (distance < 0) {
							clearInterval(timer);
					      document.getElementById("bok2").style.visibility='visible';
                                                 return;
					}
						var days = Math.floor(distance / _day);
						var hours = Math.floor((distance % _day) / _hour);
						var minutes = Math.floor((distance % _hour) / _minute);
						var seconds = Math.floor((distance % _minute) / _second);

						
                                                document.getElementById("bok2").style.visibility='hidden';
				}

				timer = setInterval(showRemaining, 1000);
 
	</script>

	<div id="countdown"></div></th>
					</tr>
					


<?php
   if(array_key_exists('wmail',$_POST)){
            echo  $ctime=$abid->viewTime();
               date_default_timezone_set('Asia/Kolkata');
               echo $now = date("Y-m-d H:i:s"); 
               echo $current_timestamp =  strtotime($now);
               echo $close_timestamp =  strtotime($ctime);
                if($current_timestamp>$close_timestamp)
                 {
                 echo $email=$abid->temp1;
                  $abid->sendConfirmationBuyer($email);
                   } 
                else
                  {
                  echo "<script>alert('Bidding havent closed yet')</script>";
                  }
          }
?>


</div>

 </body>
</html>