<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br>
<div class="wrapper"> 
    <div class="content">
        
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

        <!-- facilities/map and reviews section -->
        <div class="hotel-desc-page-div" id="facilities-reviews-section">
            <p class="home-title-2">Our Facilities</p><br>
            <div class="facility-1">

                <?php if (empty($data['profileDetails']->Facilities)) { ?>
                <p style="text-align: center; font-size: 1.2rem;">No Facilities are Listed</p>
                <?php } 
                else { 
                $farray = explode(",",$data['profileDetails']->Facilities);
                $indentation = str_repeat("\t", 3);
                $i=0;?>

                <div class="nav-grid-hotel">
                    <?php
                    foreach($farray as $element){
                        $i=$i+1;
                        ?>
                        <div style="text-align: center;"><?php echo $element."<br>";?></div>
                    
                    <?php                            
                    }
                    ?>
                </div>
                <?php } ?>
                
            </div>
            <br><button class="all-purpose-btn" id="view-review-btn">
            <a href="<?php echo URLROOT ?>/Hotels/hotelReviews/<?php echo $data['hotelID']?>" style="text-decoration: none;
            color: white;">See Reviews</a></button>
                
            
        </div>

        <p class="home-title-2">Check Available Rooms</p>

        <form action="<?php echo URLROOT?>/Bookings/checkRoomAvailability" method="post">
            <input type="hidden" name="hotelID" value="<?php echo $data['hotelID']?>">;
            <div class="nav-main-hotel-room">
                
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1">Check-In Date</p>
                    <input style="background-color: lightgray;" class="hotel-labels-1" type="date" name="date-1" placeholder="Check-In Date"
                    value="<?php echo $_SESSION['checkin']?>">
                    <!-- <p class="hotel-labels-1">Check-In Date</p>  -->
                </div>
                &nbsp;
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1">Check-Out Date</p> 
                    <input style="background-color: lightgray;" class="hotel-labels-1" type="date" name="date-2" placeholder="Check-Out Date"
                    value="<?php echo $_SESSION['checkout']?>">
                    <!-- <p class="hotel-labels-1">Check-Out Date</p>  -->
                </div>
                &nbsp;
                <div class="nav-parts-hotel-room">
                    <p class="hotel-labels-1">No of People</p> 
                    <input style="background-color: lightgray;" class="hotel-labels-1" type="number" name="noofadults" value="1" max="100">
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
                    $arraycheck = $data['availablerooms'];
                    for($i=0;$i<count($arraycheck);$i=$i+2){
                        if($arraycheck[$i]==$room->RoomTypeID){
                            $room->no_of_rooms=$arraycheck[$i+1];
                        }
                    }
                    if($room->no_of_rooms==0 || $room->no_of_rooms<0){
                        continue;
                    }else{
            ?>
            <div class="room-block">
                <div class="sub-block">
                    <br>
                    <p style="font-size: 1.5rem;"><b><?php echo $room->RoomTypeName?></b></p>
                    <input type="hidden" name="<?php echo $room->RoomTypeName?>" 
                    value="<?php echo $room->RoomTypeName?>">
                    Room Size (Square meters) : <?php echo $room->RoomSize?><br>&nbsp;
                    <br><button type="button" class="all-purpose-btn" style="width: 50%;"
                    onclick="window.location.href='<?php echo URLROOT?>/HotelRooms/viewhotelroom/Traveler/<?php echo $room->RoomTypeID;?>'">
                    View Room</button>  

                    <br>&nbsp;
                </div>

                <div class="sub-block">
                    <br>
                    No of People : <?php echo $room->NoofGuests?><br>
                    Price per night : <?php echo $room->PricePerNight?><br>
                    <input type="hidden" name="<?php echo $room->RoomTypeID.""."price"?>" value="<?php echo $room->PricePerNight?>">
                    <?php
                        foreach($data['allBeds'] as $beds){
                            if($beds->roomID == $room->RoomTypeID){
                                echo $beds->bedType."   x   ".$beds->noofbeds."<br>";
                            }
                        }

                    ?>
                    <br><b>No of Available Rooms : <?php echo $room->no_of_rooms?></b>
                </div>

                <div class="sub-block">
                    <br>
                    Select No of Rooms :<br>
                    <input class="room-form-input" type="number" name="<?php echo $room->RoomTypeID?>" max="<?php echo $room->no_of_rooms?>" value="0">
                    
                </div>
            </div>

            <?php
                    }
                endforeach;
            ?>

            <div id="btn-block" >
                <button class="all-purpose-btn" id="booking-btn" type="submit">Book Now</button>
            </div>
        </form>

        
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