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


    <div class="right">
        <?php
        $post_id = $_REQUEST["post_id"];
        $select = "SELECT * FROM user_post WHERE post_id=$post_id";
        $run_select_post = mysqli_query($conn, $select);
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
                <h2 class="posted-by">Posted By <?php echo "<a href='search.php?id=$cid' style='text-decoration:none;color:#c9d0e0;' > $pfname $plname </a> $ptime"; ?></h2>
                <img src='<?php echo "img/$ppic.jpg" ?>' style="width=60px;height:60px;">
                <h2 class="post_caption">Post:</h2>
                <h3 class="full-post"><?php echo "$ppost"; ?></h3>
                <?php
                if (isset($_REQUEST["comment"])) {
                    require_once("connect.php");
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
                    }
                    $post_id = $_REQUEST["post_id"];
                    $comment = $_REQUEST["comment"];

                    $insert = "INSERT INTO user_comment(id,post_id,user_id,fname,lname,comment)VALUES('$cid','$post_id','$cook','$dbfname','$dblname','$comment');";
                    $run_insert = mysqli_query($conn, $insert);
                    if ($run_insert == true) {
                        header("location:comment.php?post_id=$pid");
                    }
                }

                $select = "SELECT * FROM `user_comment` WHERE post_id='$post_id' order by 1 desc";
                $run_select = mysqli_query($conn, $select);

                $select = "SELECT * FROM `user_comment` WHERE post_id='$post_id' order by 1 desc  limit 0,4;";
                $run_select = mysqli_query($conn, $select);
                while ($mydata = mysqli_fetch_array($run_select)) {
                    $comment_id = $mydata["comment_id"];
                    $post_id = $mydata["post_id"];
                    $user_id = $mydata["user_id"];
                    $cfname = $mydata["fname"];
                    $clname = $mydata["lname"];
                    $comment = $mydata["comment"];
                    $ctime = $mydata["time"];
                    $coid = $mydata["id"];





                ?> <div class="comment_content">
                        <h2>Commented By <?php if ($cid == $coid) {
                                                echo "<a href='profile.php?'>$cfname $clname </a> On $ctime";
                                            } else {
                                                echo "<a href='search.php?id=$cid'>$cfname $clname </a> On $ctime";
                                            } ?> </h2><br>
                        <h3>Comment:<?php echo "$comment"; ?></h3>
                    </div>
                    <?php

                    if ($cook == $user_id) { ?>
                        <a href='edit_comment.php<?php echo "?comment_id=$comment_id" ?>' class="edit_comment">Edit</a>
                        <a href='delete_comment.php<?php echo "?comment_id=$comment_id" ?>' class="edit_comment">Delete</a>
            <?php }
                }
            }

            ?>

            <form action="" method="post">
                <input type="text" name="comment" class="comment_text">
                <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                <input type="submit" value="Comment">
            </form>
            </div>
    </div>


    <footer>
        <h1>DEVLOPED BY ZAHID HASAN</h1>
    </footer>

</body>

</html>