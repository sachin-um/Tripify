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

<div class="app">
    <main class="right-side-content">
    
        <div class="taxi_off_cont">
            <br>
            <button id="tax_book_backBut" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles'">Back</button>
            
            <h1 id="taxi_add_v_p">Add Your Vehicle</h1>
            <?php flash('reg_flash'); ?>
            
            <div class="tax_vech_view_cont">

                <div class="tax-vec-sp-cont">
                    
                    <form class="tax-vec-sp-cont" action="<?php echo URLROOT; ?>/Taxi_Vehicle/addavehicle"  method="POST" enctype="multipart/form-data">
                        
                        <div class="taxi_veh_grid_edit_cont">
                    
                            <div class="taxi_dash_edit_veh">
                                
                                <div class="drag-area">
                                    <div class="taxi-veh-pic-cont">
                                        <div id="image-gallery">
                                        
                                        
                                        </div>
                                    </div>

                                    <div class="taxi_DriverPro_imgbox"> 
                                        <div class="img-description">Change Vehicle Photos</div>
                                        <div class="img-upload" style="text-align: center;">
                                            <input type="file" id="profile-imgupload" name="vehicleImgs[]" placeholder=""  accept="image/*" multiple style="display:none;" required >
                                            Browse
                                        </div>  
                                    </div>
                                    <span class="invalid"><?php echo $data['vehicle_imgs_err']?></span>
                                </div>

                                                        
                            
                            </div>
                    
                            <div>
                                
                                <table class="tax_book_viewTable">
                                
                                    <tr>
                                        <td>Vehicle Type:</td>
                                        <td>
                                            <select name="type"  id="taxi_add_v_type" id="cars" required>
                                                <option value="" disabled selected hidden>Vehicle Type</option>
                                                <option value="Tuk Tuk">Tuk Tuk</option>
                                                <option value="Car">Car</option>
                                                <option value="Van">Van</option>
                                                <option value="Bus">Bus</option>
                                            </select>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Colour:</td>
                                        <td>
                                            <!-- <input type="text" id="taxi_add_v_year" name="color" placeholder="Vehicle's Colour" value="<?php echo $data['color']?>" required > -->
                                            
                                            <select id="taxi_add_v_year" name="color">
                                                <?php
                                                if(!empty($data['color'])){
                                                ?>
                                                <option value="<?php echo $data['color']?>" selected  hidden><?php echo $data['color']?></option>
                                                <?php
                                                    }else{
                                                ?>
                                                <option value="" disabled selected hidden>Select Colour</option>
                                                <?php        
                                                    }
                                                ?>
                                                <option value="red">Red</option>
                                                <option value="blue">Blue</option>
                                                <option value="green">Green</option>
                                                <option value="yellow">Yellow</option>
                                                <option value="black">Black</option>
                                                <option value="white">White</option>
                                                <option value="silver">Silver</option>
                                                <option value="gray">Gray</option>
                                                <option value="orange">Orange</option>
                                                <option value="brown">Brown</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Model:</td>
                                        <td><input type="text" id="taxi_add_v_model" name="model" placeholder="Model" value="<?php echo $data['model']?>" required></td>
                                    </tr>

                                    <tr>
                                        <td>Year Of Production:</td>
                                        <td> <input type="number" id="taxi_add_v_year" name="year" placeholder="Year Of Production" value="<?php echo $data['yearofProduction']?>"  required ></td>
                                    </tr>
                                    <?php if(!empty($data['yearofProduction_err'])){?>
                                    <tr><td><span class="invalid"><?php echo $data['yearofProduction_err']?></span></td></tr>
                                    <?php }?>
                                   

                                    <tr>
                                        <td>Vehicle Number:</td>
                                        <td><input type="text" id="taxi_add_v_number" name="number" placeholder="Vehicle Number" value="<?php echo $data['vehicleNumber']?>" required ></td>
                                    </tr>

                                    



                                    <tr>
                                        <td>Driver:</td>
                                        <td>
                                        <select name="driver"  id="taxi_add_v_type" id="cars" required>
                                            
                                            
                                            <?php
                                                
                                                $alldrivers=$data['drivers'];
                                                foreach($alldrivers as $driver):
                                                    if(!empty($data['driver']) && $driver->TaxiDriverID==$data['driver']){
                                                        
                                            ?>
                                            <option value="<?php echo $driver->TaxiDriverID?>" selected  hidden><?php echo $driver->Name?></option>
          
                                            <?php
                                                }else{
                                            ?>
                                                <option value="" disabled selected hidden>Select Driver</option>
                                            <?php        
                                                }
                                                echo "<option value='" . $driver->TaxiDriverID. "'>" . $driver->Name. "</option>";
                                                endforeach;
                                            ?>


                                        </select>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No of Passengers(Max):</td>
                                        <td><input type="text" id="taxi_add_v_max" value="<?php echo $data['noOfSeats']?>" name="max"placeholder="Maximum Number Of Passengers" required ></td>
                                        
                                    </tr>
                                    <?php if(!empty($data['noOfSeats_err'])){?>
                                    <tr><td><span class="invalid"><?php echo $data['noOfSeats_err']?></span></td></tr>
                                    <?php }?>
  

                                    <tr>
                                        <td>Price per KM(Rs):</td>
                                        <td><input type="text" id="taxi_add_v_flag" name="flag"placeholder="Flagfall" value="<?php echo $data['price_per_km']?>" required></td>
                                        
                                    </tr>
                                    <?php if(!empty($data['price_per_km_err'])){?>
                                    <tr><td><span class="invalid"><?php echo $data['price_per_km_err']?></span></td></tr>
                                    <?php }?>
                                    


                                    <tr>
                                        <td>Based In:</td>
                                        <!-- <td><input type="text" value="<?php echo $data['area']?>" id="taxi_add_v_area" name="area"placeholder="Available Area" required ></td> -->
                                        <td>
                                        <select class="district-labels-1" id="taxi_add_v_area" name="area">
                                            <?php 
                                                if($data['area']){
                                            ?>
                                          
                                                <option value="<?php echo $data['area']?>" selected  hidden><?php echo $data['area']?></option>
                                            <?php
                                                }else{

                                            ?>
                                                <option value="" selected hidden disabled>Available Area</option>
                                            <?php
                                                }
                                            ?>
                                            
                                            <option value="Ampara">Ampara</option>
                                            <option value="Anuradhapura">Anuradhapura</option>
                                            <option value="Badulla">Badulla</option>
                                            <option value="Batticaloa">Batticaloa</option>
                                            <option value="Colombo">Colombo</option>
                                            <option value="Galle">Galle</option>
                                            <option value="Gampaha">Gampaha</option>
                                            <option value="Hambantota">Hambantota</option>
                                            <option value="Jaffna">Jaffna</option>
                                            <option value="Kalutara">Kalutara</option>
                                            <option value="Kandy">Kandy</option>
                                            <option value="Kegalle">Kegalle</option>
                                            <option value="Kilinochchi">Kilinochchi</option>
                                            <option value="Kurunegala">Kurunegala</option>
                                            <option value="Mannar">Mannar</option>
                                            <option value="Matale">Matale</option>
                                            <option value="Matara">Matara</option>
                                            <option value="Monaragala">Monaragala</option>
                                            <option value="Mullaitivu">Mullaitivu</option>
                                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                                            <option value="Polonnaruwa">Polonnaruwa</option>
                                            <option value="Puttalam">Puttalam</option>
                                            <option value="Ratnapura">Ratnapura</option>
                                            <option value="Trincomalee">Trincomalee</option>
                                            <option value="Vavuniya">Vavuniya</option>
                                            </select>

                                        </td>
                                    </tr>

                                    

                                    <tr>
                                        <td><label > Air Condition</label></td>
                                        <td><input type="checkbox" id="taxi_ac" name="ac" value="Air Condition" <?php if ($data['AC']): ?>checked<?php endif; ?>></td>
                                        
                                    </tr>

                                    <tr>
                                        <td><label > Media</label><br></td>
                                        <td><input type="checkbox" id="taxi_ac" name="media" value="Media" <?php if ($data['media']): ?>checked<?php endif; ?>></td>
                                        
                                    </tr>
                                    
                                    <div class="taxi-checkBox">
                                        <td><label > Free Wifi</label></td>
                                        <td><input type="checkbox" id="taxi_ac" name="wifi" value="Free Wifi" <?php if ($data['wifi']): ?>checked<?php endif; ?>></td>
                                        
                                    </div>

                                    
                                
                                </table>
                            </div>
                        </div>
                        <br><br>
                        <div style="display: flex; justify-content: center; padding: 20px">
                            <input type="submit" class="profile-btn-edit" id="edit-btn" style="width:9em" value="Add a Vehicle">
                        </div>


                    </form>
                    
                </div>
                
                

            </div>  
        

        </div>    
    </main>
 </div>

 <?php require APPROOT.'/views/inc/components/footer.php'; ?>  

<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageuploadGallary.js"></script>






















    <!-- <div class="content">
    <div class="form-login">
    <img id="taxi_add_v_form_img" src="<?php echo URLROOT; ?>/img/updatedLOGO.png" alt="logo">


    <h1 id="taxi_add_v_p">Add Your Vehicle</h1>
    <?php flash('reg_flash'); ?>

    <form class="" action="<?php echo URLROOT; ?>/Taxi_Vehicle/addavehicle"  method="POST">
       
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
</div>    -->








    



    






