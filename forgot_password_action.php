<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include('connect.php');
	if (isset($_POST["usernameforgot"])) {

		$email = $con->real_escape_string($_POST["usernameforgot"]);
				$_SESSION["email"] = $email;
		$data = $con->query("SELECT user_id FROM users WHERE email='$email'");
		if ($data->num_rows > 0) {
			$str = "0123456789qwerfyuguyoplkjhgfdsayxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			$url = "http://ps.ictatjcub.com/ICT/reset_password_action.php?token=$str&email=$email";
			require 'PHPMailer/src/Exception.php';
			require 'PHPMailer/src/PHPMailer.php';
			require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->addAddress($email);
$mail->setFrom("photography.samuelrasoori@gmail.com");
$mail->Subject = "Reset Password";
$mail->isHTML(true);
$mail->Body = " Hey There,<br><br>
Looks Like We need to reset Your Password, Please Click On the Link Below:";
$mail->Body .= "    Link:->" . $url . ".";
$mail->Body = "Regards,
Samuel Rasoori Photography.
";
if($mail->send()) {
	$con->query("UPDATE users SET token='$str', expire = DATE_ADD(NOW(), INTERVAL 5 MINUTE) WHERE email='$email'");
			echo $url;
		} else {
			echo "Error,Please Try Again!";
		}
	}
}
?>
