<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 
 
<div class="form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/updatedLOGO.png" alt="logo">
            <p id="tag">Sign Up is fast and easy!</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Users/register" method="POST">
                <label class="abc"> Name</label><br>
                <input type="text" id="name" name="name" placeholder="   Name" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>
                
                <label class="abc"> Phone Number</label><br>
                <input type="text" id="number" name="number" placeholder="+94" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>

                <label class="abc"> area you choose to</label><br>
                <input type="text" id="name" name="name" placeholder="RS" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>

                <label class="abc"> Price per hour</label><br>
                <input type="text" id="name" name="name" placeholder="" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>

                <label class="abc"> More Information</label><br>

                <label class="abc"> NIC</label><br>
                <input type="text" id="name" name="name" placeholder="" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>

                <label class="abc"> National Tourist Licence</label><br>
                <input type="text" id="name" name="name" placeholder="" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>

                <label class="abc"> Languages that you know </label><br>
                <input type="text" id="name" name="name" placeholder="" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>

                <label class="abc"> Bio </label><br>
                <input type="text" id="name" name="name" placeholder="" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>
            
                
                <button id="sign-up-btn-1" type="submit" href="v_register_continue.php">Continue</button>

              </form> 
        </div>
    </div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>