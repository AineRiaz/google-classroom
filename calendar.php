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
    <title>Calendar</title>
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

 .contianer {
    width: max-content;
    height: max-content;
    position: relative;
    display: flex;
    padding: 2% 0px 0px 0px;
    justify-content: center;
    top: 10%;
    right: 0%;
    width: 100%;
    height: 100%;
    place-items: center;
    font-family:consolas;
    
    overflow: hidden;
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  


  }
  .calendar {
    height: 620px;
    width: max-content;
    background-color: white;
    border-radius: 25px;
    overflow: hidden;
    padding: 30px 50px 0px 50px;
  }
  .calendar {
    box-shadow:rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
  }
  .calendar-header {
    background:green;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 800;
    color: white;
    padding: 10px;
  }
  .calendar-body {
    pad: 10px;
  }
  .calendar-week-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    font-weight: 600;
    cursor: pointer;
    color:rgb(104, 104, 104);
  }
  .calendar-week-days div:hover {
  color:crimson;
  transform: scale(1.2);
  transition: all .2s ease-in-out;
  }
  .calendar-week-days div {
    display: grid;
    place-items: center;
    color: black;
    height: 50px;
  }
  .calendar-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 2px;
    color: black;
  }
  .calendar-days div {
    width: 37px;
    height: 33px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px;
    position: relative;
    cursor: pointer;
    animation: to-top 1s forwards;
  }
  .month-picker {
    padding: 5px 10px;
    border-radius: 10px;
    cursor: pointer;
  }
  .month-picker:hover {
    background-color: green;
  }
  .month-picker:hover {
    color: black;
  }
  .year-picker {
    display: flex;
    align-items: center;
  }
  .year-change {
    height: 30px;
    width: 30px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    margin: 0px 10px;
    cursor: pointer;
  }
  .year-change:hover {
    background-color: white;
    transition:all .2s ease-in-out ;
    transform: scale(1.12);
  }
  .year-change:hover pre {
    color: black;
  }
  .calendar-footer {
    padding: 10px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }
  #year:hover{
    cursor: pointer;
    transform: scale(1.2);
    transition: all 0.2 ease-in-out;
  }
  .calendar-days div span {
    position: absolute;
  }
   .calendar-days div:hover {
    transition: width 0.2s ease-in-out, height 0.2s ease-in-out;
    background-color:yellow;
    border-radius: 20%;
    color: green;
  }
  .calendar-days div.current-date {
    color:rgb(219, 241, 18);
    background-color: green;
    border-radius: 20%;
  }
  .month-list {
    position: relative;
    left: 0;
    top: -50px;
    background-color: yellow;
    color: var(--light-text);
    display: grid;
    grid-template-columns: repeat(3, auto);
    gap: 5px;
    border-radius: 20px;
  }
  .month-list > div {
    display: grid;
    place-content: center;
    margin: 5px 10px;
    transition: all 0.2s ease-in-out;
  }
  .month-list > div > div {
    border-radius: 15px;
    padding: 10px;
    cursor: pointer;
  }
  .month-list > div > div:hover {
    background-color:yellow;
    color: black;
    transform: scale(0.9);
    transition: all 0.2s ease-in-out;
  }
  .month-list.show {
    visibility: visible;
    pointer-events: visible;
    transition: 0.6s ease-in-out;
    animation: to-left .71s forwards;
  }
  .month-list.hideonce{
    visibility: hidden;
  }
  .month-list.hide {
    animation: to-right 1s forwards;
    visibility: none;
    pointer-events: none;
  }
  .date-time-formate {
    width: max-content;
    height: max-content;
    font-family: Dubai Light, Century Gothic;
    position: relative;
    display: inline;
    top: 140px;
    justify-content: center;
  }
  .day-text-formate {
    font-family: Microsoft JhengHei UI;
    font-size: 1.4rem;
    padding-right: 5%;
    border-right: 3px solid green;
    position: absolute;
    left: -1rem;
  }
  .date-time-value {
    display: block;
    height: max-content;
    width: max-content;
    position: relative;
    left: 40%;
    top: -18px;
    text-align: center;
  }
  .time-formate {
    font-size: 1.5rem;
  }
  .time-formate.hideTime {
    animation: hidetime 1.5s forwards;
  }
  .day-text-formate.hidetime {
    animation: hidetime 1.5s forwards;
  }
  .date-formate.hideTime {
    animation: hidetime 1.5s forwards;
  }
  .day-text-formate.showtime{
    animation: showtime 1s forwards;
  }
  .time-formate.showtime {
    animation: showtime 1s forwards;
  }
  .date-formate.showtime {
    animation: showtime 1s forwards;
  }
  @keyframes to-top {
    0% {
      transform: translateY(0);
      opacity: 0;
    }
    100% {
      transform: translateY(100%);
      opacity: 1;
    }
  }
  @keyframes to-left {
    0% {
      transform: translatex(230%);
      opacity: 1;
    }
    100% {
      transform: translatex(0);
      opacity: 1;
    }
  }
  @keyframes to-right {
    10% {
      transform: translatex(0);
      opacity: 1;
    }
    100% {
      transform: translatex(-150%);
      opacity: 1;
    }
  }
  @keyframes showtime {
    0% {
      transform: translatex(250%);
      opacity: 1;
    }
    100% {
      transform: translatex(0%);
      opacity: 1;
    }
  }
  @keyframes hidetime {
    0% {
      transform: translatex(0%);
      opacity: 1;
    }
    100% {
      transform: translatex(-370%);
      opacity: 1;
    }
  }
  @media (max-width:375px) {
    .month-list>div{
  
      margin: 5px 0px;
    }
  }
  a .main-link:after{
content: "";
position: absolute;
height: 3px;
width:100% ;
left: 0;
bottom: -10px;
background-color: black;

  }
 u:hover{
   
color:darkblue;

 }
 .profile{
    box-sizing: content-box;
    border-radius: 2px 2px 2px 2px;
    align-content: center;
    align-items: center;
    margin-left: 50px;
    border:solid 1px;
    padding-left: 10px;
margin-right: 20px;
 }
 .noti{
    box-sizing: content-box;
    border-radius: 2px 2px 2px 2px;
    align-content: center;
    align-items: center;
    margin-left: 50px;
    border:solid 1px;
    padding-left: 10px;
margin-right: 20px;
 }
 @media (max-width: 768px) {
  .container {
    flex-direction: column; /* Stack the sidebar and main navbar vertically */
  }

  .sidebar {
    width: 100%; /* Make the sidebar full width */
  }
  .main-navbar {
    display: none; /* Hide the main navbar */
  }

  .toggle-button {
    display: block; /* Show the toggle button in the sidebar */
  }
}
 @media (max-width:350) {
  .sidebar{
    width: 40%;
  }
 } 
  
 
 


  













