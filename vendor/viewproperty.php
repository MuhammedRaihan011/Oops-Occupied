<?php
session_start();
include 'vendorbase.php';
include '../connection.php';
$email=$_SESSION['email'];

$id=$_SESSION['id'];
$q="select * from tblproperty where vId='$id' ";
$s= mysqli_query($conn, $q);

?>

<section class="locations-1" id="locations">
    <div class="locations py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="row">
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
                            
                        </ul>
                        <div class="author align-items-center mt-4">
                            <a href="readmore.php?id='.$r[0].'" >
                                <img src="../assets/images/readmore.png" height="50px" width="100px" alt="" >
                            </a>
                            <ul style="margin-left:50px;" class="blog-meta">
                                <li>
                                    <a href="updateproperty.php?id='.$r[0].'">Update details </a>
                                </li>
                                <li class="meta-item blog-lesson">
                                    <a href="deleteproperty.php?id='.$r[0].'">
                                        <span class="meta-value" style="color:red;"> Remove from listing</span>
                                     </a>
                                </li>
                            </ul>
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
 