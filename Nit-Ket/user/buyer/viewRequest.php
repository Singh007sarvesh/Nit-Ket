<?php 
  session_start(); //creating session & storing session variable into local variables.
  $email=$_SESSION['google_data']['email'];
?>
<html>
    <head>
        <title>View Request</title>
        <style>
            #wrapper{
                width:100%;
                height:100%;
            }
            #container{
                width:95%;
                height:auto;
                border:1px solid;
                margin-left:30px;
                margin-top:20px;
            }
            a{
                text-decoration:none;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="container">
                <a href="request_bid.php" style="margin:40px;">Back</a>
                <h5 style="text-align:center;">View Bid</h5>
                <?php
                    $email=$_SESSION['google_data']['email'];
                    $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit");
                    $query = mysqli_query($conn,"SELECT name,r_Id FROM `request` where user= '$email' and status='1' "); 
                    echo "<table style='width:80%;margin-left:30px;'>";
                    while($row = mysqli_fetch_array($query))
                    {
                        echo "<tr style='background-color:#f5f0f0;color:black;'>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td><a href='viewbid.php?r_Id={$row['r_Id']}'>View Bidding</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </body>
</html>