<?php
     session_start(); //creating session & storing session variable into local variables.
?>
<html>
    <head>
        <title>Bid</title>
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
                <a href="index.php?loggein=true&seller=1" style="margin-left:40px;">Back</a>
                <h5 style="text-align:center;">Welcome For Bid</h5>
                <?php
                    $conn = mysqli_connect("localhost","id3736692_nitkit","nitkit","id3736692_nitkit");
                    $query = mysqli_query($conn,"SELECT * FROM `request` where status = '1'");
                    $curremail=$_SESSION['google_data']['email'];
                    echo "<table style='width:80%;margin-left:30px;'>";
                    while($row = mysqli_fetch_array($query))
                    {
                        $itemname = $row['name'];
                        $email = $row['user'];
                        if($curremail!=$email)
                        {
                            $itemquery = mysqli_query($conn,"SELECT DISTINCT itemname, itemid FROM `item` WHERE itemname='$itemname'");
                            $itemrow = mysqli_fetch_array($itemquery);
                            if($itemrow)
                            {
                                echo "<tr style='background-color:#f5f0f0;color:black;'>";
                                echo "<td>" . $itemrow['itemname'] . "</td>";
                                echo "<td>" . $row['user'] . "</td>";
                                echo "<td><a href='sellerbid.php?r_Id={$row['r_Id']}'>Start Bidding</a></td>";
                                echo "</tr>";
                            }
                        }
                        // else{
                        //     $query = mysqli_query($conn,"SELECT * FROM `revparticipant` where email = '$email'");
                        //     echo "<table style='width:80%;margin-left:30px;'>";
                        //     while($row = mysqli_fetch_array($query))
                        //     {
                        //         $itemid = $row['r_Id'];
                        //         $result = mysqli_query($conn,"SELECT * FROM `request` where r_Id = '$itemid'");
                        //         $reqrow = mysqli_fetch_array($result);
                        //         echo "<tr style='background-color:#f5f0f0;color:black;'>";
                        //         echo "<td>" . $reqrow['name'] . "</td>";
                        //         echo "<td>" . $row['amount'] . "</td>";
                        //         echo "<td>" . $row['date'] . "</td>";
                        //         echo "</tr>";
                        //     }
                        // }
                    }
                    echo "</table>";
                    mysqli_close($conn);
                ?>
            </div>
        </div>
    </body>
</html>