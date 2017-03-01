<?php
session_start();
?>
<?php

if (isset($_POST['sendMail'])) {
        sendMail();
    }
function sendMail(){
    
    if(isset($_POST['id'])&&!empty($_POST['id']))
    {
		
		$pass = bin2hex(openssl_random_pseudo_bytes(8));
							
        include 'Mysql_connect.php';
		require_once "PHPMailer_5.2.4/class.phpmailer.php";
		
        $id=$_POST['id'];
		
		$sql = "select password from user where id=".$id;
		$result = $conn->query($sql);
		$num=$result->num_rows;
		if ( $num> 0) {
			$row = $result->fetch_assoc();
			$oldPassword=$row["password"];
			
			$sql = "update user set password='".md5($pass)."' where id=".$id;
			if($conn->query($sql)==true){
				$sql = "select email from user where id=".$id;
				$result = $conn->query($sql);
				$num=$result->num_rows;
				if ( $num> 0) {
					$row = $result->fetch_assoc();
					$emailid=$row["email"];
					if($emailid==''){
						$sql = "update user set password='".$oldPassword."' where id=".$id;
						$conn->query($sql);
						echo '<script language="javascript">';
						echo 'alert("No email id found. \nPassword not updated")';
						echo '</script>';
					}else{
						$msg="Recovery Password for Project Management System :-\n ".$pass;
						
						$mail = new PHPMailer(); // create a new object
						$mail->IsSMTP(); // enable SMTP
						$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
						$mail->SMTPAuth = true; // authentication enabled
						$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
						$mail->Host = "smtp.gmail.com";
						$mail->Port = 465; // or 587
						$mail->IsHTML(true);
						$mail->Username = "avsdev847@gmail.com";
						$mail->Password = "avsdev847@tempEmail";
						$mail->SetFrom("avsdev847@gmail.com");
						$mail->Subject = "Password Recovery";
						$mail->Body =$msg;
						$mail->AddAddress($emailid);

						 if(!$mail->Send()) {
							$sql = "update user set password='".$oldPassword."' where id=".$id;
							$conn->query($sql);
							echo '<script language="javascript">';
							echo 'alert("Email not Send \nMailer Error:Authentication Required\n\nPassword not updated")';
							echo '</script>';
						} else {
							echo '<script language="javascript">';
							echo 'alert("password updated and send throgh Email")';
							echo '</script>';
							header("Location: /Project/index.php");
						}
					}
				}
			}else{
				echo '<script language="javascript">';
				echo 'alert("unable to update password")';
				echo '</script>';
			}
		}else{
			echo '<script language="javascript">';
			echo 'alert("No User")';
			echo '</script>';
		}
    }
    else{
        echo '<script language="javascript">';
        echo 'alert("Enter the id first")';
        echo '</script>';
    }
    
}
?>
<html>
<head>
<title>Reset Password Form</title>
<link href="css/styleForget.css" rel="stylesheet" type="text/css" media="all"/>

</head>
<body>
<div class="element">
	<div class="element-main">
		<h1>Forgot Password</h1>
		<form action="ForgetPassword.php" method="POST">
		<center>
			<input type="number" value="Your ID" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your ID';}" name="id" placeholder="Employee ID">
			<input type="submit" value="Reset my Password" name="sendMail">
		</center>
		</form>
	</div>
</div>

</body>
</html>