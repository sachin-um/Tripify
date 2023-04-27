<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel') {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
}
else {
?> 

<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/sidebars/hotel_sidebar.php'; ?>


<main class="right-side-content">
    <br>
    <div class="hotel-amenities">
        <?php 
        foreach($data['facilityDetails'] as $facilityDetails):
        ?>
        <input class="reg-check" type="checkbox" 
        name="facilities[]" value=<?php echo $facilityDetails->FacilityName?>>
        <?php header("Content-type: image/jpeg");
        echo $facilityDetails->FacilityName;
        
        ?>
           
        <?php
        endforeach;
        ?>
            <!-- <input class="reg-check" type="checkbox" name="facilities[]" value="Free Wi-Fi"> Free Wi-fi
            <input class="reg-check" type="checkbox" name="facilities[]" value="Room Service"> Room service -->

        <!-- <div class="reg-grid-item">
            <input class="reg-check" type="checkbox" name="facilities[]" value="Gym"> Gym
            <input class="reg-check" type="checkbox" name="facilities[]" value="Restaurent"> Restaurent
            <input class="reg-check" type="checkbox" name="facilities[]" value="Bar"> Bar
        </div>

        <div class="reg-grid-item">
            <input class="reg-check" type="checkbox" name="facilities[]" value="Spa"> Spa
            <input class="reg-check" type="checkbox" name="facilities[]" value="Air port shuttle"> Air port shuttle
            <input class="reg-check" type="checkbox" name="facilities[]" value="Parking"> Parking
        </div> -->
    </div>
    
</main>

<?php
}
?>