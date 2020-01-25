<?php include("header.php"); ?>
<title>GoGreen</title>
<link rel="stylesheet" href="css/air.css">
<link rel="stylesheet" href="css/footer2.css">
<link  rel="stylesheet"  href="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.css"  />
<script  src="http://cdn.leafletjs.com/leaflet-0.7.5/leaflet.js"></script>
<style media="screen">
  #hold{
    width: 70%;
    height: 640px;
    overflow: auto;
    margin: 50px auto;
    background-image: url('images/air.png');
    background-size: cover;
    background-position: center center;
    border-radius: 4px;
    background-repeat: no-repeat;
  }
</style>
</head>
<body>
<?php include('topbar.php');?>

<?php
  if(isset($_REQUEST['city'])){
    $city = mysqli_real_escape_string($conn,$_REQUEST['city']);
    $lat = (int) mysqli_real_escape_string($conn,$_REQUEST['lat']);
    $lng = (int) mysqli_real_escape_string($conn,$_REQUEST['lng']);
  }
  else{
    $city ="Jaipur";
    $lat = 26.9124;
    $lng = 75.7873;
  }
 ?>

<div id="air">
  <input type="text" id="city" class=" d-none" id="inputPassword" value = "<?= $city ?>" placeholder="Search City">
  <input type="text" id="lat" class=" d-none" id="inputPassword" value = "<?= $lat ?>" placeholder="Search City" >
  <input type="text" id="lng" class=" d-none" id="inputPassword" value = "<?= $lng ?>" placeholder="Search City" >
    <div class="centerbox">
      <form class="" action="" method="post" onsubmit="return myFunct()">
        <div class="form-group row">

          <div class="col-sm-3">
            <input type="text" id="city2" class="form-control" id="inputPassword"  placeholder="Search City">

          </div>
          <a onclick = "myFunct()"><label for="inputPassword"  style="color:white;" class="col-sm-2 col-form-label font-weight-bold">Search</label></a>
        </div>
      </form>
    </div>
    <hr>
    <div class="recent">
      <br>

      <div class="box row">
          <div class="col-md-4 sp">
            <div class="innerbox">
              <div class="inhherhead">
                <a href="" class="btn btn-success"> <span class="cityname"> Jaipur </span> (AQI) </a>
              </div>
              <div  class="mmap" id='map1'> </div>
            </div>
          </div>
        <div class="col-md-4 sp">
          <div class="innerbox">
            <div class="inhherhead">
              <a href="" class="btn btn-success"> <span class="cityname"> Jaipur </span> (PM2.5) </a>
            </div>
            <div  class="mmap" id='map2'> </div>
          </div>
        </div>
        <div class="col-md-4 sp">
          <div class="innerbox">
            <div class="inhherhead">
            <a href="" class="btn btn-success"> <span class="cityname"> Jaipur </span> (PM10.) </a>
            </div>
            <div  class="mmap" id='map3'></div>
          </div>
        </div>
        <div class="col-md-4 sp">
          <div class="innerbox">
            <div class="inhherhead">
              <a href="" class="btn btn-success"> <span class="cityname"> Jaipur </span> (Ozone)</a>
            </div>
            <div  class="mmap" id='map4'></div>
          </div>
        </div>
        <div class="col-md-4 sp">
          <div class="innerbox">
            <div class="inhherhead">
              <a href="" class="btn btn-success"> <span class="cityname"> Jaipur </span> (Sulfur Dioxide.)</a>
            </div>
            <div  class="mmap" id='map5'></div>
          </div>
        </div>
        <div class="col-md-4 sp">
          <div class="innerbox">
            <div class="inhherhead">
              <a href="" class="btn btn-success"> <span class="cityname"> Jaipur </span> (Carbon Monoxide.)</a>
            </div>
            <div  class="mmap" id='map6'></div>
          </div>
        </div>

        <script type="text/javascript">

          function myFunct() {
            var city = document.getElementById('city2').value;
            console.log("helo");
            var request;
            // %2CIndia;
            var sum ="https://api.opencagedata.com/geocode/v1/json?q="+city+"%2CIndia&key=969607b9fc1941e78c6d96c7acfee3be&language=en&pretty=1";
            request = new XMLHttpRequest();
            request.open('GET', sum, true);
            request.onload = function () {
                  var data = JSON.parse(this.response);
                  if (request.status >= 200 && request.status < 400) {
                    console.log(data);
                    var lat = data['results'][0]['geometry']['lat'];
                    var lng =  data['results'][0]['geometry']['lng'];
                    var url = "air.php?city="+city+"&lat="+lat+"&lng="+lng;
                    console.log(url);
                    window.location = url;

                  }
                  else {
                      console.log(input1.value);
                  }
                }
                request.send();
                return false;
            }
        </script>

        <script>
          var city =document.getElementById('city').value;
          var lat = document.getElementById('lat').value;
          var lng = document.getElementById('lng').value;
          var citylist = document.getElementsByClassName('cityname');
          for(var i = 0; i<6; i++) citylist[i].textContent = city;
          var a = ["usepa-no2" ,"usepa-pm25" , "asean-pm10" , "usepa-o3" , "usepa-so2" , "usepa-co" ];
          for(var i = 1;i<=6; i++){
          var  OSM_URL  =  'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
          var  OSM_ATTRIB  =  '&copy;  <a  href="http://openstreetmap.org/copyright">OpenStreetMap</a>  contributors';
          var  osmLayer  =  L.tileLayer(OSM_URL,  {attribution:  OSM_ATTRIB});
          var  WAQI_URL    =  "https://tiles.waqi.info/tiles/"+a[i-1]+"/{z}/{x}/{y}.png?token=_TOKEN_ID_";
          var  WAQI_ATTR  =  'Air  Quality  Tiles  &copy;  <a  href="http://waqi.info">waqi.info</a>';
          var  waqiLayer  =  L.tileLayer(WAQI_URL);
          var map  =  L.map('map'+i).setView([lat,  lng],  8);
          map.addLayer(osmLayer).addLayer(waqiLayer);
          }
        </script>
      </div>
    </div>
</div>
<div id="hold">
</div>

<?php include('footer2.php')?>
