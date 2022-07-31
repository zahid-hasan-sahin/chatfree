<?php
require_once("connect.php");
$cook=$_COOKIE["currentuser"];

$select="SELECT * FROM `user_info` WHERE user_id='$cook'";
$run_select=mysqli_query($conn,$select);
while($mydata=mysqli_fetch_array($run_select)){
 $dbemail=$mydata["email"];
  $dbpwd= $mydata["pwd"];
  $dbid=$mydata["user_id"];
  $dbfname=$mydata["fname"];
  $dblname=$mydata["lname"];
  $dbpropic=$mydata["propic"];
  $dbtime=$mydata["time"];
}



setcookie("currentuser",$dbid,time()-5000);
header("location:index.php");

?>