/* Responsive */

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
<div class="contianer">
        <div class="calendar">
          <div class="calendar-header">
            <span class="month-picker" id="month-picker"> May </span>
            <div class="year-picker" id="year-picker">
              <span class="year-change" id="pre-year">
                <pre><</pre>
              </span>
              <span id="year">2020 </span>
              <span class="year-change" id="next-year">
                <pre>></pre>
              </span>
            </div>
          </div>    
          <div class="calendar-body">
            <div class="calendar-week-days">
              <div>Sun</div>
              <div>Mon</div>
              <div>Tue</div>
              <div>Wed</div>
              <div>Thu</div>
              <div>Fri</div>
              <div>Sat</div>
            </div>
            <div class="calendar-days">
            </div>
          </div>
          <div class="calendar-footer">
          </div>
          <div class="date-time-formate">
            <div class="day-text-formate">TODAY Day<BR> Date & Time</div>
            <div class="date-time-value">
              <div class="time-formate">02:51:20</div>
              <div class="date-formate">23 - july - 2022</div>
            </div>
          </div>
          <div class="month-list"></div>
        </div>
      </div>

</div><br>
</div>
               
</div>
</div>
<script src="calendar.js"></script>
<script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
 crossorigin="anonymous"></script>
<script src="app.js"></script>


 </body>
</html>
  