<?php
require_once("connect.php");

if(isset($_REQUEST["submit"])){
 echo  $u_email=$_REQUEST["email"];
  echo $u_pwd=$_REQUEST["pwd"];



$select="SELECT * FROM `user_info` WHERE email='$u_email';";
$run_select=mysqli_query($conn,$select);
while($mydata=mysqli_fetch_array($run_select)){
 $dbemail=$mydata["email"];
  $dbpwd= $mydata["pwd"];
  $dbid=$mydata["user_id"];
  $dbfname=$mydata["fname"];
  $dblname=$mydata["lname"];
  $dbpropic=$mydata["profic"];
  $dbtime=$mydata["time"];
  $dbauthor=$mydata["author"];
}


if($dbemail==$u_email && $dbpwd===$u_pwd){
    setcookie("currentuser",$dbid,time()+50000);
   header("location:home.php?");
}else{
 header("location:index.php?incrt");
}
}
else{
  header("location:index.php");
}
?>