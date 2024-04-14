<?php
  session_start();
  if(!isset($_SESSION["user"])){
    header("Location: login.php");
    
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin_dashbord.css">

</head>
<body>
<header>
        <!-- <a href="home.html"> -->
            <h1 class="logo">RecyHub</h1>
        <!-- </a> -->

       <center>
       <h1 class="title">Receiver Dashboard</h1>
       </center>
    </header>

    <main>
       
        <div class="container">
           
            <form action="receiver.php" method="post">
            <button name="waiting">Waiting</button>

  <table>
    <tr>
        <th>Product Name</th>
        <th>Product Model</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Status</th>
        <th>Operation</th>
        
    
    </tr>
  

            <?php

require_once "database.php";


    if(isset($_GET['id'])){
     $id = $_GET['id'];
     $update1 = mysqli_query($conn, "UPDATE dashbord SET status = 'picked' WHERE id = '$id';");
}




if(isset($_GET['id_btn'])){
     $id = $_GET['id_btn'];
     $update2 = mysqli_query($conn, "UPDATE dashbord SET status = 'cancelled' WHERE id = '$id';");
}

if(isset($_POST["waiting"])){
  $query = "SELECT id,product_name,product_model,quantity,price,contact,address,status from dashbord where status = 'waiting';";

  $query_run = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($query_run)){
    echo "
    <tr>
        <td>".$row['product_name']."</td>
        <td>".$row['product_model']."</td>
        <td>".$row['quantity']."</td>
        <td>".$row['price']."</td>
        <td>".$row['contact']."</td>
        <td>".$row['address']."</td>
        <td>".$row['status']."</td>
        <td>
           <button name='add'> <a href='receiver.php?id=".$row['id']."'>Add to Picked </a> </button>
           <button name='cancel'> <a href='receiver.php?id_btn=".$row['id']."'>Cancel</a> </button>
        </td>
    </tr>
    

    "


      ?>

      
      <?php
 





  }

}



?>

</table>
  
 
            </form>
        
           
        </div>
    </main>



</body>
</html>