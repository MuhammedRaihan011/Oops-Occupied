<?php
session_start();
include 'vendorbase.php';
include '../connection.php';
$email=$_SESSION['email'];
$id=$_SESSION['id'];
?>
<style>
    td,th{
        padding: 5px;
    }
    /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
         #map {
          height: 700px;
          width:500px;
          border-style:groove;
          border-width:thick;
          /*margin-left:300px;
          margin-top:30px;
          margin-bottom:30px;*/
        }
        
        html, body {
          height: 100%;
          margin: 0;
          padding: 0;
        }
        #description {
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
        }
  
        #infowindow-content .title {
          font-weight: bold;
        }
  
        #infowindow-content {
          display: none;
        }
  
        #map #infowindow-content {
          display: inline;
        }
  
        .pac-card {
          margin: 10px 10px 0 0;
          border-radius: 2px 0 0 2px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          outline: none;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
          background-color: #fff;
          font-family: Roboto;
        }
  
        #pac-container {
          padding-bottom: 12px;
          margin-right: 12px;
        }
  
        .pac-controls {
          display: inline-block;
          padding: 5px 11px;
        }
  
        .pac-controls label {
          font-family: Roboto;
          font-size: 13px;
          font-weight: 300;
        }
  
        #pac-input {
          background-color: #fff;
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
          margin-left: 12px;
          padding: 0 11px 0 13px;
          text-overflow: ellipsis;
          width: 400px;
        }
  
        #pac-input:focus {
          border-color: #4d90fe;
        }
  
        #title {
          color: #fff;
          background-color: #4d90fe;
          font-size: 25px;
          font-weight: 500;
          padding: 6px 12px;
        }
        #target {
          width: 345px;
        }
</style>
<form method="POST" enctype="multipart/form-data">
    <div style="margin:50px; margin: 50px;">
    <h1 style="margin: 20px;">Upload your property</h1>
    <center>
        <table>
            <tr>
                <td rowspan="15">
                    Select location from map
                    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                
                     <div id="map"></div>
                     <input onclick="deleteMarkers();" type=button value="Refresh location">
                </td>
            </tr>
             <tr>
                <td>Country</td>
                <td><input type="text" class="form-control" name="txtCountry"  pattern="[a-zA-Z ]+" required></td>
            </tr>
            
            <tr>
                <td>Province</td>
                <td><input type="text" class="form-control" name="txtProvince" pattern="[a-zA-Z ]+" required></td>
            </tr>
            <tr>
                <td>Zone</td>
                <td><input type="text" class="form-control" name="txtZone" pattern="[a-zA-Z ]+" required=""></td>
            </tr>
            <tr>
                <td>District</td>
                <td><input type="text" class="form-control" name="txtDistrict" pattern="[a-zA-Z ]+" required=""></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" class="form-control" name="txtCity" pattern="[a-zA-Z ]+" required=""></td>
            </tr>
            <tr>
                <td>Ward no</td>
                <td><input type="number" class="form-control" name="txtWard" required=""></td>
            </tr>
            <tr>
                <td>Total room</td>
                <td><input type="number" class="form-control" name="txtTotal" required=""></td>
            </tr>
            <tr>
                <td>Bed room</td>
                <td><input type="number" class="form-control" name="txtBedroom" required=""></td>
            </tr>
            <tr>
                <td>Living room</td>
                <td><input type="number" class="form-control" name="txtLiving" required=""></td>
            </tr>
            <tr>
                <td>Kitchen</td>
                <td><input type="number" class="form-control" name="txtKitchen" required=""></td>
            </tr>
            <tr>
                <td>Bathroom</td>
                <td><input type="number" class="form-control" name="txtBathroom" required=""></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea class="form-control" name="txtDescription" required></textarea></td>
            </tr>
            <tr>
                <td>Rent per month</td>
                <td><input type="number" class="form-control" name="txtRent" required=""></td>
            </tr>
            <tr>
                <td>Upload image</td>
                <td><input type="file" name="txtFile" class="form-control" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-warning" name="btnSubmit" value="Upload"></td>
            </tr>
        </table>
    
</div>
     <input type="text" id="l1" style="visibility: hidden;" required name="l1">
                <input type="text" id="l2" style="visibility: hidden;" required name="l2">
