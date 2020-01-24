<?php include("header.php"); ?>
<title>GoGreen</title>
<link rel="stylesheet" href="css/gogreenbox.css">
<link rel="stylesheet" href="css/footer2.css">
</head>
<body>
<?php include('topbar.php');?>

<div id="index">
  <div class="centerbox">
    <a href="#" class="btn btn-lg btn-outline-success">Donate Funds</a>
    <a href="#" data-toggle="modal" data-target="#hostevent" class="btn btn-lg btn-outline-danger">Request Funds</a>
  </div>
  <hr>
  <div class="recent">
    <br>
    <h3 style="text-align:center;">Recent Activities</h3>
    <div class="scrollbox">
      <marquee direction="up">
          <li> Suryaprakash Agarwal Donated Rs2000 to the GoGreen Box. Cheers to Him!</li>
          <li> GoGreen sponsored Energy Club to distribute 50 solar lamps in unelectrified villages. </li>
          <li> Tesla promised investment of rs 1 crore for 1 million tree plantations. </li>
          <li> Anmol Mittal Donatated Rs10 to GoGreen Box. Cheers to Him!</li>
          <li> Keshav Sarraf requested rs3000 for seminar on renewable sources of energy.</li>
          <li> GoGreen joined hands with Greenify for plantation of 1 million tree.</li>
          <li> GoGreen funded Simpura village to build compost pits. </li>
      </marquee>
    </div>
  </div>



<div class="modal fade" id="hostevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request Funds</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" method="post" action="events.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
            <label for="recipient-name" class="form-control-label">Title</label>
            <input type="text" class="form-control" name="event-name"  placeholder="Enter Title" required>
          </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
            <label for="recipient-name" class="form-control-label">discription</label>
            <input type="text" class="form-control" name="venue"  placeholder="Reason for Funds" required>
            </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
            <label for="recipient-name" class="form-control-label">Amount</label>
            <input type="number" class="form-control" name="city"  placeholder="Enter Amount" required>
          </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
            <label for="recipient-name" class="form-control-label">Attach Relavant Files</label><br>
            <input type="file"  name="description"  placeholder="Enter Description" required>
          </div>
            </div>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">I agree to <a href="#">terms and Conditions.</a></label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="host" value="host" class="btn btn-primary">Request</button>
      </div>
    </form>
    </div>
  </div>
</div>
</div>


<?php include('footer2.php')?>
