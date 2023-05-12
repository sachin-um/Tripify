<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        <?php flash('review_flash'); ?>
        
        <p class="home-title-2" ><?php echo $data["profileName"]?>
        <br><label id="view-address" style="font-size: 1.1rem;"><?php echo $data["profileAddress"]?>
        </p>
        
        <hr>

        <!-- Image Carousal -->

        <div class="slider">
            <div class="slide-track">
                <?php
                if(!empty($data['images'])){
                    foreach($data['images'] as $imgName):                        
                    ?>
                    <div class="slide">
                        <img id="img-carousal" src="<?php echo URLROOT?>/public/img/hotel-uploads/<?php echo $imgName->imgName; ?>" style="white-space: nowrap;" >

                    </div>

                    <?php                    
                
                    endforeach;
                }
                
                if(!empty($data['images'])){
                    foreach($data['images'] as $imgName):
                        // echo gettype($imgName)."<br>" ;
                        // print_r($imgName);
                    ?>
                    <div class="slide">
                        <img id="img-carousal" src="<?php echo URLROOT?>/public/img/hotel-uploads/<?php echo $imgName->imgName; ?>" style="white-space: nowrap;" >

                    </div>
                    <?php                   
                
                    endforeach;
                }
                ?>
            </div>
        
        </div>

        <div class="hotel-desc-page-div">
            <?php echo $data['description']?>
        </div>

        <div class="hotel-desc-page-div" id="facilities-reviews-section">
            <!-- <p class="home-title-2">Facilities</p> -->
            <div class="facility-all">
                <div class="facility-1">

                    <?php if (empty($data['profileDetails']->Facilities)) { ?>
                    <p style="text-align: center; font-size: 1.2rem;">No Facilities are Listed</p>
                    <?php } 
                    else { 
                    $farray = explode(",",$data['profileDetails']->Facilities);
                    $indentation = str_repeat("\t", 3);
                    $i=0;?>

                    <div class="nav-grid">
                        <?php
                        foreach($farray as $element){
                            $i=$i+1;
                            ?>
                            <div style="text-align: center;"><?php echo $element."<br>";?></div>
                        
                        <?php                            
                        }
                        ?>
                    </div>
                    <?php } ?><br>
                    <button class="all-purpose-btn" id="view-review-btn">
                    <a href="<?php echo URLROOT ?>/Hotels/hotelReviews/<?php echo $data['hotelID']?>" style="text-decoration: none;
                    color: white;">See Reviews</a></button>
                </div>

                <div class="facility-2">
                    MAP
                </div>
            </div>
                
            
        </div>

        <p class="home-title-2">Check Available Rooms</p>

        <form action="<?php echo URLROOT?>/Bookings/checkRoomAvailability" method="post">
            <input type="hidden" name="hotelID" value="<?php echo $data['hotelID']?>">;
            <div class="nav-main-hotel-room">
                
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1"><b>Check-In Date</b></p>
                    <input class="hotel-labels-1" style="background-color: #D9D9D9;" type="date" name="date-1" placeholder="Check-In Date"
                    value="<?php echo $_SESSION['checkin']?>">
                    <!-- <p class="hotel-labels-1">Check-In Date</p>  -->
                </div>
                &nbsp;
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1"><b>Check-Out Date</b></p> 
                    <input class="hotel-labels-1" style="background-color: #D9D9D9;" type="date" name="date-2" placeholder="Check-Out Date"
                    value="<?php echo $_SESSION['checkout']?>">
                    <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                </div>
                &nbsp;
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1"><b>No of People</b></p> 
                    <input class="hotel-labels-1" style="background-color: #D9D9D9;" type="number" name="noofadults" value="1" max="100">
                    <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                </div>  

                
            </div>

            <div class="home-div-3">
                <a id="review-btn-id" href="<?php echo URLROOT?>/Hotels/showHotels"><button class="all-purpose-btn" type="submit">Go</button></a> 
            </div>
            
        </form><br>


        <!-- <p class="home-title-2">Reviews</p>
        <div class="slide-container">
                
                <div class="slide-content">
                    <div class="card-wrapper">
                        <div class="review-card">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img src="<?php echo URLROOT?>/public/img/Group_profile.png" alt="Pr" class="card-img">
                                </div>
                            </div>

                            <div class="card-content">
                                <h2 class="review-name">David Silva</h2>
                                <p class="review-description">Very good place! Excellent food, clean rooms, great room service. 10/10 recommend.</p>
                            
                                <button class="review-button">View More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br> -->



    </div>

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
