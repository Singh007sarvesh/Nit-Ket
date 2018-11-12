<!--this code executes when the user login as seller which retreives the google information of seller and provides user to upload,update profile and view item uploaded by him-->   
<?php
   error_reporting(0);
    include('../setup.php');
    include('../Seller.php');

   if(isset($_GET['loggein']) && isset($_GET['seller'])){
    }else{ header('location:../logout.php?logout'); } 

     if($_SESSION['type'] =="buyer") {header('location:../buyer/index.php');}

    $conn = new mysqli('localhost','id3736692_nitkit','nitkit','id3736692_nitkit') or die('Cant Connect To server ....');
    if(!isset($_SESSION['google_data'])):header("Location:index.php");endif;    
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
    <link href='../http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<style>
        .navbar{background-color: black;}
        .navbar-header{background-color:black;}
        .nav li{background-color:black;}
        #details{color:white;}
        .modal{border-radius:0px !important;}
        .modal-content
        {
            background: linear-gradient(270deg, #97e6d2, #787d7c);
            background-size: 400% 400%;

            -webkit-animation: AnimationName 33s ease infinite;
            -moz-animation: AnimationName 33s ease infinite;
            animation: AnimationName 33s ease infinite;

            @-webkit-keyframes AnimationName {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @-moz-keyframes AnimationName {
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
            @keyframes AnimationName { 
                0%{background-position:0% 50%}
                50%{background-position:100% 50%}
                100%{background-position:0% 50%}
            }
        }
        .panel-heading{
            border:none;
        }
        
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
            <a href="../logout.php?logout" class="btn btn-danger">Logout Now</a></div>
        
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				    <li><?php echo '<img src="'.$_SESSION['google_data']['picture'].'" alt="" class="img img-responsive" width="250" height="220"';?></li>
                    <li><?php echo '<a href="'.$_SESSION['google_data']['link'].'"><i class="fa fa-google-plus text-center fa-2x" aria-hidden="true"></i>My G+Link</a>';?></li>                   
                    <li id="show_details"><a href="index.php?show_details" ><i class="fa fa-square-o fa-2x"></i>Show My Google Details</a></li>			
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
                    <li><a href="#" id="sf"><i class="fa fa-square-o fa-2x"></i>Upload Item</a></li>
                    <li><a id="update" data-toggle="modal" data-target="#updateProfile"><i class="fa fa-square-o fa-2x"></i>Update Contact Number</a></li>
                    <li><a id="show_uploaded_by_me"><i class="fa fa-square-o fa-2x"></i>Items Uploaded By Me</a></li>
                    <li><a href="bid.php"><i class="fa fa-square-o fa-2x"></i>Items For Bid</a></li>
            
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2 align="center">Welcome <?php  echo  $_SESSION['google_data']['name'];?></h2>   
                        <h5 align="center">You Have Logged in as Seller , Have a great day . </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                      
                <div class="row" >                    
                   <div class="col-md-12 col-sm-12 col-xs-12" >
                       <div class="container" id="show_all"></div>
                       <?php
    
                            if(isset($_GET['uploaded']))
                            {
                               echo '<div class="alert alert-danger" id="alert_done">Item Uploaded Sucessfully</div>';    
                            } 
                            //show_upload_form();  
                        ?>
                        <div class="col col-sm-12" id="show_form">	
                        	<div class="panel panel-default">
			                    <div class="panel-heading"><h5 align="center">Upload Here </h5></div>
			                    <div class="panel-body">
			                        <form action="Seller.php" method="post" enctype="multipart/form-data">
			                            <div class="form-group">
			                                <label for="item Name">Item Name</label>
			                                <input type="text" class="form-control" name="item_name" required pattern="^[a-zA-Z0-9.- ]{4,}">
			                            </div>

			                            <div class="form-group">
			                                <label for="item cat">Item Category</label>
			                                <select class="form-control" name="item_cat">
			                                    <option value="Mobile">Mobile</option>
			                                    <option value="Notepad">Notepad</option>
			                                    <option value="Laptop">Laptop</option>
			                                    <option value="Tab">Tab</option>
			                                    <option value="Book">Book</option>
			                                    <option value="Bicycle">Bicycle</option>
			                                    <option value="others">Others</option>
			                                </select>
			                            </div>

			                            <div class="form-group">
			                                <label for="price">Price</label>
			                                <input type="text" class="form-control" name="item_price"required pattern="[0-9]{2,}">
			                            </div>

			                            <div class="form-group">
			                                <label for="item_desc">Item Description</label>
			                                <input type="text" class="form-control" name="item_descp" required pattern="^[a-zA-Z0-9.- ]{4,}">
			                            </div>
                                                   
                                                    <div class="form-group">
			                                <label for="upload"> Upload Image</label>
			                                <input type="file"  name="Upload" class="btn btn-info" required>
			                            </div>
			                            
			                            <lable><input id="right1" type="submit"  name="sub" value="Submit" class="btn btn-success"></label>
			                        </form>
			                    </div>
			                </div>

                        </div>
                   </div>
               </div>
            </div>
        </div> 
  </div>  

<div class="modal fade" id="updateProfile" role="dialog" style="top:0px;">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" align="center">Update Contact</h4>
            </div>

            <div class="modal-body">
              <div class="panel panel-default" style="background-color: rgba(132, 138, 138, 0.6); border:none;">
                    <div class="panel-heading" style="background-color: rgba(132, 138, 138, 0.6);">
                       <h5 align="center">Upload Contact Number </h5>
                    </div>
                    <div class="panel-body" style="background-color: rgba(132, 138, 138, 0.6);">

                            <form id="uc">
                                <div class="form-group">
                                    <label for="item Name">Contact Number </label>
                                    <input type="text" class="form-control" name="contact" pattern="[789]\d{9}">
                                </div>  
                            </form>
                            <h4 align="center" id="contactUpdate"></h4>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-info" onclick="update();">Save Contact Number</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel </button>
              
            </div>
      </div>      
    </div>
</div>

       
<script src="../assets/js/jquery-1.10.2.js"></script>  
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.metisMenu.js"></script> 
<script src="../assets/js/custom.js"></script>
<script>
$('.preloader').delay(3000).fadeOut();
$(document).ajaxStart(function(){$('.preloader').delay(1000).fadeIn();});

//initially it hides upload form
    $('#show_form').show();


//it will show upload form
	$('#sf').click(function(){
		//alert('hello');            
		$('#show_form').show();
                $('#show_all').hide();
	});

//it will hide the google information
	$('#details').hide();
//it will show the information when clicked 
	$('#show_details').click(function(e){
		e.preventDefault();
		$('#details').toggle("slow");	
		
		$('#alert_done').addClass('animated fadeIn');
	});
//it will show details of item uploaded by logged in seller	
	$('#show_uploaded_by_me').click(function(e){
              $('#alert_done').hide();              // date  27  5.30  
              $('#show_form').hide();
		var sent = "show_uploaded_by_me=1";
		$.ajax({
			url:'Seller.php',
			type:'POST',
			data:sent,
			success: function(responceData){	
				$('#show_all').html(responceData);
				console.log(responceData);
			},
			error: function(){
				alert('ERROR ');	
			},
			complete: function(){				
				$('.preloader').delay(1000).fadeOut();
			}			
		});		
	});
	$('#contactUpdate').html(' ');
	function update(){
              
              var us = "update_phone=1&user=S&"+$('#uc').serialize();
               
                $.ajax({
			url:'../User.php',
			type:'POST',
			data:us,
			success: function(responceData){	
				$('#contactUpdate').html(responceData).css('color','white');
			},
			error: function(){
				alert('ERROR ');	
			},
			complete: function(){				
				$('.preloader').delay(1000).fadeOut();
			}			
		});  
        }
</script>  
</body>
</html>