</form>
<?php
if(isset($_REQUEST['btnSubmit']))
{
    $country=$_REQUEST['txtCountry'];
    $province=$_REQUEST['txtProvince'];
    $zone=$_REQUEST['txtZone'];
    $district=$_REQUEST['txtDistrict'];
    $city=$_REQUEST['txtCity'];
    $ward=$_REQUEST['txtWard'];
    $room=$_REQUEST['txtTotal'];
    $bedroom=$_REQUEST['txtBedroom'];
    $living=$_REQUEST['txtLiving'];
    $kitchen=$_REQUEST['txtKitchen'];
    $bathroom=$_REQUEST['txtBathroom'];
    $description=$_REQUEST['txtDescription'];
    $rent=$_REQUEST['txtRent'];
 $l1=$_REQUEST['l1'];
 $l2=$_REQUEST['l2'];
    $folder='../assets/images/';
    $file=$folder.basename($_FILES['txtFile']['name']);
    move_uploaded_file($_FILES['txtFile']['tmp_name'],$file);
    $q="insert into tblproperty (vId,country,province,zone,district,city,wardno,totalroom,bedroom,livingroom,kitchen,bathroom,description,img,status,rent,lat,lon)"
            . " values('$id','$country','$province','$zone','$district','$city','$ward','$room','$bedroom','$living','$kitchen','$bathroom','$description','$file','available','$rent','$l1','$l2')";
    echo $q;    
    $s= mysqli_query($conn, $q);

        if($s)  
        {
            
                $msg="Registration completed";
               
                echo '<script>alert("'.$msg.'")</script>';
                echo '<script>location.href="newproperty.php"</script>';
        }
            else
            {
                echo '<script>alert("Sorry some error occured")</script>';
            }
        
        
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   
    
            
                        function initAutocomplete() {
                         var map = new google.maps.Map(document.getElementById('map'), {
                             center: { lat: 10.1076, lng: 76.3457 },
                             zoom: 13,
                             mapTypeId: 'roadmap'
                         });
            
                         google.maps.event.addListener(map, "click", function (event) {
                             // get lat/lon of click
                             var clickLat = event.latLng.lat();
                             var clickLon = event.latLng.lng();
            
                             // show in input box
                             document.getElementById('l1').value = clickLat.toFixed(5);
                             document.getElementById('l2').value = clickLon.toFixed(5);
                            
                    var somefunction = function () {
                        var hdnfldVariable = document.getElementById('hdnfldVariable');
                        hdnfldVariable.value = clickLat.toFixed(5);
                    }
               
            
            
                             var marker = new google.maps.Marker({
                                 position: new google.maps.LatLng(clickLat, clickLon),
                                 map: map,
                                 draggable:true
                             });
                         });
            
            
                         // Create the search box and link it to the UI element.
                         var input = document.getElementById('pac-input');
                         var searchBox = new google.maps.places.SearchBox(input);
                         map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            
                         // Bias the SearchBox results towards current map's viewport.
                         map.addListener('bounds_changed', function () {
                             searchBox.setBounds(map.getBounds());
                         });
            
                         var markers = [];
                         // Listen for the event fired when the user selects a prediction and retrieve
                         // more details for that place.
                         searchBox.addListener('places_changed', function () {
                             var places = searchBox.getPlaces();
            
                             if (places.length == 0) {
                                 return;
                             }
            
                             // Clear out the old markers.
                            
                             markers.forEach(function (marker) {
                                debugger;
                                 marker.setMap(null);
                                 
                                
                             });
                             markers = [];
             

                             // For each place, get the icon, name and location.
                             var bounds = new google.maps.LatLngBounds();
                             places.forEach(function (place) {
                                 if (!place.geometry) {
                                     console.log("Returned place contains no geometry");
                                     return;
                                 }
                                 var icon = {
                                     url: place.icon,
                                     size: new google.maps.Size(71, 71),
                                     origin: new google.maps.Point(0, 0),
                                     anchor: new google.maps.Point(17, 34),
                                     scaledSize: new google.maps.Size(25, 25)
                                 };
            
                                 // Create a marker for each place.
                                 markers.push(new google.maps.Marker({
                                     map: map,
                                     icon: icon,
                                     title: place.name,
                                     position: place.geometry.location
                                 }));
            
                                 if (place.geometry.viewport) {
                                     // Only geocodes have viewport.
                                     bounds.union(place.geometry.viewport);
                                 } else {
                                     bounds.extend(place.geometry.location);
                                 }
                             });
                             map.fitBounds(bounds);
                         });
                     }
            
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRhhnbNUXPX9_JYKnroSAex2-1KFaSmwQ&libraries=places&callback=initAutocomplete"></script>
<?php
include '../footer.php';
?>
