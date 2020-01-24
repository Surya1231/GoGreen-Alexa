
<button type="button" class="d-none" id = "hidb"  data-toggle="modal" data-target="#editev">Host An Event!</button>
<?php  $id = $_REQUEST['edit']; ?>
<div class="modal fade" id="editev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit event for <?= $id ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form" method="post" action="events.php" enctype="multipart/form-data">
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
      </div>
      <div class="modal-footer">
        <a type="button" href="events.php" class="btn btn-outline-secondary" >Close </a>
        <a type="button" href="" class="btn btn-outline-success">Save</a>
        <a type="button" href="events.php" class="btn btn-outline-danger" onclick="return submitResult()">Cancel Event</a>

      </div>
    </form>
    </div>
  </div>
</div>
<script type="text/javascript">
document.getElementById('hidb').click();
function submitResult() {
   if ( confirm("Are you sure you wish to delete?") == false ) {
      return false ;
   } else {
      return true ;
   }
}
</script>
