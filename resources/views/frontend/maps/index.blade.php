<!DOCTYPE html>
<html>

<head>
  <title>Peta Sebaran Covid19-Ponorogo</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link type="text/css" rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet-src.js"></script>
  
  <style>
    html,
    body,
    #leaflet {
      height: 400px
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
.pulse {
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
}
  </style>
</head>

<body>
  <div id="leaflet"></div>
  <script>
    var map = L.map('leaflet', {
      layers: [
        L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          'attribution': 'Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        })
      ],
      center: [-7.866688,111.466614],
      zoom: 9.5
    });

    // Example adapted from http://jsfiddle.net/b7LgG/3/
    // provided by @danzel https://github.com/Leaflet/Leaflet/issues/4#issuecomment-35025365
    // Images from Leaflet Custom Icons tutorial http://leafletjs.com/examples/custom-icons/
    //We don't use shadows as you can't currently specify what pane shadows end up in

    //Create panes for each of the sets of markers
    var pane1 = map.createPane('markers1');
    var pane2 = map.createPane('markers2');
    

    populate();


    //Add 200 markers to each of the groups/layers
    function populate() {
       
        $.ajax({ 
            type: 'GET', 
            url: "{{secure_url('api/kecamatan')}}", 
            dataType: 'json',
            success: function (data) { 
                $.each( data.kecamatan, function( key, val ) {
                    console.log(val.odp);
                    console.log(val.latitude+","+val.longitude);
                    console.log(getRandomLatLng(val.latitude,val.longitude));
                    
                    if(parseInt(val.odr)!=0){
                      L.circleMarker(getRandomLatLng(val.latitude,val.longitude), {className: 'pulse',color:'blue'}).addTo(map).bindPopup("<b>Kecamatan "+val.nama+"</b><br>ODR :" +val.odr+"");
                    }
                    if(parseInt(val.odp)!=0){
                      L.circleMarker(getRandomLatLngTwo(val.latitude,val.longitude), {className: 'pulse',color:'orange'}).addTo(map).bindPopup("<b>Kecamatan "+val.nama+"</b><br>ODP :" +val.odp+"");

                    }
                    if(parseInt(val.pdp)!=0){
                      L.circleMarker(getRandomLatLngThree(val.latitude,val.longitude), {className: 'pulse',color:'yellow'}).addTo(map).bindPopup("<b>Kecamatan "+val.nama+"</b><br>PDP :" +val.pdp+"");

                    }
                    if(parseInt(val.probable)!=0){
                      L.circleMarker(getRandomLatLngFour(val.latitude,val.longitude), {className: 'pulse',color:'green'}).addTo(map).bindPopup("<b>Kecamatan "+val.nama+"</b><br>Probable :" +val.probable+"");

                    }
                    if(parseInt(val.positif)!=0){
                      L.circleMarker(getRandomLatLngFive(val.latitude,val.longitude), {className: 'pulse',color:'red'}).addTo(map).bindPopup("<b>Kecamatan "+val.nama+"</b><br>Positif :" +val.positif+"");

                    }                    
                    


                    
                  
                  
                  
                
                });
            }
        });
       
    }
 

    function getRandomLatLng(latitude,longitude) {
      return [
      parseFloat(latitude)- 0.1 * (Math.random() * (0.120 - 0.0200) + 0.0200).toFixed(4),
      parseFloat(longitude) - 0.2 * (Math.random() * (0.120 - 0.0200) + 0.0200).toFixed(4)
      ];
    }
    function getRandomLatLngTwo(latitude,longitude) {
      return [
      parseFloat(latitude)+ 0.08 * (Math.random() * (0.120 - 0.0200) + 0.0300).toFixed(4),
      parseFloat(longitude) - 0.18 * (Math.random() * (0.120 - 0.0200) + 0.0300).toFixed(4)
      ];
    }

    function getRandomLatLngThree(latitude,longitude) {
      return [
      parseFloat(latitude)- 0.06 * (Math.random() * (0.120 - 0.0200) + 0.0400).toFixed(4),
      parseFloat(longitude) + 0.16 * (Math.random() * (0.120 - 0.0200) + 0.0400).toFixed(4)
      ];
    }
    function getRandomLatLngFour(latitude,longitude) {
      return [
      parseFloat(latitude)+ 0.04 * (Math.random() * (0.120 - 0.0200) + 0.0500).toFixed(4),
      parseFloat(longitude) - 0.14 * (Math.random() * (0.120 - 0.0200) + 0.0500).toFixed(4)
      ];
    }

    function getRandomLatLngFive(latitude,longitude) {
      return [
      parseFloat(latitude)- 0.02 * (Math.random() * (0.120 - 0.0200) + 0.0600).toFixed(4),
      parseFloat(longitude) + 0.12 * (Math.random() * (0.120 - 0.0200) + 0.0600).toFixed(4)
      ];
    }

    var legend = L.control({ position: "bottomleft" });

        legend.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Informasi Klasifikasi Data </h4>";
        div.innerHTML += '<i style="background: blue"></i><span>ODR(Orang Dalam Resiko)</span><br>';
        div.innerHTML += '<i style="background: orange"></i><span>ODP(Orang Dalam Pemantuan)</span><br>';
        div.innerHTML += '<i style="background: yellow"></i><span>PDP(Pasien Dalam Pemantuan)</span><br>';
        div.innerHTML += '<i style="background: green"></i><span>Kasus Probable</span><br>';
        div.innerHTML += '<i style="background: red"></i><span>Positif</span><br>';
        
        

        return div;
        };

        legend.addTo(map);

  </script>
</body>

</html>