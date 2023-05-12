<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<br><br>
<div class="wrapper" id="wrapper-home"> 
    <div class="content" id="content-home">
        <?php flash('reg_flash'); ?>
        <p class="home-title" ><b>Plan your dream Sri Lankan vacation cost free!</b></p>

        <p class="home-title-2">No Agencies. No Cost. No Hassle.</p>
        <br>
        <div class="home-div-3">
            <a href="<?php echo URLROOT; ?>/Trips/tripplan"><button class="all-purpose-btn">Start planning</button></a>
        </div>

        
        <br>

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
        <p class="home-title-2" style="margin-bottom: 10px;">Join Our Network Today.</p>

        <!-- hotel register -->
        <div class="hotel-home-join-network" style="background-color: #03002e;">
            <div class="service-div">
                <img id="hotel-img" src="<?php echo URLROOT; ?>/img/Galadari4.jpg" alt="nine-arch">
            </div>

            <div class="service-div" style="width: 100%; text-align: center;">
                <p style="text-align: center; color: #f2b203; font-size: 1.9rem; display: flex; align-items: center; justify-content: center;">
                <img id="home-img-12" src="<?php echo URLROOT; ?>/img/logo.png" alt="nine-arch">&nbsp;YOUR HOTEL</p>

                <br><p style="color: #f2b203; text-align: center;">Expand your customer base, <br>
                increase your visibility and<br>discover great deals</p>

                <br><p style="color: #f2b203; text-align: center;">Register your hotel with Tripify</p>
                <button class="home-book-btn" onclick="location.href='<?php echo URLROOT?>/Hotels/register'">Join Tripify</button>               
            </div>

            <!-- Makes it easy for potential guests to discover and book your hotel with  -->
        </div>

        <div class="hotel-home-join-network">
            <div class="service-div" style="width: 100%; text-align: center;">
                <p style="text-align: center; color: #03002E; font-size: 1.9rem; display: flex; align-items: center; justify-content: center;">
                GET GOING WITH&nbsp;<img id="home-img-12" src="<?php echo URLROOT; ?>/img/logo_processed.png" alt="nine-arch"></p>

                <br><p style="color: #03002E; text-align: center;">Elevate your company hires, <br>
                beat the competition<br>or simply boost your freelance driving career</p>

                <br><p style="color: #03002E; text-align: center;">Register your taxis with Tripify</p>
                <button class="home-book-btn" style="background-color: #03002E; color: #f2b203;" onclick="location.href='<?php echo URLROOT?>/Taxies/register'">Join Tripify</button>
            </div>

            <div class="service-div">
                <img id="hotel-img" src="<?php echo URLROOT; ?>/img/taxi-changed.png" alt="nine-arch">
            </div>
        </div>
        
        <div class="hotel-home-join-network" style="background-color: #03002e;">
            <div class="service-div">
                <img id="hotel-img" src="<?php echo URLROOT; ?>/img/new.jpg" alt="nine-arch">
            </div>

            <div class="service-div" style="width: 100%; text-align: center;">
                <p style="text-align: center; color: #f2b203; font-size: 1.9rem; display: flex; align-items: center; justify-content: center;">
                GUIDE THE WAY WITH&nbsp;<img id="home-img-12" src="<?php echo URLROOT; ?>/img/logo.png" alt="nine-arch"></p>

                <br><p style="color: #f2b203; text-align: center;">Looking for opportunities in your local area? <br>
                Boost your profile and<br>become the top with Tripify! </p>

                <br><p style="color: #f2b203; text-align: center;">Register as a local guide</p>
                <button class="home-book-btn" onclick="location.href='<?php echo URLROOT?>/Guides/register'">Join Tripify</button>
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





    

