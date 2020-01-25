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
    margin: auto;
    padding-top: 100px;
  }
  #topbar{
    position: relative !important;
  }

  h1{
    text-align: center;
  }

  .box{
    margin: auto;
    height: 300px;
    background-color: white;
    padding: 10px;
    padding-left: 50px;
    border: 2px solid #2c774b;
    border-radius: 10px;
    overflow-y: scroll;
  }

  .sp{
    padding-top: 30px;
  }

  .response{
    padding-bottom: 100px;
  }
</style>
</head>
<body>
<?php include('topbar.php');?>

<div class="nearby">
  <div class="row">
    <div class="col-md-8">
      <div class="form-group">
        <label for="exampleInputEmail1">Url</label>
        <input type="text" class="form-control" id="ur" aria-describedby="emailHelp" placeholder="Enter url">

        <small id="emailHelp" class="form-text text-muted">Url must end with .jpg , .png , .jpeg aur similar image force. If image is saved locally use google drive to create link.</small>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="exampleInputEmail1">Category</label>
        <select class="form-control" id="sel1">
        <option value="1" selected> Ananlyze image </option>
        <option value="2" > Detect Object </option>
        <option value="3"> Describe  Image </option>
        </select>
      </div>
    </div>
    <div class="col-md-2">
      <div class="sp">
        <button type="button" class="btn btn-outline-primary" name="button" onclick="fun()">Submit </button>
      </div>
    </div>

  </div>

<br>
<div class="response">
  <h1> Response </h1> <hr>
  <div class="row">
    <div class="col-md-3">
      <img id="img" src="" alt="Your image here" width="100%" height="300px">
    </div>
    <div class="box col-md-9" id="tet1">
      <p id= "tet"> Your response here </p>
    </div>
  </div>

</div>
</div>

<script type="text/javascript">
function fun(){

  var xhr = new XMLHttpRequest();
  var s = document.getElementById("sel1").value;
  var t = document.getElementById("ur").value;
  document.getElementById("img").src = t;
  console.log(t);
  if(s=="1")
  var url = "https://eastus2.api.cognitive.microsoft.com/vision/v2.0/analyze";
  else if(s=="3")
  var url = "https://eastus2.api.cognitive.microsoft.com/vision/v2.0/describe";
  else if(s=="2")
  var url = "https://eastus2.api.cognitive.microsoft.com/vision/v2.0/detect"
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.setRequestHeader("Ocp-Apim-Subscription-Key", "b60352e0ca414da4aebf3ad780109ee4");
  xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var te =  xhr.responseText.split(",").join("<br>");
        document.getElementById('tet1').innerHTML =te;
          var json = JSON.parse(xhr.responseText);

      }
  };
  var data = JSON.stringify({"url":t});
  xhr.send(data);
  return false;
}

</script>

<?php include('footer2.php'); ?>
