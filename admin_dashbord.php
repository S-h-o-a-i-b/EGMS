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
       <h1 class="title">Admin Dashboard</h1>
       </center>
    </header>

    <main>
       
        <div class="container">
           
            <form action="admin_dashbord.php" method="post">
            <label for="cars">Choose:</label>
            <button name="waiting">Waiting</button>
            <button name="Picked">Picked</button>
            <button name="cancelled">Cancelled</button>
            <button name="rejected">Rejected</button>

  <table>
    <tr>
       <th>User Id</th>
        <th>Product Name</th>
        <th>Product Model</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Contact</th>
        <th>Status</th>
        <th>Operation</th>
        
    
    </tr>
  
<?php

require_once "database.php";


if(isset($_GET['del_id'])){
     $id = $_GET['del_id'];
     $update2 = mysqli_query($conn, "DELETE FROM dashbord where id='$id';");
}

if(isset($_POST["waiting"])){
  $query = "SELECT id,product_name,product_model,quantity,price,contact,status from dashbord where status = 'waiting';";

  $query_run = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($query_run)){
    echo "
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['product_name']."</td>
        <td>".$row['product_model']."</td>
        <td>".$row['quantity']."</td>
        <td>".$row['price']."</td>
        <td>".$row['contact']."</td>
        <td>".$row['status']."</td>
        <td>
           <button name='add'> <a href='admin_dashbord.php?del_id=".$row['id']."'>Delete</a> </button>

           <button > <a href='contact.php'>Send Email</a> </button>
           
        </td>
    </tr>
    

  "


      ?>


      
      <?php
 





  }

}



?>



<?php

require_once "database.php";


if(isset($_GET['del_id'])){
     $id = $_GET['del_id'];
     $update2 = mysqli_query($conn, "DELETE FROM dashbord where id='$id';");
}

if(isset($_POST["Picked"])){
  $query = "SELECT id,product_name,product_model,quantity,price,contact,status from dashbord where status = 'picked';";

  $query_run = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($query_run)){
    echo "
    <tr>
         <td>".$row['id']."</td>
        <td>".$row['product_name']."</td>
        <td>".$row['product_model']."</td>
        <td>".$row['quantity']."</td>
        <td>".$row['price']."</td>
        <td>".$row['contact']."</td>
        <td>".$row['status']."</td>
        <td>
           <button name='add'> <a href='admin_dashbord.php?del_id=".$row['id']."'>Delete</a> </button>

           <button > <a href='contact.php'>Send Email</a> </button>
           
        </td>
    </tr>
    

    "


      ?>

      
      <?php
 





  }

}



?>




<?php

require_once "database.php";


if(isset($_GET['del_id'])){
     $id = $_GET['del_id'];
     $update2 = mysqli_query($conn, "DELETE FROM dashbord where id='$id';");
}

if(isset($_POST["cancelled"])){
  $query = "SELECT id,product_name,product_model,quantity,price,contact,status from dashbord where status = 'cancelled';";

  $query_run = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($query_run)){
    echo "
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['product_name']."</td>
        <td>".$row['product_model']."</td>
        <td>".$row['quantity']."</td>
        <td>".$row['price']."</td>
        <td>".$row['contact']."</td>
        <td>".$row['status']."</td>
        <td>
           <button name='add'> <a href='admin_dashbord.php?del_id=".$row['id']."'>Delete</a> </button>

           <button > <a href='contact.php'>Send Email</a> </button>
           
        </td>
    </tr>
    

    "


      ?>

      
      <?php
 





  }

}



?>
<?php

require_once "database.php";


if(isset($_GET['del_id'])){
     $id = $_GET['del_id'];
     $update2 = mysqli_query($conn, "DELETE FROM dashbord where id='$id';");
}

if(isset($_POST["rejected"])){
  $query = "SELECT id,product_name,product_model,quantity,price,contact,status from dashbord where status = 'rejected';";

  $query_run = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($query_run)){
    echo "
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['product_name']."</td>
        <td>".$row['product_model']."</td>
        <td>".$row['quantity']."</td>
        <td>".$row['price']."</td>
        <td>".$row['contact']."</td>
        <td>".$row['status']."</td>
        <td>
           <button name='add'> <a href='admin_dashbord.php?del_id=".$row['id']."'>Delete</a> </button>

           <button > <a href='contact.php'>Send Email</a> </button>
           
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

<center><h2>Seller Request</h2></center>

        <div class="container">
           
            <form action="admin_dashbord.php" method="post">
            <button name="req_btn">Request</button>

  <table>
    <tr>
        <th>User Id</th>
        <th>Product Name</th>
        <th>Product Model</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Contact</th>
        <th>Status</th>
        <th>Operation</th>
        
    
    </tr>
  

            <?php

require_once "database.php";


    if(isset($_GET['add_id'])){
     $id = $_GET['add_id'];
     $update1 = mysqli_query($conn, "UPDATE dashbord SET status = 'waiting' WHERE id = '$id';");
}




if(isset($_GET['can_id'])){
     $id = $_GET['can_id'];
     $update2 = mysqli_query($conn, "UPDATE dashbord SET status = 'rejected' WHERE id = '$id';");
}

if(isset($_POST["req_btn"])){
  $query = "SELECT id,product_name,product_model,quantity,price,contact,status from dashbord where status = 'requested';";

  $query_run = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($query_run)){
    echo "
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['product_name']."</td>
        <td>".$row['product_model']."</td>
        <td>".$row['quantity']."</td>
        <td>".$row['price']."</td>
        <td>".$row['contact']."</td>
        <td>".$row['status']."</td>
        <td>
           <button name='add'> <a href='admin_dashbord.php?add_id=".$row['id']."'>Accept</a> </button>
           <button name='cancel'> <a href='admin_dashbord.php?can_id=".$row['id']."'>Reject</a> </button>

           <button > <a href='update.php?id=".$row['id']."'>Edit</a> </button>

           <button > <a href='contact.php'>Send Email</a> </button>



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