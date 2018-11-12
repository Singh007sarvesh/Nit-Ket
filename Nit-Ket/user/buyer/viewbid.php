<?php
    session_start(); //creating session & storing session variable into local variables.
    $email=$_SESSION['google_data']['email'];
    if(isset($_GET['r_Id']))
    {
        $itemid=$_GET['r_Id'];
        $_SESSION['itemid']=$itemid;
    }
    include_once "../revbidclass.php";
    $bid = new Bid; //creating an object of the class Bid.
 ?>
<html>
    <head>
        <title>View Bid</title>
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
                <a href="viewRequest.php" style="margin:40px;">Back</a>
                <h5 style="text-align:center;">View Bid</h5>
                <?php
                    $femail = "";
                    $itemid = $_SESSION['itemid'];
                    $email=$_SESSION['google_data']['email'];
                    $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit");
                    $query = mysqli_query($conn,"SELECT * FROM `revparticipant` where r_Id = '$itemid' order by amount limit 1"); 
                    echo "<table style='width:80%;margin-left:30px;'>";
                    while($row = mysqli_fetch_array($query))
                    {
                        echo "<tr style='background-color:#f5f0f0;color:black;'>";
                        echo "<td>" . $row['amount'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td><form action='viewbid.php' method='post' id='bok1'>
                                    <input type='submit' value='Accept' name='smail'>
                                    </form>
                              </td>";
                        echo "</tr>";
                        $femail = $row['email'];
                    }
                    echo "</table>";
                  // sellerbid.php?r_Id={$row['r_Id']}
                    if(array_key_exists('smail',$_POST))
                    {
                        $bid->sendConfirmationSeller($femail,$email);
                        $result = mysqli_query($conn,"UPDATE `request` SET `status`= 0 WHERE  r_Id = $itemid");
                        echo "<script>window.location='viewRequest.php';</script>";
                    }
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </body>
</html>