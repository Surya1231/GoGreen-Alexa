<?php include("adminheader.php"); ?>
<?php
  if(!isset($_SESSION["admin"]) || !$_SESSION["admin"])
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
        <li class="active">
            <a href="dashboard.php"><span class="fas fa-adjust mr-3 notif"></span>Dashboard</a>
        </li>
        <li>
            <a href="issues.php"><span class="fa fa-bell mr-3 notif"></span>Issues</a>
        </li>
        <li>
          <a href="challenges.php"><span class="fa fa-gift mr-3"></span>Challenges</a>
        </li>
        <li>
          <a href="events.php"><span class="fa fa-trophy mr-3"></span>Events</a>
        </li>
        <li>
          <a href="setting.php"><span class="fa fa-cog mr-3"></span> Settings</a>
        </li>
        <li>
          <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
        </li>
      </ul>

    </nav>

    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="row bg-title">
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h1>Dashboard</h1> </div>
      </div>

      <div class="row">
          <div class="col-lg-4 col-sm-6 col-xs-12">
              <div class="white-box analytics-info">
                  <h2 class="box-title"> Users </h2>
                  <ul class="list-inline two-part">
                      <li>
                        Total Users Registered : <span class="text-primary"> 650 </span>
                      </li>
                      <li>
                        Users Registered this week : <span class="text-info"> 650 </span>
                      </li>
                      <li>
                        Total active users : <span class="text-success"> 650 </span>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h2 class="box-title"> Issues </h2>
                <ul class="list-inline two-part">
                    <li>
                      Total Users Registered : <span class="text-primary"> 650 </span>
                    </li>
                    <li>
                      Users Registered this week : <span class="text-info"> 650 </span>
                    </li>
                    <li>
                      Total active users : <span class="text-success"> 650 </span>
                    </li>
                </ul>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h2 class="box-title"> Events </h2>
                <ul class="list-inline two-part">
                    <li>
                      Total Users Registered : <span class="text-primary"> 650 </span>
                    </li>
                    <li>
                      Users Registered this week : <span class="text-info"> 650 </span>
                    </li>
                    <li>
                      Total active users : <span class="text-success"> 650 </span>
                    </li>
                </ul>
            </div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="white-box">
                  <h3 class="box-title">Recent funds</h3>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr style="background-color:#00FF00">
                                  <th>#</th>
                                  <th>NAME</th>
                                  <th>STATUS</th>
                                  <th>DATE</th>
                                  <th>PRICE</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td class="txt-oflo">Elite admin</td>
                                  <td>PROCESSING</td>
                                  <td class="txt-oflo">April 18, 2017</td>
                                  <td><span class="text-success">$24</span></td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td class="txt-oflo">Real Homes WP Theme</td>
                                  <td>APPROVED</td>
                                  <td class="txt-oflo">April 19, 2017</td>
                                  <td><span class="text-info">$1250</span></td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td class="txt-oflo">Ample Admin</td>
                                  <td>APPROVED</td>
                                  <td class="txt-oflo">April 19, 2017</td>
                                  <td><span class="text-info">$1250</span></td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td class="txt-oflo">Medical Pro WP Theme</td>
                                  <td>TAX</td>
                                  <td class="txt-oflo">April 20, 2017</td>
                                  <td><span class="text-danger">-$24</span></td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td class="txt-oflo">Hosting press html</td>
                                  <td>PROCESSING</td>
                                  <td class="txt-oflo">April 21, 2017</td>
                                  <td><span class="text-success">$24</span></td>
                              </tr>
                              <tr>
                                  <td>6</td>
                                  <td class="txt-oflo">Digital Agency PSD</td>
                                  <td>PROCESSING</td>
                                  <td class="txt-oflo">April 23, 2017</td>
                                  <td><span class="text-danger">-$14</span></td>
                              </tr>
                              <tr>
                                  <td>7</td>
                                  <td class="txt-oflo">Helping Hands WP Theme</td>
                                  <td>MEMBER</td>
                                  <td class="txt-oflo">April 22, 2017</td>
                                  <td><span class="text-success">$64</span></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>

    </div>
  </div>

  <script src="../lib/jquery.min.js"></script>
  <script src="../lib/Bootsrap/js/bootstrap.min.js"></script>
  <script src="extra/admindashboard.js"></script>
</body>
</html>
