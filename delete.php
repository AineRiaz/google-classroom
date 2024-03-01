<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password="";
$dbname="createform";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
 // echo "connected successfuly";
}
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM `register`where id = $id");
header('location:index.php');
?>