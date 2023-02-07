<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <div class="content">
        <div class="hotel-booking-title">
            <p class="home-title" ><b>Deluxe Room</b></p>
        </div>
        <div class="hotel-room-top-picks">

            <div class="information-container">

            </div>

            <div class="slideshow-container fade">

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
</div>

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