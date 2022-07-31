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
    <h2 class="current_page">HOME</h2>
    <div class="left">
        <div class="propic"><img src="img/<?php echo "$dbpropic.jpg" ?>">

            <a class="button" href="profile_picture.php"> Change Profle Picture</a>

        </div><br><br>

        <div class="about">
            <h2 class="dbname"><?php echo "$dbfname $dblname" ?></h2><br><br>
            <p><strong class="dbemail">
                    <h3>Email :<span><?php echo "$dbemail" ?></span></p><br><br>
            <div class="margin">
                <p><strong>Gender :<span><?php echo "$dbgender" ?></span></strong></p>
                <p><strong>Birth :<span><?php echo "$dbbirth" ?></span></strong></p>
                <p><strong>Country:<span><?php echo "$dbcountry" ?></h3></span></strong></p>
            </div>
            <div class="edit">
                <h2> <a href="edit.php">Edit Profile</a></h2>
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


                $sel_post = "SELECT * FROM user_post WHERE user_id='$cook';";
                $run_sel_post = mysqli_query($conn, $sel_post);
                while ($mdata = mysqli_fetch_array($run_sel_post)) {
                    $p_id = $mdata["post_id"];
                    $select = "SELECT * FROM `user_comment` WHERE `post_id`='$p_id' AND `status`='unseen'";
                    $run_slct = mysqli_query($conn, $select);
                    $unseen_com = 0;
                    if ($run_slct) {
                        $unseen_com = mysqli_num_rows($run_slct);
                    }
                    $total_noti = $unseen_com + $unseen_noti;
                }


                ?>
                <h2> <a href="Notification.php"> Notification(<?php if (isset($total_noti)) {
                                                                    echo "$total_noti";
                                                                } ?>)</a></h2>
                <h2> <a href="messeges.php"> Messeges(<?php echo "$unseen"; ?>)</a></h2>
                <h2> <a href="my_post.php">Posts(<?php echo "$total_post"; ?>)</a> </h2>
                <h2> <a href="logout.php"> Log Out</a></h2>
            </div>
        </div>

    </div>
    <div class="msg_right">
        <?php

        $view_user_messege = $_REQUEST["id"];
        $view_msg = "SELECT * FROM `user_messege` WHERE (to_id='$dbid' AND fid='$view_user_messege')or(tid='$view_user_messege' and from_id='$dbid') order by 1 desc LIMIT 0,10;";
        $run_view_msg = mysqli_query($conn, $view_msg);
        while ($mydata = mysqli_fetch_array($run_view_msg)) {
            $from_user = $mydata["from_id"];
            $from_sub = $mydata["messege_sub"];
            $from_messege = $mydata["messege"];
            $from_time = $mydata["time"];



            $view_profile = "SELECT * FROM `user_info` WHERE user_id='$from_user';";
            $run_view_profile = mysqli_query($conn, $view_profile);
            while ($mydata = mysqli_fetch_array($run_view_profile)) {
                $ffname = $mydata["fname"];
                $flname = $mydata["lname"];
                $user_id = $mydata["user_id"];
            }

        ?>
            <div class="view_msg">
                <h2><a class="msg_name" href='<?php if ($cook == $user_id) {
                                                    echo "profile.php";
                                                } else {
                                                    echo "search.php?id=$view_user_messege";
                                                } ?>'><?php if ($cook == $user_id) {
                                                                                                                                                        echo "You :";
                                                                                                                                                    } else {
                                                                                                                                                        echo "$ffname $flname :";
                                                                                                                                                    } ?></a></h2><br>
                <h3 style="color:#00ff45">Subject:<?php echo "$from_sub"; ?></h3> <br>
                <h3 class="messege-color">Messege:</h3>
                <h4 class="full_messege"><?php echo "$from_messege"; ?></h4>
                <h6>On <?php echo "$from_time"; ?></h6>
            <?php } ?>
            <form method="post" action="messege_core.php">
                <input type="text" class="type_sub" name="subject" placeholder="Type A Subject(50 Word)"><br><br>
                <input type="text" class="type_msg" name="messege" require="requierd" placeholder="Type A Messege"><br>
                <input type="hidden" name="id" value='<?php echo "$view_user_messege"; ?>'>
                <input type="submit">
            </form>
            </div>

    </div>
    </div>


    <footer>
        <h1>DEVLOPED BY ZAHID HASAN</h1>
    </footer>

</body>

</html>