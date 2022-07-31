<?php
session_start();
$host="localhost";
$bduser="root";
$bdpasswor="";
$dbname="chatfree";
$conn=mysqli_connect($host,$bduser,$bdpasswor,$dbname);
if($conn==false){
    echo "DATABASA CONNECTION DENIED";
}
if(isset($_REQUEST["submit"])){
    $email=$_REQUEST["email"];

}


?>