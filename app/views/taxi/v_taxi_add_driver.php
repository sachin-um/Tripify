<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">
<?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?> 


    <div class="content">
    <div class="form-login">
    <img id="taxi_add_v_form_img" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">


    <h1 id="taxi_add_v_p">Add Your Vehicle</h1>

    <form action="" class="taxi_add_v_form" method="POST">

        <!-- <input type="text" id="taxi_add_v_type" placeholder="Vehicle Type" required><br> -->
       
        <input type="text" id="taxi_add_v_model" placeholder="Driver" required><br>

        <input type="text" id="taxi_add_v_year" placeholder="NIC" required ><br>

        <input type="text" id="taxi_add_v_number" placeholder="License Number" required ><br>

        <div class="taxi_dri_mob_div">
            <input id="taxidricode" type="text" value="+94" disabled >
            <input type="tel" id="taxidrimobile" name="taxiownmobile" value="" / placeholder="Business Phone"  required ><br>
        </div>
        
        
        

        <div class="taxi_add_v_imgbox"> 
            <label>Upload Driver Photo</label>   
            <input type="file" id="taxi_add_v_img" placeholder="taxi_add_v_imgbox" required accept="image/*" >
        </div>
                       
        <input type="submit" id="taxi_add_v_but" value="Add Vehicle">
</form>

</div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   
