<?php
include '../connection.php';
$id=$_GET['id'];
$status=$_GET['status'];
$q="update tblinterest set status='$status' where interestId='$id'";
$s=mysqli_query($conn,$q);
if($s)
{
    if($status=="approved")
    {
  $q="update tblproperty set status='Property rented' where pId in(select pid from tblinterest where interestId='$id')";
$s=mysqli_query($conn,$q);
if($s)
{
    echo '<script>alert("Status updated")</script>';
    echo '<script>location.href="interest.php"</script>';
}
    }
    elseif($status=="vacate")
    {
        $q="update tblproperty set status='available' where pId in(select pid from tblinterest where interestId='$id')";
$s=mysqli_query($conn,$q);
if($s)
{
    echo '<script>alert("Status updated")</script>';
    echo '<script>location.href="rentedpropeties.php"</script>';
}
    }
}