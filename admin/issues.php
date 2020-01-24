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
  <style media="screen">
    button{
      z-index: 100;
    }
  </style>
</head>
<body>
  <?php
    if(isset($_REQUEST['eid']))
    {
      $type=mysqli_real_escape_string($conn,$_GET["accept"]);
      $eid=mysqli_real_escape_string($conn,$_GET["eid"]);
      $updatequery="Update `issue` set status='$type' where `isid`='$eid'";
      $update=$db->updateQuery($updatequery);
      header("Location:issues.php");
    }

    if(isset($_REQUEST['sid']))
    {
      $type=mysqli_real_escape_string($conn,$_GET["accept"]);
      $sid=mysqli_real_escape_string($conn,$_GET["sid"]);
      $updatequery="Update `solution` set status='$type' where `sid`='$sid'";
      $update=$db->updateQuery($updatequery);
      header("Location:issues.php");
    }
  ?>

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
        <li class="active">
            <a href="issues.php"><span class="fa fa-bell mr-3 notif"></span>Issues</a>
        </li>
        <li>
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
                  <h3 class="box-title"> Issues </h3>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>Issue Id</th>
                                  <th> User </th>
                                  <th> Title </th>
                                  <th> Category </th>
                                  <th> Details </th>
                                  <th> Attachments </th>
                                  <th> Approve </th>
                                  <th> Discard </th>
                              </tr>
                          </thead>
                          <?php
                            $query="Select * from issue where status=0";
                            $issues=mysqli_query($conn, $query);
                          ?>
                          <tbody>
                            <?php while($row = mysqli_fetch_assoc($issues)) {
                              $uuid=$row['host'];
                              $hostdata = $db->SinglerunQuery("select * from user where uid='$uuid'");
                              // $att=(explode(',',$row['attachments']))[0];
                              ?>
                              <tr>
                                  <td><?= $row['isid'] ?></td>
                                  <td class="txt-oflo"><?= $hostdata['name'] ?></td>
                                  <td class="txt-oflo"><?= $row['heading'] ?></td>
                                  <td class="txt-oflo"><?= $row['category'] ?></td>
                                  <td><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#det" data-title="<?= $row['heading'] ?>" data-category="<?= $row['category'] ?>" data-issue="<?= $row['issue'] ?>">View</button></td>
                                  <td><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#att"  data-att="<?= $row['attachments'] ?>" data-title="<?= $row['heading'] ?>">View</button></td>
                                  <td> <a href="issues.php?accept=1&eid=<?= $row['isid'] ?>"  class="btn btn-outline-success"> Approve </a></td>
                                  <td><a href="issues.php?accept=3&eid=<?= $row['isid'] ?>"  class="btn btn-outline-danger"> Decline </a></td>
                              </tr>
                              <?php } ?>

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="white-box">
                  <h3 class="box-title"> Issue Solve Request </h3>
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>USerId</th>
                                  <th> Name </th>
                                  <th> IssueId </th>
                                  <th> Details </th>
                                  <th> Attachments </th>
                                  <th> Reward </th>
                                  <th> Approve </th>
                                  <th> Discard </th>
                              </tr>
                          </thead>
                          <?php
                            $query="Select * from solution where status=0";
                            $solutions=mysqli_query($conn, $query);
                          ?>
                          <tbody>
                            <?php while($row = mysqli_fetch_assoc($solutions)) {
                              $uuid=$row['user'];
                              $isuid=$row['isid'];
                              $hostdata = $db->SinglerunQuery("select * from user where uid='$uuid'");
                              $issue = $db->SinglerunQuery("select * from issue where isid='$isuid'");
                              // $att=(explode(',',$row['attachments']))[0];
                              ?>
                              <tr>
                                  <td><?= $uuid ?></td>
                                  <td class="txt-oflo"><?= $hostdata['name'] ?></td>
                                  <td class="txt-oflo"><?= $row['isid'] ?></td>
                                  <td><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#det" data-title="<?= $issue['heading'] ?>" data-category="<?= $issue['category'] ?>" data-issue="<?= $issue['issue'] ?>">View</button></td>
                                  <td><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#att" data-att="<?= $row['attachments'] ?>" data-title="<?= $row['description'] ?>">View</button></td>
                                  <td> <input class="form-control display-1" type="number" value="100" style="font-size:20px; height:50px !important; max-width:120px;"></td>
                                  <td> <a href="issues.php?accept=1&sid=<?= $row['sid'] ?>"  class="btn btn-outline-success"> Approve </a></td>
                                  <td><a href="issues.php?accept=2&sid=<?= $row['sid'] ?>"  class="btn btn-outline-danger"> Decline </a></td>
                              </tr>
                              <?php } ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>


      <!--  Models -->
        <div class="modal fade" id="det" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details of </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body details">
                <p id="cat"></p>
                <p id="iss"></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="att" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Details of </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body details">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div>
        </div>


    </div>
  </div>

  <script type="text/javascript">
  $('#det').on('show.bs.modal', function (event) {
    console.log("here");
    var button = $(event.relatedTarget);
    var title = button.data('title');
    var issue = button.data('issue');
    var category = button.data('category');
    var modal = $(this);
    modal.find('.modal-title').text(title);
    modal.find('#cat').text("Category - "+category);
    modal.find('#iss').text(issue);
  });

  $('#att').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var att = button.data('att')
    var title = button.data('title')
    var modal = $(this)
    modal.find('.modal-title').text('Attachments of ' + title);
    var count = 1;
    var res = att.split(",");
    modal.find('.details').empty();
    res.forEach(function myfunction(item){
      modal.find('.details').append("<h4><a target='_blank' href='../"+item+"'> Attachment "+count+"</a></h4><br>");
      count++;
    });
  });

  </script>
  <script src="../lib/jquery.min.js"></script>
  <script src="../lib/Bootsrap/js/bootstrap.min.js"></script>
  <script src="extra/admindashboard.js"></script>
</body>
</html>
