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
  $dbgender=$mydata["gender"];
  $dbbirth=$mydata["birth"];
  $dbcountry=$mydata["country"];
  $dbfname=$mydata["fname"];
  $dblname=$mydata["lname"];
  $dbpropic=$mydata["profic"];
  $dbtime=$mydata["time"];
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
        <form action="find_people.php">
            <input type="text" name="u_search" placeholder="Enter The Name">
            <input type="submit" name="s_submit">
        </form>
    
    </div>
  
    <form action="edit_core.php" method="post" class="edit-form">
    <input type="text" name="fname" require="requierd"  value='<?php echo "$dbfname" ?>'><br><br>
    <input type="text" name="lname" require="requierd"  value='<?php echo "$dblname" ?>'><br><br>
    <input type="email" require="requierd" name="email" value='<?php echo "$dbemail" ?>'><br><br>
    <input type="passwod" require="requierd"  name="pwd"value='<?php echo "$dbpwd" ?>'><br><br>
    <input type="date" require="requierd"  name="date" value='<?php echo "$dbbirth" ?>'><br><br>
    <select require="requierd"  name="gender" value='<?php echo "$dbgender" ?>'><br><br>
    <option>Gender</option>
    <option>Male</option>
    <option>Female</option>
    <option>others</option></select><br><br>
    <select require="requierd" value='<?php echo "$dbcountry" ?>' name="country"><br><br>
    <option>Country</option>
    <option>Bangladesh</option>
    <option>India</option>
    <option>Pakistan</option>
    <option>USA</option></select><br><br>
   <input type="submit" value="Update" name="singup">
    </form>

<footer>
       <h1>DEVLOPED BY ZAHID HASAN</h1>
</footer>




</body>
</html>