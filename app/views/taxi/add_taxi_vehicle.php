<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">
<?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?> 


    <div class="content">
    <div class="form-login">
    <img id="taxi_add_v_form_img" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">


    <p id="taxi_add_v_p">Add Your Vehicle</h1>

    <form action="" class="taxi_add_v_form" method="post">
        <input type="text" id="driver" name="driver" placeholder="driver" required><br>

        <input type="text" id="taxi_add_v_type" name="type" placeholder="Vehicle Type" required><br>

        <input type="text" id="taxi_add_v_model"name="model" placeholder="Model" required><br>

        <input type="text" id="taxi_add_v_year" name="year" placeholder="Year Of Production" required ><br>

        <input type="text" id="taxi_add_v_number" name="number" placeholder="Vehicle Number" required ><br>

        <input type="text" id="taxi_add_v_flag" name="flag"placeholder="Flagfall"  required><br>

        <input type="text" id="taxi_add_v_max" name="max"placeholder="Maximum Number Of Passengers" required ><br>
        
        <input type="text" id="taxi_add_v_area" name="area"placeholder="Available Area" required ><br>
        
        <label>Upload Vehicle Photos</label>

        <div class="taxi_add_v_imgbox">    
            <input type="file" id="taxi_add_v_img" name="img" placeholder="taxi_add_v_imgbox" required accept="image/*"  multiple>
        </div>
                       

</form>
<input type="button" id="taxi_add_v_but" name="taxi_add_v_but" value="Add Vehicle">
</div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    



    






