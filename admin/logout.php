<?php
  session_start();
  $_SESSION["message"]="";
  $_SESSION["admin"]=null;
  header("Location:login.php");
?>
