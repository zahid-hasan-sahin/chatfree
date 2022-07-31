<?php
require_once("connect.php");
$post_id=$_REQUEST["post_id"];
$delete="DELETE FROM user_post WHERE post_id = $post_id";
$run_delete=mysqli_query($conn,$delete);
if($run_delete==true){
    header("location:home.php");
}
if(!$run_delete==true){
    header("location:home.php");
}
?>