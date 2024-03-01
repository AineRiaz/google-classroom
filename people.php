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

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    $class_name = isset($_GET['class_name']) ? urldecode($_GET['class_name']) : 'Default Class Name';

       $select_query = "SELECT * FROM register WHERE `class name`='$class_name'";
       $result = mysqli_query($conn, $select_query);
       
       if ($result && mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
               $class_name = urlencode($row['class name']);
               $code = urlencode($row['code']);
       
               $url = "class.php?class_name=$class_name&code=$code";
       
 $title = isset($row['class name']) ? htmlspecialchars($row['class name']) : 'Default Title';
 echo '<title>' . $title . '</title>';
        }
        }?>
    <title>Classroom</title>
    <link rel="icon" type="image" href="icons8-user-50.png">
 
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
 width:100vh;
}
.menu{
        border-bottom:1px solid silver;
        padding-bottom: 10px;
        width:176vh;
    }
    .menu a{
        margin-left: 50px;
        font-size: 17px;
        text-decoration: none;
        transition: 0.3s all;
        color: black;
        font-weight: 120px;
        
    }
    .menu a:hover{
        background-color: whitesmoke;
        border-bottom: 3px solid black;
    }
    h2{
    margin-left: 120px;
}
.line{
    margin-left: 120px;
}
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
        <a class="text" href="#">Classroom >
      <?php
    
    $class_name = isset($_GET['class_name']) ? urldecode($_GET['class_name']) : 'Default Class Name';

    $select_query = "SELECT * FROM register WHERE `class name`='$class_name'";
    $result = mysqli_query($conn, $select_query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $class_name = $row['class name'];
            $code = urlencode($row['code']);
    
            $url = "$class_name";
    echo "$url";
}
     
    }
 
  
  ?>
  </a>
  </div>&nbsp;
  <div class="menu">
 <?php echo '<a href="class.php?class_name=' . urlencode($class_name) . '">stream</a>';?>
  
  <?php   echo '<a href="classwork.php?class_name=' . urlencode($class_name) . '">Classwork</a>';?>
     
     <a href="people.php">People</a>
</div><br>
<h2>Teacher</h2><hr class="line">
 <?php
  echo '<a href="teaadd.php?class_name=' . urlencode($class_name) . '">';
  echo '<button style="margin-left:500px; color:white; background-color:blue;">Add Your name</button>';
  echo '</a>';
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
$class_name = isset($_GET['class_name']) ? urldecode($_GET['class_name']) : 'Default Class Name';

$teachers_query = "SELECT DISTINCT teacher FROM teachers WHERE `class name`='$class_name'";


$teachers_result = mysqli_query($conn, $teachers_query);



if ($teachers_result) {
    if (mysqli_num_rows($teachers_result) > 0) {
        while ($row = mysqli_fetch_assoc($teachers_result)) {
            $teacher_name = $row['teacher'];
            
           echo '<div style="display:flex;">';
            echo "<i style='font-size:30px;display:inline; margin-left:120px;'class='fa-solid fa-circle-user'>";
            echo "</i>";
            echo "<p style='margin-left:120px; font-size:23px;'>$teacher_name</p>";
           
            echo "</div>";
        }
    } else {
        //echo "<p>No teachers found for the provided code.</p>";
    }

    mysqli_free_result($teachers_result);
}

mysqli_close($conn);


 

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

$class_name = isset($_GET['class_name']) ? urldecode($_GET['class_name']) : 'Default Class Name';

$teachers_query = "SELECT DISTINCT teacher FROM register WHERE `class name`='$class_name'";


$teachers_result = mysqli_query($conn, $teachers_query);



if ($teachers_result) {
    if (mysqli_num_rows($teachers_result) > 0) {
        while ($row = mysqli_fetch_assoc($teachers_result)) {
            $teacher_name = $row['teacher'];
            
           echo '<div style="display:flex;">';
            echo "<i style='font-size:30px;display:inline; margin-left:120px;'class='fa-solid fa-circle-user'>";
            echo "</i>";
            echo "<p style='margin-left:120px; font-size:23px;'>$teacher_name</p>";
           
            echo "</div>";
        }
    } else {
        //echo "<p>No teachers found for the provided code.</p>";
    }

    mysqli_free_result($teachers_result);
}

mysqli_close($conn);


 

?>
          
   

 <h2>Classmates</h2><hr class="line">
 <?php
  echo '<a href="add.php?class_name=' . urlencode($class_name) . '">';
  echo '<button style="margin-left:500px; color:white; background-color:green;">Add Your name</button>';
  echo '</a>';
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
$class_name = isset($_GET['class_name']) ? urldecode($_GET['class_name']) : 'Default Class Name';

$teachers_query = "SELECT DISTINCT student FROM addition WHERE `class name`='$class_name'";


$teachers_result = mysqli_query($conn, $teachers_query);



if ($teachers_result) {
    if (mysqli_num_rows($teachers_result) > 0) {
        while ($row = mysqli_fetch_assoc($teachers_result)) {
            $teacher_name = $row['student'];
            
           echo '<div style="display:flex;">';
            echo "<i style='font-size:30px;display:inline; margin-left:120px;'class='fa-solid fa-circle-user'>";
            echo "</i>";
            echo "<p style='margin-left:120px; font-size:23px;'>$teacher_name</p>";
           
            echo "</div>";
        }
    } else {
        //echo "<p>No teachers found for the provided code.</p>";
    }

    mysqli_free_result($teachers_result);
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

    
    
    
    

        

         
