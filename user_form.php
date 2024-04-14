<?php
 session_start();
 $user_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>test</title>
<link rel="stylesheet" href="user_form.css">
</head>
<body>
<header>
    <a href="home.html">
        <h2 class="logo">RecyHub</h2>
    </a>
</header>

<div class="wrap">


<?php

$product_id;


if(isset($_POST["submit"]))
{
    
   $product_name = $_POST["pro_name"];
   $product_model= $_POST["pro_model"];
   $quantity = $_POST["quan"];
   $asking_price = $_POST["price"];

   $customer_name = $_POST["cust_name"];
   $address = $_POST["add"];
   $email = $_POST["email"];
   $contact_number = $_POST["cont_number"];
   $status = 'requested';


   $errors = array();

   if(empty($product_name) or empty($product_model) or empty($quantity) or empty($asking_price) or empty($customer_name) or empty($address) or empty($email) or empty($contact_number)){
       array_push($errors,"All fields are required");
   }

   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       array_push($errors, "Email is not valid");
   }

  if(count($errors)>0){
    foreach($errors as $error){
       echo "<div class='alert alert-danger'> $error </div>";
    }

   }
   else{

    require_once "database.php";

    
    $sql = "INSERT INTO product_info (product_name,product_model,quantity,price) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
    if($prepareStmt){
        mysqli_stmt_bind_param($stmt,"ssss", $product_name,$product_model,$quantity,$asking_price);
        mysqli_stmt_execute($stmt);
        $product_id = $conn->insert_id;
        
        
    }

    
    $sql2 = "INSERT INTO customer_info (product_id,customer_name,address,email,contact_number) VALUES (?,?,?,?,?)";
    $stmt2 = mysqli_stmt_init($conn);
    $prepareStmt2 = mysqli_stmt_prepare($stmt2,$sql2);
    if($prepareStmt2){
        mysqli_stmt_bind_param($stmt2,"sssss",$product_id ,$customer_name,$address,$email,$contact_number);
        mysqli_stmt_execute($stmt2);

       
        
    }



    
    $sql3 = "INSERT INTO dashbord (user_id,product_name,product_model,quantity,price,user_name,email,contact,status,address) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt3 = mysqli_stmt_init($conn);
    $prepareStmt3 = mysqli_stmt_prepare($stmt3,$sql3);
    if($prepareStmt3){
        mysqli_stmt_bind_param($stmt3,"ssssssssss", $user_id,$product_name,$product_model,$quantity,$asking_price, $customer_name,$email,$contact_number,$status,$address);
        mysqli_stmt_execute($stmt3);
        echo "<div class='alert'>Your requested is pending <button><a href='user_dashbord.php'>click here</button> to see the status.</div>";
        
        
    }

    else{
        die("Something went wrong");
    }

           
   }

   
 }





   ?>

    <form action="user_form.php" method="post">
        <h2>Product & Customer Details</h2>

        <div class="input-bx">
            <div class="input-field">
                <input type="text" name="pro_name" placeholder="Product Name" >
            </div>

            <div class="input-field">
                <input type="text" name="cust_name"  placeholder="Customer Name" >
            </div>
        </div>
        
        <div class="input-bx">
            <div class="input-field">
                <input type="text" name="pro_model" placeholder="Product Model"
               >
            </div>

            <div class="input-field">
                <input type="text" name="add" placeholder="Address" >
            </div>
        </div>
        
        <div class="input-bx">
            <div class="input-field">
                <input type="number" name="quan" placeholder="Quantity" >
            </div>
            <div class="input-field">
                <input type="text" name="email" placeholder="Email"
                >
            </div>
        </div>
        
        <div class="input-bx">
            <div class="input-field">
                <input type="number" name="price" placeholder=" Asking Price" >
            </div>
            <div class="input-field">
                <input type="number" name="cont_number"  placeholder="Contact Number" >
            </div>
        </div>

        <label>
            <input type="checkbox">
            I agree to the Terms & Condition
        </label>

        <button type="submit" name="submit"  class="btn" >Submit</button>
    </form>
</div>
</body>
</html>