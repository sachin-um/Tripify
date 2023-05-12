<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
else {
    ?> 
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <div class="content">
        <p class="home-title-2"><?php 
        echo $data['wantedRoom']->RoomTypeName." ";?>Room</p><br>

        <div class="hotel-profile-account-details">

            <div class="hotel-profile-details-sub">
                <br>
                <div id="booking-slideshow" class="slideshow-container fade" style="width: 95%;">
                    
                    <div class="Containers">
                        <img src="<?php echo URLROOT?>/img/hotel-room-uploads/<?php echo $image?>" style="width:100%">
                    </div>

                    <div class="Containers">
                        <img src="<?php echo URLROOT?>/img/Galadari4.jpg" style="width:100%">
                    </div>

                    <div class="Containers">
                        <img src="<?php echo URLROOT?>/img/Galadari3.jpg" style="width:100%">
                    </div>

                    <div class="Containers">
                        <img src="<?php echo URLROOT?>/img/Galadari4.jpg" style="width:100%">
                    </div>

                    <!-- Back and forward buttons -->
                    <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="forward" onclick="plusSlides(1)">&#10095;</a>
                    
                    <br>

                    <!-- The circles/beads -->
                    <?php 
                    $count = count($data['images']);
                    ?>
                    <div style="text-align:center">
                        
                        <span class="beads" onclick="currentSlide(1)"></span>
                        <span class="beads" onclick="currentSlide(2)"></span>
                        <span class="beads" onclick="currentSlide(3)"></span>
                        <span class="beads" onclick="currentSlide(4)"></span>
                    </div> 
                </div>
            </div>

            <div class="hotel-profile-details-sub" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <br>
                <ul>
                    <li>
                        <div class="profile-info">
                            <h3>Room ID : </h3>
                            <p><?php echo $data['wantedRoom']->RoomTypeID;  ?></p>
                        </div>
                    </li><br>

                    <li>
                        <div class="profile-info">
                            <h3>Type of Beds : </h3>
                            <p><?php 
                            foreach($data['beds'] as $bed):
                                echo $bed->bedType."   "."x"."   ";
                                echo $bed->noofbeds."<br>";
                            endforeach;  
                            ?></p>
                        </div>
                    </li><br>

                    <li>
                        <div class="profile-info">
                            <h3>Price per Night : </h3>
                            <p>LKR<?php 
                            echo " ".$data['wantedRoom']->PricePerNight;
                            ?></p>
                        </div>
                    </li><br>

                    <li>
                        <div class="profile-info">
                            <h3>Room Size : </h3>
                            <p><?php 
                            echo $data['wantedRoom']->RoomSize." ";
                            ?>Square Meters</p>
                        </div>
                    </li><br>

                    <li>
                        <div class="profile-info">
                            <h3>No of guests : </h3>
                            <p><?php 
                            echo $data['wantedRoom']->NoofGuests;
                            ?></p>
                        </div>
                    </li><br>

                    <li>
                        <div class="profile-info">
                            <h3>No of rooms of this type : </h3>
                            <p><?php 
                            echo $data['wantedRoom']->no_of_rooms;;
                            ?></p>
                        </div>
                    </li><br>
                </ul>
            </div>
        
        </div>

        <div class="img-container">

            <div class="nav-grid-2">
                <?php
                if(!empty($data['images'])){
                foreach($data['images'] as $imgName):
                    // echo gettype($imgName)."<br>" ;
                    // print_r($imgName);
                ?>
                <img class="room-images" src="<?php echo URLROOT?>/public/img/hotel-room-uploads/<?php echo $imgName->imgName; ?>" >


                <?php
                
            
                endforeach;
                }
                ?>
            </div>      
        </div> 

    </div>  
</div>



<?php
}
?>

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