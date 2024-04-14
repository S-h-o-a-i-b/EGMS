<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>test</title>
<link rel="stylesheet" href="product_form.css">
</head>
<body>
<header>
    <a href="home.html">
        <h2 class="logo">RecyHub</h2>
    </a>
</header>

<div class="wrap">


<?php


if(isset($_POST["submit"]))
{
    
   $product_name = $_POST["pro_name"];
   $product_model= $_POST["pro_model"];
   $quantity = $_POST["quan"];
   $asking_price = $_POST["price"];
   $errors = array();

   if(empty($product_name) or empty($product_model) or empty($quantity) or empty($asking_price)){
       array_push($errors,"All fields are required");
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

        $last_id = $conn->insert_id;
        echo $last_id;

        
      
    }

   



    else{
        die("Something went wrong");
    }
           
   }



 }


   ?>

    <form action="product_form.php" method="post">
        <h2>Product & Customer Details</h2>

        
            <div class="input-field">
                <input type="text" name="pro_name" placeholder="Product Name" >
            </div>
       
       
            <div class="input-field">
                <input type="text" name="pro_model" placeholder="Product Model"
               >
            </div>
       
        
        
            <div class="input-field">
                <input type="number" name="quan" placeholder="Quantity" >
            </div>
       
        
        
            <div class="input-field">
                <input type="text" name="price" placeholder=" Asking Price" >
            </div>
        
        <button type="submit" name="submit"  class="btn" >Submit</button>
    </form>
</div>
</body>
</html>