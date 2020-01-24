<?php
  session_start();
  $_SESSION["message"]="";
  $_SESSION["user"]=null;
  header("Location:index.php");
?>
