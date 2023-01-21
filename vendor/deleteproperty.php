<?php
session_start();
include 'vendorbase.php';
include '../connection.php';
$id=$_GET['id'];
$q="delete from tblproperty where pId='$id'";
$s= mysqli_query($conn, $q);
if($s)
{
    echo '<script>alert("Property deleted")</script>';
    echo '<script>location.href="viewproperty.php"</script>';
}
?>
