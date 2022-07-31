<?php
if(!isset($_REQUEST["comment_id"])){
    header("location:home.php");
  }
  
require_once("connect.php");
$comment_id=$_REQUEST["comment_id"];
$delete="DELETE FROM user_comment WHERE comment_id = $comment_id";
$run_delete=mysqli_query($conn,$delete);
if($run_delete==true){
    header("location:home.php");
}
?>