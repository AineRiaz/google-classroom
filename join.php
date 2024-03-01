<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
}




?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>join</title>
    <link rel="icon" type="image" href="favicon.ico">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="join.css">
<style>
input:hover::placeholder{
    position: absolute;
    
    top:-3px;
    left:7px;
    color:blue;
    font-size:16px;
}
input:hover{
  border-top:2px solid green;
  border-right:2px solid yellow;
  border-left:2px solid  yellow;
  border-bottom:2px solid green;
}
.create {
    width: calc(40% - 20px); /* Adjusted width for input field */
    margin-bottom: 15px;
    height: 7vh;
    padding: 5px 10px; /* Added padding for a better visual */
    box-sizing: border-box; /* Ensures padding is included in the width */
}
.code {
    border-radius: 20px;
    border: solid 1px;
    padding: 10px;
    margin: 20px auto;
    max-width: 600px;
    box-sizing: border-box; /* Ensure padding is included in the width */
    width: 80%; /* Adjusted width for screens wider than 767px */
    
}
ul {
    padding-left: 370px;
    text-align: center;
}
.list-item {
    margin-bottom: 10px;
    padding-right:400px;
}
.list-itel {
    margin-bottom: 10px;
    padding-right:695px;
}
.list-ite {
    margin-bottom: 10px;
    padding-right:434px;
}
b {
    text-align: center;
    padding-left:350px;
}

    @media (max-width: 799px) {
        .bold {
            display: block;
            margin-bottom: 10px;
            margin-left:0px;
        }
      ul{
        display:flex;
      }
        .list {
            list-style: none; /* Remove default list styles */
            padding: 0; /* Remove padding from the list */
            display: flex; /* Use flexbox to display items in a row */
            flex-wrap: wrap; /* Allow items to wrap to the next line if needed */
            gap: 10px; 
            margin-left:30px;/* Add some spacing between items */
        }

        .list-item,
        .list-ite, .list-itel {
            flex: 1; /* Distribute available space equally among items */
            min-width: 0;
            margin-left:30px; /* Allow items to shrink if needed */
        }
    }


  
       


       

@media (max-width: 767px) {
    .navbar-brand {
        font-size: 1rem;
    }

    .btn-outline-primary {
        font-size: 0.875rem;
    }
    .code {
        width:90%;
    }

    .create {
        width: 60%;
    }

}

        
</style>


</head>
<body>
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
    $enteredCode = $_POST['class_code'];
    $student=$_POST['stuname'];
    // Query to check if the entered code exists in the database
    $select_query = "SELECT * FROM register WHERE `code` = '$enteredCode'";
    $result = mysqli_query($conn, $select_query);

    if ($result) {
        // Check if a row was found
        if (mysqli_num_rows($result) > 0) {
            // Code matched, redirect to the class.php page with the class name or other details
            $row = mysqli_fetch_assoc($result);
            $className = $row[`class name`];
            
            $classCode = $row['code'];
            $student=$row['student']; // Adjust this based on your database structure
            header("Location: class.php?class_name=" . urlencode($className). "&code=" . urlencode($classCode));
            exit();
        } else {
            $errorText = "Class code not found. Please check the code and try again.";
        }
    } else {
        $errorText = "Database error. Please try again later.";
    }
} else {
    $errorText = "Please enter a class code.";
}
?>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">X  join</a>
          
        </div>
      </nav><br> 
      <form method="post">
    <div class="code">
        <h3>Class code</h3>
        <p>Ask your teacher for the class code, then enter it here</p>
        <input type="text" class="create" name="class_code" placeholder="class code" id="textInput" maxlength="7">
        <input type="hidden" class="create" name="stuname" placeholder="class name" id="textInput" maxlength="7">
       
        <p id="errorText" style="color: red;"><?php echo isset($errorText) ? $errorText : ''; ?></p>
        
        <button style="background-color:green; color:white;  width:100px;"  class="btn btn-outline-primary" type="submit">Join</button>
    </div>
</form>




<b class="bold">To sign in with a class code</b>&nbsp;
<ul class="list">
    <li class="list-itel">Use a authorized account</li>&nbsp;
    <li class="list-item">Use a class code with 5-7 letter or number and no space or symbol</li>&nbsp;
    <li class="list-ite">if you have trouble joining the class go to <a href="#">Help center article</a></li>&nbsp;
</ul>




<script>
    const inputField = document.getElementById('textInput');
    const errorText = document.getElementById('errorText');

    inputField.addEventListener('input', () => {
      const inputValue = inputField.value;

      if (/^[a-zA-Z0-9]{5,7}$/.test(inputValue)) {
        
        errorText.textContent = '';
      } else {
        // Input is invalid, show an error message
        errorText.textContent = 'class code must be 5-7 letters or numbers with no spaces or symbols.';
      }
    });
  </script>
      <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
          crossorigin="anonymous"></script>
   


</body>
</html>