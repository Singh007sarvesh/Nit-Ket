<?php
    session_start(); //creating session & storing session variable into local variables.
    $email=$_SESSION['google_data']['email'];
    if(isset($_GET['r_Id']))
    {
        $itemid=$_GET['r_Id'];
        $_SESSION['itemid']=$itemid;
    } //End of Session
    include_once "../revbidclass.php";
    $bid = new Bid; //creating an object of the class Bid.
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bidding Page</title>      
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/styleforseller.css" rel="stylesheet" />
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
                          <a class="navbar-brand" href="bid.php" style="line-height:50px;">
                            <span style="font-weight:bolder;">Back</span>
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
        <div id="bid2">  
        <table>		
            <tr>
                <th><p id="bid1">Item Name:</th>
                <th><?php echo $bid->itemName; ?></p> </th>
            </tr>
            <tr>
                <th><p id="bid1">Bid Amount:</th>
                <th><?php $bid->printbid(); ?></p> </th>
            </tr>
            <tr>
                <th><p id="bid1">Lowest Bidder: </p></th>
                <th><?php echo $bid->email; ?></th>
            </tr>
            <tr>
                <th><p id="bid3" style="margin-left:3px;">Time Left to Bid: &nbsp; </p></th>
                <th><?php $closetime = $bid->viewTime(); $starttime = $bid->viewStartTime(); ?>
            <!-- Display countdown for time left to bid for the item -->
            
                <script>
                    var t= ("<?php echo $closetime; ?>".split(/[- :]/));
                    var st= ("<?php echo $starttime; ?>".split(/[- :]/));
                    var end = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
                    var start = new Date(st[0], st[1]-1, st[2], st[3], st[4], st[5]);
                    var _second = 1000;
                    var _minute = _second * 60;
                    var _hour = _minute * 60;
                    var _day = _hour * 24;
                    var timer;
                    function showRemaining(){
                        var now = new Date();
                        var distance = end - now;
                        var distance1 = now - start;
                        
                        if(distance1 < 0) {
                            document.getElementById('bid3').innerHTML = 'Time Start To Bid  ' + ' ' + '&nbsp;';
                            document.getElementById("bok").style.display='none';
                            //document.getElementById("bok1").style.visibility='visible';
                            
                        distance=start-now;
                        var days = Math.floor(distance / _day);
                    	var hours = Math.floor((distance % _day) / _hour);
                    	var minutes = Math.floor((distance % _hour) / _minute);
                    	var seconds = Math.floor((distance % _minute) / _second);
                    	document.getElementById('countdown').innerHTML = days + ' days ';
                    	document.getElementById('countdown').innerHTML += hours + ' hrs ';
                    	document.getElementById('countdown').innerHTML += minutes + ' mins ';
                    	document.getElementById('countdown').innerHTML += seconds + 'secs';
                    	document.getElementById("bok1").style.visibility='hidden';
                            
                         return;
                        }
                    	else if (distance < 0) {
                    		clearInterval(timer);
                    		document.getElementById('countdown').innerHTML = 'Bidding Closed';
                    		document.getElementById("bok").style.display='none';
                            document.getElementById("bok1").style.visibility='visible';
                            return;
                        }
                        document.getElementById('bid3').innerHTML = 'Time Left To Bid  ' + ' ' + '&nbsp;';
                        document.getElementById("bok").style.display='inline';
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
		<form action="sellerbid.php" method="post" id="bok">
    		<p id="bid1">Enter Bid Amount:</p>
    		<input id="bid1" type="text" name="amt" pattern="\d{1,10}"></br><input id="bid3" type="submit" value="Place Bid" name="sub">
		</form>
		<?php
            if (isset($_POST['sub'])) //if user press submit button by entering some amount then call update bid function. 
            {
            	$bid->updateBid();
            }
        ?>
        </div>
    </body>
</html>