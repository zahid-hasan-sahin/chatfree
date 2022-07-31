<?php
if(!isset($_COOKIE["currentuser"])){
    header("location:index.php");
}
require_once("connect.php");

if(!isset($_REQUEST["id"])){
    header("location:home.php");
}
require_once("connect.php");
$input=$_REQUEST["id"];
 $select="SELECT * FROM user_info where id='$input';";
 $run_select=mysqli_query($conn,$select);
 if($run_select==true){
 while($mydata=mysqli_fetch_array($run_select)){
    $dbfname=$mydata["fname"];
    $dblname=$mydata["lname"];
    $dbemail=$mydata["email"];
    $dbdate= $mydata["birth"];
    $dbgender= $mydata["gender"];
    $dbcountry=$mydata["country"];
    $dbtime=$mydata["time"];
    $dbprofic=$mydata["profic"];
    $cid=$mydata["id"];
   
 }}


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
    

    </div>
    <h2 class="current_page">Friend Profile</h2>
<div class="all-edit">
    <div class="all-margin">
             <div class="propic-edit"><img src='img/<?php echo "$dbprofic.jpg"?>'>
       
                    <br><br>
            </div><br><br>
                <ul class="edit-all">
                        <li><h2><?php echo "$dbfname $dblname" ?></h2></li>
                        <li><h2>Email:<?php echo "$dbemail" ?></h2></li>
                        <li><h2>Birth:<?php echo "$dbdate" ?></h2></li>
                        <li><h2>Gender:<?php echo "$dbgender" ?></h2></li>
                        <li><h2>country:<?php echo "$dbcountry" ?></h2></li>
                        <a href='view_messege.php?id=<?php echo "$input"; ?>' class='send_messege'>Send Messege</a>
                </ul>
    
     </div>
</div>

<footer>
       <h1>DEVLOPED BY ZAHID HASAN</h1>
</footer>




</body>
</html>