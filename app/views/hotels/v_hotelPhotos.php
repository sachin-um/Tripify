<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
else {
    ?> 

<?php require APPROOT . '/views/inc/components/header.php'; ?>
<!-- <?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?> -->
<div class="wrapper">
    <p style="text-align: center;">* Please select a few photographs of your hotel.</p>
    <br>
    <div class="hotel-reg-form-div-2">
        <input type="file" name="file">
    </div>
</div>

<?php
}
?>