<?php include("adminheader.php"); ?>
<link rel="stylesheet" href="topbar.css">
  <title>Edit Event</title>
  </head>
<body style="background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);">
 <div id="topbar">
   <?php include("topbar.php"); ?>
 </div>
<?php
  if(!$_SESSION["admin"] || !isset($_REQUEST['eid']))
  {
    $_SESSION["message"]="Please login to continue !";
    header("Location:login.php");
  }
  if(isset($_REQUEST['save'])){
    header("Location:events.php");
  }
?>
<br> <br>
<div class="container" style="background-color:white; padding:20px; border-radius:20px; font-weight:bold">
  <form class="form" method="post" action="events.php">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
      <label for="recipient-name" class="form-control-label">Event Name</label>
      <input type="text" class="form-control" name="event-name"  placeholder="Enter event name" required>
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
      <label for="recipient-name" class="form-control-label">Venue</label>
      <input type="text" class="form-control" name="venue"  placeholder="Enter Venue" required>
    </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
      <label for="recipient-name" class="form-control-label">City</label>
      <input type="text" class="form-control" name="city"  placeholder="Enter City" required>
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
      <input type="file"  name="description"  placeholder="Enter Description" required>
    </div>
      </div>
    </div>
  <div class="modal-footer">
  <a type="button" class="btn btn-danger" href="events.php">Back</a>
  <button href="editevent.php?eid=1" type="submit" name="save" value="id" class="btn btn-success">Save Changes</button>
  </div>
  </form>
</div>

</body>
</html>
