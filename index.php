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
    <title>Classroom</title>
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
 .btn{
  color: black;
  background-color: white;
  border-radius: 25px 25px 25px 25px;
  border: none;
  font-size: 30px;
 }
 .btn:hover{
  background-color: rgb(201, 226, 236);
   }
.card{
  margin-left:130px;
}
 /* Default styles for larger screens */
.sidebar {
  width: 260px;
}

.home-section {
  width: calc(100% - 260px);
  left: 260px;
}

.card {
  width: 40%;
  margin-right: 500px;
}
.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  margin-top: 20px;
  
  max-height: calc(100vh - 60px); /* Set a maximum height, excluding the height of .home-content */
}

.card {
  width: calc(33.33% - 20px); /* Adjust width and margins for horizontal layout */
  margin: 10px;
}
/* Media query for medium-sized screens (768px and below) */
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

/* Media query for small-sized screens (576px and below) */
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



/* Media query for medium-sized screens (768px and below) */
@media (max-width: 768px) {
  .sidebar {
    width: 100%;
  }

  .home-section {
    width: 100%;
    left: 0;
  }

  .card {
    width: 80%;
    margin-right: 0;
    position:absolute;
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

/* Media query for small-sized screens (576px and below) */
@media (max-width: 599px) {
  .sidebar {
    width: 100%;
  }

  .home-section {
    width: 100%;
    left: 0;
  }

  .card {
    position: fixed;
    top: 70px;
    left: 70px;
    width: 40%;
    margin: 0;
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
.card{
  width:40%;
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
        <a class="text" href="#">Classroom</a>
        <div class="dropdown-center">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    +
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="create.php">Create class</a></li>
    <li><a class="dropdown-item" href="join.php">Join class</a></li>

  </ul>
</div>
</div> 

<div class="card-container">
            <?php
$servername="localhost";
$username="root";
$password="";
$dbname="createform";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
 // echo "connected successfuly";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Handle the form submission
  // Assuming you have sanitized your input data for security
  $enteredCode = $_POST['code'];
  $class=$_POST['class_name '];
  
 // $enteredCode = mysqli_real_escape_string($conn, $enteredCode);
 // $class = mysqli_real_escape_string($conn, $class);
 
  // Query to check if the entered code exists in the database
  $select_query = "SELECT * FROM register WHERE `code` = '$enteredCode' OR `class name`='$class'";
  $result = mysqli_query($conn, $select_query);
  
  if ($result) {
      // Check if a row was found
      if (mysqli_num_rows($result) > 0) {
          // Code matched, redirect to the index.php page with the class name and code as parameters
          $row = mysqli_fetch_assoc($result);
          $className = $row['class name'];
          $classCode = $row['code'];
          
          header("Location: index.php?class_name=" . urlencode($className) . "&code=" . urlencode($classCode));
          exit();
      } else {
         // $errorText = "Class code not found. Please check the code and try again.";
      }
  } else {
     // $errorText = "Database error. Please try again later.";
  }
} else {
     
  
       
 
  // Check if the class code is provided in the URL
  $select_query = "SELECT * FROM register  ";


  $result = mysqli_query($conn, $select_query);

if ($result) {
  mysqli_data_seek($result, 0); // Reset the result set pointer to the beginning
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="card mb-3">';
    echo '<div class="card-img-overlay position-relative" style="background: rgba(0, 0, 0, 0.5); background-image:url(de.jpg); width:100%;height:200px;">';
    echo '<a style="color:white; text-decoration: none;" href="class.php?class_name=' . urlencode($row['class name']) . '&code' . urlencode($row['code']). '">';
    echo '<h5 class="card-title">' . $row['class name'] .'</h5>';
  
    echo '</a>';
    echo '</div>';
    echo '<div class="card-body text-center">';
    echo '<a href="#" tooltip data-placement="bottom" title="Open your work" style="font-size: 30px; color: black;">';
    echo '<i  class="fa-solid fa-briefcase"></i>';
    echo '</a>';
    echo '<a href="edit.php?id= '. $row['id'].'" tooltip data-placement="bottom" title="Edit" style="font-size: 10px; padding-left:60px; color: green;">';
    echo '<button style="width:70px; font-size:13px; color:white; background-color:green; border:2px solid green; height:30px;">Edit</button>';
    echo '</a>';
    echo '<a href="delete.php?id= '. $row['id'].'" tooltip data-placement="bottom" title="Delete" style="font-size: 10px; padding-left:60px; color: green;">';
    echo '<button style="width:70px; font-size:13px; color:white; background-color:red; border:2px solid red; height:30px;">Delete</button>';
    echo '</a>';
    echo '</div>';
    echo '</div>';
}

 

   
      


    
      
}    
    
       
   
}

mysqli_close($conn);
?>
               
            
               
                  


                
             
        </div>
    </div>









      
  

      
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="app.js"></script>
  </body>
</html>

    
    
    
    

        

         


        

          
           
         
    
    
        

     

         
     
      

        
     

  




