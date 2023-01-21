<?php
session_start();
include '../connection.php';
$tid=$_SESSION['id'];
$id=$_GET['id'];
$q="insert into tblinterest(pid,tid,idate,status) values('$id','$tid',(select sysdate()),'Interest recieved')";
$s=mysqli_query($conn,$q);
if($s)
{
    echo '<script>alert("Interest added")</script>';
    echo '<script>location.href="propertyinterest.php"</script>';
}
?>

