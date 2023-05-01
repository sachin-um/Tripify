<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel' || $_SESSION['user_type']!='Admin') {
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/sidebars/hotel_sidebar.php'; ?>

<main class="right-side-content">
    <br>
    <div class="hotel-profile-completing-notice">
        <br>
        <p><b>Thank you for registering your property with Tripify. 
        Please upload two or more photographs to complete your profile
        and get verified.</b>
        </p>
        <br>
    </div>

    <div class="hotel-profile-account-details">
        <p id="hotel-profile-title-1">Account Details</p>
        <div class="hotel-profile-1">
            <div class="hotel-profile-accdet">
                <ul>
                    <li><b>User ID : </b></li>
                    <li><b>Email :</b></li>
                    <li><b>Contact No :</b></li>
                    <li><b>Account Status :</b></li>
                </ul>
            </div>
            <div class="hotel-profile-accdet-1">
                <ul>
                    <li><?php echo $data['hotelaccountdetails']->UserID?></li>
                    <li><?php echo $data['hotelaccountdetails']->Email?></li>
                    <li><input type="text" name="email" value="<?php echo $data['hotelaccountdetails']->ContactNo?>"></li>
                    <li><?php echo $data['hotelaccountdetails']->acc_status?></li>
                </ul>

            </div>

            <div class="hotel-profile-accdet">
                <ul>
                    <li><b>User Name : </b></li>
                    <li><b>Password : </b></li>
                    <li><b>Usertype : </b></li>
                </ul>
            </div>            

            <div class="hotel-profile-accdet-1">
                <ul>
                    <li><input type="text" name="username" value="<?php echo $data['hotelaccountdetails']->Name?>"></li>
                    <li><?php echo $data['hotelaccountdetails']->Password?></li>
                    <li><?php echo $data['hotelaccountdetails']->UserType?></li>
                </ul>
            </div>
        </div>
        <br>
        <button class="all-purpose-btn" id="account-details-edit">Edit Account Details</button>
        <br>&nbsp;
    </div>
    
        
    <div class="hotel-profile-account-details">
        <p id="hotel-profile-title-1">Property Details</p>
        <div class="hotel-profile-1">
            <div class="hotel-profile-accdet">
                <ul>
                    <li><b>Property Name : </b></li>
                    <li><b>Address :</b></li>
                    <li><b>Rating :</b></li>
                    <li><b>Contact No :</b></li>
                    <li><b>Check In :</b></li>                    
                    <li><b>SLTDA Reg No :</b></li> 
                    <li><b>&nbsp;</b></li>                    
                </ul>
            </div>

            <div class="hotel-profile-accdet-1">
                <ul>
                    <li><?php echo $data['hoteldetails']->Name?></li>
                    <li><?php echo $data['hoteldetails']->Line1?>,
                    <?php echo $data['hoteldetails']->Line2?>, 
                    <?php echo $data['hoteldetails']->District?>
                    </li>
                    <li><?php 
                    if($data['hoteldetails']->Rating==0){
                        echo "0.0";
                    }else{
                        echo $data['hoteldetails']->Rating;
                    }
                    ?></li>
                    <li><?php echo $data['hoteldetails']->contact_number?></li>
                    <li><?php echo $data['hoteldetails']->Check_in?></li>
                    <li><?php echo $data['hoteldetails']->reg_number?></li>
                    <li>&nbsp;</li>
                </ul>
            </div>

            <div class="hotel-profile-accdet">
                <ul>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li><b>Category : </b></li>
                    <li><b>Pets :</b></li>
                    <li><b>Check_out :</b></li>
                </ul>
            </div>            

            <div class="hotel-profile-accdet-1">
                <ul>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li><?php echo $data['hoteldetails']->Category?></li>
                    <li><?php 
                    if($data['hoteldetails']->Category!=0){
                        echo "Allowed";
                    }                        
                    else{
                        echo "Not Allowed";
                    }                        
                    ?></li>
                    <li><?php echo $data['hoteldetails']->Check_out?></li>
                </ul>
            </div>                
            
        </div>
        
        <div class="hotel-profile-1" id="extra-2">
            <div class="hotel-profile-accdet-1" id="extra-1">
                <ul>
                    <li><b>Description :</b></li>
                </ul>                
            </div>

            <div class="hotel-profile-accdet-1" id="extra">  
                <ul>
                    <li><?php echo $data['hoteldetails']->Description?></li>
                </ul>             
            </div>
        </div>       
        
        <br>
        <button class="all-purpose-btn" id="account-details-edit">Edit Property Details</button>
        <br>&nbsp;
    </div>

    <div class="hotel-profile-account-details">
        <p id="hotel-profile-title-1">Additional Information</p>               
        <p style="text-align: center; font-size: 1.5rem;">Hotel Facilities</p>
        <hr>
        <br>
        <?php
            if(empty($data['facilities'])){
        ?>
        <p style="text-align: center; font-size: 1.2rem;">No Facilities are Listed</p>
        <?php
            }else{
        ?>
            <div class="facilities-grid">
                <?php
                        foreach($data['facilities'] as $facility){
                            echo "hey";
                        }
                    }
                ?>
                <p>yes</p>
            </div>
        <br>
        <button class="all-purpose-btn" id="account-details-edit" 
        onclick="location.href='<?php echo URLROOT?>/Hotels/addFacilities'">Add Facilities</button>
        <br>&nbsp;
                
    </div>

    <div class="hotel-profile-account-details-1">
        <div class="upload-section">

        </div>
        <p id="hotel-profile-title-1">Property Images</p>
        <form method="post" action="<?php echo URLROOT ?>/Hotels/uploadPhotos" enctype="multipart/form-data">
            <input type="file" name="images[]" multiple>
            <button type="submit" name="upload">Upload</button>
        </form>
    </div>

</div>

<div id="popup" class="trip-popup">
                <div id="popup-content" class="profile-popup-content"></div>
</div>
<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/showprofile.js"></script>
<!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->

<?php
}
else {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
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

    

