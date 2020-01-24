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
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST')
  {
    // if(!isset($_POST['event-name']))$_POST['event-name'] = "dhruv";
    $event_name=mysqli_real_escape_string($conn,$_POST['event-name']);
    $type=mysqli_real_escape_string($conn,$_POST['type']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $start_date=mysqli_real_escape_string($conn,$_POST['start-date']);
    $end_date=mysqli_real_escape_string($conn,$_POST['end-date']);
    $query="Insert into `challenge` (`name`,`type`,`start-date`,`end-date`,`registrations`,`active`,`description`,`completions`) values('$event_name','$type','$start_date','$end_date','0','1','$description','0')";
    $result=$db->insertQuery($query);
    header("Location:challenges.php");
  }
 ?>
<body>

  <div class="modal fade" id="challenge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Host A New Challenge</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" method="post" action="challenges.php">
            <div class="row">
            	<div class="col-sm-12">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Event Name</label>
              <input type="text" class="form-control" name="event-name"  placeholder="Enter challenge name" required>
            </div>
              </div>
            </div>
            <div class="row">
            	<div class="col-sm-12">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Type</label>
              <select class="form-control" name="type">
                <option value="cleanliness">Cleanliness Drive</option>
                <option value="tree-plantation">Tree plantation</option>
                <option value="awareness">Awareness</option>
                <option value="other">Other</option>
              </select>
            </div>
              </div>
            </div>
            <div class="row">
            	<div class="col-sm-6">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Start Date</label>
              <input type="date" class="form-control" name="start-date"  placeholder="Enter start date" required>
            </div>
              </div>
              <div class="col-sm-6">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">End Date</label>
              <input type="date" class="form-control" name="end-date"  placeholder="Enter end  date" required>
            </div>
              </div>
            </div>
            <div class="row">
            	<div class="col-sm-12">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Description</label><br>
              <input type="text"  name="description"  placeholder="Enter Description" required>
            </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="newchallenge" value="newchallenge" class="btn btn-secondary">Add Challenge!</button>
        </div>
      </form>
      </div>
    </div>
  </div>

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
        <li >
            <a href="issues.php"><span class="fa fa-bell mr-3 notif"></span>Issues</a>
        </li>
        <li class="active">
          <a href="challenges.php"><span class="fa fa-gift mr-3"></span>Challenges</a>
        </li>
        <li >
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

      <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="white-box">
                  <h3 class="box-title float-left"> Challenges</h3>
                  <button class="box-title btn btn-primary float-right" style="color:white" data-toggle="modal" data-target="#challenge"> Add challenge </button>
                  <h3 style="clear:both"> </h3>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th> NAME </th>
                                  <th> Date </th>
                                  <th> City </th>
                                  <th> Details </th>
                                  <th> Completed By </th>

                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td class="txt-oflo">Elite admin</td>
                                  <td>SALE</td>
                                  <td class="txt-oflo">April 18, 2017</td>
                                  <td><span class="text-success">$24</span></td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td class="txt-oflo">Real Homes WP Theme</td>
                                  <td>EXTENDED</td>
                                  <td class="txt-oflo">April 19, 2017</td>
                                  <td><span class="text-info">$1250</span></td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td class="txt-oflo">Ample Admin</td>
                                  <td>EXTENDED</td>
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
                                  <td>SALE</td>
                                  <td class="txt-oflo">April 21, 2017</td>
                                  <td><span class="text-success">$24</span></td>
                              </tr>
                              <tr>
                                  <td>6</td>
                                  <td class="txt-oflo">Digital Agency PSD</td>
                                  <td>SALE</td>
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

      <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="white-box">
                  <h3 class="box-title"> Challenge Request </h3>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th> NAME </th>
                                  <th> Date </th>
                                  <th> City </th>
                                  <th> Details </th>
                                  <th> Completed By </th>

                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td class="txt-oflo">Elite admin</td>
                                  <td>SALE</td>
                                  <td class="txt-oflo">April 18, 2017</td>
                                  <td><span class="text-success">$24</span></td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td class="txt-oflo">Real Homes WP Theme</td>
                                  <td>EXTENDED</td>
                                  <td class="txt-oflo">April 19, 2017</td>
                                  <td><span class="text-info">$1250</span></td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td class="txt-oflo">Ample Admin</td>
                                  <td>EXTENDED</td>
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
                                  <td>SALE</td>
                                  <td class="txt-oflo">April 21, 2017</td>
                                  <td><span class="text-success">$24</span></td>
                              </tr>
                              <tr>
                                  <td>6</td>
                                  <td class="txt-oflo">Digital Agency PSD</td>
                                  <td>SALE</td>
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
