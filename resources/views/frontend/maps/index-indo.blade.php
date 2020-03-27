<!DOCTYPE html>
<html>

<head>
  <title>Peta Sebaran Covid19-Indonesia</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js"></script>
  
  <style>
  * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 75%;
  padding: 0 10px;
}
.column-2 {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
  .column-2 {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #fff;
}
    html,
    body,
    #leaflet {
      height: 470px
    }
    /*Legend specific*/
.legend {
  padding: 6px 8px;
  font: 14px Arial, Helvetica, sans-serif;
  background: white;
  background: rgba(255, 255, 255, 0.8);
  /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
  /*border-radius: 5px;*/
  line-height: 24px;
  color: #555;
}
.legend h4 {
  text-align: center;
  font-size: 16px;
  margin: 2px 12px 8px;
  color: #777;
}

.legend span {
  position: relative;
  bottom: 3px;
}

.legend i {
  width: 18px;
  height: 18px;
  float: left;
  margin: 0 8px 0 0;
  opacity: 0.7;
}

.legend i.icon {
  background-size: 18px;
  background-color: rgba(255, 255, 255, 1);
}
/* .pulse {
    animation: pulsate 1s ease-out;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.0;
    background-color:blue;
}

.pulse2 {
    animation: pulsate 1s ease-out;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.0;
    background-color:red;
}


@keyframes pulsate {
    0% {transform: opacity: 0.0;}
    50% {opacity: 1.0;}
    100% {transform: opacity: 0.0;}
} */
  </style>
</head>

<body>
<div class="row">
  <div class="column">
    <div class="card">
    <div id="leaflet"></div>
    </div>
  </div>
  <div class="column-2">
    <div class="card">
      <h2 id="positif" style="color:orange">0</h2>
      <br>
      <p><b>Terkonfirmasi</b></p>
    </div>
    <div class="card">
      <h2 id="sembuh" style="color:green">0</h2>
      <br>
      <p><b>Sembuh</b></p>
    </div>
    <div class="card">
      <h2 id="meninggal" style="color:red">0</h2>
      <br>
      <p><b>Meninggal</b></p>
    </div>
  </div>
  </div>
 
  <script>
    var map = L.map('leaflet', {
      layers: [
        L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          'attribution': 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        })
      ],
      center: [-0.789275,113.9213257],
      zoom: 6
    });

    // Example adapted from http://jsfiddle.net/b7LgG/3/
    // provided by @danzel https://github.com/Leaflet/Leaflet/issues/4#issuecomment-35025365
    // Images from Leaflet Custom Icons tutorial http://leafletjs.com/examples/custom-icons/
    //We don't use shadows as you can't currently specify what pane shadows end up in

    //Create panes for each of the sets of markers
    var pane1 = map.createPane('markers1');
    var pane2 = map.createPane('markers2');

    $.ajax({ 
        type: 'GET', 
        url: "https://api.kawalcorona.com/indonesia/", 
        dataType: 'json',
        success: function (data) { 
            var sembuh=0;
            var positif=0;
            var meninggal=0;
            $.each(data,function(i,j){
                
                sembuh+=parseInt(j.sembuh);
                meninggal+=parseInt(j.meninggal);
                positif+=parseInt(j.positif);

            });

            $("#meninggal").text(meninggal);
            $("#sembuh").text(sembuh);
            $("#positif").text(positif);

        }
    });

    $.getJSON("https://faridzy.github.io/js/indonesia-prov.geojson",function(data){
        // add GeoJSON layer to the map once the file is loaded
       
        var total_meninggal=0;
        var datalayer = L.geoJson(data ,{
        onEachFeature: function(feature, featureLayer) {
            $.ajax({ 
            type: 'GET', 
            url: "https://api.kawalcorona.com/indonesia/provinsi/", 
            dataType: 'json',
            success: function (data) { 
                $.ajax({
                    type: 'GET', 
                    url: "{{secure_asset('provinsi.json')}}", 
                    dataType: 'json',
                    success: function (provinsi) { 
                        $.each(provinsi,function(i,k){
                            $.each(data,function(num,item){
                                var provinsi=item.attributes.Provinsi;
                                if(provinsi.toUpperCase()==feature.properties.Propinsi && k.name==feature.properties.Propinsi && k.name==provinsi.toUpperCase()){
                                  
                                    L.circleMarker(getRandomLatLng(k.latitude,k.longitude), {color:'red'}).addTo(map).bindPopup("<b>Provinsi "+k.name+"</b><br>Meninggal :" +item.attributes.Kasus_Meni+"");
                                    L.circleMarker(getRandomLatLngTwo(k.latitude,k.longitude), {color:'green'}).addTo(map).bindPopup("<b>Provinsi "+k.name+"</b><br>Sembuh :" +item.attributes.Kasus_Semb+"");
                                    L.circleMarker(getRandomLatLngThree(k.latitude,k.longitude), {color:'orange'}).addTo(map).bindPopup("<b>Provinsi "+k.name+"</b><br>Terkonfirmasi :" +item.attributes.Kasus_Posi+"");

                                }
                                  
                            });
                        });
                      

                    }
                });
                     
                
            }
        });    
       
        }
        }).addTo(map);
        map.fitBounds(datalayer.getBounds());
    
    });

    function getRandomLatLng(latitude,longitude) {
      return [
      parseFloat(latitude)- 0.1 * (Math.random() * (0.120 - 0.0200) + 0.200).toFixed(4),
      parseFloat(longitude) - 0.2 * (Math.random() * (0.120 - 0.0200) + 0.200).toFixed(4)
      ];
    }
    function getRandomLatLngTwo(latitude,longitude) {
      return [
      parseFloat(latitude)+ 0.2 * (Math.random() * (0.120 - 0.0200) + 0.300).toFixed(4),
      parseFloat(longitude) - 0.3 * (Math.random() * (0.120 - 0.0200) + 0.300).toFixed(4)
      ];
    }

    function getRandomLatLngThree(latitude,longitude) {
      return [
      parseFloat(latitude)- 0.3 * (Math.random() * (0.120 - 0.0200) + 0.400).toFixed(4),
      parseFloat(longitude) + 0.2 * (Math.random() * (0.120 - 0.0200) + 0.400).toFixed(4)
      ];
    }
    

   
    var legend = L.control({ position: "bottomleft" });

        legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Informasi Klasifikasi Data </h4>";
        div.innerHTML += '<i style="background: orange"></i><span>Terkonfirmasi</span><br>';
        div.innerHTML += '<i style="background: red"></i><span>Meninggal</span><br>';
        div.innerHTML += '<i style="background: green"></i><span>Sembuh</span><br>';
        
        

        return div;
        };

        legend.addTo(map);

  </script>
</body>

</html>