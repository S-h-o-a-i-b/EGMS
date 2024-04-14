
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
 require_once "database.php";

 if($_GET['id']){
    $id = $_GET['id'];
$query = "SELECT * from dashbord where id='$id';";

  $query_run = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($query_run);

  $pro_name = $row['product_name'];
  $pro_model = $row['product_model'];
  $qua = $row['quantity'];
  $pri = $row['price'];
  $add = $row['address'];
  $em = $row['email'];
  $con = $row['contact'];
 }





if(isset($_POST["submit"]))
{
    
   $product_name = $_POST["pro_name"];
   $product_model= $_POST["pro_model"];
   $quantity = $_POST["quan"];
   $asking_price = $_POST["price"];

   $user_id = $_POST['cust_id'];
   $address = $_POST["add"];
   $email = $_POST["email"];
   $contact_number = $_POST["cont_number"];
   $status = 'requested';


   $errors = array();

   if(empty($product_name) or empty($product_model) or empty($quantity) or empty($asking_price) or empty($user_id) or empty($address) or empty($email) or empty($contact_number)){
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

    
    $sql = "UPDATE dashbord SET product_name='$product_name',product_model='$product_model',quantity='$quantity',price='$asking_price',email='$email',contact='$contact_number',address='$address'
    WHERE id='$user_id';";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin_dashbord.php");
        
    } else {
      echo "Error updating record: " . $conn->error;
    }
           
   }

   
 }





   ?>


    <form action="update.php" method="post">
        <h2>Product & Customer Details</h2>

        <div class="input-bx">
            <div class="input-field">
                <input type="text" name='pro_name' value="<?php echo $pro_name ?>" placeholder="Product Name" >
            </div>

            <div class="input-field">
                <input type="text" name="cust_id" value="<?php echo $id ?>"  placeholder="User id" >
            </div>
        </div>
        
        <div class="input-bx">
            <div class="input-field">
                <input type="text" name="pro_model" value="<?php echo $pro_model ?>" placeholder="Product Model"
               >
            </div>

            <div class="input-field">
                <input type="text" name="add" value="<?php echo $add ?>" placeholder="Address" >
            </div>
        </div>
        
        <div class="input-bx">
            <div class="input-field">
                <input type="number" name="quan" value="<?php echo $qua ?>" placeholder="Quantity" >
            </div>
            <div class="input-field">
                <input type="text" name="email" value="<?php echo $em ?>" placeholder="Email"
                >
            </div>
        </div>
        
        <div class="input-bx">
            <div class="input-field">
                <input type="number" name="price" value="<?php echo $pri ?>" placeholder=" Asking Price" >
            </div>
            <div class="input-field">
                <input type="number" name="cont_number"  value="<?php  echo $con ?>" placeholder="Contact Number" >
            </div>
        </div>

       

        <button type="submit" name="submit"  class="btn" >Update</button>
    </form>
</div>
</body>
</html>