<?php
include("config.php");
$db=new Database();
$conn=$db->db_connect();
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
if(isset($_POST['register']) && ! empty ($_POST['register']))
{

	$_SESSION['name']=$name=mysqli_real_escape_string($conn,$_POST['name']);
	$_SESSION['email']=$email=mysqli_real_escape_string($conn,$_POST['email']);
	$_SESSION['contact']=$phone=mysqli_real_escape_string($conn,$_POST['contact']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$pss=base64_encode($password);
	$_SESSION['city']=$course=mysqli_real_escape_string($conn,$_POST['city']);
	$_SESSION['state']=$year=mysqli_real_escape_string($conn,$_POST['state']);
	$_SESSION['address']=$branch=mysqli_real_escape_string($conn,$_POST['address']);
	$url="index.php";
	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
	$contact = $_SESSION['contact'];
	$city = $_SESSION['city'];
	$state = $_SESSION['state'];
	$address = $_SESSION['address'];

		$querys="select * from user where email='$email'";
		$db_num=$db->db_num($querys);
		if($db_num>0)
		{
			$_SESSION['f_msg']="Email id is already registered with us.";
			header("Location:login.php");
		}
		else
		{
	 		$query="INSERT INTO `user` ( `name`, `email`, `contact`, `password`, `city`, `state`, `address`) VALUES ('$name','$email','$contact','$pss','$city','$state','$address')";
			$result=$db->insertQuery($query);
			unset($_SESSION['name']);
			unset($_SESSION['email']);
			unset($_SESSION['contact']);
			unset($_SESSION['city']);
			unset($_SESSION['state']);
			unset($_SESSION['address']);

			$query="select * from user where email='$email'";
			$db_num=$db->db_num($query);
			if($db_num>0)
			{
				$row = $db->SinglerunQuery($query);
				$_SESSION['user']=$row['uid'];
				header("Location:index.php");
			}
		}
}

// 			if($result)
// 			{
// 			/*		$to = $email;
// 					$from = "support@sphinxmnit.org";
// 			 		$subject = "Sphinx 2.0 Registration";
// 			 		$headers = 'From:' . $from;
// 			 		$message1="Dear $name\nGreetings from Sphinx 2.0.\nYour account has been successfully created.\n\nPlease find your account details below.\nName: $name\nEmail: $email\nRegistration ID: $registrationid\n\nPlease don't share your registration ID and password with anyone.\nIf you are a student outside MNIT Jaipur please complete your payment.\n\nFor payment and accomodation contact us:\nKurja Rathore\n7742419373\n2015umt1574@mnit.ac.in\n\nMeet Deshani\n7567838028\n2015uch1499@mnit.ac.in\n\n**This is auto generated mail,please do not reply**\n";
//
// 					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
// 			 		mail($to, $subject, $message1, $headers);
//
// 					*/
// 					// $headers  = 'MIME-Version: 1.0' . "\r\n";
// 					// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// 					$to = $email;
// 					$subject = "Sphinx'19 Registration";
// 					$message="Dear $name !\n\nGreetings from Sphinx'19\n\nYour account has been successfully created. Please find your account details below.\n\nName: $name\n\nEmail: $email\n\nRegistration ID: $registrationid\n\nPlease don't share your registration ID and password with anyone. If you are a student outside MNIT Jaipur please complete your payment.\n\nFor payment and accomodation contact us:\n\nRonak Gadia\n\n+91-8879755487\n\n2016ucp1185@mnit.ac.in\n\nShubham Verma\n\n+91-8290271273\n\n2016uec1073@mnit.ac.in\n\n**This is auto generated mail, please do not reply**\n\n";
// 					// $message = 'confirmation mail';
// 					// $from = "support@sphinxmnit.org";
// 					$from = "learnwebdevdhruv@gmail.com";
// 					// $headers .= 'From: '.$from."\r\n".
// 					// 'Reply-To: '.$from."\r\n" .
// 					// 'X-Mailer: PHP/' . phpversion();
// 					// mail($to,$subject,$message,$headers);
// 					mail($to,$subject,$message,"From:".$from);
//
//
//
//
//
//
//
//
//
//
//
//
// 				//$_SESSION["user_spix"]=$email;
//
// 				$_SESSION['register_msg']="Your registration has been compeleted.Your Sphinx2.o ID is $registrationid . Please check your email for login details, also check spam and junk folder.";
// 				header("Location:index.php");
//
// 			}
// 		}
// 	}
//
// }
// else
// {
// 	$_SESSION['f_msg']="Invalid request ";
// 	header("Location:index.php");
// }

?>
