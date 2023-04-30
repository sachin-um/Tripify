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
    flash('reg_flash', 'Only the Taxi Owner can add Taxi Vehicles..');
    redirect('Users/login');
}
else {
?>
    <div class="content">
    <div class="form-login">
    <img id="taxi_add_v_form_img" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">


    <h1 id="taxi_add_v_p">Add Your Vehicle</h1>
    <?php flash('reg_flash'); ?>

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

        <input type="text" id="taxi_add_v_year" name="color" placeholder="Vehicle's Colour" required ><br>

        <select name="driver"  id="taxi_add_v_type" id="cars" required>

            <?php
                $alldrivers=$data['drivers'];
                foreach($alldrivers as $driver):
            ?>
                
                <?php echo "<option value='" . $driver->TaxiDriverID. "'>" . $driver->Name. "</option>"?>

                
            <?php
                endforeach;
            ?>
            
       
        </select>
    


        <input type="text" id="taxi_add_v_year" name="year" placeholder="Year Of Production" required ><br>

        <input type="text" id="taxi_add_v_number" name="number" placeholder="Vehicle Number" required ><br>

        <input type="text" id="taxi_add_v_flag" name="flag"placeholder="Flagfall"  required><br>

        <input type="text" id="taxi_add_v_max" name="max"placeholder="Maximum Number Of Passengers" required ><br>
        
        <input type="text" id="taxi_add_v_area" name="area"placeholder="Available Area" required ><br>
           
        
        <div class="taxi_add_v_imgbox"> 
            <label>Upload Vehicle Photos</label>   
            <input type="file" name="tax_img" id="taxi_add_v_img"  placeholder="taxi_add_v_imgbox" required accept="image/*"  multiple>
        </div>
                       

        <br>

        <div>
            <div class="taxi-checkBox">
                <input type="checkbox" id="taxi_ac" name="ac" value="Air Condition">
                <label > Air Condition</label>
            </div>

            <div class="taxi-checkBox">
                <input type="checkbox" id="taxi_ac" name="media" value="Media">
                <label > Media</label><br>
            </div>
            
            <div class="taxi-checkBox">
                <input type="checkbox" id="taxi_ac" name="wifi" value="Free Wifi">
                <label > Free Wifi</label><br><br>
            </div>
            

        </div>


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








    



    






