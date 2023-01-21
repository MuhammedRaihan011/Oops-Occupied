<?php
session_start();
include 'tenantbase.php';
include '../connection.php';
$email=$_SESSION['email'];
$id=$_SESSION['id'];
$q="select * from tblproperty ";
$s= mysqli_query($conn, $q);


if(isset($_REQUEST['btnSearch']))
{
    $key=$_REQUEST['txtSearch'];
    $q="select * from tblproperty where city='$key'";
    $s= mysqli_query($conn, $q);
    
    echo '<div style="margin: 50px 50px -30px 50px;">
 <form method="POST">
     <input type="text" class="form-control" placeholder="Enter a location to search" name="txtSearch" style="width: 80%">
     <input type="submit" class="btn btn-info" name="btnSearch" value="Search" style="width:18%; margin:-60px 0px 0px 950px">
                </form>
</div>
        <section class="locations-1" id="locations">
    <div class="locations py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">';
               
                
                while($r= mysqli_fetch_array($s))
                {
                    echo '<div class="col-lg-4 col-md-6 listing-img">
                    <a href="'.$r['img'].'" target="_blank">
                        <div class="box16">
                            <!--<div class="rentext-listing-category"><span>Buy</span><span>Rent</span></div>-->
                            <img style="height:250px;" class="img-fluid" src="'.$r['img'].'" alt="">
                            <div class="box-content">';
                                echo '<h3 class="title">Rs.'.$r['rent'].'</h3>';
                            echo '</div>
                        </div>
                    </a>
                    <div class="listing-details blog-details align-self">';
                        
                        echo '<p class="user_position">'.$r['zone'].','.$r['district'].','.$r['city'].'</p>
                        <ul class="mt-3 estate-info">';
                            echo '<li><span class="fa fa-bed"></span>'.$r['bedroom'].' Bed</li>';
                            echo '<li><span class="fa fa-shower"></span>'.$r['bathroom'].'Baths</li>
                            <br><li> <span class="fa fa-th"></span>Status :'.$r['status'].'</li>
                        </ul>
                        <div class="author align-items-center mt-4">
                            <a href="readmore.php?id='.$r[0].'" >
                                <img src="../assets/images/readmore.png" height="50px" width="150px" alt="" >
                            </a>
                           
                        </div>
                    </div>
                    
<hr/>
                </div>';
                            
                }
             echo '   
            </div>

          
        </div>
    </div>
   
</section>';
}
 else {

echo '
<div style="margin: 50px 50px -30px 50px;">
 <form method="POST">
     <input type="text" class="form-control" placeholder="Enter a location to search" name="txtSearch" style="width: 80%">
     <input type="submit" class="btn btn-info" name="btnSearch" value="Search" style="width:18%; margin:-60px 0px 0px 950px">
                </form>
</div>
<section class="locations-1" id="locations">
    <div class="locations py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">';
               
              
                while($r= mysqli_fetch_array($s))
                {
                    echo '<div class="col-lg-4 col-md-6 listing-img">
                    <a href="'.$r['img'].'" target="_blank">
                        <div class="box16">
                            <!--<div class="rentext-listing-category"><span>Buy</span><span>Rent</span></div>-->
                            <img style="height:250px;" class="img-fluid" src="'.$r['img'].'" alt="">
                            <div class="box-content">';
                                echo '<h3 class="title">Rs.'.$r['rent'].'</h3>';
                            echo '</div>
                        </div>
                    </a>
                    <div class="listing-details blog-details align-self">';
                        
                        echo '<p class="user_position">'.$r['zone'].','.$r['district'].','.$r['city'].'</p>
                        <ul class="mt-3 estate-info">';
                            echo '<li><span class="fa fa-bed"></span>'.$r['bedroom'].' Bed</li>';
                            echo '<li><span class="fa fa-shower"></span>'.$r['bathroom'].'Baths</li>
                           <br> <li><span class="fa fa-th"></span>Status : '.$r['status'].'</li>
                        </ul>
                        <div class="author align-items-center mt-4">
                            <a href="readmore.php?id='.$r[0].'" >
                                <img src="../assets/images/readmore.png" height="50px" width="150px" alt="" >
                            </a>
                           
                        </div>
                    </div>
                    
<hr/>
                </div>';
                            
                }
                
                
            echo '</div>

          
        </div>
    </div>
   
</section>';    
}
?>
<?php
                include '../footer.php';
?>
 