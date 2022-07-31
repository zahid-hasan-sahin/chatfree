<?php
require("connect.php");
$cook=$_COOKIE["currentuser"];

$select="SELECT * FROM `user_info` WHERE user_id='$cook'";
$run_select=mysqli_query($conn,$select);
while($mydata=mysqli_fetch_array($run_select)){
 $dbemail=$mydata["email"];
  $dbpwd= $mydata["pwd"];
  $dbid=$mydata["user_id"];
  $dbgender=$mydata["gender"];
  $dbbirth=$mydata["birth"];
  $dbcountry=$mydata["country"];
  $dbfname=$mydata["fname"];
  $dblname=$mydata["lname"];
  $dbpropic=$mydata["profic"];
  $dbtime=$mydata["time"];
}
$fname=$_REQUEST["fname"];
$lname=$_REQUEST["lname"];
$email=$_REQUEST["email"];
$pwd=$_REQUEST["pwd"];
$date=$_REQUEST["date"];
$country=$_REQUEST["country"];
$gender=$_REQUEST["gender"];
$update="UPDATE `user_info` SET `fname`='$fname',`lname`='$lname',`email`='$email',`pwd`='$pwd',`birth`='$date',`gender`='$gender',`country`='$country' where user_id=$cook";
$run_update=mysqli_query($conn,$update);
if($run_update==true){
    header("location:home.php");
}
?>