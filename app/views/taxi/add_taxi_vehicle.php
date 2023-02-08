<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="wrapper">


<?php
$_SESSION['user_id'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Taxi') {
    flash('reg_flash', 'Only the Taxi Owner can add Taxi Request..');
    redirect('Users/login');
}
else {
    ?>
    <div class="content">
    <div class="form-login">
    <img id="taxi_add_v_form_img" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">


    <h1 id="taxi_add_v_p">Add Your Vehicle</h1>

    <form class="" action="<?php echo URLROOT; ?>/Taxi_Vehicle/addavehicle"  method="POST">
        <!-- <input type="text" id="taxi_add_v_type" placeholder="Vehicle Type" required><br> -->
        <select name="type"  id="taxi_add_v_type" id="cars" required>
            
            <option value="" disabled selected hidden>Vehicle Type</option>

            <option value="Tuk Tuk">Tuk Tuk</option>
            <option value="Car">Car</option>
            <option value="Van">Van</option>
            <option value="Bus">Bus</option>
       
        </select>

        <input type="text" id="taxi_add_v_model"name="model" placeholder="Model" required><br>

        <select name="driver"  id="taxi_add_v_type" id="cars" required>
            
            <option value="" disabled selected hidden>Select Driver</option>

            <option value="Nimal Gunawardana">Nimal Gunawardana</option>
            <option value="Sunil Perera">Sunil Perera</option>
            <option value="Sam Curran">Kamal Silva</option>
            <option value="Nihal Silva">Nihal Silva</option>
       
        </select>

        <input type="text" id="taxi_add_v_year" name="year" placeholder="Year Of Production" required ><br>

        <input type="text" id="taxi_add_v_number" name="number" placeholder="Vehicle Number" required ><br>

        <input type="text" id="taxi_add_v_flag" name="flag"placeholder="Flagfall"  required><br>

        <input type="text" id="taxi_add_v_max" name="max"placeholder="Maximum Number Of Passengers" required ><br>
        
        <input type="text" id="taxi_add_v_area" name="area"placeholder="Available Area" required ><br>
        
<!-- 
        <div class="taxi_add_v_imgbox"> 
            <label>Upload Vehicle Photos</label>   
            <input type="file" name="tax_img" id="taxi_add_v_img"  placeholder="taxi_add_v_imgbox" required accept="image/*"  multiple>
        </div>
                        -->
        <input type="submit" id="taxi_add_v_but" value="Add a Vehicle">
</form>

</div>
    </div>
</div>
<?php
}

?>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    



    






