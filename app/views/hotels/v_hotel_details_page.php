<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        
        <p class="home-title-2" ><?php echo $data["profileName"]?>
        <br><label id="view-address" style="font-size: 1.1rem;"><?php echo $data["profileAddress"]?>
        </p>
        
        <hr>

        <div class="hotel-desc-page-div">
            <?php echo $data['description']?>
        </div>

        <div class="hotel-desc-page-div">
        <p class="home-title-2">Photographs</p>
        </div>

        <div class="hotel-desc-page-div">
        <p class="home-title-2">Facilities</p>
        </div>

        <p class="home-title-2">Check Available Rooms</p>

        <form action="<?php echo URLROOT?>/Bookings/checkRoomAvailability" method="post">
            <input type="hidden" name="hotelID" value="<?php echo $data['hotelID']?>">;
            <div class="nav-main-hotel-room">
                
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1">Check-In Date</p>
                    <input class="hotel-labels-1" type="date" name="date-1" placeholder="Check-In Date"
                    value="<?php echo $_SESSION['checkin']?>">
                    <!-- <p class="hotel-labels-1">Check-In Date</p>  -->
                </div>
                &nbsp;
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1">Check-Out Date</p> 
                    <input class="hotel-labels-1" type="date" name="date-2" placeholder="Check-Out Date"
                    value="<?php echo $_SESSION['checkout']?>">
                    <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                </div>
                &nbsp;
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1">No of People</p> 
                    <input class="hotel-labels-1" type="number" name="noofadults" value="1" max="100">
                    <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                </div>
            </div>

            <div class="home-div-3">
                <a href="<?php echo URLROOT?>/Hotels/showHotels"><button class="all-purpose-btn" type="submit">Go</button></a> 
            </div>
            
        </form>
        

        <!-- Hotel Booking Function -->
        <form action="<?php echo URLROOT?>/Bookings/placeBooking/<?php echo $data['hotelID']?>" method="post">

            <input type="hidden" name="hotelID" value="<?php echo $data['profileDetails']->HotelID?>">
            <!-- <input type="hidden" name="roomtypes" value="<?php echo $data['allroomtypes']?>"> -->
            
            <?php
                foreach($data['allroomtypes'] as $room):
            ?>
            <div class="room-block">
                <div class="sub-block">
                    <br>
                    <p style="font-size: 1.5rem;"><b><?php echo $room->RoomTypeName?></b></p>
                    <input type="hidden" name="<?php echo $room->RoomTypeName?>" 
                    value="<?php echo $room->RoomTypeName?>">
                    Room Size (Square meters) : <?php echo $room->RoomSize?>
                </div>

                <div class="sub-block">
                    <br>
                    No of People : <?php echo $room->NoofGuests?><br>
                    Price per night : <?php echo $room->PricePerNight?><br>
                    <input type="hidden" name="<?php echo $room->RoomTypeID.""."price"?>" value="<?php echo $room->PricePerNight?>">
                    <?php
                        $arraycheck = $data['availablerooms'];
                        for($i=0;$i<count($arraycheck);$i=$i+2){
                            if($arraycheck[$i]==$room->RoomTypeID){
                                $room->no_of_rooms=$arraycheck[$i+1];
                            }
                        }
                    ?>
                    No of Available Rooms : <?php echo $room->no_of_rooms?>
                </div>

                <div class="sub-block">
                    <br>
                    Select No of Rooms :<br>
                    <input class="room-form-input" type="number" name="<?php echo $room->RoomTypeID?>" max="<?php echo $room->no_of_rooms?>" value="0">
                    
                </div>
            </div>

            <?php
                endforeach;
            ?>

            <div id="btn-block" >
                <button class="all-purpose-btn" id="booking-btn" type="submit">Book Now</button>
            </div>
        </form>

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

        <!-- <div class="hotel-home-top-picks">

            <p class="home-title-2" >Our Rooms</p><br>
            <hr><br>

            <div class="nav-grid">
                <?php                
                foreach($data['allroomtypes'] as $room):
                ?>
                
                <a href="<?php echo URLROOT?>/HotelRooms/viewhotelroom/<?php echo $room->RoomTypeID?>" style="text-decoration: none;">
                <!-- <?php echo URLROOT?>/HotelRooms/rooms/<?php echo $hotel->HotelID?> -->

                <div class="hotel-ad-card">
                    
                    <!-- onclick="location.href='<?php echo URLROOT?>/HotelBookings/bookaroom'" -->
                    <!--<div id="hotel-img" class="hotel-room-card-pic">
                        <img id="hotel-img" src="<?php echo URLROOT; ?>/img/Galadari3.jpg" alt="nine-arch">
                    </div>                    

                    <div class="hotel-ad-card-desc">
                       <label id="room-type" for="hotel-name"><h2><?php echo $room->RoomTypeName; ?></h2></label>
                       
                       <label id="display-hotel-address" for="hotel-address"><?php echo $room->RoomSize." "; ?>Square Feet</label><br>
                       <label id="display-hotel-address" for="hotel-address"><?php echo $room->NoofBeds." "; ?>Beds</label><br>
                       <label id="room-price" for="hotel-address"><b><?php echo $room->PricePerNight." "; ?>LKR per night</b></label><br>
                       <label id="room-remain" for="hotel-address"><?php echo $room->no_of_rooms." "; ?>Bedrooms left</label>
                    </div>

                    
                    <button class="reserve-room" for="hotel-price"><b>Reserve Now</b></button>
                    
                </div>
                </a>
                <?php
                endforeach;
                ?>         

                
            </div>  
        </div> -->

        <div class="hotel-desc-page-div">
            <div class="hotel-disc-2">

                <div id="hotel-address" class="hotel-disc-3">
                    
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