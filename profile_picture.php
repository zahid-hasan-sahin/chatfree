<?php
if(!isset($_COOKIE["currentuser"])){
    header("location:index.php");
}
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
  $dbpropic=$mydata["profic"];
  $dbtime=$mydata["time"];
  $cid=$mydata["id"];
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="index-header">
    <ul class="bar">
            <li>
                <a href="home.php">Home</a>
                
            </li>
            <li>
                <a href="profile.php">Profile</a>
               
            </li>
            <li>
                <a href="messeges.php">Messeges</a>
               
            </li>
        </ul>
    <div class="search-form">
        <form action="searc_core.php">
            <input type="text" name="u_search" placeholder="Enter The Name">
            <input type="submit" name="s_submit">
        </form>
    
    </div>
    

    </div>
    <div class="all-edit">
        <div class="all-margin">
    <div class="propic-edit"><img src='img/<?php echo "$dbpropic.jpg"; ?>'>
    <form  enctype="multipart/form-data" method="post" action="propic_core.php">
        <input type="file" class="input" name="propiccng" value="Change Profle Picture"><br><br>
        <input type="submit"   name="propic">
       
        </form>
    </div>
     
    
     </div>
     </div>

<footer>
       <h1>DEVLOPED BY ZAHID HASAN</h1>
</footer>




</body>
</html>