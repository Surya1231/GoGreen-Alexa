<?php
  include("../config.php");
  $db = new Database();
  $conn = $db->db_connect();
  $email = mysqli_real_escape_string($conn,$_POST["username"]);
  $password = mysqli_real_escape_string($conn,$_POST["password"]);
  $url=$_POST['url'];
  if(!((strlen($email)>0)&&(strlen($password)>0)))
  {
    $_SESSION['message']="Please Fill Both fields correctly";
    header("Location:".$url);
  }
  else
  {
    $query="select * from admin where email='".$email."'";
  	$nums=$db->db_num($query);
  	if($nums>0)
  	{
  		$row = $db->SinglerunQuery($query);
  		if(base64_decode($row["password"]) == $password)
  		{
  			$emailsss=$row['email'];
  		  $_SESSION["admin"]=$row['id'];
        $_SESSION['message'] = "";
  		  header("Location:dashboard.php");
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
