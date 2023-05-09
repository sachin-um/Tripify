<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br><br>
<div class="wrapper"> 
    <div class="content">
        <?php flash('reg_flash'); ?>
        <p class="home-title" ><b>Plan your dream Sri Lankan vacation cost free!</b></p>

        <p class="home-title-2">No Agencies. No Cost. No Hassle.</p>
        <br>
        <div class="home-div-3">
            <a href="<?php echo URLROOT; ?>/Trips/tripplan"><button class="all-purpose-btn">Start planning</button></a>
        </div>

        
        <br>
        <!-- <h2 class="title">Select what you want to search!</h2>
        <br>        
        <div class="user-btns" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
            <button id="btn-1" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Pages/hotels'">
                <span class="button__icon">
                    <ion-icon name="bed-outline"></ion-icon>
                </span>
                <br>
                <span class="button__text">Hotels</span>
            </button>&nbsp;&nbsp;&nbsp;&nbsp;
            
            <button id="#2" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Pages/taxies'">
                <span class="button__icon">
                    <ion-icon name="car-outline"></ion-icon>
                </span>
                <br>
                <span class="button__text">Taxis</span>
            </button>&nbsp;&nbsp;&nbsp;&nbsp;        
            
            <button id="#3" class="btns" onclick="window.location='<?php echo URLROOT; ?>/Pages/guides'">
                <span class="button__icon">
                    <ion-icon name="accessibility-outline"></ion-icon>
                </span>
                <br>
                <span class="button__text">Guides</span>
            </button>&nbsp;&nbsp;&nbsp;&nbsp;
            
            <button id="#4" class="btns">
                <span class="button__icon">
                    <ion-icon name="map-outline"></ion-icon>
                </span>
                <br>
                <span class="button__text">Plan a Trip</span>
            </button>
        </div> -->

        <hr class="divider">
        <br>
        <p class="home-title-2" ><b>Explore popular destinations across the island.</b></p>
        <br>

        <div class="home-destination-scroll">
            <div id="booking-slideshow" class="slideshow-container fade">
                <div class="Containers">
                    <div class="MessageInfo">1 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari3.jpg" style="width:100%">
                </div>

                <div class="Containers">
                    <div class="MessageInfo">2 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari4.jpg" style="width:100%">
                </div>

                <div class="Containers">
                    <div class="MessageInfo">3 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari3.jpg" style="width:100%">
                </div>

                <div class="Containers">
                    <div class="MessageInfo">4 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari4.jpg" style="width:100%">
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
        </div>
        <br><br>
        <hr class="divider">
        <br>
        <p class="home-title-2" ><b>Find the Best Service Providers</b></p>
        <br>
        
        <div class="home-scroll-divs">
            <br>
            <div class="nav-main">
                <div class="hotel-ad-card" onclick="location.href='<?php echo URLROOT?>/Hotels/showHotels'">

                    <label class="home-title-2">Hotels</label>
                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/Galadari4.jpg" alt="nine-arch">
                        <span id="home-ad-arrows-left" class="dot"><b>></b></span>
                        <span id="home-ad-arrows-right" class="dot"><b><</b></span>
                    </div>                    


                    <div class="hotel-ad-card-desc" style="text-align: center;">
                        <label><b>Hotel Kingsbury</b></label> <br>
                        <label id="display-hotel-address" for="hotel-address">No 108, Rajagiriya</label><br>
                        <label>Partners Since 1990</label>
                    </div>

                </div>

                <div class="hotel-ad-card">

                    <label class="home-title-2">Taxis</label>

                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/taxi-changed.png" alt="nine-arch">
                        <span id="home-ad-arrows-left" class="dot">></span>
                        <span id="home-ad-arrows-right" class="dot"><</span>
                    </div>

                    <div class="hotel-ad-card-desc" style="text-align: center;">
                        <label id="display-hotel-name" for="hotel-name"><b>Kangaroo Cabs</b></label><br>
                        <label id="display-hotel-address" for="hotel-address">Galle Rd, Panadura</label> 
                        <label>Partners Since 1990</label>
                    </div>
                </div>

                <div class="hotel-ad-card">

                    <label class="home-title-2">Guides</label>

                    <div class="hotel-ad-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/guide3.jpg" alt="nine-arch">
                        <span id="home-ad-arrows-left" class="dot">></span>
                        <span id="home-ad-arrows-right" class="dot"><</span>
                    </div>

                    <div class="hotel-ad-card-desc" style="text-align: center;">
                        <label id="display-hotel-name" for="hotel-name"><b>Sunil Shantha</b></label><br>
                        <label id="display-hotel-address" for="hotel-address">Galle Rd, Panadura</label> 
                        <label>Partners Since 1990</label>
                    </div>

                </div>
                </div>
                <br><br>
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





    

