<?php
  session_start();
  $user_id = $_SESSION['id'];
  if(!isset($_SESSION["user"])){
    header("Location: update.php");
    
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
    <header><button><a href="user_dash_board.php">DashBoard</a></button></header>
    <main>
    <center><h2>Status</h2></center>

<div class="container">
   
    <form action="user_dashbord.php" method="post">
    <button name="accepted">Accepted</button>
    <button name="rejected">Rejected</button>
    <button name="pending">Pending</button>
    <button name="picked">Picked</button>

<table>
<tr>

<th>Product Name</th>
<th>Product Model</th>
<th>Quantity</th>
<th>Price</th>
<th>Contact</th>



</tr>

    <?php

require_once "database.php";


// if(isset($_GET['add_id'])){
// $id = $_GET['add_id'];
// $update1 = mysqli_query($conn, "UPDATE dashbord SET status = 'waiting' WHERE id = '$id';");
// }




// if(isset($_GET['can_id'])){
// $id = $_GET['can_id'];
// $update2 = mysqli_query($conn, "UPDATE dashbord SET status = 'rejected' WHERE id = '$id';");
// }

if(isset($_POST["accepted"])){
    
$query = "SELECT * from dashbord where status = 'waiting' and user_id=$user_id;";

$query_run = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($query_run)){
echo "
<tr>

<td>".$row['product_name']."</td>
<td>".$row['product_model']."</td>
<td>".$row['quantity']."</td>
<td>".$row['price']."</td>
<td>".$row['contact']."</td>
</tr>


"


?>


<?php






}

}


if(isset($_POST["rejected"])){
   
 
    $query = "SELECT * from dashbord where status = 'rejected' and user_id=$user_id";
    
    $query_run = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_array($query_run)){
    echo "
    <tr>
    
    <td>".$row['product_name']."</td>
    <td>".$row['product_model']."</td>
    <td>".$row['quantity']."</td>
    <td>".$row['price']."</td>
    <td>".$row['contact']."</td>
    
    </tr>
    
    
    "
    
    
    ?>
    
    
    <?php
    
    
    
    
    
    
    }
    
    }


    if(isset($_POST["pending"])){

        $query = "SELECT * from dashbord where status = 'requested' and user_id=$user_id;";
        
        $query_run = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_array($query_run)){
        echo "
        <tr>
        
        <td>".$row['product_name']."</td>
        <td>".$row['product_model']."</td>
        <td>".$row['quantity']."</td>
        <td>".$row['price']."</td>
        <td>".$row['contact']."</td>
        </tr>
        
        
        "
        
        
        ?>
        
        
        <?php
        
        
        
        
        
        
        }
        
        }


        if(isset($_POST["picked"])){
    
            $query = "SELECT * from dashbord where status = 'picked' and user_id=$user_id;";
            
            $query_run = mysqli_query($conn, $query);
            
            while($row = mysqli_fetch_array($query_run)){
            echo "
            <tr>
            
            <td>".$row['product_name']."</td>
            <td>".$row['product_model']."</td>
            <td>".$row['quantity']."</td>
            <td>".$row['price']."</td>
            <td>".$row['contact']."</td>
            
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