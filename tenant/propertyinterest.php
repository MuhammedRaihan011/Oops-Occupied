<?php
session_start();
include 'tenantbase.php';
include '../connection.php';
$email=$_SESSION['email'];
$id=$_SESSION['id'];
$q="select tblproperty.*,tblinterest.idate,tblinterest.status as istatus from tblproperty,tblinterest where tblproperty.pId=tblinterest.pid and tblinterest.tid='$id'";
$s= mysqli_query($conn, $q);
?>

        <section class="locations-1" id="locations">
    <div class="locations py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">';
               
                <?php
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
                                <li>Interested on : <span class="fa fa-calendar-day"></span>'.$r['idate'].'</li>
                            <li>Status : <span class="fa fa-shield-alt"></span>'.$r['istatus'].'</li>
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
                ?>
            
            </div>

          
        </div>
    </div>
   
</section>
<?php
                include '../footer.php';
?>
 