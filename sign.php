



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
    $name=$_POST['name'];
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
   $sql="select * from `registration` where username='$username'";
$result=mysqli_query($conn,$sql);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
       // echo "user already exist";
       $user=1;
    }else{
        $query="INSERT into registration (`name`,`username`,`password`) values('$name','$username','$password')";
        $result=mysqli_query($conn,$query);
        if($result){
           // echo "signup successful";
           $success=1;
        }
        else{
            die(my_sqli_error($conn));
        }
    }
}

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link rel="icon" type="image" href="icons8-sign-up-50.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container{
            margin-top:100px;
            margin-left:300px;
            border:6px solid black;
            width:40%;
            height:580px;
            background-color:purple;
        }
        .form-group{
            width:90%;
            padding-top:4px;
            padding-left:140px;
            color:white;
            
        }
        .form-control:hover{
            border:2px solid yellow;
        }
      .btn{
        margin-left:150px;
        border:2px solid yellow;
        color:white;
        background-color:black;
         }
     .btn:hover{
        color:black;
      background-color:yellow;
        }
    </style>
  </head>
  <body>
<?php
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Ohh no! sorry </strong>User already exist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
<?php
if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success! </strong>Sign up successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

   <div class="container "><br>
    <center><img src="sig.png" alt="" width="45%" height="100px"></center>
    <center><h2 style="color:white;">Sign Up</h2><br></center>
   <form action="sign.php" method="post">
   <div class="form-group">
<label for="name">username</label>
<input type="text" required class="form-control" placeholder="username" name="name">
</div><br>

<div class="form-group">
<label for="name">Email</label>
<input type="email" required class="form-control" placeholder="Email" name="username">
</div><br>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" placeholder="Password" name="password">
</div><br>
<a style="color:white; text-decoration:none; padding-left:140px;" href="login.php">If you already have a account?<span style="color:yellow;">Login Here</span></a>
<br><br>
<button type="submit" class="btn"> Sign up</button>

</form>
   </div>












    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>










