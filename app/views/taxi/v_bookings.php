<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <div class="content">
        <div class="hotel-booking-title">

            <p id="hotel-booking-title-1" class="home-title-2" style="text-transform:uppercase;" ><b><?php echo $data['com_name'] ?></b></p>    
        
        </div>
        <div class="hotel-room-top-picks">
            <div class="hotel-desc-page-div">
                <div class="taxi-disc-2">

                    <div class="taxi-disc-3">
                        <label id="taxi_book_subhead">
                            <b><?php echo $data['details']->Model.'&nbsp;&nbsp;'.$data['details']->vehicle_number?></b>
                        </label><br>
                        
                    </div>
                    <br>
                    <div class="taxi-disc-3">
                        <div class="taxi-disc-1">
                            
                            <label id="taxi_book_subhead">    
                                <b><?php echo $data['details']->VehicleType?></b>       
                            </label><br>          

                            <ul class="taxi_book_ul" style="list-style: circle;">
                                <li><label>Yellow Colour</label></li>
                                <li><label><?php echo $data['details']->no_of_seats?> Seats</label></li>
                                <li><label>Air Conditioning</label></li>   
                            </ul>
                            
                        </div>

                        <div class="taxi-disc-1">
                            <label id="taxi_book_subhead">
                                <b>Driver</b>
                            </label><br>

                            <ul class="taxi_book_ul" style="list-style: circle;">
                                    <li><label>Name: <?php echo $data['details']->Name?></label></li>
                                    <li><label>Age: <?php echo $data['details']->Age?></label></li>
                                    <li><label>Contact Number: <?php echo $data['details']->contact_number?></label></li>
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>        

                <div class="hotel-disc-2">
                    <div id="booking-slideshow" class="slideshow-container fade">
                        <div class="Containers">
                            <div class="MessageInfo">1 / 4</div>
                            <img src="<?php echo URLROOT?>/img/taxi-galary-1.jpg" style="width:100%">
                            <div class="H-Room-Info"></div>
                        </div>

                    <div class="Containers">
                        <div class="MessageInfo">2 / 4</div>
                        <img src="<?php echo URLROOT?>/img/taxi-galary-2.jpg" style="width:100%">
                        <div class="H-Room-Info"></div>
                    </div>

                    <div class="Containers">
                        <div class="MessageInfo">3 / 4</div>
                        <img src="<?php echo URLROOT?>/img/taxi-galary-3.jpg" style="width:100%">
                        <div class="H-Room-Info"></div>
                    </div>

                    <div class="Containers">
                        <div class="MessageInfo">4 / 4</div>
                        <img src="<?php echo URLROOT?>/img/taxi-galary-4.jpg" style="width:100%">
                        <div class="H-Room-Info"></div>
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
                
               
                

                <div id="hotel-booking-form" class="hotel-room-top-picks">
                    <?php 
                        if(isset($data['hide'])){
                    ?>
                        <p class="home-title-2" >Book Now</p>
                        <hr>
                        <form action="<?php echo URLROOT; ?>/Bookings/TaxiBookingPage/<?php echo $data['details']->VehicleID.'/'.$data['details']->OwnerID?>" method="POST">
                            <div class="hotel-reg-form">
                                <div class="hotel-reg-form-div-2">
                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Date<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="date" id="booking-date" name="s_date" required>
                                    </div>
                                    

                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Time<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="time" id="name"  name="s_time" required>
                                    </div>

                                   
                                </div>

                                <div class="hotel-reg-form-div-2">
                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Pick Up Location<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="text" id="line1" name="pickupL" required>
                                    </div>

                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Destination Location <sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="text" id="line1" name="dropL" required>
                                    </div>
                                </div>
                            </div><br>

                            <div class="hotel-reg-form-div-2">
                                    <button id="confirm-booking-btn" class="all-purpose-btn" type="submit">Get Price Details</button>
                            </div>
                        </form>
                        <br>
                    <?php
                        }
                    ?>


                    <?php 
                        if(isset($data['distance'])){
                    ?>

                    
                        <div>
                            <p class="home-title-3"><u>Price Details</u></p>
                            <br>
                            <div class="price-details-1">
                                <div class="hotel-price-check">
                                    <label><b>Trip Start :</b></label><br>
                                    <label><b><?php echo $data['s_date']?></b></label>
                                    <label><b><?php echo $data['s_time']?></b></label>
                                </div>
                                <div class="hotel-price-check">
                                    <label><b><?php echo $data['pickupL']?></b></label><br>
                                    <label><p><b>To</b></p></label>
                                    <label><b><?php echo $data['dropL']?></b></label>
                                </div>
                                <div id="hotel-nights-days" class="hotel-price-check">
                                    <label><?php echo $data['distance']?>KM</label>
                                </div>
                            </div>
                            <br>
                            <div class="price-details-2">
                                <div class="hotel-price-details">
                                    <label id="No-of-rooms"><?php echo $data['distance']?></label>
                                    <label id="X">X</label>
                                    <label id="No-of-nights"><?php echo $data['details']->price_per_km?></label>
                                    <label id="Priceofroom"><b><?php echo $data['cost']?></b></label>
                                </div>

                                <div class="hotel-price-details">
                                    <label id="hotel-taxes">Taxes(3%)</label>
                                    <label id="hotel-taxes-1"><b><?php echo $data['tax']?></b></label>
                                </div>

                                <hr id="prices-hr">
                                
                                <div class="hotel-price-details">
                                    <label id="hotel-taxes">Total</label>
                                    <label id="hotel-taxes-1"><b><?php echo $data['total']?></b></label>
                                </div>
                            </div>


                            <div class="hotel-reg-form-div-2">
                                <button id="confirm-booking-btn" class="all-purpose-btn" type="submit">Book Now</button>
                            </div>
                            <br>
                            <div class="hotel-reg-form-div-2">
                                <button onclick="window.location.href='<?php echo URLROOT; ?>/Bookings/TaxiBookingPage/<?php echo $data['details']->VehicleID.'/'.$data['details']->OwnerID?>';" id="confirm-booking-btn" class="taxi_all-purpose-btn" type="submit">Cancel</button>
                            </div>
                            
                        </div>
                    <?php
                        }
                    ?>
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
