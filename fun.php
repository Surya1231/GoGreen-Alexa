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

  <div id="doctors" class="subcontent">
    <div class="treat">
      <div class="flex-container">
        <div class="xx">
          <div class="uppper">
            <h5>AIR MEASURES</h5>
            <img src="images/testing.jpg" width="380" height="220">
          </div>
          <div class="lower">
            <h6><b>5 Things to do in 2020 to help reduce air pollution</b></h6>
            <br>
            <ul>
              <li>Reduce your Driving</li>
              <li>Don't Idle Your Car</li>
              <li>Don't Burn Wood</li>
              <li>Trip Chain</li>
              <li>Take Public Transport</li>
            </ul>
            <br>
            <h5>TURN OFF YOUR KEY BE IDLE FREE</h5>
          </div>
        </div>
        <div class="xx">
          <div class="uppper">
            <h5>WATER MEASURES</h5>
            <img src="images/water.png" width="380" height="220">
          </div>
          <div class="lower">
            <h6><b>5 Minimum control measures</b></h6>
            <br>
            <ul>
              <li>Public Education</li>
              <li>Public Environment</li>
              <li>Illicit Discharge detection and Elimation</li>
              <li>Contruction site discharge control</li>
              <li>Good Housekeeping</li>
            </ul>
            <br>
            <h5>SAVE WATER SAVE LIFE</h5>
          </div>
        </div>
        <div class="xx">
          <div class="uppper">
            <h5>SOIL MEASURES</h5>
            <img src="images/soil.jpg" width="380" height="220">
          </div>
          <div class="lower">
            <h6><b>5 control measures</b></h6>
            <br>
            <ul>
              <li>Proper Solid Waste Treatment</li>
              <li>Ensure proper investigation of land</li>
              <li>Strictly control the pollution of new soil</li>
              <li>Transfer treatment costs to companies</li>
              <li>Strengthen policies that manage pollution</li>
            </ul>
            <br>
            <h5>SAVE MOTHER EARTH</h5>
          </div>
        </div>
        <div class="xx">
          <div class="uppper">
            <h5>DEFORESTRATION</h5>
            <img src="images/deforestration.jpg" width="380" height="220">
          </div>
          <div class="lower">
            <h6><b>Control of Deforestration</b></h6>
            <br>
            <ul>
              <li>Control an overgrazing in forest areas</li>
              <li>Check on reckless cutting of trees</li>
              <li>Check mining in forest areas</li>
              <li>Control of construction of large dams in forest</li>
              <li>Probihiting of agriculture in forest</li>
            </ul>
            <br>
            <h5>SAVE TREES SAVE LIFE</h5>
          </div>
        </div>
        </div>
      </div>
   </div>
</div>

<?php include('footer2.php'); ?>
