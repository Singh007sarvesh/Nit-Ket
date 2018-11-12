<?php
    session_start();
    include('../setup.php');  
    if(isset($_GET['loggein']) && isset($_GET['buyer'])){
    }else{ header('location:../logout.php?logout'); } 

     if($_SESSION['type'] =="seller") {header('location:../seller/index.php');}

    $conn = new mysqli('localhost','id3736692_nitkit','nitkit','id3736692_nitkit') or die('Cant Connect To server ....');
    if(!isset($_SESSION['google_data'])):header("Location:../index.php");endif;  
?>
<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="https://www.sitewelder.com/art2012/logo-big-shopping.png" type="image/png">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>-Buyer Page-</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link href='../http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<style>
    .navbar{background-color: black;}
    .navbar-header{background-color:black;}
    .nav li{background-color:black;}
    #details{
        color:black;
        font-size: 28px;
    }
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
  
   .col-sm-4{padding:5px;}
    #itemlist{transition:0.5s linear;}
    #itemlist:hover{
            -webkit-box-shadow: 2px 4px 55px -12px rgba(0,0,0,0.75);
            -moz-box-shadow: 2px 4px 55px -12px rgba(0,0,0,0.75);
            box-shadow: 2px 4px 55px -12px rgba(0,0,0,0.75);
    }
    .btn btn-danger:hover{

        background-color:white;
    }
</style>

</head>
<body>
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
                    <li><a href="#renderTable" id="listAll"><i class="fa fa-square-o fa-2x"></i>Display Available Items</a></li>
                    <li><a id="update" data-toggle="modal" data-target="#updateProfile"><i class="fa fa-square-o fa-2x"></i>Update Contact Number</a></li>
                    <li id="show_details"><a href="#" ><i class="fa fa-square-o fa-2x"></i>Show My Google Details</a></li>  
                    <li id="show_details"><a href="request_bid.php" ><i class="fa fa-square-o fa-2x"></i>Request Bid</a></li>  
                </ul>
            </div>
        </nav>  
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 align="center">Welcome <?php  echo  $_SESSION['google_data']['name'];?></h2>                                       
                        <div class="col col-md-12" id="details">
                            <table class="table">
                            <tr><th></th><th></th></tr>
                            <?php   
                                echo '<tr><td>Name</td><td>'.$_SESSION['google_data']['given_name'].'</td></tr>';    
                                echo '<tr><td>Google Id</td><td>' . $_SESSION['google_data']['id'].'</td></tr>';
                                echo '<tr><td>Name</td><td>'. $_SESSION['google_data']['name'].'</td></tr>';
                                echo '<tr><td>Email </td><td>' . $_SESSION['google_data']['email'].'</td></tr>';
                                echo '<tr><td>Gender</td><td>' . $_SESSION['google_data']['gender'].'</td></tr>';
                                echo '<tr><td>Language Preference </td><td>' . $_SESSION['google_data']['locale'].'</td></tr>';                 
                            ?>
                            </tr></table>
                        </div>
                        <div class="col col-md-12" id="allItem"></div>
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
	$('#details').hide();
	$('#show_details').click(function(e){
		e.preventDefault();
		$('#details').toggle("slow");	

	});	

    $(document).ready(function(){   
        var ss ='searchbybuyer=1';
          $.ajax({
                url:'../../g_func/fetchitem.php',
                method:'POST',
                data:ss,
                cache:false,
                success:function(responceData){ 
                  $('#allItem').html(responceData);
                  $('div.more_details').delay(2000).slideDown("slow");
                  $('.available').css('color','red');
                },
                error:function(error){
                  alert('OOPS errror while getting category ... '+error);
                },
                complete:function(){
                  console.log('Automatic loading has completed  .. ');
                }
          });
    });

$('#contactUpdate').html(' ');
	function update(){
              
              var us = "update_phone=1&user=B&"+$('#uc').serialize();
             
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
