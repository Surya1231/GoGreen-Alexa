<?php include("header.php"); ?>
<title>GoGreen</title>
<link rel="stylesheet" href="css/issues.css">
<link rel="stylesheet" href="css/footer2.css">
</head>
<body>
  <button type="button" id="fake" class="btn btn-success btn-sm disp-none" data-toggle="modal" data-target="#discuss" style="visibility:hidden"></button>
  <?php
    if(isset($_REQUEST['upvote']))
    {
      $upid=mysqli_real_escape_string($conn,$_REQUEST['upvote']);
      $query="Update issue set upvotes=upvotes+1 where isid='$upid'";
      $result = mysqli_query($conn, $query);
      header("Location:issues.php");
    }

    if(!(isset($_POST['filter']) && !empty ($_POST['filter'])))
    {
      $status='all';
      $category='all';
    }
    else
    {
      $status=mysqli_real_escape_string($conn,$_POST['status']);
      $category=mysqli_real_escape_string($conn,$_POST['category']);
    }

    if($category=='all')
    {
      if($status=='all'){
        $query="Select * from issue where status!=0";
        $result = mysqli_query($conn, $query);
      }
    }
    else
    {
      if($status=='all'){
        $query="Select * from issue where category='$category' && status!=0";
        $result = mysqli_query($conn, $query);
      }
      else if($status=='solved'){
        $query="Select * from issue where category='$category' && status=1";
        $result = mysqli_query($conn, $query);
      }
      else{
        $query="Select * from issue where category='$category' && status=2";
        $result = mysqli_query($conn, $query);
      }
    }

    if(isset($_POST['raiseissue']) && ! empty ($_POST['raiseissue']))
    {
      $title=mysqli_real_escape_string($conn,$_POST['title']);
      $category=mysqli_real_escape_string($conn,$_POST['category']);
      $issue=mysqli_real_escape_string($conn,$_POST['issue']);
      $stack=mysqli_real_escape_string($conn,$_POST['stack']);
      $files="";
      for($i=1;$i<=(int)$stack;$i++)
      {
        // echo "here2";
        $fn="description".$i;
        // echo "here3";
        // echo $fn+"<br>";
        $target_dir = "issue-attachments/";
        $target_file = $target_dir . basename($_FILES[$fn]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($i==1){
          $files=$target_file;
        }
        else{
          $files=$files.','.$target_file;
        }
        if (move_uploaded_file($_FILES[$fn]["tmp_name"], $target_file)) {
            // echo "The file ". basename( $_FILES["description"]["name"]). " has been uploaded.";
        }
      }
      $host=$_SESSION["user"];
      $query="Insert into `issue` (`host`,`category`,`heading`,`issue`,`attachments`,`status`,`upvotes`) values('$host','$category','$title','$issue','$files','0','0')";
      $result=$db->insertQuery($query);
      header("Location:issues.php");
    }

    if(isset($_POST['submitsol']) && ! empty ($_POST['submitsol']))
    {
      header("Location:index.php");
      $description=mysqli_real_escape_string($conn,$_POST['sdescription']);
      $siid=mysqli_real_escape_string($conn,$_POST['siid']);
      echo $siid;
      $target_dir = "solution-attachments/";
      $target_file = $target_dir . basename($_FILES["satt"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      if (move_uploaded_file($_FILES["satt"]["tmp_name"], $target_file)) {
          // echo "The file ". basename( $_FILES["description"]["name"]). " has been uploaded.";
      } else {
          // echo "Sorry, there was an error uploading your file.";
      }
      $user=$_SESSION["user"];
      echo "here";
      $query="Insert into `solution` (`user`,`isid`,`description`,`attachments`,`status`) values('$user','$siid','$description','$target_file','0')";
      $result=$db->insertQuery($query);
      echo "here2";
      // header("Location:event.php");
    }
  ?>
  <?php include('topbar.php');?>
  <div class="modal fade" id="raiseissue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Raise An Issue</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" method="post" action="issues.php" enctype="multipart/form-data">
            <div class="row">
            	<div class="col-sm-12">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Title</label>
              <input type="text" class="form-control" name="title"  placeholder="Enter a title for your issue" required>
            </div>
              </div>
            </div>
            <div class="row">
            	<div class="col-sm-12">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Category</label>
              <select class="form-control" name="category">
                <option value="waste">Waste Management</option>
                <option value="air">Air Quality</option>
                <option value="garbage">Garbage Collection</option>
                <option value="water">Water Related</option>
                <option value="other">Other</option>
              </select>
            </div>
              </div>
            </div>
            <div class="row">
            	<div class="col-sm-12">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Description</label>
              <input type="text" class="form-control" name="issue"  placeholder="Enter your issue's description" required>
            </div>
              </div>
            </div>
            <div class="row">
              <label for="recipient-name" class="form-control-label">   Number of Attachments</label>
            	<div class="col-sm-9">
              	<div class="form-group">

              <input type="number" class="form-control" name="stack" id="stack" onchange="func()"  placeholder="Enter number of Attachments" required>
            </div>
              </div>
            </div>
            <div class="row" id="att">
            	<!-- <div class="col-sm-6">
              	<div class="form-group" id="att">
              <label for="recipient-name" class="form-control-label">Description</label><br>
              <input type="file"  name="description"  placeholder="Enter Description" required>
            </div>
              </div> -->
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="raiseissue" value="raiseissue" class="btn btn-secondary">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <?php
  if(isset($_REQUEST['discuss'])){
    $id=mysqli_real_escape_string($conn,$_REQUEST['discuss']);
    $selectedissue = $db->SinglerunQuery("select * from issue where isid='$id'");
  ?>
  <div class="modal fade" id="discuss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1400;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?= $selectedissue['heading'] ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><?= $selectedissue['issue'] ?></p>
          <?php
            $att=explode(',',$selectedissue['attachments']);
            for($i=0;$i<count($att);$i++){
          ?>
          <object width="400" height="400" data="<?= $att[$i] ?>"></object>
        <?php } ?>
        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#comment" style="display:inline;">Comment</button>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#solve" data-siid="<?= $id ?>" style="display:inline;">Solve Issue</button>
        </div>

        <br>
        <h5 class="modal-title">Comments(3)</h5>
        <div class="card bg-light p-3" style="width:inherit;">
          <ul>
            <li>Yeah, even I face the same issue everyday.- <i>(Surya)</i></li>
            <hr>
            <li>Authorities should take action as soon as possible.-<i>(Keshav)</i></li>
            <hr>
            <li>I hope action is taken as soon as possible.- <i>(Dhruv)</i></li>
            <hr>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Send message</button> -->
        </div>
      </div>
    </div>
  </div>
<?php } ?>

  <div id="solve" class="modal fade" role="dialog" style="z-index: 1600;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solve this Issue</h5>
      </div>

      <div class="modal-body">
        <form class="form" method="post" action="issues.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
            <label for="recipient-name" class="form-control-label">Description</label>
            <input type="text" class="form-control" name="sdescription"  placeholder="Give a brief description" required>
          </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
            <label for="recipient-name" class="form-control-label">Attachments</label>
            <br>
            <input type="file" name="satt"  placeholder="Give a brief description" required>
          </div>
            </div>
          </div>
          <input type="hidden" name="siid" id="send" value="">
          <button type="submit" name="submitsol" class="btn btn-success" name="button">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="comment" class="modal fade" role="dialog" style="z-index: 1600;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Comment on this Issue</h5>
    </div>

    <div class="modal-body">
      <form>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
          <label for="recipient-name" class="form-control-label">Comment</label>
          <input type="text" class="form-control" name="title"  placeholder="Enter your comment here" required>
        </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success" name="button">Submit</button>
      </form>
    </div>
  </div>
</div>
</div>

  <div class="container1" style="min-height:800px">
    <div class="issue-body row">
        <div class="sidenav col-md-3">
          <h4 style="text-align:left;">Filter Issues</h4>
          <form method="post" action="issues.php">
            <p>Status</p>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="all" name="status" value="all" checked>
              <label class="custom-control-label" for="all">All Issues</label>
            </div>

            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="solved" name="status" value="solved" >
              <label class="custom-control-label" for="solved">Solved Issues</label>
            </div>

            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="unsolved" name="status" value="unsolved" >
              <label class="custom-control-label" for="unsolved">Unsolved Issues</label>
            </div>

            <br>
            <p>Category</p>

            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="alll" name="category" value="all" checked >
              <label class="custom-control-label" for="alll">All Issues</label>
            </div>

            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="waste" name="category" value="waste" >
              <label class="custom-control-label" for="waste">Waste Management</label>
            </div>

            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="water" name="category" value="water" >
              <label class="custom-control-label" for="water">Water</label>
            </div>

            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="air" name="category" value="air" >
              <label class="custom-control-label" for="air">Air Quality</label>
            </div>

            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="garbage" name="category" value="garbage" >
              <label class="custom-control-label" for="garbage">Garbage Collection</label>
            </div>

            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="others" name="category" value="others" >
              <label class="custom-control-label" for="others">Others</label>
            </div>

            <br>
            <button type="submit" name="filter" value="filter" class="btn btn-secondary btn-sm" style="display:inline;">Apply</button>
            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#raiseissue" style="display:inline;">Raise An Issue</button>


          </form>

      </div>

        <div class="issues col-md-7">
          <?php
            while($row = mysqli_fetch_assoc($result))
            {
              $att1=(explode(',',$row['attachments']))[0];
          ?>

          <div class="row">
            <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $row['heading'] ?></h5>
              <p class="card-text"><i><?= $row['issue'] ?></i></p>
              <p class="card-text"><small class="text-muted"><i><strong>Category - </strong><?= $row['category'] ?></i></small></p>
              <p class="card-text"><small class="text-muted"><strong>Reported By </strong>- <?= $row['host'] ?></small></p>
            </div>
            <object width="400" height="400" data="<?= $att1 ?>" align="middle"></object>
            <ul class="list-group list-group-horizontal" width="100%">
              <br>
              <a href="issues.php?upvote=<?= $row['isid'] ?>" class="list-group-item btn-outline-primary" >Upvote(<?= $row['upvotes'] ?>)</a>
              <a href="issues.php?discuss=<?= $row['isid'] ?>" class="list-group-item btn-outline-info">Discuss</a>
            </ul>
          </div>
          </div>
        <?php } ?>
        </div>

        <div class="sidenav2 col-md-2">
          <ul class="list-group">
            <li class="list-group-item active">Hot Categories</li>
            <li class="list-group-item">Air Quality</li>
            <li class="list-group-item">Waste Management</li>
            <li class="list-group-item">Water</li>
          </ul>
          <br>
          <ul class="list-group">
            <li class="list-group-item active">Top Contributors</li>
            <li class="list-group-item">Dhruv</li>
            <li class="list-group-item">Surya</li>
          </ul>
        </div>
    </div>
  </div>
  <?php if(isset($_REQUEST['discuss'])){ ?>
   <script type="text/javascript">
     document.getElementById('fake').click();
   </script>
 <?php } ?>

  <script type="text/javascript">
    $('#solve').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var siid = button.data('siid')
    console.log(siid)
    // var name = button.data('name')
    var modal = $(this)
    // modal.find('.modalp').text('Are you sure you want to register for the event - '+name+' ?')
    modal.find('.modal-body #send').val(siid)
  })
  </script>
  <script type="text/javascript">
  var og=0;
    function func() {
      var element = document.getElementById("att");
      var count = document.getElementById('stack').value ;

      var nodes = document.getElementsByClassName('added');
      for(var i = 0; i < nodes.length; i++){
        nodes[i].parentNode.removeChild(nodes[i]);
      }
      for(var i=1; i<=count;i++){
        var newdiv = document.createElement('div');
        newdiv.innerHTML = '<div class="col-sm-6 added"><div class="form-group"><label for="recipient-name" class="form-control-label">Description</label><br><input type="file"  name="description'+i+'"  placeholder="Enter Description" required></div></div>';
        element.appendChild(newdiv);
      }
  }
  </script>


</body>
<?php include('footer2.php') ?>
