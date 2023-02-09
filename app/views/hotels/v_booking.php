<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <br><br><br>
    <div class="content">
        <div class="hotel-booking-title">
            <p id="hotel-booking-title-1" class="home-title-2" ><b>DELUXE ROOM</b></p>
        </div>
        <div class="hotel-room-top-picks">
            <div class="hotel-desc-page-div">
                <div class="hotel-disc-2">

                    <div id="hotel-address" class="hotel-disc-3">
                        <label id="view-address">
                        2 Double Beds
                        </label><br>
                        
                    </div>

                    <div class="hotel-disc-3">
                        <label id="view-address">
                        3 Adults
                        </label><br>

                        <label id="view-address">
                        0 children
                        </label><br>
                        
                    </div>
                    <br>
                    <div class="hotel-disc-3">
                        <div class="hotel-disc-1">
                            <ul style="list-style: circle;">
                            <li><i class="fa-solid fa-person-swimming fa-lg"></i><label>Coffee Maker</label></li>
                                <li><label>Air Conditioning</label></li>
                                <li><label>Free Wifi</label></li>
                            </ul>
                            
                        </div>

                        <div class="hotel-disc-1">
                            <ul style="list-style: circle;">
                                <li><label>24/7 Room Service</label></li>
                                <li><label>TV</label></li>
                                <li><label>Mini Fridge</label></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>        

                <div class="hotel-disc-2">
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

                <p class="home-title-2" >Book Now</p>
                <hr>

                <div id="hotel-booking-form" class="hotel-room-top-picks">
                    <form action="">
                        <div class="hotel-reg-form">
                            <div class="hotel-reg-form-div-2">
                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">First Name<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="text" id="name" name="name" required>
                                </div>

                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Second Name<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="text" id="name" name="name" required>
                                </div>
                            </div>

                            <div class="hotel-reg-form-div-2">
                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Phone Number<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="text" id="line1" name="line1" required>
                                </div>

                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Special Requests :</p>
                                    <input class="hotel-labels-2" type="text" id="line1" name="line1" required>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <p class="home-title-3"><u>Price Details</u></p>
                    <br>

                    <div class="nav-main">

                        <div class="nav-parts">
                            <p class="hotel-labels-1"><b>Check-In Date</b></p>
                            <input class="hotel-labels-1" type="date" id="date-1" placeholder="Check-In Date">
                            <!-- <p class="hotel-labels-1">Check-In Date</p>  -->
                        </div>

                        <div class="nav-parts">
                            <p class="hotel-labels-1"><b>Check-Out Date</b></p> 
                            <input class="hotel-labels-1" type="date" id="date-2" placeholder="Check-Out Date">
                            <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                        </div>

                        <div class="nav-parts">
                            <p class="hotel-labels-1"><b>Duration</b></p>
                            <div id="hotel-nights-days" class="hotel-price-check">
                                <label>1-Night</label>
                            </div>
                        </div>                       

                    </div>

                    
                    <br>
                    <div class="price-details-2">
                        <div class="hotel-price-details">
                            <label id="No-of-rooms">1 Room</label>
                            <label id="X">X</label>
                            <label id="No-of-nights">1 Night</label>
                            <label id="Priceofroom"><b>11,000LKR</b></label>
                        </div>

                        <div class="hotel-price-details">
                            <label id="hotel-taxes">Taxes</label>
                            <label id="hotel-taxes-1"><b>1,000LKR</b></label>
                        </div>

                        <hr id="prices-hr">
                        
                        <div class="hotel-price-details">
                            <label id="hotel-taxes">Total</label>
                            <label id="hotel-taxes-1"><b>12,000LKR</b></label>
                        </div>
                    </div>

                    <p class="home-title-3"><u>Billing Information</u></p>

                    <form action="">
                        <div class="hotel-reg-form">
                            <div class="hotel-reg-form-div-2">
                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Name on Card<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="text" id="name" name="name" required>
                                </div>

                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Debit/Credit Card Number<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="text" id="name" name="name" required>
                                </div>
                            </div>

                            <div class="hotel-reg-form-div-2">
                                <div class="hotel-reg-form-div-2">
                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Expiration Date<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="text" id="line1" name="line1" placeholder="Month">
                                    </div>

                                    <div class="hotel-reg-elements">
                                        <br>
                                        <input class="hotel-labels-2" type="text" id="line1" name="line1" placeholder="Date">
                                    </div>
                                </div>

                                <div class="hotel-reg-elements">
                                    
                                </div>
                            </div>

                            <div class="hotel-reg-form-div-2">
                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Security Code<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="text" id="line1" name="line1">
                                </div>

                                <div class="hotel-reg-elements">
                                    
                                </div>
                            </div>

                            <div class="hotel-reg-form-div-2">
                                <div class="hotel-reg-elements">
                                    <p class="home-title-4">Please enter your email for confirmation<sup> *</sup> :</p>
                                    <input class="hotel-labels-2" type="text" id="line1" name="line1">
                                </div>

                                <div class="hotel-reg-elements">
                                    
                                </div>
                            </div>

                            <div class="hotel-reg-form-div-2">
                                <button id="confirm-booking-btn" class="all-purpose-btn" type="submit">Confirm Booking</button>
                            </div>
                        </div>
                    </form>
                </div>
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
