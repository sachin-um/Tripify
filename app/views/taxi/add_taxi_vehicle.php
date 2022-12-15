<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">
<?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?> 


    <div class="content">
    <div class="form-login">
    <img id="taxi_add_v_form_img" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">


    <h1 id="taxi_add_v_p">Add Your Vehicle</h1>

    <form action="" class="taxi_add_v_form" method="POST">

        <input type="text" id="taxi_add_v_type" placeholder="Vehicle Type" required><br>

        <input type="text" id="taxi_add_v_model" placeholder="Model" required><br>

        <input type="text" id="taxi_add_v_year" placeholder="Year Of Production" required ><br>

        <input type="text" id="taxi_add_v_number" placeholder="Vehicle Number" required ><br>

        <input type="text" id="taxi_add_v_flag" placeholder="Flagfall"  required><br>

        <input type="text" id="taxi_add_v_max" placeholder="Maximum Number Of Passengers" required ><br>
        
        <input type="text" id="taxi_add_v_area" placeholder="Available Area" required ><br>
        
        

        <div class="taxi_add_v_imgbox"> 
            <label>Upload Vehicle Photos</label>   
            <input type="file" id="taxi_add_v_img" placeholder="taxi_add_v_imgbox" required accept="image/*"  multiple>
        </div>
                       

</form>
<input type="button" id="taxi_add_v_but" value="Add Vehicle">
</div>
    </div>
    <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   






    



    






