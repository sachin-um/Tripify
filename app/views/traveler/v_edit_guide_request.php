<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 

<?php
$_SESSION['user_id'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler') {
    flash('reg_flash', 'Only the Travelers can add Guide Request..');
    redirect('Users/login');
}
else {
    ?>
    <div class="form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <p id="tag">Edit Your Guide Request</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Request/editGuideRequest/<? echo $data['request_id'] ?>" method="POST">
                
                <input type="text" id="caption" name="caption" placeholder="Briefly describe Your need.." value="<?php echo $data['caption']; ?>">
                <span class="invalid"><?php echo $data['caption_err']; ?></span>
                <input type="text" id="area" name="area" placeholder="Area you want to travel" value="<?php echo $data['area']; ?>">
                <span class="invalid"><?php echo $data['area_err']; ?></span>
                <input type="text" id="date" name="date" placeholder="Date you want travel" onfocus="(this.type='date')" value="<?php echo $data['date']; ?>">
                <span class="invalid"><?php echo $data['date_err']; ?></span>
                <input type="text" id="time" name="time" placeholder="Time (Optional)" onfocus="(this.type='time')" value="<?php echo $data['time']; ?>" min="<?php echo date('Y-m-d'); ?>">
                <span class="invalid"><?php echo $data['time_err']; ?></span>
                <select class="search" id="language" name="language">
                    <option value="" disabled selected hidden>prefer Language</option>
                    <option value='sinhala'>Sinhala</option>
                    <option value='english'>English</option>
                    <option value='tamil'>Tamil</option>
                    <option value='chinese'>Chinese</option>
                    <option value='japanese'>Japanese</option>
                    <option value='russian'>Russian</option>
                    <option value='french'>French</option>
                    <option value='artabic'>Arabic</option>
                    <option value='spanish'>Spanish</option>
                </select>
                <span class="invalid"><?php echo $data['language_err']; ?></span>
                <textarea name="additional-details" id="additional-details" cols="82" rows="10" placeholder="Additional Details"><?php echo $data['additional-details']; ?></textarea>
                <span class="invalid"><?php echo $data['additional-details_err']; ?></span>
                <button id="sign-up-btn-1" type="submit">Request a Guide</button>
                <input type="hidden" name="travelerid" id="travelerid" value="<?php echo $_SESSION['user_id'];?>">
                <span class="invalid"><?php echo $data['travelerid_err']; ?></span>
              </form> 
        </div>
    </div>
    <?php
}
?>


<?php require APPROOT.'/views/inc/components/footer.php'; ?>

