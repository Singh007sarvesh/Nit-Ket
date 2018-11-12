<?php
 session_start();
 $email=$_SESSION['google_data']['email'];
 $itemid=$_SESSION['itemid'];
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
      <link href="assets/css/animate.css" rel="stylesheet" />
      <link href="assets/css/flexslider.css" rel="stylesheet" />
      <link href="assets/css/style.css" rel="stylesheet" />
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
				
					<th colspan=3><h2 align="center">Bidding Log For Item Id :  <?php echo $itemid; ?> </th></h2> <!--fetch item ID-->
					
				</tr>

				

				<tr>
					<th>User</th>
					<th>Date Of Bid</th>
					<th>Amount</th>
					
				</tr>
				
			<?php
			  $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit"); //open a connection to a mysql server
			  $query = mysqli_query($conn,"SELECT email,dateofbid,amount FROM participant WHERE itemid ='$itemid'") or die (mysqli_error()); //function(select email,dateofbid,amount from participant for selected item ID) performs a query against the db
			  while($row = mysqli_fetch_array($query)) //fetch a result row as an associated array
			  {
			  $email = $row['email'];
			  $dateofbid = $row['dateofbid'];
			  $amount = $row['amount'];
            ?>			
				<tr>
					<td><?php echo $email; ?></td> <!--display User-->
					<td><?php echo $dateofbid; ?> </td> <!--display date of Bid-->
					<td><?php echo $amount; ?> </td> <!--display Amount-->
				</tr>
			  <?php } ?>

	
					
					</table></center>
					
			

</div>

 </body>
</html>
