<?php include("header.php"); ?>
<title>GoGreen</title>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/footer2.css">
<link  rel="stylesheet"  href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css"  />
<script  src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
<style media="screen">
  body{
    background-image:  url("images/scroll.jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }
  .nearby{
    width: 80%;
    height: 500px;
    margin: auto;
    padding-top: 100px;
  }
  #topbar{
    position: relative !important;
  }
</style>
</head>
<body>
<?php include('topbar.php');?>

<div class="nearby">
</div>

<?php include('footer2.php'); ?>
