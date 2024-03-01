<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="icon" type="image" href="favicon.ico">
    <!--font awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
     <!--css file-->
     <link rel="stylesheet" href="style.css" />
   <style>
    .sidebar{
      
      border-right: 1px solid silver;
      margin-top: 60px;
    }
    .home-content{
      border-bottom: 1px solid silver ;
     
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
        
    }
    @media (max-width: 600px) {
    .menu a {
        float: none;
        width: 100%;
    }
}
    
    </style>


</head>
<body>
  <div class="sidebar close">
   <hr><ul class="nav-list">
      <li>
        <a href="home.php">
          <i class="fa-solid fa-home"></i>
          <span class="link-name">Home</span>
        </a>

        <ul class="sub-menu blank">
          <li><a href="#" class="link-name">Home</a></li>
        </ul>
      </li>
      <li>
      <a href="#">
            <i class="fa-solid fa-calendar"></i>
            <span class="link-name">Calendar</span>
          </a>

          <ul class="sub-menu blank">
            <li><a href="#" class="link-name">Calendar</a></li>
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
            <a href="#">
              <i class="fa-solid fa-file-contract"></i>
              To-do
            </a>
            <a href="#">
            <i class="fa-solid fa-w"></i>
              Web souls
            </a>
          </ul>
        </li><hr>
       <li>
          <a href="#">
            <i class="fa-solid fa-box-archive"></i>
            <span class="link-name">Archived classes</span>
          </a> <ul class="sub-menu blank">
            <li><a href="#" class="link-name">Archived classes</a></li>
          </ul>
        </li> 
        <li>
          <a href="#">
            <i class="fas fa-gear"></i>
            <span class="link-name">Settings</span>
          </a>

          <ul class="sub-menu blank">
            <li><a href="#" class="link-name">Settings</a></li>
          </ul>
        </li>
        </ul>
    </div>

    <div class="home-section">
      <div class="home-content">
        <i class="fas fa-bars"></i>
        <img src="favicon.ico" alt="logo" height="30px" >&nbsp;&nbsp;&nbsp;
        <a class="text" href="#">Classroom</a>
      </div>&nbsp;
      <div class="menu">
      
        <a href="Stream">Stream</a>
        <a href="">Classwork</a>
        <a href="">People</a>
    
      </div>
      <div id="announcement-container">
        
        <div id="announcements-list"></div>
        <div id="announcement-form">
            <textarea id="announcement-text" placeholder="Type your announcement"></textarea>
            <input type="file" id="file-upload" accept=".pdf, .doc, .docx, .txt">
            <input type="text" id="youtube-link" placeholder="YouTube Link">
            <input type="text" id="google-drive-link" placeholder="Google Drive Link">
             <button onclick="postAnnouncement()">Post</button>
        </div>
    </div>
       </div>
    
    <script src="app.js"></script>
  </body>
</html>
    <?php
    include("connection.php");

    function fetchAnnouncements() {
        $conn=mysqli_connect('localhost','root','','announcements_db');
        if($conn){
          echo "connected successfuly";
        }
    
        $result = $conn->query('SELECT * FROM announcements ORDER BY timestamp DESC');
        $announcements = [];
    
        while ($row = $result->fetch_assoc()) {
            $announcements[] = $row;
        }
    
        $conn->close();
        return $announcements;
    }
    
    function postAnnouncement($text) {
        $conn=mysqli_connect('localhost','root','','announcements_db');
        if($conn){
          echo "connected successfuly";
        }
        $text = $conn->real_escape_string($text);
        $timestamp = time();
    
        $stmt = $conn->prepare('INSERT INTO announcements (text, timestamp) VALUES (?, ?)');
        $stmt->bind_param('si', $text, $timestamp);
        $stmt->execute();
    
        $stmt->close();
        $conn->close();
    }
    
    // Handle different actions
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action'])) {
        if ($_GET['action'] === 'fetch') {
            // Fetch announcements
            $announcements = fetchAnnouncements();
            echo json_encode($announcements);
        } else {
            // Invalid action
            http_response_code(400);
            echo json_encode(['error' => 'Invalid action']);
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action'])) {
        if ($_GET['action'] === 'post') {
            // Post a new announcement
            $text = $_POST['text'];
            postAnnouncement($text);
            echo json_encode(['message' => 'Announcement posted successfully']);
        } else {
            // Invalid action
            http_response_code(400);
            echo json_encode(['error' => 'Invalid action']);
        }
    } else {
        // Invalid request
        http_response_code(400);
        echo json_encode(['error' => 'Invalid request']);
    }
    ?>
    

   
    
    

   
   
    
    
    
    
    
    
    
    
    
    ?>        










