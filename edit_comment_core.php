<?php
require_once("connect.php");
 $post_id=$_REQUEST["post_id"];
 $comment_id=$_REQUEST["comment_id"];
 $ucomment=$_REQUEST["ucomment"];
$update="UPDATE user_comment SET comment='$ucomment' where comment_id='$comment_id';";
$run_update=mysqli_query($conn,$update);
if($run_update==true){
    header("location:comment.php?post_id=$post_id");
}
else{
    header("location:home.php");
}
?>