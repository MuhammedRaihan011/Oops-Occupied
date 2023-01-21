<?php
session_start();
include 'adminbase.php';
include '../connection.php';
$q="select tblproperty.*,tblinterest.idate,tblinterest.status as istatus,tblvendor.vName,tblvendor.vContact from tblproperty,tblinterest,tblvendor where tblproperty.pId=tblinterest.pid and tblproperty.vId=tblvendor.vId and tblinterest.status='approved'";
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
                                <br><li> <span class="fa fa-th"></span>Status :'.$r['status'].'</li>
                                     <br><li> <span class="fa fa-user-circle"></span>Owner :'.$r['vName'].'</li>
                                          <br><li> <span class="fa fa-phone"></span>Contact :'.$r['vContact'].'</li>
                        </ul>
                        <ul style="margin-left:50px;" class="blog-meta">
                                <li>
                                    <a href="viewdetails.php?id='.$r[0].'" style="color:orange">View details </a>
                                </li>
                                
                            </ul>
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
 