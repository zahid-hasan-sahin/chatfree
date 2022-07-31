<?php
if(isset($_COOKIE["currentuser"])){
  header("location:home.php"); }
if(!isset($_REQUEST["post_id"])){
  header("location:home.php");
}
require_once("connect.php");
$cook=$_COOKIE["currentuser"];

$select="SELECT * FROM `user_info` WHERE user_id='$cook'";
$run_select=mysqli_query($conn,$select);
while($mydata=mysqli_fetch_array($run_select)){
  
  $lfname=$mydata["fname"];
  $llname= $mydata["lname"];
  $luid=$mydata["user_id"];
  $lpic=$mydata["profic"];
  $cid=$mydata["id"];
}
 $post_id=$_REQUEST["post_id"];
$insert_like="INSERT INTO user_like(id,post_id,user_id,fname,lname,propic)VALUES('$cid','$post_id','$cook','$lfname','$llname','$lpic')";
$run_insert_like=mysqli_query($conn,$insert_like);
if($run_insert_like==true){
    header("location:home.php");
  
}
$select="SELECT * FROM `User_like` WHERE user_id='$cook' and post_id='$post_id'";
$run_select=mysqli_query($conn,$select);
$total=0;
if($run_select){
  $total=mysqli_num_rows($run_select);
}
 echo $total;
 if($total>=2){
    $delete="DELETE FROM `user_like` WHERE user_id='$cook' and post_id='$post_id'";
    $run_delete=mysqli_query($conn,$delete);
 }
