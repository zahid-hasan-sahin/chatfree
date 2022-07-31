<?php
        require_once("connect.php");
        $cook=$_COOKIE["currentuser"];
        $name=$_FILES["propiccng"]["name"];
        $tmp=$_FILES["propiccng"]["tmp_name"];
        $update="UPDATE user_info SET profic='$cook' WHERE user_id='$cook';";
        $run_update=mysqli_query($conn,$update);
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

       $move= move_uploaded_file($tmp,"img/$dbpropic.jpg");
    if($move==true){
            header("location:home.php");
    }else{
        header("location:home.php");
    }
?>