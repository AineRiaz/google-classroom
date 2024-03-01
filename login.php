



<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="signup";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
 // echo "connected successfuly";
}
$success=0;
$user=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];

 //   $query="INSERT into registration (`username`,`password`) values('$username','$password')";
   // $result=mysqli_query($conn,$query);
   // if($result){
  //      echo "Sign up";
  //  }
   // else{
    //    echo "not sign up";
   // }
   $sql="select * from `registration` where username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
       // echo "user already exist";
       $success=1;
       session_start();
       $_SESSION['username']=$username;
       header('location:roll.php');
    }else{
       $user=1;
    }
}

}




?>
<?php
if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong>Login successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
<?php
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong> Invalid data.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="icon" type="image" href="icons8-user-50.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container{
            margin-top:100px;
            margin-left:300px;
            border:6px solid black;
            width:40%;
            height:560px;
            background-color:crimson;
        }
        .form-group{
            width:90%;
            padding-top:4px;
            padding-left:150px;
            color:yellow;
            
        }
        .form-control:hover{
            border:3px solid green;
        }
      .btn{
        margin-left:150px;
        border:2px solid black;
        color:white;
        width:90px;
        background-color:green;
         }
     .btn:hover{
        color:white;
      background-color:black;
        }
    </style>
  </head>
  <body>


   <div class="container "><br>
   <center><img src="log.png" alt="" width="45%" height="190px"></center>
   
    <center><h2 style="color:yellow;">LOGIN</h2><br></center>
   <form action="login.php" method="post">
<div class="form-group">
<label for="name">Email</label>
<input type="email" required class="form-control" placeholder="Email" name="username">
</div><br>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" placeholder="password" name="password">
</div><br>
<div class="form-group">

<a href="sign.php"  style="color:white; text-decoration:none;">Don't have an account? <span style="color:yellow;">SignUp Here</span></a>
</div>

<button type="submit" class="btn">Login</button>

</form>
   </div>












    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>










