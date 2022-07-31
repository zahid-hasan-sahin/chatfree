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
    $post_id=$_REQUEST["post_id"];
    $comment=$_REQUEST["comment"];

    $insert="INSERT INTO user_comment(post_id,user_id,fname,lname,comment)VALUES('$post_id','$cook','$dbfname','$dblname','$comment');";
    $run_insert=mysqli_query($conn,$insert);
if($run_insert==true){
  
}
?>