<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 
 
<div class="form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <p id="tag">Assign am Admin...</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Admins/register" method="POST">
                <input type="text" id="name" name="name" placeholder="Admin Name" value="<?php echo $data['name']; ?>">
                <span class="invalid"><?php echo $data['name_err']; ?></span>
                <input type="email" id="email" name="email" placeholder="Email"  value="<?php echo $data['email']; ?>">
                <span class="invalid"><?php echo $data['email_err']; ?></span>
                <input type="text" id="contactno" name="contactno" placeholder="Contact Number"  value="<?php echo $data['contactno']; ?>">
                <span class="invalid"><?php echo $data['contactno_err']; ?></span>
                <input type="text" id="nic" name="nic" placeholder="NIC Number"  value="<?php echo $data['nic']; ?>">
                <span class="invalid"><?php echo $data['nic_err']; ?></span>
                <input type="password" id="password" name="password" placeholder="   Password" value="<?php echo $data['password']; ?>">
                <span class="invalid"><?php echo $data['password_err']; ?></span>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" value="<?php echo $data['confirm-password']; ?>">
                <span class="invalid"><?php echo $data['confirm-password_err']; ?></span>
                <select class="search" id="assigned-area" name="assigned-area">
                    <option value="" disabled selected hidden>Assigned Area</option>
                    <option value="verification">User Verification</option>
                    <option value="editing">Editing</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select>
                <span class="invalid"><?php echo $data['assigned-area_err']; ?></span><br>
                <button id="sign-up-btn-1" type="submit">Register Admin</button>

              </form> 
        </div>
    </div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>