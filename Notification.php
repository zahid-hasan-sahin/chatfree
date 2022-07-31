<?php
require_once("connect.php");
$cook = $_COOKIE["currentuser"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="background: #5f3c07;color: white;">
    <h1 style="    width: 200px;
    height: auto;
    margin: auto;
    text-align: center;
    background: green;
    border-radius: 10px;">Notification</h1>
    <?php
    $select_post = "SELECT * FROM user_post WHERE user_id='$cook';";
    $run_select_post = mysqli_query($conn, $select_post);
    $post_id  = -1;
    while ($mydata = mysqli_fetch_array($run_select_post)) {
        $post_id = $mydata["post_id"];
        $update = "UPDATE `user_like` SET `like_status`='seen' WHERE post_id='$post_id'";
        $run_update = mysqli_query($conn, $update);
    }
    $select_noti = "SELECT * FROM user_like WHERE post_id='$post_id';";
    $run_noti = mysqli_query($conn, $select_noti);
    while ($mydata = mysqli_fetch_array($run_noti)) {
        $fname = $mydata["fname"];
        $lname = $mydata["lname"];
        $user_id = $mydata["user_id"];
        $post_id = $mydata["post_id"];
        $time = $mydata["time"];
        $cid = $mydata["id"];

    ?>
        <h2><a href='<?php if ($cook == $user_id) {
                            echo "profile.php?";
                        } else {
                            echo "search.php?id=$cid";
                        } ?>' style='text-decoration:none;color:#c9d0e0;'>
                <?php echo "$fname $lname"; ?> </a> likes on your <a href='<?php echo "comment.php?post_id=$post_id" ?>'> Post</a> on <?php echo "$time"; ?></h2>
    <?php }

    $select_post = "SELECT * FROM user_post WHERE user_id='$cook';";
    $run_select_post = mysqli_query($conn, $select_post);
    while ($mydata = mysqli_fetch_array($run_select_post)) {
        $post_id = $mydata["post_id"];
        $update = "UPDATE `user_like` SET `status`='seen' WHERE post_id='$post_id'";
        $run_update = mysqli_query($conn, $update);
    }
    $update = "UPDATE `user_comment` SET `status`='seen' WHERE post_id='$post_id'";
    $run_update = mysqli_query($conn, $update);
    $select_com = "SELECT * FROM user_comment WHERE post_id='$post_id';";
    $run_com = mysqli_query($conn, $select_com);
    while ($mydata = mysqli_fetch_array($run_com,)) {
        $cfname = $mydata["fname"];
        $clname = $mydata["lname"];
        $user_id = $mydata["user_id"];
        $time = $mydata["time"];


    ?>
        <h2><a href='<?php if ($cook == $user_id) {
                            echo "profile.php?";
                        } else {
                            echo "search.php?id=$cid";
                        } ?>' style='text-decoration:none;color:#c9d0e0;'>
                <?php echo "$fname $lname"; ?> </a> commented on your <a href='<?php echo "comment.php?post_id=$post_id" ?>'> Post</a> on <?php echo "$time"; ?></h2>
    <?php }

    ?>

</body>

</html>