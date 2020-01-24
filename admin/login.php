    <?php include("adminheader.php"); ?>
    <link rel="stylesheet" href="../css/adminlogin.css">
    <title>Admin Login</title>
  </head>
  <body>
    <?php include("topbar.php");
    if(!isset($_SESSION["message"])) $_SESSION["message"] = "";
    ?>

      <div class="login">
        <div class="login1">
          
          <div class="two">
            GoGreen Admin Panel
          </div>
          <div class="three">
            <ul>
              <li>Gps Based technology platform for ambulances</li>
              <li>High Quality strategically placed ambulances for faster response time</li>
              <li>24/7 emergencies and technical support</li>
              <li>Experienced doctors to help in better decision making</li>
            </ul>
          </div>
        </div>
        <div class="login2">
          <div class="four">
            <div class="nav">
                <ul>
                  <li onclick="function1()">Login</li>
                </ul>
            </div>
            <div id="logincontainer">
              <div class="content">
                <form action="login_checker.php" method="post">
                  <input type="text" name="username" placeholder="Register Id">
                  <input type="password" name="password" placeholder="Password">
                  <input type="hidden" name="url" value="<?=$_SERVER['REQUEST_URI'];?>">
                  <p style="color:#B50A0C;"><?=@$_SESSION['message'];?> </p>
                <button class="button" style="vertical-align:middle"><i class="fas fa-sign-in-alt"></i> <span>Login </span></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

  </body>
</html>
