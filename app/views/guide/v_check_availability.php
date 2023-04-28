<?php require APPROOT.'/views/inc/components/header.php'; ?>
 <!-- <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> -->
<?php $guidedetails= $data['guidedetails']; 
print_r($guidedetails);
?>
<?php $guidelanguages= $data['guideLanguages'] ?>

<div class="wrapper">
    <div class="content">
        <div class="hotel-booking-title">

            <p id="hotel-booking-title-1" class="home-title-2" style="text-transform:uppercase;" ><b><?php echo $guidedetails->Name ?></b></p>    
        
        </div>
        <div class="hotel-room-top-picks">
            <div class="hotel-desc-page-div">
                <div class="taxi-disc-2">

                   
                    <br>
                    <div class="taxi-disc-3">

                        <label><b>Name :</b> <?php echo $guidedetails-> Name ?></label><br>
                        <label><b>Reg No :</b> <?php echo $guidedetails-> guideRegNo ?></label><br>   
                        <label><b>Area :</b> <?php echo $guidedetails->Area ?></label><br>
                        <label><b>Phone No :</b> <?php echo $guidedetails->phone_number ?></label><br>
                        <label><b>Languages :</b><?php
                            $languages=$guidelanguages;
                            //  print_r($languages);
                            foreach($languages as $key=>$value):
                                 echo $value->language . ' ';
                            endforeach;    
                        ?></label><br>
                       
                        <label><b>Rate :</b><?php echo $guidedetails->Rate ?></label>  
        
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
                    
                        <p class="home-title-2" >Check Availability</p>
                        <hr>
                        <form action="<?php echo URLROOT; ?>/Bookings/checkGuideAvailability/<?php echo $data['guidedetails']->GuideID?>" method="POST">
                            <div class="hotel-reg-form">
                                <div class="hotel-reg-form-div-2">
                                    <div class="hotel-reg-elements">
                                        <?php 
                                        $guidedetails = $data['guidedetails'];
                                        ?>
                                        <input type="hidden" name="gname" value="<?php echo $data['guidedetails']->Name?>">
                                        <input type="hidden" name="greg" value="<?php echo $data['guidedetails']->guideRegNo?>">
                                        <input type="hidden" name="grate" value="<?php echo $data['guidedetails']->Rate?>">
                                        <p class="home-title-4">Start Date<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="date" id="bookingDate" name="sdate"  required>
                                        <span id="avail"></span>
                                    </div>
                                    

                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">End Date<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="date" id="bookingTime"  name="endDate" required>
                                    </div>

                                   
                                </div>

                                <!-- <div class="hotel-reg-form-div-2">
                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Pick Up Location<sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="text" id="taxi-PL" name="pickupL" required>
                                        
                                    </div>

                                    <div class="hotel-reg-elements">
                                        <p class="home-title-4">Where you Want to Visit <sup> *</sup> :</p>
                                        <input class="hotel-labels-2" type="text" id="taxi-DL" name="dropL" required>

                                         
                                    </div>

                                    
                                </div> -->
                                
                            
                            </div><br>

                            <div class="hotel-reg-form-div-2">
                                    <button id="book-now-btn" class="all-purpose-btn" type="submit">Book Now</button>
                            </div>
                        </form>
                        <br>
                        <script type="text/JavaScript">
                            // var bookingTime;
                            var URLROOT="<?php echo URLROOT;?>";
                            // document.getElementById("bookingTime").addEventListener("change", function() {
                            //     bookingTime = this.value;
                            // });
                            
                        </script>
                       
                        
                   


                    
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


    const vehicleID = <?php echo json_encode($data['details']->VehicleID); ?>;

</script>





    
    
 


