<?php require APPROOT . '/views/inc/components/header.php'; ?>
<!-- <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?> -->
<div class="wrapper">

    <div class="container">

        <div class="hotel-reg-form-div">
            <p class="home-title-2" style="margin-bottom: 10px;">It's Only a Few Clicks Away.</p>


            <form class="hotel-reg-form" action="<?php echo URLROOT?>/Hotels/register" method="post">
                <p class="home-title-3">General Information</p>
                <hr>
                <br>
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Property Name<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="name" value="<?php echo $data['name']; ?>">
                        <span><?php echo $data['name_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Hotel Registration No<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="hotel_reg_number" name="hotel_reg_number" value="<?php echo $data['hotel_reg_number']; ?>">
                        <span><?php echo $data['hotel_reg_number_err']; ?></span>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Address Line 1<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="line1" name="line1" value="<?php echo $data['line1']; ?>">
                        <span><?php echo $data['property_address_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Address Line 2 :</p>
                        <input class="hotel-labels-2" type="text" id="line2" name="line2" value="<?php echo $data['line2']; ?>">
                        <span><?php echo $data['property_address_err']; ?></span>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">District<sup> *</sup> :</p>
                        <select name="district" id="district" name="district" value="<?php echo $data['district']; ?>">
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
                        <span><?php echo $data['property_address_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <div class="hotel-reg-elements">
                            <p class="home-title-4">Property Category<sup> *</sup> :</p>
                            <select name="category" id="category" name="category" value="<?php echo $data['property_category']; ?>">
                                <option selected>--</option>  
                                <option>Chain Hotel</option>
                                         <option>Resort</option>  
                                         <option>Villa</option>  
                                         <option>Hostel</option>  
                                         <option>Inn</option>  
                                         <option>Boutique</option>
                                <option>Bread and Breakfast</option>
                            </select>
                            <span><?php echo $data['property_category_err']; ?></span>
                        </div>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Contact Number<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="contact" name="contact" value="<?php echo $data['contact_number']; ?>">
                        <span><?php echo $data['contact_number_err']; ?></span>
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
                        <select id="pets" name="pets" value="<?php echo $data['pets']; ?>">
                            <option selected>--</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <span><?php echo $data['pets_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Children :</p>
                        <select name="children" id="category" value="<?php echo $data['children']; ?>">
                            <option selected>--</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <span><?php echo $data['children_err']; ?></span>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Advance period to cancel free of charge?</p>
                        <select name="cancel_period" id="cancel_period" value="<?php echo $data['cancel_period']; ?>">
                            <option selected>--</option>
                            <option>12 hours</option>
                            <option>24 hours</option>
                            <option>36 hours</option>
                            <option>48 hours</option>
                        </select>
                        <span><?php echo $data['cancel_period_err']; ?></span>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Cancellation Fee :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="fee" value="<?php echo $data['cancel_fee']; ?>">
                        <span><?php echo $data['cancel_fee_err']; ?></span>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Check-In :</p>
                        <input class="hotel-labels-2" type="text" id="reg_number" name="check_in" value="<?php echo $data['check_in']; ?>">
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Check-Out :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="check_out" value="<?php echo $data['check_out']; ?>">
                    </div>
                </div>


                <br>
                <br>
                <div class="home-div-3">
                    <button class="all-purpose-btn" type="submit">Register</button>
                </div>

            </form>

        </div>


    </div>
</div>

<!-- <?php require APPROOT . '/views/inc/components/footer.php'; ?> -->