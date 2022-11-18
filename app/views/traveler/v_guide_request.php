<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 

<?php
$_SESSION['user_id'];


if (!empty($_SESSION['user_id'])) {
    ?>
    <div class="form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <p id="tag">Sign Up is fast and easy!</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Request/addTaxiRequest" method="POST">
                
                <input type="text" id="area" name="area" placeholder="Area you want to travel" value="<?php echo $data['area']; ?>">
                <span class="invalid"><?php echo $data['area_err']; ?></span>
                <input type="text" id="date" name="date" placeholder="Date you want travel" onfocus="(this.type='date')" value="<?php echo $data['date']; ?>">
                <span class="invalid"><?php echo $data['date_err']; ?></span>
                <input type="text" id="time" name="time" placeholder="Time (Optional)" onfocus="(this.type='time')" value="<?php echo $data['time']; ?>">
                <span class="invalid"><?php echo $data['time_err']; ?></span>
                <input type="text" id="language" name="language" placeholder="Language you prefer" value="<?php echo $data['language']; ?>">
                <span class="invalid"><?php echo $data['language_err']; ?></span>
                <textarea name="additional-details" id="additional-details" cols="52" rows="10" placeholder="Additional Details"></textarea>
                <span class="invalid"><?php echo $data['additional-details_err']; ?></span>
                <button id="sign-up-btn-1" type="submit">Request a Guide</button>
                <input type="hidden" name="travelerid" id="travelerid" value="<?php echo $_SESSION['user_id'];?>">
                <span class="invalid"><?php echo $data['travelerid_err']; ?></span>
              </form> 
        </div>
    </div>
    <?php
}
else {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}

?>
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -34.397, lng: 150.644 },
        zoom: 8,
    });
}

window.initMap = initMap;
</script>
 
 <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly"
      defer>
</script>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

