<?php include("adminheader.php"); ?>
<link rel="stylesheet" href="../css/adminlogin.css">
<title>Admin Login</title>
</head>
<body>
<?php include("topbar.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $email = mysqli_real_escape_string($conn,$_POST['username']);
   $pass = base64_encode(mysqli_real_escape_string($conn,$_POST['password']));
   $name = mysqli_real_escape_string($conn,$_POST['name']);
   $query="Insert into `admin` (`name`,`email`,`password`) values('$name','$email','$pass')";
   $result=$db->insertQuery($query);
   header("Location:login.php");
}
?>

<form class="" action="signup.php" method="post">
  <input type="text" name="name" value="" placeholder="name">
  <input type="text" name="username" value="" placeholder="email">
  <input type="password" name="password" value="" placeholder="password">
  <button type="submit" name="button"> submit </button>
</form>
