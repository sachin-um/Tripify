<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        
        <p class="home-title-2" ><?php echo $data["profileName"]?></p>
        <hr>
        <div class="hotel-desc-page-div">
            <div class="hotel-disc-2">

                <div id="hotel-address" class="hotel-disc-3">
                    <label id="view-address"><?php echo $data["profileAddress"]?>
                    </label>
                </div>
                <div class="hotel-disc-3">
                    <div class="hotel-disc-1">
                        <ul>
                           <li><i class="fa-solid fa-person-swimming fa-lg"></i><label>Swimming Pool</label></li>
                            <li><label>Parking</label></li>
                            <li><label>Free Wifi</label></li>
                            <li><label>Air Conditioning</label></li>
                            <li><label>Gym</label></li>
                        </ul>
                        
                    </div>

                    <div class="hotel-disc-1">
                        <label>24/7 Room Service</label><br>
                        <label>Restaurent</label><br>
                        <label>Spa Lounge/Relaxation Area</label><br>
                        <label>Airport Shuttle</label><br>
                        <label>Bar</label>
                    </div>
                </div>

                <div id="review-btns-div" class="hotel-disc-3">
                    <div class="hotel-disc-1">
                        <button id="review-btn" class="all-purpose-btn">Review This Hotel</button>
                    </div>

                    <div class="hotel-disc-1">
                        <button id="view-review-btn" class="all-purpose-btn">View Reviews</button>
                    </div>                  
                    
                </div>
                
            </div>        

            <div class="hotel-disc-2">
                <iframe id="hotel-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.0289869750545!2d79.84089513600121!3d6.931715604596578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259251b57a431%3A0x8f44e226d6d20a7e!2sGaladari%20Hotel!5e0!3m2!1sen!2slk!4v1675719620750!5m2!1sen!2slk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <!-- <div class="slideshow-container fade">

                <div class="Containers">
                    <div class="MessageInfo">1 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari1.jpg" style="width:100%">
                    <div class="H-Room-Info">First caption</div>
                </div>

                <div class="Containers">
                    <div class="MessageInfo">2 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari2.jpg" style="width:100%">
                    <div class="H-Room-Info">Second Caption</div>
                </div>

                <div class="Containers">
                    <div class="MessageInfo">3 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari3.jpg" style="width:100%">
                    <div class="H-Room-Info">Third Caption</div>
                </div>

                <div class="Containers">
                    <div class="MessageInfo">4 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari4.jpg" style="width:100%">
                    <div class="H-Room-Info">F Caption</div>
                </div>

                <!-- Back and forward buttons -->
                <!-- <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
                <a class="forward" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

                <!-- The circles/beads -->
            <!-- <div style="text-align:center">
                <span class="beads" onclick="currentSlide(1)"></span>
                <span class="beads" onclick="currentSlide(2)"></span>
                <span class="beads" onclick="currentSlide(3)"></span>
                <span class="beads" onclick="currentSlide(4)"></span>
            </div> 
        </div>  -->

        <div class="hotel-home-top-picks">

            <p class="home-title-2" >Our Rooms</p><br>
            <hr><br>

            <div class="nav-grid">
                <?php                
                foreach($data['allrooms'] as $room):
                ?>
                <div class="hotel-ad-card">
                    <!-- onclick="location.href='<?php echo URLROOT?>/HotelBookings/bookaroom'" -->
                    <div id="hotel-img" class="hotel-room-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/Galadari3.jpg" alt="nine-arch">
                    </div>                    

                    <div class="hotel-ad-card-desc">
                       <label id="room-type" for="hotel-name"><b>Queen Suite</b></label> <br>
                       
                       <label id="display-hotel-address" for="hotel-address">Size in square feet</label><br>
                       <label id="display-hotel-address" for="hotel-address">No of beds</label><br>
                       <label id="room-price" for="hotel-address"><b>1,234USD Per Night</b></label><br>
                       <label id="room-remain" for="hotel-address">Only 2 rooms left</label>
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