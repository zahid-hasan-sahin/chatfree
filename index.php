<?php
require_once("connect.php");

if(isset($_COOKIE["currentuser"])){
    header("location:home.php");
    $cook=$_COOKIE["currentuser"];
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
        <form method="get" action="login.php" class="login-form">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="pwd" placeholder="Password">
            <input type="submit" name="submit">
            
    
        </form><?php
                if(isset($_REQUEST["incrt"])){
                    echo "<font class='incrt' color='red'>Email Or Password Is Incorrect</font>";

                }
                if(isset($_REQUEST["create"])){
                    echo "<font class='incrt' color='black'>Your Account Has Been Created</font>";

                }
                if(isset($_REQUEST["ncreate"])){
                    echo "<font class='incrt' color='red'>Something Wrong,Try Again</font>";

                }
                if(isset($_REQUEST["alcr"])){
                    echo "<font class='incrt' color='red'>Email Have Already A Account</font>";

                }


            ?>

    </div>
    <form action="singup.php" method="post" class="singup-form">
    <input type="text" name="fname" require="requierd"  placeholder="First Name"><br><br>
    <input type="text" name="lname" require="requierd"  placeholder="Last Name"><br><br>
    <input type="email" require="requierd" name="email" placeholder="Email"><br><br>
    <input type="passwod" require="requierd"  name="pwd" placeholder="Password"><br><br>
    <input type="date" require="requierd"  name="date"><br><br>
    <select require="requierd"  name="gender"><br><br>
    <option>Gender</option>
    <option>Male</option>
    <option>Female</option>
    <option>others</option></select><br><br>
    <select require="requierd"  name="country"><br><br>
    <option>Country</option>
    <option>Bangladesh</option>
    <option>India</option>
    <option>Pakistan</option>
    <option>USA</option></select><br><br>
   <input type="submit" value="Create An Account" name="singup">
    </form>

<footer>
       <h1>DEVLOPED BY ZAHID HASAN</h1>
</footer>




</body>
</html>