<?php
session_start();
include 'vendorbase.php';
include '../connection.php';
$id=$_GET['id'];
$q="select * from tblproperty where pId='$id' ";
$s= mysqli_query($conn, $q);
$r= mysqli_fetch_array($s);
?>
<style>
    td,th{
        padding: 5px;
    }
</style>
<form method="POST" enctype="multipart/form-data">
    <div style="margin:50px; margin: 50px;">
    <h1 style="margin: 20px;">Upload your property</h1>
    <center>
        <table>
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
                <td><?php echo $r['status']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-warning" name="btnSubmit" value="Update"></td>
            </tr>
        </table>
    
</div>
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
    $q="update tblproperty set country='$country',province='$province',zone='$zone',district='$district',city='$city',wardno='$ward',totalroom='$room',bedroom='$bedroom',livingroom='$living',kitchen='$kitchen',bathroom='$bathroom',description='$description',rent='$rent' where pId='$id'";
    echo $q;    
    $s= mysqli_query($conn, $q);

        if($s)  
        {
            
                $msg="Updation completed";
               
                echo '<script>alert("'.$msg.'")</script>';
                echo '<script>location.href="viewproperty.php"</script>';
        }
            else
            {
                echo '<script>alert("Sorry some error occured")</script>';
            }
        
        
}
?>
<?php
include '../footer.php';
?>