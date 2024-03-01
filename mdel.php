<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
}




?>



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
mysqli_query($conn,"DELETE FROM `material`where id = $id");
header('location:classwork.php');
?>