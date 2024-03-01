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
    <?php
       
       $servername="localhost";
       $username="root";
       $password="";
       $dbname="createform";
       
       $conn=mysqli_connect($servername,$username,$password,$dbname);
       if($conn){
        // echo "connected successfuly";
       }
       $class_name = isset($_GET['class_name']) ? $_GET['class_name'] : '';
       $code = isset($_GET['code']) ? $_GET['code'] : '';
       
    $select_query = "SELECT * FROM register WHERE `class name`= '$class_name' OR `code` = '$code'";
    $result = mysqli_query($conn, $select_query);
    

    if ($result) {
      mysqli_data_seek($result, 0); // Reset the result set pointer to the beginning
  
        while ($row = mysqli_fetch_assoc($result)) {
       
 $title = isset($row['class name']) ? htmlspecialchars($row['class name']) : 'Default Title';
 echo '<title>' . $title . '</title>';
        }
    }
     ?>
   <link rel="icon" type="image" href="icons8-user-50.png">
   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
     <!--css file-->
     <link rel="stylesheet" href="style.css" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  
     <style>
    .sidebar{
      
      border-right: 1px solid silver;
      margin-top: 40px;
    }
    .home-content{
      border-bottom: 1px solid silver ;
      width: 174vh;
    }
    .text a:hover{
      color:green;
      
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
    .menu{
        border-bottom:1px solid silver;
        padding-bottom: 10px;
        width:174vh;
    }
    @media (max-width: 600px) {
    .menu a {
        float: none;
        width: 100%;
    }
}
@media (max-width:400px) {
  .sidebar {
    width: 100%;
    position: fixed;
    margin-top:77px;
    border-right:1px solid silver;
    z-index: 101; /* Ensure the sidebar appears above the card */
  }
  .card{
  width:40%;
}
.home-section {
    left: 0;
  } 
}

#post-container {
            max-width: 900px;
            margin-top: 260px ;
            margin-left: 220px;
            padding: 20px;
            width: 100vh;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        #post-textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            resize: vertical;
             /* Allow vertical resizing of textarea */
        }
       #post-textarea:hover{
        box-shadow:5px 5px 5px 5px silver;
       }
        #attachment-options {
            display: none;
            margin-top: 10px;
        }
        .attachment-button {
            margin-right: 10px;
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }

        #cancel-button, #post-button {
            padding: 10px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        body::-webkit-scrollbar {
  width: 12px; /* You can adjust the width as needed */
}

body::-webkit-scrollbar-thumb {
  background-color: #888; /* You can set the color of the scrollbar thumb */
  border-radius: 6px;
}

body::-webkit-scrollbar-track {
  background-color: #f1f1f1; /* You can set the color of the scrollbar track */
}
body {
  height: 100vh; /* Ensure the body takes at least the full height of the viewport */
  overflow-y: auto; /* Allow vertical scrolling */
}
body{
  width:100vh;
}
.farmatting-button a{
   color:black;
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
 
$select_query = "SELECT * FROM register  ";
    
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
          </a> <ul class="sub-menu blank">
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
      $class_name = isset($_GET['class_name']) ? $_GET['class_name'] : '';
      $code = isset($_GET['code']) ? $_GET['code'] : '';
       
      $select_query = "SELECT * FROM register WHERE `class name` = '$class_name' OR `code` = '$code'";
$result = mysqli_query($conn, $select_query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<b href="class.php?class_name=' . urlencode($row['class name']) . '">';
        
        echo $row['class name'];
        echo '</b>';
    }
      
      
  }
      
      ?>
      </a>
      </div>&nbsp;
      <div class="menu">
      
        <a href="class.php">Stream</a>
     <?php   echo '<a href="classwork.php?class_name=' . urlencode($class_name) . '">Classwork</a>';
       echo '<a href="people.php?class_name=' . urlencode($class_name) . '">people</a>';

      
    ?>
      </div>
      
    
   
<div class="card-container">
            <?php
$servername="localhost";
$username="root";
$password="";
$dbname="createform";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
 //echo"connected successfuly";
}
$class_name = isset($_GET['class_name']) ? $_GET['class_name'] : '';
$code = isset($_GET['code']) ? $_GET['code'] : '';

$select_query = "SELECT * FROM register WHERE `class name` = '$class_name' OR `code`='$code'";


 $result = mysqli_query($conn, $select_query);

if ($result) {
  mysqli_data_seek($result, 0); // Reset the result set pointer to the beginning

    while ($row = mysqli_fetch_assoc($result)) {
      
      echo '<div class="card" style="position: relative;">';
      echo '<div class="card-img-overlay" style="position: absolute;  background: rgba(0, 0, 0, 0.5); background-image:url(de.jpg); color:white; height:250px; width: 1000px;">';
      echo '<a style="color:white; " href="class.php?class_name=' . urlencode($row['class name']) . '">';

      echo '<h2 class="card-title">' . $row['class name'] . '</h2>'; 
      echo '</a>';
      echo '</div>';      
      echo '</div>';
     }
   
}
$class_name = isset($_GET['class_name']) ? $_GET['class_name'] : '';
$code = isset($_GET['code']) ? $_GET['code'] : '';

$select_queery = "SELECT * FROM register WHERE `class name` = '$class_name'";


 $res = mysqli_query($conn, $select_queery);

