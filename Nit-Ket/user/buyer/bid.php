<?php 

 session_start(); //creating session & storing session variable into local variables.
  $email=$_SESSION['google_data']['email'];
  
   if(isset($_GET['itemid']))
   {
        $itemid=$_GET['itemid'];
        $_SESSION['itemid']=$itemid;
   } //End of Session

include_once "../bidclass.php";

$abid = new Bid; //creating an object of the class Bid.

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
      <title>Bidding Page</title>      
      <link href="assets/css/bootstrap.css" rel="stylesheet" />
          
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
		<table>		
		
				<tr >
					<th ><p id="bid1">Item ID:</th>
					<th><?php echo $abid->itemId; ?></p> </th>
				</tr>

				<tr>
					<th><p id="bid1">Highest Bid:</th>
					<th><?php $abid->printbid(); ?></p> </th>
					
				</tr>

				<tr>
					<th><p id="bid1">Highest Bidder: </p></th>
					<th><?php echo $abid->temp1; ?></th>
				</tr>


				<tr>
					<th><p id="bid1">Time Left to Bid:</p></th>
					<th><?php $closetime = $abid->viewTime(); ?>

       <!-- Display countdown for time left to bid for the item -->

	 <script>
      
                                                        
	var t= ("<?php echo $closetime; ?>".split(/[- :]/));  
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
							document.getElementById('countdown').innerHTML = 'Bidding Closed';
							document.getElementById("bok").style.display='none';
                                                   document.getElementById("bok1").style.visibility='visible';
                                                 return;
					}
						var days = Math.floor(distance / _day);
						var hours = Math.floor((distance % _day) / _hour);
						var minutes = Math.floor((distance % _hour) / _minute);
						var seconds = Math.floor((distance % _minute) / _second);

						document.getElementById('countdown').innerHTML = days + ' days ';
						document.getElementById('countdown').innerHTML += hours + ' hrs ';
						document.getElementById('countdown').innerHTML += minutes + ' mins ';
						document.getElementById('countdown').innerHTML += seconds + 'secs';
                                                document.getElementById("bok1").style.visibility='hidden';
				}

				timer = setInterval(showRemaining, 1000);
 
	</script>

	<div id="countdown"></div></th>
					</tr>
					
					</table>
					
					
				<form action="bid.php" method="post" id="bok">
				
				<p id="bid1">Enter Bid Amount:</p>
				<input id="bid1" type="text" name="amt" pattern="\d{1,10}"></br><input id="bid3" type="submit" value="Place Bid" name="sub">
				
				</form>	

                              <?php
                                  if($abid->temp1==$email)
                                   {
                                     ?>
                               <form action="bid.php" method="post" id="bok1">
				
				<input type="submit" value="Send mail to Seller " name="smail">
				
				</form>	
		<?php } ?>
				<a href="showdata.php">Click here to View Bidding Log.</a>
</div>


<?php
		if (isset($_POST['sub'])) //if user press submit button by entering some amount then call update bid function. 
		{
			$abid->updateBid();
                  }
                        if(array_key_exists('smail',$_POST)){
                        $abid->sendConfirmationSeller($email); // previous code was $abid->sendConfirmationSeller($email); with comment  mode.Fixed by Somnath
                      }
?>