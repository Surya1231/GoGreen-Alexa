<?php
include("header.php");
?>
<title>Events</title>
<link rel="stylesheet" href="css/ecofriendly.css">
<link rel="stylesheet" href="css/footer2.css">
<style media="screen">
  body{
    background: #eee url(https://subtlepatterns.com/patterns/extra_clean_paper.png);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    padding-bottom: 0;

  }
</style>
</head>
<body>
<?php
if(isset($_POST['search']) && ! empty ($_POST['search']))
{
  $product=mysqli_real_escape_string($conn,$_POST['product']);
  $query="Select * from ecofriendlyproducts where old='$product'";
  $result = $db->SinglerunQuery($query);
}
?>
<?php include 'topbar.php'; ?>
<div class="container">
  <div class="searchbar">
    <form method="post" action="ecofriendly.php">
      <input type="text" name="product" value="" placeholder="Search">
      <button type="submit" name="search" value="search" class="btn btn-secondary">Search</button>
    </form>
  </div>
  <br>
  <div class="alternative">
    <?php
    if(isset($result)){
    ?>
    <h5>Old Product : </h5>
    <p><?= $result['old'] ?></p>
    <h5>Alternate Product :</h5>
    <p><?= $result['alternative'] ?></p>
    <h5>Brief Description :</h5>
    <p><?= $result['description'] ?></p>
  <?php } ?>
  </div>
</div>
