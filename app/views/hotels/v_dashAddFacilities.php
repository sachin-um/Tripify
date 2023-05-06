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
    <div class="hotel-amenities">

        <p id="hotel-profile-title-1">Select All That Apply</p>
        <form action="<?php echo URLROOT?>/Hotels/addFacilities" method="post">
            <div class="part-all">
                <div class="sub-part">

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Swimming Pool">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Swimming Pool</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Free Wifi">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Free Wifi</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Room Service">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Room Service</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Gift Shop">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Gift Shop</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Outdoor Terrace">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Outdoor Terrace</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="24 Hour Concierge">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>24 Hour Concierge</p>
                        </div>                          
                    </div>

                </div>

                <div class="sub-part">

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Parking">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Parking</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Restaurent">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Restaurent</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Bar">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Bar</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Conference Room">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Conference Room</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Babysitting on request">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Babysitting on request</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="24 Hour doctor on call">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>24 Hour doctor on call</p>
                        </div>                          
                    </div>
                </div>


                <!-- Third set -->
                <div class="sub-part">

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Spa">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Spa</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Airport Shuttle">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Airport Shuttle</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Gym">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Gym</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Reception Hall">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Reception Hall</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="Laundry Service">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>Laundry Service</p>
                        </div>                          
                    </div>

                    <div class="sub-description">
                        <div class="sub-sub" style="width: 25%;">
                            <input type="checkbox" style="transform: scale(0.6)" name="facilities[]" value="24 Hour Security">
                        </div>
                        
                        <div class="info" style="width: 75%;">
                            <p>24 Hour Security</p>
                        </div>                          
                    </div>
                </div>

            </div>

            <div style="display: flex; justify-content: center; padding: 20px">
                <button class="all-purpose-btn" value="submit" type="submit" name="submit">Edit</button>
            </div>
            
        </form>
    </div>
    
</main>

<?php
}
?>