<?php
require_once("connect.php");
$cook=$_COOKIE["currentuser"];
if(isset($_COOKIE["currentuser"])){
    header("location:home.php"); } 
$cook=$_COOKIE["currentuser"];
$select="SELECT * FROM `user_info` WHERE user_id='$cook'";
$run_select=mysqli_query($conn,$select);
while($mydata=mysqli_fetch_array($run_select)){
 $fid=$mydata["id"];
}
$tid=$_REQUEST["id"];
$select="SELECT * FROM `user_info` WHERE id='$tid'";
$run_select=mysqli_query($conn,$select);
while($mydata=mysqli_fetch_array($run_select)){
 $to_id=$mydata["user_id"];
}
$messege=$_REQUEST["messege"];
$subject=$_REQUEST["subject"];

$insert="INSERT INTO user_messege(fid,tid,from_id,to_id,messege_sub,messege)VALUES('$fid','$tid','$cook','$to_id','$subject','$messege');";
$run_insert=mysqli_query($conn,$insert);
if($run_insert==true){
    header("location:view_messege.php?id=$tid");
}else{
    header("location:home.php");
}
