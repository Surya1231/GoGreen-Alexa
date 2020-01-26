<?php include("adminheader.php"); ?>
<?php
  if(!$_SESSION["admin"])
  {
  	$_SESSION["message"]="Please login to continue !";
    header("Location:login.php");
  }
?>
  <link rel="stylesheet" href="extra/style.css">
  <link rel="stylesheet" href="extra/dashboard.css">
  <title>Admin Dashboard</title>
</head>
<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
        </button>
      </div>
      <div class="img bg-wrap text-center py-4" style="background-image: url(../images/adminav.jpg);">
        <div class="user-logo">
          <div class="img" style="background-image: url(images/logo.jpg);"></div>
          <h3>Hello Admin</h3>
        </div>
      </div>
      <ul class="list-unstyled components mb-5">
        <li>
          <a href="dashboard.php"><span class="fas fa-adjust mr-3 notif"></span>Dashboard</a>
        </li>
        <li>
            <a href="issues.php"><span class="fa fa-bell mr-3 notif"></span>Issues</a>
        </li>
        <li>
          <a href="challenges.php"><span class="fa fa-gift mr-3"></span>Challenges</a>
        </li>
        <li >
          <a href="events.php"><span class="fa fa-trophy mr-3"></span>Events</a>
        </li>
        <li class="active">
          <a href="setting.php"><span class="fa fa-cog mr-3"></span> Settings</a>
        </li>
        <li>
          <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
        </li>
      </ul>

    </nav>

    <div id="content" class="p-4 p-md-5 pt-5">
      <form class="" action="index.html" method="post">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Event Name</label>
              <select class="form-control" name="event" required>
                <?php
                  $sql = "SELECT * FROM event WHERE active = '1'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $uuid=$row['host'];
                      $hostdata = $db->SinglerunQuery("select * from user where uid='$uuid'");
                ?>
                <option value="<?= $row['name'] ?>"> <?= $row['name'] ?></option>
              <?php } } ?>
            </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
          <label for="recipient-name" class="form-control-label">Attach Files</label><br>
          <input type="file"  name="description"  placeholder="Attach files" required>
        </div>
          </div>
        </div>
        <button type="submit" class="btn btn-outline-primary" name="button"> submit </button>
      </form>
    </div>
  </div>

  <script src="../lib/jquery.min.js"></script>
  <script src="../lib/Bootsrap/js/bootstrap.min.js"></script>
  <script src="extra/admindashboard.js"></script>
</body>
</html>
