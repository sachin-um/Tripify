<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Taxi') {
    flash('reg_flash', 'Only the Taxi Owners can have access...');
    redirect('Pages/home');
}
else {
    ?>




<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        
        <p class="home-title-2" >KANGAROO CABS</p>
        <hr>
        <div class="hotel-desc-page-div">
            <div class="hotel-disc-2">

                <div id="hotel-address" class="hotel-disc-3">
                    <label id="view-address">
                    64 Lotus Rd, Colombo 00100
                    </label>
                </div>
                <div class="hotel-disc-3">
                    <div class="hotel-disc-1">
                        <ul>
                           <li><i class="fa-solid fa-person-swimming fa-lg"></i><label></label></li>
                            <li><label>Media</label></li>
                            <li><label>Free Wifi</label></li>
                            <li><label>Air Conditioning</label></li>
                            <li><label>24/7 Service</label></li>
                        </ul>
                        
                    </div>

                    <div class="hotel-disc-1">
                        <label>Airport PickUp & Drop</label><br>
                        <label>Door to Door</label><br>
                        <label>Wedding Cars</label><br>
                        <label>Long Trips</label><br>
                        
                    </div>
                </div>

                <div id="review-btns-div" class="hotel-disc-3">
                    <div class="hotel-disc-1">
                        <button id="review-btn" class="all-purpose-btn">Review This Taxi</button>
                    </div>

                    <div class="hotel-disc-1">
                        <button id="view-review-btn" class="all-purpose-btn">View Reviews</button>
                    </div>                  
                    
                </div>
                
            </div>        

            <div class="hotel-disc-2">
                <img id="hotel-map" src="<?php echo URLROOT; ?>/img/taxi-com.jpg" alt="nine-arch">
                <!-- <iframe id="hotel-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.0289869750545!2d79.84089513600121!3d6.931715604596578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259251b57a431%3A0x8f44e226d6d20a7e!2sGaladari%20Hotel!5e0!3m2!1sen!2slk!4v1675719620750!5m2!1sen!2slk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
        </div>

        <div class="slideshow-container fade">

                <div class="Containers">
                    <div class="MessageInfo">1 / 4</div>
                    <img src="<?php echo URLROOT?>/img/taxi-galary-1.jpg" style="width:100%">
                    <div class="H-Room-Info">First caption</div>
                </div>

                <div class="Containers">
                    <div class="MessageInfo">2 / 4</div>
                    <img src="<?php echo URLROOT?>/img/taxi-galary-2.jpg" style="width:100%">
                    <div class="H-Room-Info">Second Caption</div>
                </div>

                <div class="Containers">
                    <div class="MessageInfo">3 / 4</div>
                    <img src="<?php echo URLROOT?>/img/taxi-galary-3.jpg" style="width:100%">
                    <div class="H-Room-Info">Third Caption</div>
                </div>

                <div class="Containers">
                    <div class="MessageInfo">4 / 4</div>
                    <img src="<?php echo URLROOT?>/img/taxi-galary-4.jpg" style="width:100%">
                    <div class="H-Room-Info">F Caption</div>
                </div>

                <!-- Back and forward buttons -->
                <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
                <a class="forward" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

                <!-- The circles/beads -->
            <div style="text-align:center">
                <span class="beads" onclick="currentSlide(1)"></span>
                <span class="beads" onclick="currentSlide(2)"></span>
                <span class="beads" onclick="currentSlide(3)"></span>
                <span class="beads" onclick="currentSlide(4)"></span>
            </div> 
        </div>


        <div class="hotel-home-top-picks">

            <p class="home-title-2" >Our Vehicles</p><br>
            <hr><br>

            

            <div class="nav-main">
                <?php
                    $allvehicles=$data['vehicles'];
                    foreach($allvehicles as $vehicle):
                ?>
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Bookings/TaxiBookingPage'">
                    
                    

                    <div class="room-card-pic">
                        <img id="tax_home_img" src="<?php echo URLROOT; ?>/img/taxi-com.jpg" alt="Taxi Vehicle Image">
                    </div>                    
                    
                    <div class="hotel-ad-card-desc">
                        <article class="taxi_view_v_art" >
                            <label id="room-type" for="hotel-name"><b><?php echo $vehicle->VehicleType  ?></b></label> <br>

                            <img src="<?php echo URLROOT; ?>/img/Display.png" alt=""><b><p id="taxi_view_v_num"><?php echo $vehicle->vehicle_number  ?></p></b>
                            
                            <!-- <label id="display-hotel-address" for="hotel-address">Size in square feet</label><br>
                            <label id="display-hotel-address" for="hotel-address">No of beds</label><br>
                            
                            <label id="room-remain" for="hotel-address">Only 1 room left</label> -->
                            <img src="<?php echo URLROOT; ?>/img/Vector.png" alt=""><b><p id="taxi_view_v_vname"><?php echo $vehicle->Model  ?></p></b>
                            
                            <img src="<?php echo URLROOT; ?>/img/Group.png" alt=""><b><p id="taxi_view_v_maxp"><?php echo $vehicle->no_of_seats  ?> Seats</p></b>
                    
                            
                    
                            <img src="<?php echo URLROOT; ?>/img/Place Marker.png" alt=""><b><p id="taxi_view_v_loc"><?php echo $vehicle->area  ?></p></b>
                            <label id="room-price" for="hotel-address"><b><?php echo $vehicle->price_per_km  ?> LKR/KM</b></label><br>
                            <!-- <img src="<?php echo URLROOT; ?>/img/Clock.png" alt=""><b><p id="taxi_view_v_flag"><?php echo $vehicle->price_per_km  ?> LKR</p></b> -->
                        </article>
                    </div>

                    
                    <button class="reserve-room" for="hotel-price"><b>Reserve Now</b></button>
                    
                </div>
                

                <?php
                    endforeach;
                ?>

               
            </div>  

            
        
    
        </div>

        
    </div>

</div>

<?php
}
?>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
<script>
    var slidePosition = 1;
    SlideShow(slidePosition);

    // forward/Back controls
    function plusSlides(n) {
    SlideShow(slidePosition += n);
    }

    //  images controls
    function currentSlide(n) {
    SlideShow(slidePosition = n);
    }

    function SlideShow(n) {
    var i;
    var slides = document.getElementsByClassName("Containers");
    var circles = document.getElementsByClassName("beads");
    if (n > slides.length) {slidePosition = 1}
    if (n < 1) {slidePosition = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < circles.length; i++) {
        circles[i].className = circles[i].className.replace(" enable", "");
    }
    slides[slidePosition-1].style.display = "block";
    circles[slidePosition-1].className += " enable";
    } 
</script>