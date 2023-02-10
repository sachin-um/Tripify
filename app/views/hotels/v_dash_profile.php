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
    <br>
    <br>
    <br>
    <p class="home-title-2">Account Details</p>
        
        <div class="hotel-profile-top">

            <div class="hotel-profile-top-containers">
                <div id="hotel-profile-photos" class="slideshow-container fade">

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
                        <div class="H-Room-Info">Fourth Caption</div>
                    </div>

                    <!-- Back and forward buttons -->
                    <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="forward" onclick="plusSlides(1)">&#10095;</a>
                </div>

                <!-- The circles/beads -->
                <div style="text-align:center">
                    <span class="beads" onclick="currentSlide(1)"></span>
                    <span class="beads" onclick="currentSlide(2)"></span>
                    <span class="beads" onclick="currentSlide(3)"></span>
                    <span class="beads" onclick="currentSlide(4)"></span>
                </div>
                <br>
                <div class="home-div-3">
                    <a href=""></a> <button id="hotel-add-pics" class="all-purpose-btn">Add More Pics</button>
                </div>
            </div>

            <div id="hotel-profile-top-right" class="hotel-profile-top-containers">
                <ul id="hotel-profile-info-ul">
                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">User Name</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">U12763</p>
                            <!-- <p class="home-title-4"><?php echo $data->Name;  ?></p> -->
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Email</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <!-- <p class="home-title-4"><?php echo $data->Email;  ?></p> -->
                            <p class="home-title-4">kaveesha@gmail.com</p>
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Password</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">
                                P1234
                                <!-- <?php echo $data->Password;  ?> -->
                            </p>
                        </div>
                    </div></li>
                    
                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Verification Status</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">
                                <!-- <?php if ($data->verification_status ==1) {
                                ?><h3>Verified </h3><?php
                                }else {
                                ?><h3>Not Verified </h3><?php
                            } ?> -->
                            Verified
                        </p>
                        </div>
                    </div></li>
                    <br>
                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Property ID</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">P120345</p>
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Address</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">P120345</p>
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Contact</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">P120345</p>
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Property Catagory</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">P120345</p>
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Check In</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">P120345</p>
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Check Out</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">P120345</p>
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Free Cancellation Period</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">P120345</p>
                        </div>
                    </div></li>

                    <li>
                    <div id="hotel-profile-sub-div" class="hotel-reg-form-div-2">
                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">Cancellation Fee</p>
                        </div>

                        <div id="hotel-middle-colon" class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">:</p>
                        </div>

                        <div class="hotel-profile-sub-div-elements">
                            <p class="home-title-4">P120345</p>
                        </div>
                    </div></li>
                </ul>

                <div class="home-div-3">
                    <a href=""></a> <button id="hotel-edit-info" class="all-purpose-btn">Edit Info</button>
                </div>
            </div>
             
            <br>
            
        </div>

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

    

