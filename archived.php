<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
}




?>




<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "createform";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_query = "SELECT * FROM register";
$result = mysqli_query($conn, $select_query);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Archived classes</title>
    <link rel="icon" type="image" href="favicon.ico">
    <!--font awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--css file-->
    <link rel="stylesheet" href="style.css" />
   <style>
.sidebar{
      
      border-right: 1px solid silver;
      margin-top: 50px;
    }
    .home-content{
      border-bottom: 1px solid silver ;
     
    }
    .text a:hover{
      color:green;
    }
.dropdown-center{
  padding-left: 780px;
 }
 .sidebar {
  width: 260px;
}

.home-section {
  width: calc(100% - 260px);
  left: 260px;
}
@media (max-width: 768px) {
  .sidebar {
    width: 100%;
  }

  .home-section {
    width: 100%;
    left: 0;
  }
  .card {
    width: calc(50% - 20px); /* Adjust width and margins for two columns */
  }
  
}
@media (max-width: 576px) {
  .card {
    width: 40%;
    margin-right: 0;
  }
}
/* Default styles for larger screens */
.sidebar {
  width: 260px;
}

.home-section {
  width: calc(100% - 260px);
  left: 260px;
}
@media (max-width: 768px) {
  .sidebar {
    width: 100%;
  }

  .home-section {
    width: 100%;
    left: 0;
  }
  .home-section .home-content {
    padding: 10px; /* Adjust padding for smaller screens */
  }
  
  .home-section .home-content i,
  .home-section .home-content .text {
    font-size: 25px; /* Adjust font size for smaller screens */
  }

  .dropdown-center {
    padding-left: 10px; /* Adjust padding for smaller screens */
  }
  .btn {
    font-size: 20px; /* Adjust font size for smaller screens */
  }
}
@media (max-width: 599px) {
  .sidebar {
    width: 100%;
  }

  .home-section {
    width: 100%;
    left: 0;
  }
  .sidebar.close .nav-list li .icon-link {
    display: block;
  }

  .sidebar .nav-list li i {
    min-width: 0;
  }

  .sidebar .nav-list li a .link-name {
    opacity: 1;
    pointer-events: auto;
  }
  .home-section .home-content {
    padding: 10px; /* Adjust padding for smaller screens */
  }
  
  .home-section .home-content i,
  .home-section .home-content .text {
    font-size: 25px; /* Adjust font size for smaller screens */
  }
  .dropdown-center {
    padding-left: 10px; /* Adjust padding for smaller screens */
  }
  .btn {
    font-size: 20px; /* Adjust font size for smaller screens */
  }

}
@media (max-width: 400px) {
 

 .home-section .home-content {
     padding: 10px; /* Adjust padding for smaller screens */
   }
   
   .home-section .home-content i,
   .home-section .home-content .text {
     font-size: 25px; /* Adjust font size for smaller screens */
   }
 
   .dropdown-center {
     padding-left: 10px; /* Adjust padding for smaller screens */
   }
   .btn {
     font-size: 20px; /* Adjust font size for smaller screens */
   }
   .sidebar {
    width: 100%;
    position: fixed;
    z-index: 1; /* Ensure the sidebar appears above the card */
  }

  .home-section {
    left: 0;
  }
}
.body{
 width:100vh;}
</style>
</head>
  <body>
    <div class="sidebar close">
     <hr><ul class="nav-list">
        <li>
          <a href="index.php">
            <i class="fa-solid fa-home"></i>
            <span class="link-name">Home</span>
          </a>
          <ul class="sub-menu blank">
            <li><a href="index.php" class="link-name">Home</a></li>
          </ul>
        </li>
        <li>
          <a href="calendar.php">
            <i class="fa-solid fa-calendar"></i>
            <span class="link-name">Calendar</span>
          </a>

          <ul class="sub-menu blank">
            <li><a href="calendar.php" class="link-name">Calendar</a></li>
          </ul>
        </li><hr>
        <li>
        <div class="icon-link">
            <a href="#">
              <i class="fa-solid fa-graduation-cap"></i>
              <span class="link-name">Enrolled</span>
            </a>
            <i class="fas fa-caret-down arrow"></i>
          </div>

          <ul class="sub-menu">
            <li><a href="#" class="link-name">Enrolled</a></li>
            <a href="todo.php">
              <i class="fa-solid fa-file-contract"></i>
              To-do
              </a>
            <?php
$select_query = "SELECT * FROM register";
$result = mysqli_query($conn, $select_query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<a href="class.php?class_name=' . urlencode($row['class name']) . '">';
        echo '<i class="fa-solid fa-user"></i>';
        echo $row['class name'];
        echo '</a>';
    }
} else {
    // Handle the case where there are no rows in the result
    echo '<li>No classes found.</li>';
}
//echo '<button onclick="createAndReload()">Create New Class</button>';

?>


 </ul>
        </li><hr>
       <li>
          <a href="archived.php">
            <i class="fa-solid fa-box-archive"></i>
            <span class="link-name">Archived classes</span>
          </a>

          <ul class="sub-menu blank">
            <li><a href="archived.php" class="link-name">Archived classes</a></li>
          </ul>
        </li> 
        <li>
        <a href="setting.php">
            <i class="fas fa-gear"></i>
            <span class="link-name">Settings</span>
          </a>

          <ul class="sub-menu blank">
            <li><a href="setting.php" class="link-name">Settings</a></li>
          </ul>
        </li>

      
           
      </ul>
    </div>
    <div class="home-section">
      <div class="home-content">
        <i class="fas fa-bars"></i>
        <img src="favicon.ico" alt="logo" height="30px" >&nbsp;&nbsp;&nbsp;
        <a class="text" href="#"><h5>Classroom > Archived classes</h5></a> 
        </div>
</div> 
<center><img style="margin-top:40px;" src="p.jpg" alt="" height="400px" width="30%"></center>
<center><b style="font-size:12px; space-between:4px;">None of your classes have been archived</b></center><br>
<center><a style="text-decoration:none; font-size:14px; color:blue;" href="">What does this mean?</a></center>
 











     
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="app.js"></script>
  </body>
</html>



