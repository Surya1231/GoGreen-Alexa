<?php include("header.php"); ?>
<title>GoGreen</title>
<link rel="stylesheet" href="css/challenges.css">
<link rel="stylesheet" href="css/footer2.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.3.1/smooth-scrollbar.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/8.3.1/plugins/overscroll.js" type="text/javascript"></script>
</head>
<body>
<?php include('topbar.php');?>

    <div class="wrapper">
  <div class="scroll-list">
    <div class="scroll-list__wrp js-scroll-content js-scroll-list">
      <?php
        $query="Select * from challenge";
        $result = mysqli_query($conn, $query);
        if($result){
        while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="scroll-list__item js-scroll-list-item">
        <h6 style="text-align:center; font-weight:bold;"> <?= $row['name'] ?> (200 Green Points)</h6><hr>
        <div class="row">
          <div class="col-md-8" style="overflow: hidden;">
            <p> <?= $row['description'] ?>  </p>
          </div>
          <div class="col-md-4">
            <div class="center">
              <button type="button" class="btn btn-outline-primary btn-sm sb" data-toggle="modal" data-target="#exampleModal3" data-description = "<?= $row['description'] ?>" data-startdate= "<?= $row['start-date'] ?>" data-enddate="<?= $row['end-date'] ?>"> Details</button>
              <a href="#" class="btn btn-outline-success btn-sm sb" style="margin-top: 10px;" data-toggle="modal" data-target="#exampleModal4"> Completed </a>
            </div>
          </div>
        </div>
      </div>

    <?php }} ?>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
      <div class="scroll-list__item js-scroll-list-item"></div>
    </div>
  </div>
</div>

<div class="modal" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> </button>
          <form class="" action="index.html" method="post">
            <div class="row">
            	<div class="col-sm-12">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Title</label>
              <input type="text" class="form-control" name="venue"  placeholder="Enter title" required>
            </div>
              </div>
              <div class="col-sm-12">
              	<div class="form-group">
              <label for="recipient-name" class="form-control-label">Description</label>
              <input type="text" class="form-control" name="city"  placeholder="Enter Description" required>
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
  </div>
</div>

<div class="modal" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> </button>
        <p>A Platform for Action World Environment Day is the UN's most important day for encouraging worldwide awareness and action for the protection of our environment. Since it began in 1974, it has grown to become a global platform for public outreach that is widely celebrated in over 100 countries.

</p><p>The People's Day Above all, World Environment Day is the "people's day" for doing something to take care of the Earth. That "something" can be focused locally, nationally or globally; it can be a solo action or involve a crowd. Everyone is free to choose.</p>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#exampleModal3').on('show.bs.modal', function (event) {
  console.log("here");
  var button = $(event.relatedTarget)
  var description = button.data('description')
  var startdate = button.data('description')
  var startdate = button.data('enddate')
  var modal = $(this)
  modal.find('.modal-body').text = description;
});
</script>


<script type="text/javascript">
$(document).ready(function () {
  var Scrollbar = window.Scrollbar;

  Scrollbar.use(window.OverscrollPlugin);

  var customScroll = Scrollbar.init(document.querySelector('.js-scroll-list'), {
    plugins: {
      overscroll: true
    }
  });

  var listItem = $('.js-scroll-list-item');

  listItem.eq(0).addClass('item-focus');
  listItem.eq(1).addClass('item-next');

  customScroll.addListener(function (status) {

    var $content = $('.js-scroll-content');

    var viewportScrollDistance = 0;


    viewportScrollDistance = status.offset.y;
    var viewportHeight = $content.height();
    var listHeight = 0;
    var $listItems = $content.find('.js-scroll-list-item');
    for (var i = 0; i < $listItems.length; i++) {
      listHeight += $($listItems[i]).height();
    }

    var top = status.offset.y;
    // console.log(top);
    var visibleCenterVertical = 0;
    visibleCenterVertical = top;

    var parentTop = 1;
    var $lis = $('.js-scroll-list-item');
    var $focusLi;
    for (var i = 0; i < $lis.length; i++) {
      var $li = $($lis[i]);
      var liTop = $li.position().top;
      var liRelTop = liTop - parentTop;

      var distance = 0;
      var distance = Math.abs(top - liRelTop);
      var maxDistance = $('.js-scroll-content').height() / 2;
      var distancePercent = distance / (maxDistance / 100);


      if (liRelTop + $li.parent().scrollTop() > top) {
        if (!$li.hasClass('item-focus')) {
          $li.prev().addClass('item-hide');
          $lis.removeClass('item-focus');
          $lis.removeClass('item-next');
        }
        $li.removeClass('item-hide');
        $li.addClass('item-focus');
        $li.next().addClass('item-next');
        break;
      }
    }
  });

});


</script>

<?php include('footer2.php') ?>
