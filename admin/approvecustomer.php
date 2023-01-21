<?php
include '../connection.php';
$id=$_GET['id'];
$status=$_GET['status'];
$q="update tbllogin set status='$status' where uname='$id'";
$s=mysqli_query($conn,$q);
if($s)
{
  
    echo '<script>location.href="adminvendor.php"</script>';
}
?>