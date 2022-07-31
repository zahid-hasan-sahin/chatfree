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
                <a href="my_post_core.php">Posts(<?php echo "$total_post"; ?>)</a>

            </li>
            <li>
                <a href="logout.php"> Log Out</a>

            </li>
        </ul>
        <div class="search-form">
            <form action="searc_core.php">
                <input type="text" name="u_search" placeholder="Enter The Name">
                <input type="submit" name="s_submit">
            </form>

        </div>


    </div>
    <h2 class="current_page">HOME</h2>
    <div class="left">
        <div class="propic"><img src="img/<?php echo "$dbpropic.jpg" ?>">

            <a class="button" href="profile_pic.php"> Change Profle Picture</a>

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
                <h2> <a href="my_post_core.php">Posts(<?php echo "$total_post"; ?>)</a> </h2>
                <h2> <a href="logout.php"> Log Out</a></h2>
            </div>
        </div>

    </div>



    <div class="right">
        <div class="mind">
            <form action="post_core.php" method="post">
                <input type="text" name="mind" class="post_mind" placeholder="Whats On Your Mind">
                <input type="submit" class="post_submit" name="p_submit">
            </form><br><br>
            <?php

            $select_post = "SELECT * FROM user_post WHERE user_id='$cook' ORDER BY 1 DESC";
            $run_select_post = mysqli_query($conn, $select_post);
            $total = 0;
            if ($run_select_post) {
                $total = mysqli_num_rows($run_select_post);
            }

            $sow = ceil($total / 4);


            if (isset($_REQUEST["page"])) {
                $pagen = $_REQUEST["page"];
                for ($x = 0; $x <= $sow; $x++) {
                    $y = $x * 4;

                    $select_post = "SELECT * FROM user_post WHERE user_id='$cook' ORDER BY 1 DESC limit $y,4;";
                    $run_select_post = mysqli_query($conn, $select_post);
                    $total = 0;
                    if ($run_select_post) {
                        $total = mysqli_num_rows($run_select_post);
                    }
                    if ($x == $pagen - 1) {
                        break;
                    }
                }
            } else {
                $select_post = "SELECT * FROM user_post WHERE user_id='$cook' ORDER BY 1 DESC limit 0,4;";
                $run_select_post = mysqli_query($conn, $select_post);
                $total = 0;
                if ($run_select_post) {
                    $total = mysqli_num_rows($run_select_post);
                }
            }





            while ($mydata = mysqli_fetch_array($run_select_post)) {
                $pfname = $mydata["fname"];
                $plname = $mydata["lname"];
                $ppost = $mydata["post"];
                $ptime = $mydata["post_time"];
                $puser = $mydata["user_id"];
                $pid = $mydata["post_id"];
                $select = "SELECT * FROM `user_info` WHERE user_id='$puser'";
                $run_select = mysqli_query($conn, $select);
                while ($mydata = mysqli_fetch_array($run_select)) {
                    $ppic = $mydata["profic"];
                }

            ?>
                <div class="all-post">
                    <h2 class="posted-by">Posted By <a href='<?php if ($cook == $puser) {
                                                                    echo "profile.php?";
                                                                } else {
                                                                    echo "search.php?id=$cid";
                                                                } ?>' style='text-decoration:none;color:#c9d0e0;'>
                            <?php echo "$pfname $plname"; ?> </a> <?php echo $ptime; ?></h2>
                    <img src='<?php echo "img/$ppic.jpg" ?>' style="width=60px;height:60px;">
                    <h2 class="post_caption">Post:</h2>
                    <h3 class="full-post"><?php echo "$ppost <a href='comment.php?post_id=$pid' >see more...</a> "; ?></h3>
                    <?php
                    $select = "SELECT * FROM `User_like` WHERE post_id='$pid' AND user_id='$cook'";
                    $run_select = mysqli_query($conn, $select);
                    $total = 0;
                    if ($run_select) {
                        $total = mysqli_num_rows($run_select);
                    }



                    $select_like = "SELECT * FROM `User_like` WHERE post_id='$pid'";
                    $run_select = mysqli_query($conn, $select_like);
                    $total_like = 0;
                    if ($run_select) {
                        $total_like = mysqli_num_rows($run_select);
                    }

                    $to = $total_like - 1;

                    ?>
                    <h6><a href='view_likes.php<?php echo "? post_id=$pid"; ?>'><?php if ($total == 1) {
                                                                                    echo "You And $to others";
                                                                                } else {
                                                                                    echo "$total_like likes";
                                                                                } ?> </a></h6>

                    <?php
                    if ($cook == $puser) { ?>
                        <a href='like.php<?php echo "?post_id=$pid" ?>' class="comment <?php if ($total == 1) {
                                                                                            echo 'like';
                                                                                        } ?>">Like<?php if ($total == 1) {
                                                                                                        echo 'd';
                                                                                                    } ?></a>
                        <a href='edit_post_core.php<?php echo "?post_id=$pid" ?>' class="comment">Edit</a>
                        <a href='comment.php<?php echo "?post_id=$pid" ?>' class="comment">Comment</a>
                        <a href='delete_post_core.php<?php echo "?post_id=$pid" ?>' class="comment">Delete</a>
                    <?php } else { ?>
                        <?php
                        $select_like = "SELECT * FROM user_like ORDER BY 1 DESC where post_id='$pid'";
                        ?>

                        <a href='like.php<?php echo "?post_id=$pid" ?>' class="comment <?php if ($total == 1) {
                                                                                            echo 'like';
                                                                                        } ?>">Like<?php if ($total == 1) {
                                                                                                        echo 'd';
                                                                                                    } ?></a>
                        <a href='comment.php<?php echo "?post_id=$pid" ?>' class="comment">Comment</a>

                    <?php } ?>
                </div>
            <?php  }
            for ($i = 1; $i <= $sow; $i++) {
                echo "<a href='my_post_core.php?page=$i' class='pages'>$i</a> ";
            } ?>
        </div>
    </div>

    <footer>
        <h1>DEVLOPED BY ZAHID HASAN</h1>
    </footer>




</body>

</html>