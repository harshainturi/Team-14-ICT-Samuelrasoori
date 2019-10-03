<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
  $host = "localhost";
  $user = "ictatjcu_ps";
  $password = "123zxc";
  $dbname = "ictatjcu_ps";

  $con = mysqli_connect($host, $user, $password,$dbname);
  // Check connection
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $name = $_POST['name'];
  $event = $_POST['event'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dates = $_POST['daterange'];
  $enquiry = $_POST['message'];

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'photography.samuelrasoori@gmail.com';                     // SMTP username
    $mail->Password   = 'samuelrasoori@ict14';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('photography.samuelrasoori@gmail.com', 'Samuel Rasoori');
    $mail->addAddress($email, $name);     // Add a recipient
    $mail->addAddress('photography.samuelrasoori@gmail.com');               // Name is optional

    // Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Enquiry Confirmation';
    $mail->Body    = "The Enquiry Details are : Name->"  . $name . "." ;
    $mail->Body .= "    Event:->" . $event . ".";
    $mail->Body .=  "   Dates:->" . $dates . ".";
    $mail->Body .="   Message->" . $enquiry . ".";
    $mail->Body .= "   Email Address->" . $email . ".";
    $mail->Body .= "  Contact Number:" . $phone . ".";
    $mail->AltBody = 'Enquiry Confirmation';


   if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Enquiry Confirmation Has been Sent, Please Check Your Inbox';
        $query = $con->query("INSERT INTO quote (name, event, email,phone, dates, message)
          VALUES ('$name','$event','$email','$phone','$dates','$enquiry')");
    }
    header("Location:index.php");

}

?>
