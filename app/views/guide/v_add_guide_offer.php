<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Guide') {
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
                <form action="<?php echo URLROOT; ?>/Offers/addGuideOffer/<?php echo $data['requestid'] ?>" method="POST">
                    
                    
                    <label class="abc"> Service charges</label><br>
                    <input type="text" id="charges" name="charges">
                    <span class="invalid"><?php echo $data['charges_err']; ?></span>
                    <label class="abc">Payment option </label><br>
                    <select class="search" id="payment-option" name="payment-option">
                        <option value="" disabled selected hidden>Payment Option</option>
                        <option value="card">Card</option>
                        <option value="cash">Cash</option>
                        <option value="both">Cash Or Card</option>
                    </select>
                    <span class="invalid"><?php echo $data['payment-option_err']; ?></span>
                    <label class="abc"> Additional Information: </label><br>
                    <input type="info" id="info" name="info" placeholder="" >
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






    

