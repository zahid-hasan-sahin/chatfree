<?php 
require("connect.php");
$cook=$_COOKIE["currentuser"];
$select="SELECT * FROM user_info where user_id='$cook';";
$select_run=mysqli_query($conn,$select);
while($mydata=mysqli_fetch_array($select_run)){
   $dbfname= $mydata["fname"];
   $dblname= $mydata["lname"];
   $cid= $mydata["id"];
}
$post=$_REQUEST["mind"];
$insert="INSERT INTO user_post(id,user_id,fname,lname,post) VALUES('$cid','$cook','$dbfname','$dblname','$post');";
$run_query=mysqli_query($conn,$insert);
if($run_query==true){
    header("location:home.php");
    
   
}else {
   echo "no";
}




?>