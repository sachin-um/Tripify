<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/nav_bar.php'; ?> 


<div class="taxi_add_vehicle_info">

<img src="Pics/logo1-removebg-preview 1.png" id="taxi_add_v_form_img">

<p id="taxi_add_v_p">Add Your Vehicle</h1>

<form action="" class="taxi_add_v_form" method="post">

        <input type="text" id="taxi_add_v_type" placeholder="Vehicle Type" required><br>

        <input type="text" id="taxi_add_v_model" placeholder="Model" required><br>

        <input type="text" id="taxi_add_v_year" placeholder="Year Of Production" required ><br>

        <input type="text" id="taxi_add_v_number" placeholder="Vehicle Number" required ><br>

        <input type="text" id="taxi_add_v_flag" placeholder="Flagfall"  required><br>

        <input type="text" id="taxi_add_v_max" placeholder="Maximum Number Of Passengers" required ><br>
        
        <input type="text" id="taxi_add_v_area" placeholder="Available Area" required ><br>
        
        <label>Upload Vehicle Photos</label>

        <div class="taxi_add_v_imgbox">    
            <input type="file" id="taxi_add_v_img" placeholder="taxi_add_v_imgbox" required accept="image/*"  multiple>
        </div>
                       

</form>
<input type="button" id="taxi_add_v_but" value="Add Vehicle">
</div>


</div>






<?php require APPROOT.'/views/inc/components/footer.php'; ?>