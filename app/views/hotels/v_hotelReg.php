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
                    <input class="hotel-labels-2" type="text" id="name" name="name" class="form-control form-control-lg">
                </div>

                <div class="hotel-reg-elements">
                    <p class="home-title-4">Hotel Registration No<sup> *</sup> :</p>
                    <input class="hotel-labels-2" type="text" id="name" name="name" class="form-control form-control-lg">
                </div>
            </div>

            <div class="hotel-reg-form-div-2">
                <div class="hotel-reg-elements">
                    <p class="home-title-4">Address Line 1<sup> *</sup> :</p>
                    <input class="hotel-labels-2" type="text" id="line1" name="line1">
                </div>

                <div class="hotel-reg-elements">
                    <p class="home-title-4">Address Line 2<sup> *</sup> :</p>
                    <input class="hotel-labels-2" type="text" id="line2" name="line2">
                </div>
            </div>

            <div class="hotel-reg-form-div-2">
                <div class="hotel-reg-elements">
                    <p class="home-title-4">City<sup> *</sup> :</p>
                    <input class="hotel-labels-2" type="text" id="city" name="city">
                </div>

                <div class="hotel-reg-elements">
                    <p class="home-title-4">Contact Number<sup> *</sup> :</p>
                    <input class="hotel-labels-2" type="text" id="contact" name="contact">
                </div>
            </div>

            <p class="home-title-3">Policies</p>
            <hr>
            <br>
            <div class="hotel-reg-form-div-2">
                <div class="hotel-reg-elements">
                    <p class="home-title-4">Pets :</p>
                    <input class="hotel-labels-2" type="text" id="reg_number" name="reg_number">
                </div>

                <div class="hotel-reg-elements">
                    <p class="home-title-4">Children :</p>
                    <input class="hotel-labels-2" type="text" id="name" name="name">
                </div>
            </div>

            <div class="hotel-reg-form-div-2">
                <div class="hotel-reg-elements">
                    <p class="home-title-4">How many days in advance can guests cancel free of charge?</p>
                    <input class="hotel-labels-2" type="text" id="reg_number" name="reg_number">
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
            <br>
            <p class="home-title-4">Select all that apply.</p>
            <div class="nav-main">
                <div class="nav-parts">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                </div>

                <div class="nav-parts">
                    <label for="vehicle1"> I have a bike</label>
                </div>

                <div class="nav-parts">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                    <label for="vehicle1"> I have a bike</label>
                </div>

                <div class="nav-parts">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                    <label for="vehicle1"> I have a bike</label>
                </div>

                <div class="nav-parts">

                </div>
            </div>
        </form>
    </div>

    

            <button class="btn-info" type="submit">Register</button>   
        </form>

    
    </div>

    <?php require APPROOT.'/views/inc/components/footer.php'; ?>

</div>
            
    