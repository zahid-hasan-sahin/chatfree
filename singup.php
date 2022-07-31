<?php
require_once("connect.php");
if (isset($_REQUEST["singup"])) {
  $fname = $_REQUEST["fname"];
  $lname = $_REQUEST["lname"];
  $email = $_REQUEST["email"];
  $pwd = $_REQUEST["pwd"];
  $birth = $_REQUEST["date"];
  $gender = $_REQUEST["gender"];
  $country = $_REQUEST["country"];
}
$author = md5(sha1("$email"));
$select = "SELECT * FROM `user_info` WHERE email='$email'";
$run_select = mysqli_query($conn, $select);
$rows = 0;
if ($run_select) {
  $rows = mysqli_num_rows($run_select);
}

if ($rows < 1) {
  if ($fname == true && $lname == true && $email == true && $pwd == true && $birth == true  && $gender == true && $country == true) {
    $insert = "INSERT INTO user_info(user_id,fname, lname, email, pwd, birth, gender, profic,country) values ('$author','$fname','$lname','$email','$pwd','$birth','$gender','sahin','$country');";
    $run_insert = mysqli_query($conn, $insert);
    if ($run_insert == true) {

      header("location:index.php?create");
    }
  } else {
    header("location:index.php?ncreate");
  }
} else {
  header("location:index.php?alcr");
}
