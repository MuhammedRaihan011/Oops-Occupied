<?php
include '../connection.php';
include 'adminbase.php';
?>
<style>
table {
  border-collapse: collapse;
  border: none;
}
th,td{
    padding: 10px;
}
th{
    background-color: #0c5460;
    color: white;
}
tr:nth-child(odd) {background-color: silver;}
</style>
<div style="margin:50px;">
    <h1>Vendor details</h1>
    <table border="0" style="margin:20px;"> 
        
        <tr>
            <th>NAME</th>
            <th>ADDRESS</th>
            <th>EMAIL</th>
            <th>CONTACT</th>
            <th>ID TYPE</th>
            <th colspan="3">ID PROOF</th>
        </tr>
        <?php
         $q="select * from tblvendor where vEmail in (select uname from tbllogin)";
         $s= mysqli_query($conn, $q);
         while($r= mysqli_fetch_array($s))
            {
                echo '<tr>';
                echo '<td>'.$r[1].'</td>';
                echo '<td>'.$r[2].'</td>';
                echo '<td>'.$r[3].'</td>';
                echo '<td>'.$r[4].'</td>';
                echo '<td>'.$r[5].'</td>';
                echo '<td><img src="../'.$r[6].'" height="150px" width="130px"></td>';
                $q1="select status from tbllogin where uname='".$r[3]."'";
                $s1= mysqli_query($conn, $q1);
                $r1= mysqli_fetch_array($s1);
                if($r1[0]=="0")
                {
                    echo '<td><a href="approvecustomer.php?id='.$r[3].'&status=1">Approve</a></td>';
                    echo '<td><a href="approvecustomer.php?id='.$r[3].'&status=-1">Reject</a></td>';
                }
                echo '</tr>';
            }
        ?>
        
    </table>
</div>
