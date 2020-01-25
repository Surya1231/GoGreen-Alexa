<?php include("header.php"); ?>
<title>GoGreen</title>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/footer2.css">
<link  rel="stylesheet"  href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css"  />
<script  src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
<style media="screen">
  #topbar{
    position: relative !important;
  }
  #fun {
    width: 90%;
    margin: auto;
    height: auto;
  }

  #fun .class1{
    text-align: center;
    padding-top: 100px;
    padding-bottom: 0;
  }

  .game{
    padding-top: 20px;
    padding-bottom: 30px;
    text-align: center;
  }

  .gamebox{
    padding: 50px;
  }
  .gaam{
    width: 80%;
    margin: auto;
    overflow: hidden;
  }

  iframe {
    overflow-y: hidden;
  }
  body {
    padding-bottom: 0px;
    background-image:  url("images/funbg.jpg");
    background-size: contain;
    color: white;
  }
</style>
</head>
<body>
<?php include('topbar.php');?>

<div id="fun">
  <div class="class1">
    <h1> Proceed to Alexa Skill : <a href="#"> Green Mafia </a></h1><br><br><hr>
    <h1> <br> Proceed to Alexa Skill :<a href="#">  Know Your Green Surrooundings </a><br><br></h1><hr>
  </div>
  <div class="row" style="width:90%; margin:auto;">
    <div class="col-md-4 gamebox" style="text-align:center;">
      CROSSWORD
      <img src="images/cross.jfif" width="100%" height="300px" onclick="func('https://www.englishmaven.org/HP6/Crossword%20Puzzle%20-%20The%20Environment.htm','Crossword')">
    </div>
    <div class="col-md-4 gamebox" style="text-align:center;">
      ENERGY CONSERVATION TIPS
      <img src="images/energy2.jpg" width="100%" height="300px" onclick="func('http://www.olliesworld.com/club/gamehouse.htm', 'Energy conservation game')">
    </div>
    <div class="col-md-4 gamebox">
      <img src="https://www.englishmaven.org/HP6/Crossword%20Puzzle%20-%20The%20Environment.htm" width="100%" height="300px" onclick="func()">
    </div>
  </div>
  <hr>
  <div class="game">
    <h1 id = "ihead"> Select a game to play here </h1><br>
    <div class="gaam">
      <iframe id="iframe" src="" width="100%" height="700px"></iframe>
    </div>
    <hr>
  </div>
  <!-- <div class="game">
    <h1> Environmental Quest</h1><br>
    <div class="gaam">
      <iframe src="https://www.englishmaven.org/HP6/Crossword%20Puzzle%20-%20The%20Environment.htm" width="100%" height="700px"></iframe>
    </div>
    <hr>
  </div>
  <div class="game">
    <h1> Environmental Quest</h1><br>
    <div class="gaam">
      <iframe src="https://www.energyarchive.ca.gov/energyquest/index.html" width="100%" height="700px"></iframe>
    </div>
    <hr>
  </div>
  <div class="game">
    <h1> Environmental Quest</h1><br>
    <div class="gaam">
      <iframe src="https://www.energyarchive.ca.gov/energyquest/index.html" width="100%" height="700px"></iframe>
    </div>
    <hr>
  </div> -->


</div>


<script type="text/javascript">
  function func(url, title){
    document.getElementById("ihead").textContent = title;
    var p = document.getElementById('iframe').src = url;
    console.log(p);
  }
</script>
<?php include('footer2.php'); ?>
