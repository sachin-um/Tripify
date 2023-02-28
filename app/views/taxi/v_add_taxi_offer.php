<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Taxi') {
    flash('reg_flash', 'Only the Guides can add a Offer');
    redirect('Pages/home');
}
else {
    ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">

        <div class="form-login">
            <div >
                <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
                <p id="tag">Make an Offer for Travelers Request</p> 
            </div>
    
            <div >
                <form action="<?php echo URLROOT; ?>/Offers/taxiMakeOffers/<?php echo $data['requestid'] ?>" method="POST">
                    
                    <label class="abc">Vehicle Number</label><br>
                    <select class="search" id="payment-option" name="VehicleID">
                    <option value="" disabled selected hidden>Vehicle Number</option>
                    <?php
                        $allvehicles=$data['vehicles'];
                        foreach($allvehicles as $vehicle):
                    ?>
                       <?php echo "<option value='" . $vehicle->VehicleID. "'>" . $vehicle->vehicle_number. "</option>"?>
                    <?php
                        endforeach;
                    ?>
                    </select>
                    <span class="invalid"></span>

                    <label class="abc"> Price Per KM</label><br>
                    <input type="text" id="charges" name="charges" placeholder="Ex: 500.00 LKR">
                    <span class="invalid"></span>
                    
                    <label class="abc">Payment option </label><br>
                    <select class="search" id="payment-option" name="payment_option">
                        <option value="" disabled selected hidden>Payment Option</option>
                        <option value="card">End Of The Trip</option>
                        <option value="cash">Online</option>
                    </select>
                    <span class="invalid"></span>
                    
                    <label class="abc"> Additional Information: </label><br>
                    <input type="info" id="info" name="info" placeholder="Ex: Full Air Conditon " >
                    
                    
                    <button id="sign-up-btn-1" type="submit">Make an Offer</button>
                

                </form> 
                <?php flash('reg_flash'); ?>
              
            </div>
        </div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   
<?php
}


?>






    

