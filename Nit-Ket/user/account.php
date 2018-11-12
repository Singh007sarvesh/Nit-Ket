<!--this code executes after login of user which ask for preference whether user wants to continue as seller or buyer-->

<?php
 error_reporting(0);
    session_start(); //session starts
    
    include('setup.php');
   // die('Cant Connect To server ....'); 
    $conn = new mysqli('localhost','id3736692_nitkit','nitkit','id3736692_nitkit') or die('Cant Connect To server ....');
    if($_SESSION['type'] == "seller") {
        die('seller type....'); 
        header('location:https://nitkit.000webhostapp.com/NitKiT/NitKiT/user/seller/index.php');
        
    }
    

    if($_SESSION['type'] == "buyer") {
        die('buyer type  To server ....'); 
        header('location:buyer/index.php');
        
    }
 
    if(!isset($_SESSION['google_data'])){
       
        header("Location:index.php");
        
    }

    if(isset($_POST['usertype']))
    
    {
        
		$a = $_POST['usertype'];

      
        
        
		check_pref($a,$_SESSION['google_data']['id'],$_SESSION['google_data']['email'],$conn);   
    }
   
    
?>
<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="https://www.sitewelder.com/art2012/logo-big-shopping.png" type="image/png">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>-Admin Page-</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<style>
    .navbar{background-color: black;}
    .navbar-header{background-color:black;}
    .nav li{background-color:black;}
    #details{color:white;}

       /*css loader*/
@-webkit-keyframes preloader-inside-white {
  0% {
    -webkit-transform: scale(0, 0);
    -moz-transform: scale(0, 0);
    -ms-transform: scale(0, 0);
    -o-transform: scale(0, 0);
    transform: scale(0, 0);
  }
  100% {
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
@keyframes preloader-inside-white {
  0% {
    -webkit-transform: scale(0, 0);
    -moz-transform: scale(0, 0);
    -ms-transform: scale(0, 0);
    -o-transform: scale(0, 0);
    transform: scale(0, 0);
  }
  100% {
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
@-webkit-keyframes preloader-inside-red {
  0% {
    -webkit-transform: scale(0, 0);
    -moz-transform: scale(0, 0);
    -ms-transform: scale(0, 0);
    -o-transform: scale(0, 0);
    transform: scale(0, 0);
  }
  30% {
    -webkit-transform: scale(0, 0);
    -moz-transform: scale(0, 0);
    -ms-transform: scale(0, 0);
    -o-transform: scale(0, 0);
    transform: scale(0, 0);
  }
  100% {
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
@keyframes preloader-inside-red {
  0% {
    -webkit-transform: scale(0, 0);
    -moz-transform: scale(0, 0);
    -ms-transform: scale(0, 0);
    -o-transform: scale(0, 0);
    transform: scale(0, 0);
  }
  30% {
    -webkit-transform: scale(0, 0);
    -moz-transform: scale(0, 0);
    -ms-transform: scale(0, 0);
    -o-transform: scale(0, 0);
    transform: scale(0, 0);
  }
  100% {
    -webkit-transform: scale(1, 1);
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -o-transform: scale(1, 1);
    transform: scale(1, 1);
  }
}
/* Styles */
.preloader {
  display: inline-block;
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999;
  background: white;
  text-align: center;
}
.preloader .preloader-container {
  display: inline-block;
  width: 100px;
  height: 100px;
  margin: auto;
  position: absolute;
  top: 44%;
  left: 0;
  position: relative;
}
.preloader .preloader-container .animated-preloader {
  display: inline-block;
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0;
  left: 0;
  background: #f35353;
  border-radius: 50em;
}
.preloader .preloader-container .animated-preloader:after {
  content: '';
  display: inline-block;
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 50em;
  background: white;
  -webkit-animation: preloader-inside-white 1s ease-in-out infinite;
  -ms-animation: preloader-inside-white 1s ease-in-out infinite;
  animation: preloader-inside-white 1s ease-in-out infinite;
}
.preloader .preloader-container .animated-preloader:before {
  content: '';
  display: inline-block;
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 10;
  border-radius: 50em;
  background: #f35353;
  -webkit-animation: preloader-inside-red 1s ease-in-out infinite;
  -ms-animation: preloader-inside-red 1s ease-in-out infinite;
  animation: preloader-inside-red 1s ease-in-out infinite;
}

/**/

</style>

</head>
<body>
<div class="preloader">
  <div class="preloader-container">
    <span class="animated-preloader"></span>
  </div>
</div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="background-color:black;font-size:18px;">Google User:-<?php echo $_SESSION['google_data']['name'];?></a> 
            </div>

        <div style="color: white;
                    padding: 15px 50px 5px 50px;
                    float: right;
                    font-size: 16px;">Time Is:
        <div id="txt" style="color:white;"></div>
        <a href="logout.php?logout" class="btn btn-danger">Logout Now</a></div>
        
        </nav>   

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li><?php echo '<img src="'.$_SESSION['google_data']['picture'].'" alt="" class="img img-responsive" width="250" height="220"';?></li>
                    <li><?php echo '<a href="'.$_SESSION['google_data']['link'].'"><i class="fa fa-google-plus text-center fa-2x" aria-hidden="true"></i>My G+Link</a>';?></li>
                   
                    <li id="show_details"><a href="#" ><i class="fa fa-square-o fa-2x"></i>Show My Google Details</a></li>

                    <!--google details -->
                    <div id="details">
                    <?php	
                    echo '<li><b>Name </b>:'.$_SESSION['google_data']['given_name'].'</li>';    
				    echo '<li><b>Google ID : </b>' . $_SESSION['google_data']['id'].'</li>';
				    echo '<li><b>Full Name </b>:'. $_SESSION['google_data']['name'].'</li>';
				    echo '<b>Email : </b>' . $_SESSION['google_data']['email'];
				    echo '<li><b>Gender </b>:' . $_SESSION['google_data']['gender'].'</li>';
				    echo '<li><b>Language</b> :' . $_SESSION['google_data']['locale'].'</li>';
				   
				    ?>
				    </div>
                    <!--google details -->
                     
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 align="center">Welcome <?php  echo  $_SESSION['google_data']['name'];?></h2>   
                        <h5 align="center"><?php  echo  $_SESSION['google_data']['name'];?>  , Have a great day . </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr />
                <hr />                
                      
            <div class="row" >                    
               <div class="col-md-12 col-sm-12 col-xs-12">
                   <?php
				   
						show_pref_form();				//located in setup.php
                      
                        if(isset($_GET['uploaded']))
                        {
                          echo '<div class="alert alert-danger animated bounceOutLeft">Item Uploaded Sucessfully</div>';    
                        }

                    ?>
            </div>
        </div>
    </div>
</div>     
    <script src="assets/js/jquery-1.10.2.js"></script>  
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script> 
    <script src="assets/js/custom.js"></script>
    <script>
$('.preloader').delay(3000).fadeOut();
//hides google information of seller   		
                $('#details').hide();
//shows information of seller when clicked on show details
		$('#show_details').click(function(e){
			e.preventDefault();
			$('#details').toggle("slow");	

		});	
    </script>  
</body>
</html>