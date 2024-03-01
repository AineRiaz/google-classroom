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
    <title>Chosse your role</title>
    <link rel="icon" type="image" href="icons8-sign-up-50.png">
</head>
<body>
    


<center><h2 style="margin-top:30px; color:red;">Choose Your Role</h2></center>
<div style="display:flex;" class="roll">
    
 <a href="create.php" style="text-decoration:none;">   
<div style="background-color:black;  width:70%; margin-top:78px; margin-left:180px;">
    <h3  style="margin-left:170px; color:yellow; text-decoration:none; font-size:25px;">As a Teacher</h3>
<img style=" margin-left:150px; " src="tea.png" alt="teacher" width="40%" height="300px;">
</div>
</a>
<a href="join.php" style="text-decoration:none;">   
<div style="background-color:black;  width:95%; margin-top:78px; margin-left:0px;">
    <h3  style="margin-left:160px; color:yellow; text-decoration:none; font-size:25px;">As a Student</h3>
<img style=" margin-left:150px; " src="stu.png" alt="teacher" width="40%" height="300px;">


</div>
</a>
</div>
</body>
</html>