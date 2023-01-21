<?php
include 'commonbase.php';
include 'connection.php';
?>
<style>
    td,th{
        padding:10px;
    }
</style>
<div style="margin: 50px; padding:20px;">
    <h3 style="margin:10px;">Customer registration</h3>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="name" class="form-control" name="txtName" pattern="[a-zA-Z ]+" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea class="form-control" name="txtAddress" required></textarea></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" class="form-control" name="txtContact" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" class="form-control" name="txtEmail" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="txtPwd" required></td>
            </tr>
            <tr>
                <td>Id proof type</td>
                <td><select class="form-control" name="idproof" >
                        <option>Voters Id</option>
                        <option>Aadhar</option>
                        <option>Driving license</option>
                       
                    </select></td>
            </tr>
            <tr>
                <td>Upload Id proof</td>
                <td><input type="file" class="form-control" name="txtFile" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-warning" name="btnSubmit" value="Register"></td>
            </tr>
        </table>
    </form>
</div>
<?php
if(isset($_REQUEST['btnSubmit']))
{
    $name=$_REQUEST['txtName'];
    $address=$_REQUEST['txtAddress'];
    $contact=$_REQUEST['txtContact'];
    $email=$_REQUEST['txtEmail'];
    $pwd=$_REQUEST['txtPwd'];
    $idtype=$_REQUEST['idproof'];
    $folder='assets/images/';
    $file=$folder.basename($_FILES['txtFile']['name']);
    move_uploaded_file($_FILES['txtFile']['tmp_name'],$file);
    $q="select count(*) from tbllogin where uname='$email'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
    if($r[0]>0)    //to check whether the username exist
    {
        echo '<script>alert("Username already exist")</script>';
    }
    else
    {       
        $q="insert into tbltenant (tName,tAddress,tContact,tEmail,tIdType,tFile) values('$name','$address','$contact','$email','$idtype','$file')";
        $s= mysqli_query($conn, $q);
        echo $q;
        if($s)  
        {
            $q="insert into tbllogin(uname,pwd,utype,status) values('$email','$pwd','tenant','1')";
            $s= mysqli_query($conn, $q);
            if($s)
            {
                $msg="Thank you for registration.";
               
                echo '<script>alert("'.$msg.'")</script>';
                echo '<script>location.href="login.php"</script>';
            }
            else
            {
                echo '<script>alert("Sorry some error occured")</script>';
            }
        }
        else
        {
            echo '<script>alert("Registration failed")</script>';
        }
    }
}
?>
<?php
include 'footer.php';
?>
