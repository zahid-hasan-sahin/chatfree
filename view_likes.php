<?php
if (!isset($_REQUEST["post_id"])) {
  header("location:home.php");
}

require_once("connect.php");
$cook = $_COOKIE["currentuser"];
$pid = $_REQUEST["post_id"];
$select = "SELECT * FROM `User_like` WHERE post_id=$pid";
$run_select = mysqli_query($conn, $select);
$total = 0;
if ($run_select) {
  $total = mysqli_num_rows($run_select);
}

?>

<?php
require_once("connect.php");
$pid = $_REQUEST["post_id"];
$select = "SELECT * FROM `User_like` WHERE post_id=$pid order by 1 desc";
$run_select = mysqli_query($conn, $select);
$total = 0;
if ($run_select) {
  $total = mysqli_num_rows($run_select);
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="style.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body class="like">
  <h1 class="mid">Total likes(<?php echo "$total"; ?>)</h2>
    <?php

    $select = "SELECT * FROM `User_like` WHERE post_id=$pid order by 1 desc";
    $run_select = mysqli_query($conn, $select);
    $total = 0;
    if ($run_select) {
      $total = mysqli_num_rows($run_select);
    }
    while ($mydata = mysqli_fetch_array($run_select)) {
      $fname = $mydata["fname"];
      $lname = $mydata["lname"];
      $propic = $mydata["propic"];
      $time = $mydata["time"];
      $user_id = $mydata["user_id"];
      $cid = $mydata["id"];
    ?>


      <img src='img/<?php echo "$propic";  ?>' class="like_img">
      <h3 class="name"><a href='<?php if ($cook == $user_id) {
                                  echo "profile.php";
                                } else {
                                  echo "search.php";
                                } ?>?id=<?php echo "$cid"; ?>'>
          <?php echo "$fname $lname -----> On $time"; ?></h3>
    <?php } ?>

</body>

</html>