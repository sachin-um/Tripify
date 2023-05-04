<?php require APPROOT.'/views/inc/components/header.php'; ?>
<!-- <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> -->
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