<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="wrapper">    
        
    <div class="container">

        <div class="hotel-reg-form-div">
            <p class="home-title-2" style="margin-bottom: 10px;">It's Only a Few Clicks Away.</p>

            
            <form class="hotel-reg-form" action="<?php echo URLROOT; ?>/Hotels/register" method="post">
                <p class="home-title-3">General Information</p>
                <hr>
                <br>    
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Property Name<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="name" required>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Hotel Registration No<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="name" required>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Address Line 1<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="line1" name="line1" required>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Address Line 2 :</p>
                        <input class="hotel-labels-2" type="text" id="line2" name="line2">
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">District<sup> *</sup> :</p>
                        <select name="district" id="district" required>
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
                    </div>

                    <div class="hotel-reg-elements">
                        <div class="hotel-reg-elements">
                            <p class="home-title-4">Property Category<sup> *</sup> :</p>
                            <select name="category" id="category" required>
                                <option selected>--</option>  
                                <option>Chain Hotel</option>
                                <option>Resort</option>  
                                <option>Villa</option>  
                                <option>Hostel</option>  
                                <option>Inn</option>  
                                <option>Boutique</option>
                                <option>Bread and Breakfast</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Contact Number<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="contact" name="contact">
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
                        <select name="category" id="category" required>
                                <option selected>--</option>  
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                        </select>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Children :</p>
                        <select name="category" id="category" required>
                                <option selected>--</option>  
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                        </select>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Advance period to cancel free of charge?</p>
                        <select name="category" id="category" required>
                                <option selected>--</option>  
                                <option>12 hours</option>
                                <option>24 hours</option>
                                <option>36 hours</option>
                                <option>48 hours</option>
                        </select>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Cancellation Fee :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="name">
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Check-In  :</p>
                        <input class="hotel-labels-2" type="text" id="reg_number" name="reg_number">
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Check-Out :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="name">
                    </div>
                </div>

                <p class="home-title-3">Amenities</p>
                <hr>
                <p class="home-title-4">Select all that apply.</p>
                <br>
                <div class="amenities">
                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="pool" value="pool">
                        </div>
                        <div class="check-box-element">
                            <label for="pool">&nbsp;&nbsp;Swimming Pool</label>
                        </div>
                        
                    </div>

                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="parking" value="parking">
                        </div>
                        <div class="check-box-element">
                            <label for="parking">&nbsp;&nbsp;Parking</label>
                        </div>
                        
                    </div>

                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="wifi" value="wifi">
                        </div>
                        <div class="check-box-element">
                            <label for="wifi">&nbsp;&nbsp;Free Wifi</label>
                        </div>
                        
                    </div>

                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="ac" value="ac">
                        </div>
                        <div class="check-box-element">
                            <label for="ac">&nbsp;&nbsp;Air Conditioning</label>
                        </div>
                        
                    </div>

                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="gym" value="gyn">
                        </div>
                        <div class="check-box-element">
                            <label for="gym">&nbsp;&nbsp;Gym</label>
                        </div>
                        
                    </div>
                </div>
                <div class="amenities">
                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="service" value="service">
                        </div>
                        <div class="check-box-element">
                            <label for="service">&nbsp;&nbsp;24/7 Room Service</label>
                        </div>                        
                    </div>

                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="buffet" value="buffet">
                        </div>
                        <div class="check-box-element">
                            <label for="buffet">&nbsp;&nbsp;Restaurent</label>
                        </div>
                        
                    </div>

                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="spa" value="spa">
                        </div>
                        <div class="check-box-element">
                            <label for="spa">&nbsp;&nbsp;Spa Lounge/Relaxation Area</label>
                        </div>
                        
                    </div>

                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="airport" value="ariport">
                        </div>
                        <div class="check-box-element">
                            <label for="airport">&nbsp;&nbsp;Airport Shuttle</label>
                        </div>
                        
                    </div>

                    <div class="check-element-div">
                        <div class="check-box-element">
                            <input type="checkbox" class="registerCheckbox" id="bar" value="bar">
                        </div>
                        <div class="check-box-element">
                            <label for="bar">&nbsp;&nbsp;Bar</label>
                        </div>
                        
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
    
<!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->
            
    