if ($res) {
  mysqli_data_seek($result, 0); // Reset the result set pointer to the beginning

    while ($row = mysqli_fetch_assoc($res)) {
      echo '<div class="card" style="position: relative;">';
      echo '<div class="card-img-overlay" style="position:absolute;  background: rgba(0, 0, 0, 0.5); margin-top:260px; background-color:crimson; color:white; height:70px; width: 140px;">';
      echo '<a style="color:white; text-decoration:none; " href="class.php?code=' . urlencode($row['code']) . '">';
      
      echo '<h2 class="card-title">' . $row['code'] . '</h2>'; 
      echo '</a>';
      echo '</div>';      
      echo '</div>';
     }
   
} 
?>

      

    





    
         
  









     





















 

</div>


<?php
  echo '<a href="announce.php?class_name=' . urlencode($class_name) . '">';
  echo '<input type="text" placeholder="Announce something for class" style="margin-top:280px;height:50px; width:60%;  margin-left:240px;">';
  echo '</a>';
?>
    

  </div>
    </a> 
    <div margin-top:250px; style="width:1500px;" class="card-container">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "createform";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Handle the form submission
  $class = $_POST['classname'];
  
  // Query to check if the entered class name exists in the database
  $select_query = "SELECT * FROM anno WHERE `class name` = '$class'";
  $result = mysqli_query($conn, $select_query);

  if ($result) {
      // Check if a row was found
      if (mysqli_num_rows($result) > 0) {
          // Display assignments for the given class name
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="card mb-3">';
              echo '<div class="card-img-overlay position-relative" style="background: rgba(0, 0, 0, 0.5); background-image:url(de.jpg); width:100%;height:200px;">';
              echo '<a style="color:white; text-decoration: none;" href="class.php?class_name=' . urlencode($row['class name']) . '&code' . urlencode($row['code']) . '">';
              echo '<h5 class="card-title">' . $row['title'] . '</h5>';
              echo '</a>';
              echo '</div>';
              echo '<div class="card-body text-center">';
              echo '<a href="edit.php?id= ' . $row['id'] . '" tooltip data-placement="bottom" title="Edit" style="font-size: 10px; padding-left:60px; color: green;">';
              echo '<button style="width:70px; font-size:13px; color:white; background-color:green; border:2px solid green; height:30px;">Edit</button>';
              echo '</a>';
              echo '<a href="delete.php?id= ' . $row['id'] . '" tooltip data-placement="bottom" title="Delete" style="font-size: 10px; padding-left:60px; color: green;">';
              echo '<button style="width:70px; font-size:13px; color:white; background-color:red; border:2px solid red; height:30px;">Delete</button>';
              echo '</a>';
              echo '</div>';
              echo '</div>';
          }
      } else {
          $errorText = "No assignments found for the given class name.";
      }
  } else {
      $errorText = "Database error. Please try again later.";
  }
} elseif (isset($_GET['class_name'])) {
  // Handle the case where the class name is provided in the URL
  $class = $_GET['class_name'];
  
 
  $select_query = "SELECT * FROM anno WHERE `class name` = '$class'";

  $result = mysqli_query($conn, $select_query);

  if ($result) {
      mysqli_data_seek($result, 0); // Reset the result set pointer to the beginning
      while ($row = mysqli_fetch_assoc($result)) {
          echo '<div style="border-color:white; " class="card mb-3">';
          echo '<div class="card-img-overlay position-relative" style="background: rgba(0, 0, 0, 0.5); background-color:pink; color:white; width:150%;height:120px;">';
          echo '<a style="color:white; text-decoration: none;" href="class.php?class_name=' . urlencode($row['class name']) .'">';
          echo '<p style="color:black;" class="card-title">' . $row['announce']. '</p>';
          echo '</a>';
          
           
          echo '<div class="card-body text-center">';
          echo '<a href="adel.php?id= ' . $row['id'] . '" tooltip data-placement="bottom" title="Delete" style="font-size: 10px; padding-left:60px; color: green;">';
          echo '<button style="width:70px; font-size:13px;border:1px solid pink; background-color:pink; color:red;margin-bottom:80px; ;margin-top:15px;margin-left:700px; height:30px;"><i class="fa-solid fa-trash"></i></button>';
          echo '</a>';
          echo '</div>';
           echo '</div>';
      }
  }
}

mysqli_close($conn);
?> </div>
<br><br>


        
        
    


   
</div>
</div>
 


<script>
    function attachYouTube() {
        // Implement YouTube attachment logic
        alert('Attach YouTube');
    }
    function searchYouTube(query) {
        const apiKey = 'YOUR_API_KEY'; // Replace with your actual API key
        const apiUrl = `https://www.googleapis.com/youtube/v3/search?q=${encodeURIComponent(query)}&part=snippet&key=${apiKey}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                // Handle the API response here
                console.log('YouTube API Response:', data);
            })
            .catch(error => {
                console.error('Error fetching YouTube API:', error);
            });
    }
    function attachGoogleDrive() {
        // Implement Google Drive attachment logic
        alert('Attach Google Drive');
    }

    function attachFile() {
        // Implement file attachment logic
        alert('Attach File');
    }
    function cancelPost() {
        // Implement cancel post logic
        document.getElementById('post-textarea').value = ''; // Clear textarea
        hideAttachmentOptions();
    }

    function postContent() {
        // Implement post content logic
        alert('Post Content');
        hideAttachmentOptions();
    }
    function showAttachmentOptions() {
        document.getElementById('attachment-options').style.display = 'block';
    }

    function hideAttachmentOptions() {
        document.getElementById('attachment-options').style.display = 'none';
    }

    // Show attachment options when clicking on the textarea
    document.getElementById('post-textarea').addEventListener('click', showAttachmentOptions);
  //For announcement page 
 
</script>













<script src="app.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="app.js"></script>
  </body>
</html>
