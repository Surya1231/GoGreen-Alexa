<?php include("header.php"); ?>
<title>GoGreen</title>
<link rel="stylesheet" href="css/info.css">
<link rel="stylesheet" href="css/footer2.css">
</head>
<body>

<?php include("topbar.php") ?>
<div id="info">
      <div class="topmenu">
        <div class="containermain"> </div>
        <div class="centered1">GoGreen</div>
        <div class="centered2">Every info you need to know!!</div>
        <div class="bottom-center">
            <div class="tablinks selectedtab" onclick="function1(event,'treatment')"> <div class="vertical"> Authorities </div>  </div>
            <div class="tablinks" onclick="function1(event,'hospitals')"> <div class="vertical"> Standards </div>  </div>
            <div class="tablinks" onclick="function1(event,'doctors')"> <div class="vertical"> Measures </div>  </div>
            <div class= "clear"></div>
        </div>
      </div>


         <div id="treatment" class="subcontent">
           <div class="treat text-align-center">
             <a href="https://en.wikipedia.org/wiki/List_of_environmental_ministries" class="btn btn-primary text-align-center" style="position:relative; left:40%;"> Environmental Authorities </a>
          </div>
         </div>

        <div id="hospitals" class="subcontent">
          <div class="treat">
            <div id="iimg1"></div>
            <div id="iimg2"></div>
            <div id="iimg3"></div>
         </div>
       </div>

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

      <script type="text/javascript">
      document.getElementsByClassName("tablinks")[2].click();
        function function1(event,id){

           var i, subcontent, sublinks;
                 subcontent = document.getElementsByClassName("subcontent");
                  sublinks = document.getElementsByClassName("tablinks");


                 for (i = 0; i < subcontent.length; i++) {
                   subcontent[i].style.display = "none";
                   }

                   for (i = 0; i < sublinks.length; i++) {
                     sublinks[i].className = sublinks[i].className.replace(" selectedtab", "");
                    }
                    console.log(id);
                    document.getElementById(id).style.display = "block";
                    event.currentTarget.className += " selectedtab";

        }
      </script>
</div>

<?php include('footer2.php')?>
