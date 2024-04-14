<?php
  session_start();
  if(!isset($_SESSION["user"])){
    header("Location: login.php");
    header("Location: user_form.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard</title>
<link rel="stylesheet" href="user_dash_board.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.1.2/css/ionicons.min.css">
</head>
<body>

<header>
  <h1>User Dashboard</h1>
   
</header>

<div class="container">
  <div class="card">
    <h2>Welcome, User!</h2>
    <p>This is your dashboard. You can customize it as you like.</p>
  </div>
  
  <div class="card">
    <h2>Menu</h2>
    <!-- Dropdown button -->
    <div class="dropdown">
      <button class="dropbtn"><ion-icon name="menu"></ion-icon></button>
      <div class="dropdown-content">
       
        <a href="category.php">Category</a>
        <a href="home.php">Home</a>
        <a href="user_dashbord.php">Status</a>
        
        <!-- Add more options as needed -->
      </div>
    </div>
  </div>
</div>

<footer>
  <p>&copy; 2024 User Dashboard</p>
</footer>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
