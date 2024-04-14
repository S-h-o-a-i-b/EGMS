<?php
//   session_start();
//   if(isset($_SESSION["user"])){
//     header("Location: category.php");
//   }
?> 


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

        if(isset($_POST["login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];

            require_once "database.php";

            $sql = "SELECT * FROM user_info Where email = '$email'";

            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result,MYSQLI_ASSOC);
            if($user){
                //

                if($email == "shoaibcsecu@gmail.com" and $password== "21701032"){
                    header("location: admin_dashbord.php");
                    session_start();
                    $_SESSION["user"] = "yes";
                    die();
                }

                //

                elseif($email == "receiver01@gmail.com" and $password== "21701032"){
                    header("location: receiver.php");
                    session_start();
                    $_SESSION["user"] = "yes";
                    die();
                }

                //

             else if(password_verify($password, $user["password"])){
                    header("location: user_dash_board.php");
                    session_start();
                    $_SESSION["user"] = "yes";
                    $_SESSION["id"]  = $user["id"];
                    die();
                }else{
                    echo "<div class='alert'>Password does not match </div>";
                }

            }else{
                echo "<div class='alert'>Email does not match </div>";
            }
    
        }

      




        ?>



    <form action="login.php" method="post">
    <div class="form-group">
            <input type="email" name="email"  class="form-control" placeholder="Enter Email: ">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password: ">
        </div>

        <div class="register">
           <button name="login">Login</button>
        </div>

    </form>

    <div class="not"><p>Not registered yet <a href="home.php"> Register Here</a></div>

    </div>
</body>
</html>