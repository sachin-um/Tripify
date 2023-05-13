<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 
<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
else {
    ?> 
<div class="form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/updatedLOGO.png" alt="logo">
            <p id="tag">Sign Up is fast and easy!</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Guides/register" method="POST">
                <label class="abc"> Name</label><br>
                <input type="text" id="name" name="name" placeholder="   Eg: Saman Kumara" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>
                <br>
                
                <label class="abc"> Phone Number</label><br>
                <input type="text" id="number" name="number" placeholder="Eg: 0761234567" value="<?php echo $data['phone_number']; ?>">
                <span class="invalid"><?php echo $data['number_err']; ?></span>
                <br>
                <label class="abc"> area you choose to guide</label><br>
                <input type="text" id="area" name="area" placeholder="Eg: Anuradhapura" value="<?php echo $data['area']; ?>">
                <span class="invalid"><?php echo $data['area_err']; ?></span>
                <br>
                <label class="abc"> Price per Day</label><br>
                <input type="text" id="price" name="price" placeholder="Eg: 5000.00" value="<?php echo $data['price_per_hour']; ?>">
                <span class="invalid"><?php echo $data['price_err']; ?></span>
                <br>
                <label class="abc"> More Information</label><br>

                <label class="abc"> NIC</label><br>
                <input type="text" id="nic" name="nic" placeholder="Eg: 981033017V" value="<?php echo $data['nic']; ?>">
                <span class="invalid"><?php echo $data['nic_err']; ?></span>
                <br>
                <!-- <label class="abc"> National Tourist Licence</label><br>
                <input type="text" id="NTL" name="NTL" placeholder="" value="<?php echo $data['NTL']; ?>">
                <span class="invalid"><?php echo $data['NTL_err']; ?></span> -->

                <label class="abc"> Languages that you know </label><br>
                <select class="guide-reg-select" multiple="mutiple" name="languages[]">
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
                <span class="invalid"><?php echo $data['languages_err']; ?></span>
                <br>
                <label class="abc"> Bio </label><br>
                <textarea class="guide-reg-textarea" name="bio" id="bio" cols="52" rows="10" placeholder="Tell us about you"></textarea>    
                <button id="sign-up-btn-1" type="submit" >Register as Guide</button>
                <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['user_id']; ?>">
              </form> 
              <?php flash('reg_flash'); ?>
        </div>
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
<?php
}


?>