<?php
session_start();
include 'tenantbase.php';
include '../connection.php';
$tid=$_SESSION['id'];
$id=$_GET['id'];
$q="select * from tblproperty where pId='$id' ";
$s= mysqli_query($conn, $q);
$r= mysqli_fetch_array($s);
?>
<style>
    td,th{
        padding: 5px;
    }
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
         #map {
          height: 300px;
          width:100%;
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
    <h1 style="margin: 20px;">Property details</h1>
    <center>
        <table>
            <tr>
                <td rowspan="16"><img src="<?php echo $r['img']; ?>" height="450px" width="450px"></td>
            </tr>
             <tr>
                <td>Country</td>
                <td><input type="text" class="form-control" name="txtCountry" value="<?php echo $r['country']; ?>"  pattern="[a-zA-Z ]+" required></td>
            </tr>
            
            <tr>
                <td>Province</td>
                <td><input type="text" class="form-control" name="txtProvince" value="<?php echo $r['province']; ?>" pattern="[a-zA-Z ]+" required></td>
            </tr>
            <tr>
                <td>Zone</td>
                <td><input type="text" class="form-control" name="txtZone" value="<?php echo $r['zone']; ?>" pattern="[a-zA-Z ]+" required=""></td>
            </tr>
            <tr>
                <td>District</td>
                <td><input type="text" class="form-control" name="txtDistrict" value="<?php echo $r['district']; ?>" pattern="[a-zA-Z ]+" required=""></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" class="form-control" name="txtCity" value="<?php echo $r['city']; ?>" pattern="[a-zA-Z ]+" required=""></td>
            </tr>
            <tr>
                <td>Ward no</td>
                <td><input type="number" class="form-control" name="txtWard" value="<?php echo $r['wardno']; ?>" required=""></td>
            </tr>
            <tr>
                <td>Total room</td>
                <td><input type="number" class="form-control" name="txtTotal"value="<?php echo $r['totalroom']; ?>" required=""></td>
            </tr>
            <tr>
                <td>Bed room</td>
                <td><input type="number" class="form-control" name="txtBedroom" value="<?php echo $r['bedroom']; ?>" required=""></td>
            </tr>
            <tr>
                <td>Living room</td>
                <td><input type="number" class="form-control" name="txtLiving" value="<?php echo $r['livingroom']; ?>" required=""></td>
            </tr>
            <tr>
                <td>Kitchen</td>
                <td><input type="number" class="form-control" name="txtKitchen" value="<?php echo $r['kitchen']; ?>" required=""></td>
            </tr>
            <tr>
                <td>Bathroom</td>
                <td><input type="number" class="form-control" name="txtBathroom" value="<?php echo $r['bathroom']; ?>" required=""></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea class="form-control" name="txtDescription"  required><?php echo $r['description']; ?></textarea></td>
            </tr>
            <tr>
                <td>Rent per month</td>
                <td><input type="number" class="form-control" name="txtRent" value="<?php echo $r['rent']; ?>" required=""></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" class="form-control" value="<?php echo $r['status']; ?>"></td>
            </tr>
            <?php
            if ($r['status']=="available")
            {
                $qq="select count(*) from tblinterest where pid='$id' and tid='$tid'";
                $ss= mysqli_query($conn, $qq);
                $rr= mysqli_fetch_array($ss);
                if($rr[0]==0)
                {
                echo '<tr>
                <td colspan="2"><input type="submit" class="btn btn-info" name="btnSend" value="Send interest"></td>
            </tr>';
                }
            }
                    ?>
        </table>
    
</div>
    <div>
        
         <!--<input id="pac-input" class="controls" type="text" placeholder="Search Box">-->
                
                     <div id="map"></div>
                     <!--<input onclick="deleteMarkers();" type=button value="Refresh location">-->
    </div>
</form>
<?php
if (isset($_REQUEST['btnSend']))
{
    echo '<script>location.href="interest.php?id='.$id.'"</script>';   
}
?>
<?php
include '../footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   
   

            
                        function initAutocomplete() {
                         var map = new google.maps.Map(document.getElementById('map'), {
                             center: { lat: <?php echo $r['lat'] ?>, lng: <?php echo $r['lon'] ?> },
                             zoom: 17,
                             mapTypeId: 'roadmap'
                         });
                         
            new google.maps.Marker({
    position: { lat: <?php echo $r['lat'] ?>, lng: <?php echo $r['lon'] ?> },
    map,
  title:"Destination" ,
  
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
