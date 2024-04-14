<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>

<header><button><a href="admin_dashbord.php">Admin Dashboard</a></button></header>
    <div class="container">
        <form action="" method="post">
      
          <label for="fname">User Id</label>
          <input type="text" id="fname" name="user_id" placeholder="Enter User Id..">
      
         
      
          <label for="subject">Message</label>
          <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      
          <input type="submit" value="Submit" name="send">
      
        </form>
      </div>
</body>
</html>

<?php
require_once "data.php";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST["send"])){
  $id = $_POST['user_id'];
  $msg = $_POST['subject'];

  $query = "SELECT email,user_name from dashbord where id='$id'";
  $query_run = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($query_run);

  $email = $row['email'];
  $name = $row['user_name'];

  

//Load Composer's autoloader
require 'C:\xampp\htdocs\EGMS\Exception.php';
require 'C:\xampp\htdocs\EGMS\PHPMailer.php';
require 'C:\xampp\htdocs\EGMS\SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'egms4444@gmail.com';                     //SMTP username
    $mail->Password   = 'tozm kxjr yigi gssf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('egms4444@gmail.com', 'RecyHub');
    $mail->addAddress("$email", "$name ");     //Add a recipient
    

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email From Recyhub';
    $mail->Body    = "$msg";
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



}

?>