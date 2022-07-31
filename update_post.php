<?php
require_once("connect.php");
 $post_id=$_REQUEST["post_id"];
 $upost=$_REQUEST["upost"];
$update="UPDATE user_post SET post='$upost' where post_id='$post_id';";
$run_update=mysqli_query($conn,$update);
if($run_update==true){
    header("location:home.php");
}else{
    header("location:home.php");
}
?>