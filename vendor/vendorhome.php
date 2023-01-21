<?php
session_start();
include 'vendorbase.php';
include '../connection.php';
$email=$_SESSION['email'];
$q="select * from tblvendor where vEmail='$email'";
$s= mysqli_query($conn, $q);
$r= mysqli_fetch_array($s);
?>
<style>
    td,th{
        padding: 5px;
    }
</style>
<form method="POST">
    <div style="margin:50px; margin: 20px 350px; border-radius: 20px; width:500px; background-color: white; padding: 50px; box-shadow: 10px 10px #d6d3d3;">
    <h1 style="margin: 20px;">Profile</h1>
    <center>
        <table>
            <tr>
                <th colspan="2"><img src="../assets/images/User icon.png" height="100px" width="100px;"></th>
            </tr>
             <tr>
                <td>Name</td>
                <td><input type="text" class="form-control" name="txtName" value="<?php echo $r['vName']; ?>" pattern="[a-zA-Z ]+" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea class="form-control" name="txtAddress" required><?php echo $r['vAddress']; ?></textarea></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" class="form-control" name="txtContact" value="<?php echo $r['vContact']; ?>" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" class="form-control" name="txtEmail" value="<?php echo $r['vEmail']; ?>" readonly></td>
            </tr>
            <tr>
                <td>ID proof</td>
                <td><img src="../<?php echo $r['vFile']; ?>" height="100px" width="100px"></td>
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
    $name=$_REQUEST['txtName'];
    $address=$_REQUEST['txtAddress'];
    $contact=$_REQUEST['txtContact'];
    $email=$_REQUEST['txtEmail'];
    $pwd=$_REQUEST['txtPwd'];
    $idtype=$_REQUEST['idproof'];
    
        $q="update tblvendor set vName='$name',vAddress='$address',vContact='$contact' where vEmail='$email'";
        $s= mysqli_query($conn, $q);
        echo $q;
        if($s)  
        {
                $msg="Profile updated";
               
                echo '<script>alert("'.$msg.'")</script>';
                echo '<script>location.href="vendorhome.php"</script>';
        }
        else
        {
            echo '<script>alert("Updation failed")</script>';
        }
    
}
?>
<?php
include '../footer.php';
?>