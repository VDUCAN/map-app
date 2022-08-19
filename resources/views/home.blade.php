@extends('layouts.map')
@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
   <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcJUWMUErQdR_Oe0tbNSVE9Uj7YMBQ6dQ" async defer></script>-->
<link
	rel="stylesheet"
	href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
	crossorigin=""
/>
<script
	src="https://unpkg.com/leaflet@1.7.1/dist/leaflet-src.js"
	integrity="sha512-I5Hd7FcJ9rZkH7uD01G3AjsuzFy3gqz7HIJvzFZGFt2mrCS4Piw9bYZvCgUE0aiJuiZFYIJIwpbNnDIM6ohTrg=="
	crossorigin=""
></script>
<script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>

  <!-- Load Esri Leaflet from CDN--> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

  <!-- Load Esri Leaflet Geocoder from CDN 
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
    integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
    crossorigin=""></script>-->
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
   crossorigin=""></script>
   <style>
     #map {position: sticky; top: 0; right: 0; bottom: 0; left: 0;width: 1184px;height: 500px;border:2px solid 80808040;}
    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }
    
    /* Style the buttons inside the tab */
    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px 12px;
    transition: 0.3s;
    font-size: 12px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }
    .modal {
    display: none; /* Hidden by default */
    position: fixed;  /* Stay in place */
    z-index: 1000000; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    top:100px;
    }
    /* Create an active/current tablink class */
    .tab button.active {
    background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    }
    .img-responsive {
        height: auto;
        width: auto;
        max-height: 60px;
        max-width: 250px;
        line-height: 60px; /* whatever the fixed height of the bar is */
    vertical-align: middle;
    }

    img {
        border: #ccc;
        object-fit: cover;
        max-width: 100%;
        max-height: 100%;
        border-radius:5px;
        /* box-shadow: 10px 10px 5px #ccc;
        -moz-box-shadow: 10px 10px 5px #ccc;
        -webkit-box-shadow: 10px 10px 5px #ccc;
        -khtml-box-shadow: 10px 10px 5px #ccc;
        */
        }

    img:hover {opacity: 0.7;}

    .modal-backdrop {
    z-index: -1 !important;
    }

    input 
    {
        width: 70%;
    }
</style>
@endsection
@section('map-content')
<div class="container">
    <div class="row justify-content-center" style="margin-bottom:500px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="text-align: center;background-color:darkblue;color:white"> Step 1/2</div>
                
                <div class="card-body" id="map" style="width: 100%;top:50%">
    
                    <a href="https://www.maptiler.com" style="position:absolute;left:10px;bottom:10px;"><img src="https://api.maptiler.com/resources/logo.svg" alt="MapTiler logo"></a>
                    </div>
                    <!-- <p><a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a></p>
                     -->
                     <div  style="overflow:hidden;width:30%;height:20%;background-color:white;position: absolute;margin-top: auto;z-index: 999;bottom:1%;left:2%;border: 1px solid blue">

           
                    <div style="width: 100%;height: 100%;display: flex;justify-content: center;">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input"  checked type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Point" >
                    <label class="form-check-label" for="inlineRadio1">Point</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input"  type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Polygon">
                    <label class="form-check-label" for="inlineRadio2">Polygon</label>
                    </div>

                    <div class="form-check form-check-inline" >
                    <button type="button" id="drawBtn"  style="width: 70px;height: 40px; background: darkcyan;border: none;color: white;border-radius: 5px 5px;" onclick="display()">
                    Draw
                    </button>
                    &nbsp;
                    <button type="button" style="width: 70px;;height: 40px; background: darkblue;border: none;color: white;border-radius: 5px 5px;" >
                        <a href="{{url('create-form')}}" style="text-decoration: none;color: white;">
                        Next 
                        </a>     
                    </button>
                    </div>
                    </div>

                    </div>
                   
                  
            
        </div>
    </div>
    
</div>

@endsection
@section('script')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcJUWMUErQdR_Oe0tbNSVE9Uj7YMBQ6dQ" async defer></script>
<link
	rel="stylesheet"
	href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
	integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
	crossorigin=""
/>
<script
	src="https://unpkg.com/leaflet@1.7.1/dist/leaflet-src.js"
	integrity="sha512-I5Hd7FcJ9rZkH7uD01G3AjsuzFy3gqz7HIJvzFZGFt2mrCS4Piw9bYZvCgUE0aiJuiZFYIJIwpbNnDIM6ohTrg=="
	crossorigin=""
