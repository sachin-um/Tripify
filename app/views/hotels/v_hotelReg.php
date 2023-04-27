<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
else {
    ?> 

<?php require APPROOT . '/views/inc/components/header.php'; ?>
<!-- <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?> -->
<div class="wrapper">

    <div class="container">

        <div class="hotel-reg-form-div">
            <p class="home-title-2" style="margin-bottom: 10px;">It's Only a Few Clicks Away.</p>


            <form class="hotel-reg-form" action="<?php echo URLROOT ?>/Hotels/register" method="post">
                <p class="home-title-3">General Information</p>
                <hr>
                <br>
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Property Name<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="name" value="<?php echo $data['name']; ?>">
                        <span id="reg-form-span"><?php echo $data['name_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Hotel Registration No<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="hotel_reg_number" name="hotel_reg_number" value="<?php echo $data['hotel_reg_number']; ?>">
                        <span id="reg-form-span"><?php echo $data['hotel_reg_number_err']; ?></span>
                    </div>
                </div>
                <br>
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Address Line 1<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="line1" name="line1" value="<?php echo $data['line1']; ?>">
                        <span id="reg-form-span"><?php echo $data['line1_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Address Line 2 :</p>
                        <input class="hotel-labels-2" type="text" id="line2" name="line2" value="<?php echo $data['line2']; ?>">
                    </div>
                </div>
                <br>
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">District<sup> *</sup> :</p>
                        <select name="district" id="hotel-reg-select" name="district" value="<?php echo $data['district']; ?>">
                            <option selected>--</option>
                            <option>Ampara</option>
                            <option>Anuradhapura</option>
                            <option>Badulla</option>
                            <option>Batticaloa</option>
                            <option>Colombo</option>
                            <option>Galle</option>
                            <option>Gampaha</option>
                            <option>Hambantota</option>
                            <option>Jaffna</option>
                            <option>Kalutara</option>
                            <option>Kandy</option>
                            <option>Kegalle</option>
                            <option>Kilinochchi</option>
                            <option>Kurunegala</option>
                            <option>Mannar</option>
                            <option>Matale</option>
                            <option>Matara</option>
                            <option>Moneragala</option>
                            <option>Mullaitivu</option>
                            <option>Nuwara Eliya</option>
                            <option>Polonnaruwa</option>
                            <option>Puttalam</option>
                            <option>Ratnapura</option>
                            <option>Trincomalee</option>
                            <option>Vavuniya</option>
                        </select>
                        <span id="reg-form-span"><?php echo $data['district_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <div class="hotel-reg-elements">
                            <p class="home-title-4">Property Category<sup> *</sup> :</p>
                            <select name="category" id="hotel-reg-select" name="category" value="<?php echo $data['property_category']; ?>">
                                <option selected>--</option>
                                <option>Chain Hotel</option>
                                    <option>Resort</option>
                                    <option>Villa</option>
                                    <option>Hostel</option>
                                    <option>Inn</option>
                                    <option>Boutique</option>
                                <option>Bread and Breakfast</option>
                            </select>
                            <span id="reg-form-span"><?php echo $data['property_category_err']; ?></span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Contact Number<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="contact" name="contact" value="<?php echo $data['contact_number']; ?>">
                        <span id="reg-form-span"><?php echo $data['contact_number_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">

                    </div>
                </div>

                <p class="home-title-3">Policies</p>
                <hr>
                <br>
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Pets :</p>
                        <select id="hotel-reg-select" name="pets" value="<?php echo $data['pets']; ?>">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Children :</p>
                        <select name="children" id="hotel-reg-select" value="<?php echo $data['children']; ?>">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Check-In :</p>
                        <select id="hotel-reg-select" name="check_in" type="text" value="<?php echo $data['check_in']; ?>">
                            <option value="9.00 AM" selected>9.00 AM</option>
                            <option value="10.00 AM">10.00 AM</option>
                            <option value="11.00 AM">11.00 AM</option>
                            <option value="12.00 PM">12.00 PM</option>
                            <option value="01.00 PM">01.00 PM</option>
                        </select>
                        <span id="reg-form-span"><?php echo $data['checkin_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Check-Out :</p>
                        <select id="hotel-reg-select" name="check_out" type="text" value="<?php echo $data['check_out']; ?>">
                            <option value="2.00 PM" selected>02.00 PM</option>
                            <option value="3.00 AM">03.00 PM</option>
                            <option value="4.00 AM">04.00 PM</option>
                            <option value="5.00 AM">05.00 PM</option>
                            <option value="6.00 AM">06.00 PM</option>
                        </select>
                        <span id="reg-form-span"><?php echo $data['checkout_err']; ?></span>
                    </div>
                </div>
                <br>
                <div class="hotel-reg-form-div-2" style="display: inline;">
                    <p>* Please note that all bookings done through Tripify can be cancelled free of charge prior to 24 hours.</p>
                    <p>** Last minute cancellations will have a refund of 50% of booking fees</p>
                </div>

                <br>
                <div class="hotel-reg-form-div-2">
                    <p style="text-align: center;">Provide a description to introduce your property</p>
                    <textarea name="description" rows="5" cols="50"></textarea>
                </div>
                
                <div class="home-div-3">
                    <button class="all-purpose-btn" type="submit">Register</button>
                </div>

            </form>

        </div>


    </div>
</div>

<?php
}
?>


<!-- <?php require APPROOT . '/views/inc/components/footer.php'; ?> -->

<!-- <p class="home-title-3">Facilties</p>
                <hr>
                 -->