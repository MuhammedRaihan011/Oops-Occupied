<?php
session_start();
include 'commonbase.php';
include 'connection.php';
?>
<style>
    td,th{
        padding:10px;
    }
</style>
<div style="margin: 50px; padding:20px;">
    <h3 style="margin:10px;">Login</h3>
    <form method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="email" class="form-control" name="txtEmail" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="txtPwd" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-warning" name="btnSubmit" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</div>
<?php
if(isset($_REQUEST['btnSubmit']))
{
    $email=$_REQUEST['txtEmail'];
    $pwd=$_REQUEST['txtPwd'];
    
    $q="select count(*) from tbllogin where uname='$email'";
    $s= mysqli_query($conn, $q);
    $r= mysqli_fetch_array($s);
    if($r[0]==0)    
    {
        echo '<script>alert("Username doesnt exist")</script>';
    }
    else
    {
        $_SESSION['email']=$email;    //creating a session variable
        $q="select * from tbllogin where uname='$email'";
        $s= mysqli_query($conn, $q);
        $r= mysqli_fetch_array($s);
        if($r['pwd']==$pwd)  //to check the password entered by user with the password in database
        {
            if($r['status']=="1")  //to check the status of user
            {
                if($r['utype']=="admin")  //to check the usertye/role of the user
                {
                    echo '<script>location.href="admin/adminhome.php"</script>';
                }
                else if($r['utype']=="vendor")
                {
                    $q="select * from tblvendor where vEmail='$email'";
                    $s= mysqli_query($conn, $q);
                    $r= mysqli_fetch_array($s);
                    $_SESSION['id']=$r[0];
                    echo '<script>location.href="vendor/vendorhome.php"</script>';
                }
                else if($r['utype']=="tenant")
                {
                    $q="select * from tbltenant where tEmail='$email'";
                    $s= mysqli_query($conn, $q);
                    $r= mysqli_fetch_array($s);
                    $_SESSION['id']=$r[0];
                    echo '<script>location.href="tenant/tenanthome.php"</script>';
                }
            }
            else
            {
                echo '<script>alert("Your account is not valid")</script>';
            }
        }
        else
        {
            echo '<script>alert("Incorrect password")</script>';
        }
    }
}
?>
<?php
include 'footer.php';
?>
