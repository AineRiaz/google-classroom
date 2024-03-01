<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="icon" type="image" href="favicon.ico">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="join.css">
  <style>
    .create:hover{
        border-bottom:2px solid blue;
    }
    
.create {
    position: relative;
    width:40%;
    border-top: none; 
    border-left: none;
    border-right: none;
    background-color:whitesmoke;
    border-radius:6px 6px 0px 0px ;
}


.create:hover::placeholder {
    position: absolute; 
    top: -3px; 
    left: 7px; 
    color: blue; 
    
    font-size: 13px;

}
.submit{
    width: 39%;
    height:42px;
    color:grey;
    background-color:silver;
    font-size:20px;
    top: -10px;
    border:1px solid silver;
}
.submit:hover{
    color:black;
    background-color:blue;
    box-shadow:5px 7px 23px 21px yellow;
}
@media (max-width: 768px) {
            /* Add styles for medium-sized screens and larger */
            .create {
                width: auto; /* Reset width for larger screens */
            }
        }
  </style>
</head>
<body>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">X Create class </a>
          
        </div>
      </nav><br> 
     <center><form  action="" method="POST" enctype="multipart/form-data">
      <input class="create"name="class" type="text" placeholder="class name"><br>
      <input class="create" name="section"  type="text" placeholder="Section"><br>
      <input class="create" name="room"   type="text" placeholder="Room"><br>
      <input class="create" name="subject" type="text" placeholder="Subject"><br>
      <input class="create" name="teacher" type="text" placeholder="Teacher name"><br>
      <br>
      <input class="submit" type="submit" value="Create" name="submit">
      </form></center>
</body>
</html>
<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="createform";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
 // echo "connected successfuly";
}
?>
<?php
if (isset($_POST['submit'])) {
  //echo "hello";
  $name = isset($_POST['class']) ? $_POST['class'] : '';
  $section = isset($_POST['section']) ? $_POST['section'] : '';
  $room = isset($_POST['room']) ? $_POST['room'] : '';
  $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
  $rand=rand(12343,47532);
  $teacher = isset($_POST['teacher']) ? $_POST['teacher'] : '';
 
  $create_query = "INSERT INTO register (`id`,`class name`, `section`, `room`,`subject`,`code`,`teacher`) VALUES (NULL,'$name','$section','$room','$subject','$rand','$teacher')";
  $query_run = mysqli_query($conn, $create_query);
  //echo"$query_run";
 if($query_run){
 // echo "RUN";
 header("location: index.php?class_name=" . urlencode($name));
 exit();

 }
 else{
    //echo "not display";
 }
}
?>

     
