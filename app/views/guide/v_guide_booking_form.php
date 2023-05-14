<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">
    <div class="content">
    <br>
    <p class="home-title-2" >Fill Your Details</p>

    <div id="hotel-booking-form" class="hotel-room-top-picks">
        <form action="post">
            <div class="hotel-reg-form">
                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Trip Location<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="name" name="name" required>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Date<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="date" id="name" name="name" min="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Start Time<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="line1" name="line1" required>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">End Time<sup> *</sup> :</p>
                        <input class="hotel-labels-2" type="text" id="line1" name="line1" required>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <div class="hotel-reg-elements">
                        <p class="home-title-4">No of People in Your Group :</p>
                        <input class="hotel-labels-2" type="text" id="line1" name="line1" required>
                    </div>

                    <div class="hotel-reg-elements">
                        <p class="home-title-4">Additional Details :</p>
                        <input class="hotel-labels-2" type="text" id="line1" name="line1" required>
                    </div>
                </div>

                <div class="hotel-reg-form-div-2">
                    <button id="confirm-booking-btn" class="all-purpose-btn" type="submit">Book Now</button>
                </div>
            </div>
        </form>
                    
    </div>
</div>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>