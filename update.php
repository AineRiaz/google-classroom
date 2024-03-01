<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
$servername="localhost";
$username="root";
$password="";
$dbname="createform";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
 // echo "connected successfuly";
}
$id=$_GET['id'];
$showquery= "SELECT * FROM quiz where id=$id";
$showdata= mysqli_query($conn,$showquery);
$total=mysqli_num_rows($showdata);
$result = mysqli_fetch_array($showdata);
if (isset($_POST['submit'])) {
    $edit=$_GET['id'];
    $name = isset($_POST['classname']) ? $_POST['classname'] : '';
    $section = isset($_POST['title']) ? $_POST['title'] : '';
    $room = isset($_POST['des']) ? $_POST['des'] : '';
    $subject = isset($_POST['select']) ? $_POST['select'] : '';
    $due = isset($_POST['due']) ? $_POST['due'] : '';
    $time = isset($_POST['time']) ? $_POST['time'] : '';
    $topic = isset($_POST['topic']) ? $_POST['topic'] : '';
    
    
    $create_query = "UPDATE quiz SET `class name`='$name', `title` = '$section', `smq` = '$room', `points` = '$subject', date = '$due', time ='$time', topic ='$topic' WHERE id=$edit";

    $query_run = mysqli_query($conn, $create_query);
    //echo"$query_run";
   if($query_run){
    header("Location: classwork.php?class_name=" . urlencode($name));
    exit(); // Replace index.php with the page you want to redirect to
        
   }
   else{
      //echo "not display";
   }
  }
?>

<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="createform";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
 // echo "connected successfuly";
}
?>
<?php
if (isset($_POST['submit'])) {
  //echo "hello";
  $edit=$_GET['id'];
  $name = isset($_POST['classname']) ? $_POST['classname'] : '';
  $section = isset($_POST['title']) ? $_POST['title'] : '';
  $room = isset($_POST['des']) ? $_POST['des'] : '';
  $subject = isset($_POST['select']) ? $_POST['select'] : '';
  $due = isset($_POST['due']) ? $_POST['due'] : '';
  $time = isset($_POST['time']) ? $_POST['time'] : '';
  $topic = isset($_POST['topic']) ? $_POST['topic'] : '';
  $create_query = "UPDATE register SET `class name`='$name', section = '$section', room = '$room', subject = '$subject', date = '$due', time ='$time', topic ='$topic' WHERE id=$edit";

  $create_query = "INSERT INTO quiz (`id`,`class name`, `title`, `smq`,`points`,`date`,`time`,`topic`) VALUES (NULL,'$name','$section','$room','$subject','$due','$time','$topic')";
  $query_run = mysqli_query($conn, $create_query);
  //echo"$query_run";
 if($query_run){
 // echo "RUN";
}
else{
   //echo "not display";
}
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question detail</title>
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
    <a href="classwork.php"style=" text-decoration:none;color:black;font-size:35px;" class="navbar-brand mb-0 h1">x Assignment</a>
  </div>
</nav>
<div class="container">
    <center><h2 style=" margin-left:60px;color:green;">Question Detail</h2></center>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="text">  
     <input name="classname" value="<?php echo $result['class name'];?>" type="text" placeholder="class name">
    </div>
    <div class="text">
     <input name="title" value="<?php echo $result['title'];?>" type="text" placeholder="Question title">
     
</div>
    
    <div class="text">
     <input name="des" value="<?php echo $result['smq'];?>" type="text" placeholder="Short/Multiple choice">
     
</div>
     <div class="input-field">
    </select>
    <select name="select" class="input" >
                <option value="100 points"
                <?php
                if($result['points'] == "100 points"){
                  echo "selected";
                }
                 
                ?>
              >100 points</option>
              <option value="Ungraded"
                <?php
                if($result['points'] == "Ungraded"){
                  echo "selected";
                }
                 
                ?>
              >Ungraded</option>
            </select>
             </div> 
             <div class="text">
   <span style=" color:green;padding-right:50px;">Due date:</span><input name="due" value="<?php echo $result['date'];?>" class="td"  type="date" placeholder="Due date"><br>
    <span style=" color:green;padding-right:80px;">Time:</span><input name="time" value="<?php echo $result['time'];?>" class="td" type="time" placeholder="Time">
</div>    
<div class="text">
     <input name="topic" value="<?php echo $result['topic'];?>" type="text" placeholder="Topic">
</div><br>
<button class="button" value="submit" name="submit">Ask</button>

    </form>
</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
