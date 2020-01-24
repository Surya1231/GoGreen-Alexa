<?php
  include("config.php");
  $db = new Database();
  $conn = $db->db_connect();
  $email = mysqli_real_escape_string($conn,$_POST["username"]);
  $password = mysqli_real_escape_string($conn,$_POST["password"]);
  $url="login.php";
  if(!((strlen($email)>0)&&(strlen($password)>0)))
  {
    $_SESSION['message']="Please Fill Both fields correctly";
    header("Location:".$url);
  }
  else
  {
    $query="select * from user where email='".$email."'";
  	$nums=$db->db_num($query);
  	if($nums>0)
  	{
  		$row = $db->SinglerunQuery($query);
      echo $row["password"] ;
  		if(base64_decode($row["password"]) == $password)
  		{
  			$emailsss=$row['email'];
  		  $_SESSION["user"]=$row['uid'];
        $_SESSION['message'] = "";
  		  header("Location:index.php");
  		}
  		else{
  			$_SESSION["message"]="Registration id or password is incorrect.";
  			header("Location:".$url);
  		}
  	}
  	else
  	{
  			$_SESSION["message"]="Registration id Not Found.";
  			header("Location:".$url);
  	}

  }
?>