></script>
<script src="https://unpkg.com/leaflet.gridlayer.googlemutant@latest/dist/Leaflet.GoogleMutant.js"></script>
<script>
    
</script>


<script>
                        // $(document).ready(function(){
                        //     function addPoint(){
                                var map = L.map('map').setView([51.505, -0.09], 13);
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                    maxZoom: 19,
                                    attribution: '© OpenStreetMap'
                                }).addTo(map);

                                
                                var marker,markerPoly,marker2,marker3;
                                marker= L.marker([51.509, -0.01]).addTo(map);
                             
                                var latlng;
                                var markers=[];
                                var latitide;
                                var allPolygon = [];      
                                var allMarkers = [];                 
                                var countMarker=0;
                                var countPolygon=0;

                                
                       function onMapClick(e) {
                                
              
                            var ele = document.getElementsByName('inlineRadioOptions');
              

                            for(i = 0; i < ele.length; i++) {
                            if (ele[i].checked == true ) {
                                if(ele[i].value == "Polygon" )
                                {

                                    map.removeLayer(marker);
                                    latlng = e.latlng;
                                    latitude=latlng['lat'];
                                    longitude = latlng['lng'];

                                    var latlngArray=[];
                                    latlngArray.push(latitude);
                                    latlngArray.push(longitude);
                                    markers.push(latlngArray);
                                    
                                    allMarkers[countMarker] = L.marker(latlngArray).addTo(map);
                                    countMarker++; 
                                                            
                                }
                                else 
                                if(ele[i].value == "Point" )
                                {
                                    
                                    if(countMarker > 0)
                                    {
                                        for(i = 0; i < countMarker; i++) {
                                            map.removeLayer(allMarkers[i]);  
                                        }
                                    }
                                    if(countPolygon > 0)
                                    {
                                        for(i = 0; i < countPolygon; i++) {
                                            map.removeLayer(allPolygon[i]);
                                        }
                                        markers= [];
                                    }
                                   
                                    latlng = e.latlng;
                                    countMarker=0;
                                    countPolygon=0;
                                  
                                }
                              
                            }
                            }
                        }
                        function pol()
                                {
                                    
                                }

                        map.on('click', onMapClick);

                     
                        function display() {
                            // var x = document.getElementById("myRadio");
                            // x.checked = true; 
                            var ele = document.getElementsByName('inlineRadioOptions');
              
                            for(i = 0; i < ele.length; i++) {
                            if (ele[i].checked == true ) {
                                if(ele[i].value == "Polygon" )
                                {
                                        
                                         
                                        allPolygon[countPolygon] = L.polygon(markers);
                                        allPolygon[countPolygon].addTo(map);    
                                         countPolygon++;
                                }
                                else 
                                if(ele[i].value == "Point" )
                                {               
                                    map.removeLayer(marker);
                                    marker = L.marker(latlng).addTo(map);    
                                }
                              
                            }
                            }
                            }


                            
                    // function RadioButton() {
                    //     var ele = document.getElementsByName('inlineRadioOptions');
                    //     var btn = document.getElementById('drawBtn');
                       
                    //     for(i = 0; i < ele.length; i++) {
                    //         if (ele[i].checked == true ) {
                    //                 btn.disabled = false;
                                   
                                   
                    //             } 
                    //         }
                        
                    // }
                

                    function goToNextForm(){
                        //alert(name)


                        var type0fPoint;
                        var latlngvalues;

                        var ele = document.getElementsByName('inlineRadioOptions');
              
                            for(i = 0; i < ele.length; i++) {
                            if (ele[i].checked == true ) {
                                if(ele[i].value == "Polygon" )
                                {
                                    type0fPoint="Polygon";
                                    latlngvalues = markers;
                                }
                                else if(ele[i].value == "Point" )
                                {   
                                    type0fPoint="Point";
                                    latlngvalues = latlng;
                                }
                                
                            }
                            }
                            alert(type0fPoint);
                            exit;
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            
                            
                            $.ajax({
                            url:"{{url('/create-form')}}",
                            method: "post",
                            dataType:'json',
                                data:{PointType:type0fPoint,LatLngvalues:latlngvalues},
                                error: function (request, error) {
                                    console.log(arguments);
                                    alert(" Can't do because: " + error);
                                },
                            success: function(response){

                                          alert(response)
                                    }
                                                                    
                        });
                        }

                    </script>
@endsection