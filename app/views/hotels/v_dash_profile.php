<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel') {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
}
else {
    ?> 
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/sidebars/hotel_sidebar.php'; ?>

<main class="right-side-content">
    <p class="home-title-2">Account Details</p>
        
        <div class="hotel-room-top-picks">

            <div class="information-container">

            </div>

            <div class="slideshow-container fade">

                <div class="Containers">
                    <div class="MessageInfo">1 / 4</div>
                    <img src="<?php echo URLROOT?>/img/Galadari3.jpg" style="width:100%">
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
            <br>
            <div class="home-div-3">
                <a href=""></a> <button class="all-purpose-btn">Add More Pics</button>
            </div>
        </div>

        
        <!-- Edit from here -->
        <div class="first-container">
            <br>
            <div class="profile-image">
                <br>
                <img id="pro-picture" src="<?php echo URLROOT; ?>/img/istockphoto-104731717-612x612.jpg" alt="picture">
            </div>

            <div class="profile-description">
                <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Property Name : </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3>Blue Mountain Hotel</h3>
                    </div>
                            
                </div>


                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Address :</h3>
                    </div>
                 
                    <div class="sub-sub">
                        <h3>Hikkaduwa, Sri Lanka</h3>
                    </div>
                    
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Rating : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>N/A</h3>
                    </div>
                        
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Contact : </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>+94 77 123 4567</h3>
                    </div>
                        
                </div>
                <br> 
                <div style="text-align: center;">
                    <button class="profile-btn">Edit Info</button>
                        
                </div>

            </div>
        </div>
        <br>
        <br>
        <h2 style="text-align: left; margin-left:8%;">Settings</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="profile-image" style="width: 450px; text-align: center;">
                <br>
                <img id="pro-picture-2" src="<?php echo URLROOT; ?>/img/Group_profile.png" alt="picture">
                <br>
                <br>
                <button class="profile-btn">Edit</button>
            </div>

            <div class="profile-description">
            <br>
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Name : </h3>
                    </div>
                    
                    <div class="sub-sub">
                        <h3><?php echo $data->Name;  ?></h3>
                    </div>
                            
                </div>


                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Email :</h3>
                    </div>
                 
                    <div class="sub-sub">
                        <h3><?php echo $data->Email;  ?></h3>
                    </div>
                    
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>verificaion Status: </h3>
                    </div>
                        
                    <div class="sub-sub">
                    <?php if ($data->verification_status ==1) {
                            ?><h3>Verified </h3><?php
                        }else {
                            ?><h3>Not Verified </h3><?php
                        } ?>
                    </div>
                        
                </div>
                <br> 
                <div class="sub-description">
                    <div class="sub-sub">
                        <h3>Contact Number: </h3>
                    </div>
                        
                    <div class="sub-sub">
                        <h3>+94 77 123 4567</h3>
                    </div>
                        
                </div>
                <br>
                <div style="text-align: center;">
                    <button class="profile-btn">Edit Info</button>
                        
                </div>
            </div>
        </div>
        <br><br>
    </div>

<!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->

<?php
}
?>

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

    

