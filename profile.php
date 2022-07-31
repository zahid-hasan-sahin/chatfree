<?php
require_once("connect.php");
if (!isset($_COOKIE["currentuser"])) {
    header("location:index.php");
}
$cook = $_COOKIE["currentuser"];

$select = "SELECT * FROM `user_info` WHERE user_id='$cook'";
$run_select = mysqli_query($conn, $select);
while ($mydata = mysqli_fetch_array($run_select)) {
    $dbemail = $mydata["email"];
    $dbpwd = $mydata["pwd"];
    $dbid = $mydata["user_id"];
    $dbgender = $mydata["gender"];
    $dbbirth = $mydata["birth"];
    $dbcountry = $mydata["country"];
    $dbfname = $mydata["fname"];
    $dblname = $mydata["lname"];
    $dbpropic = $mydata["profic"];
    $dbtime = $mydata["time"];
    $cid = $mydata["id"];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <div class="index-header">
        <ul class="bar">
            <li>
                <a href="home.php">Home</a>

            </li>
            <li>
                <a href="profile.php">Profile</a>

            </li>
            <li>
                <?php

                $select_total = "SELECT * FROM user_post where user_id='$cook';";
                $run_select_total = mysqli_query($conn, $select_total);

                $total_post = 0;
                if ($run_select_total) {
                    $total_post = mysqli_num_rows($run_select_total);
                }


                $select = " SELECT * FROM `user_messege` WHERE `status`='unseen' AND `to_id`='$cook';";
                $run_select = mysqli_query($conn, $select);
                $unseen = 0;
                if ($run_select) {
                    $unseen = mysqli_num_rows($run_select);
                }


                $select_post = "SELECT * FROM user_post WHERE user_id='$cook';";
                $run_select_post = mysqli_query($conn, $select_post);
                while ($mydata = mysqli_fetch_array($run_select_post)) {
                    $post_id = $mydata["post_id"];
                    $select = "SELECT * FROM `user_like` WHERE `post_id`='$post_id' AND `like_status`='unseen'";
                    $run_select = mysqli_query($conn, $select);
                    $unseen_noti = 0;
                    if ($run_select) {
                        $unseen_noti = mysqli_num_rows($run_select);
                    }
                }

                ?>

                <a href="messeges.php"> Messeges(<?php echo "$unseen"; ?>)</a>

            </li>
            <li>
                <a href="my_post.php">Posts(<?php echo "$total_post"; ?>)</a>

            </li>
            <li>
                <a href="logout.php"> Log Out</a>

            </li>
        </ul>
        <div class="search-form">
            <form action="find_people.php">
                <input type="text" name="u_search" placeholder="Enter The Name">
                <input type="submit" name="s_submit">
            </form>

        </div>


    </div>
    <h2 class="current_page">Profile</h2>
    <div class="all-edit">
        <div class="all-margin">
            <div class="propic-edit"><img src='img/<?php echo "$dbpropic.jpg" ?>'>
                <a class="pchang" href="profile_picture.php"> Change Profle Picture</a>

                <br><br>
            </div><br><br>
            <ul class="edit-all">
                <form action="edit.php" method="Post">
                    <li>
                        <h2><?php echo "$dbfname $dblname" ?></h2>
                    </li>
                    <li>
                        <h2>Email:<?php echo "$dbemail" ?></h2>
                    </li>
                    <li>
                        <h2>Password:<?php echo "$dbpwd" ?></h2>
                    </li>
                    <li>
                        <h2>Birth:<?php echo "$dbbirth" ?></h2>
                    </li>
                    <li>
                        <h2>Gender:<?php echo "$dbgender" ?></h2>
                    </li>
                    <li>
                        <h2>country:<?php echo "$dbcountry" ?></h2>
                    </li>
                    <input type="submit" value="Edit Profile" name="edit-all">
                </form>
            </ul>

        </div>
    </div>

    <footer>
        <h1>DEVLOPED BY ZAHID HASAN</h1>
    </footer>




</body>

</html>