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
    <title>Material</title>
    <link rel="icon" type="image" href="favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
    .container{
        align-content:center;
        margin-top:80px;
        margin-left:300px;
        width:40%;
        height:500px;
        background-color:whitesmoke;
        
    }
input{
        width:70%;
        height:40px;
        border:none;
        border-bottom:2px solid grey;
        background-color:whitesmoke;
    }
    .input{
        width:63%;
        height:30px;
   
    }
  .text{
    padding-left:150px;
    font-size:14px;
    padding-top:8px;
    
    }
    .td{
        margin-top:4px;
         
    }
    select{
        background-color:whitesmoke;
        border:none;
        border-bottom:2px solid grey;

    }
.input-field {
    padding-left:150px;
    font-size:14px;
   padding-top:8px;
   width:105%;
   height:50px;
   border:none;
       

}
.button {
    margin-left:190px;
    font-size:20px;
    
    width:30%;
        height:40px;
        border:2px solid green;
        color:white;
        background-color:green;
}

    </style>
</head>
<body>
<nav style="background-color:sky;" class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a href="classwork.php"style=" text-decoration:none;color:black;font-size:35px;" class="navbar-brand mb-0 h1">x Material</a>
  </div>
</nav>
<div class="container">
    <center><h2 style=" margin-left:60px;color:green;">Material Detail</h2></center>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="text">  
     <input name="classname" type="text" placeholder="class name">
    </div>
    
    <div class="text">  
     <input name="title" type="text" placeholder="Material Title">
    </div>
    <div class="text">
     <input name="des" type="text" placeholder="Description">
     
</div>
     <div class="text">
   <span style=" color:green;padding-right:50px;">Add attachment:</span><input name="pic" class="td"  type="file"><br>
    
</div>    
<div class="text">
     <input name="topic" type="text" placeholder="Topic">
</div><br>
<button class="button" value="submit" name="submit">Post</button>

    </form>
</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
if(isset($_POST['submit']))
{
    //echo "hello world";
  $class=$_POST['classname'];
  $title=$_POST['title'];
  $descrip=$_POST['des'];
  $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif', 'doc', 'docx', 'ppt', 'pptx');

$pic = $_FILES["pic"]["name"];
$pictemp = $_FILES["pic"]["tmp_name"];
$folder = "images/" . $pic;
$fileType = pathinfo($folder, PATHINFO_EXTENSION);

if (in_array(strtolower($fileType), $allowedFileTypes)) {
    move_uploaded_file($pictemp, "images/" . $pic);
    echo "File uploaded successfully!";
} else {
    echo "Invalid file type. Allowed file types are: " . implode(', ', $allowedFileTypes);
}
  
  $topic=$_POST['topic'];
 



  $create_query = "INSERT INTO material (`id`,`class name`, `title`, `des`,`file`,`topic`) VALUES (Null,'$class','$title','$descrip','$folder','$topic')";
  $query_run = mysqli_query($conn, $create_query);
  //echo"$query_run";
 if($query_run){
    header('location: classwork.php?class_name=' . urlencode($class));
        exit();

    //echo "RUN";
 }
 else{
    //echo "not display";
 }
 
 
} 

 







?>