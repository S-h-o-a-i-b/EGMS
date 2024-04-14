<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
    <header>
        <!-- <a href="home.html"> -->
            <h1 class="logo">RecyHub</h1>
        <!-- </a> -->
    </header>


    <section class="home">
        <div class="home-content">
            <h1>Welcome to RecyHub,</h1>
            <h2>your premier destination
            for electronic waste recycling solutions.
            </h2>
        </div>

        <div class="home-sci">
            <a href="https://www.facebook.com/"target="_blank"><i class='bx bxl-facebook-square'></i></a>
            <a href="https://twitter.com/"target="_blank"><i class='bx bxl-twitter'></i></a>
            <a href="https://www.instagram.com/target="target="_blank"><i class='bx bxl-instagram-alt'></i></a>
        </div>
    </section>

   <div class="container">
   <?php

if(isset($_POST["submit"]))
{
   $username = $_POST["username"];
   $email = $_POST["email"];
   $pass = $_POST["password"];
   $rep_pass = $_POST["repeat_password"];
   $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
   $errors = array();

   if(empty($username) or empty($email) or empty($pass) or empty($rep_pass)){
       array_push($errors,"All fields are required");
   }

   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       array_push($errors, "Email is not valid");
   }

   if(strlen($pass)<8){
       array_push($errors , "Password must be at least 8 characters long");
   }
   if($pass !== $rep_pass){
    array_push($errors,"Password does not match");
   }

   $sql = "SELECT * FROM user_info WHERE email = '$email'";
   require_once "database.php";
   $result =  mysqli_query($conn, $sql);
   $rowCount = mysqli_num_rows($result);

   if($rowCount>0){
    array_push($errors,"Email already exists");
   }

  if(count($errors)>0){
    foreach($errors as $error){
       echo "<div class='alert alert-danger'> $error </div>";
    }

   }

   else{

    
    $sql = "INSERT INTO user_info (username,email,password) VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
    if($prepareStmt){
        mysqli_stmt_bind_param($stmt,"sss", $username ,$email,$pass_hash);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert'>You are registered successfully.</div>";
    }
    else{
        die("Something went wrong");
    }
           
   }

}

?>

    <form action="home.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username: ">
        </div>

        <div class="form-group">
            <input type="email" name="email"  class="form-control" placeholder="Email: ">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password: ">
        </div>

        <div class="form-group">
            <input type="password" 
            class="form-control"
            name="repeat_password" placeholder="Repeat Password: ">
        </div>

        <div class="register">
           <button name="submit" >Register</button>
        </div>



    </form>

    <div class="not"><p>Already Registered<a href="login.php"> Login Here</a></div>

   </div>
    
   

</body>
</html>










