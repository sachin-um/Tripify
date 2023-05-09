




<!-- ..................... UPDATE VEHICLE INFO.......................... -->




<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<div class="app">
    <aside class="sidebar">

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">User Profile</a>
            <!-- <a href="#" class="menu-item is-active">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item is-active">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <div class="taxi_off_cont">
            <button id="tax_book_backBut" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles'">Back</button>

            <div class="tax_vech_view_cont">

                <div class="tax-vec-sp-cont">
                    
                    <form class="tax-vec-sp-cont" action="<?php echo URLROOT; ?>/Taxi_Vehicle/edit/<?php echo $data['ID']?>"  method="POST" enctype="multipart/form-data">
                        
                        <div class="taxi_veh_grid_edit_cont">
                    
                            <div class="taxi_dash_edit_veh">
                                <?php
                                    foreach ($data['vehicle_images_arr'] as $image_name) {

                                ?>

                                    <img src="<?php echo URLROOT; ?>/img/vehicle_images/<?php echo $image_name?>" id="profile-img-placehoder"  alt="Driver image" >
                                                
                                <?php
                                    }
                                ?>
                                
                            
                                <div class="drag-area">
                                    <div class="taxi-veh-pic-cont">
                                        <div id="image-gallery">
                                        
                                        
                                        </div>
                                    </div>

                                    <div class="taxi_DriverPro_imgbox"> 
                                        <div class="img-description">Change Vehicle Photos</div>
                                        <div class="img-upload" style="text-align: center;">
                                            <input type="file" id="profile-imgupload" name="vehicleImgs[]" placeholder=""  accept="image/*" multiple style="display:none;" >
                                            Browse
                                        </div>  
                                    </div>
                                </div>

                                                        
                            
                            </div>
                    
                            <div>
                                
                                <table class="tax_book_viewTable">
                                
                                    <tr>
                                        <td>Vehicle ID:</td>
                                        <td><?php echo $data['ID']?></td>
                                    </tr>

                                    <tr>
                                        <td>Vehicle Type:</td>
                                        <td><?php echo $data['vehicleType']?></td>
                                    </tr>

                                    <tr>
                                        <td>Vehicle Number:</td>
                                        <td><?php echo $data['vehicleNumber']?></td>
                                    </tr>



                                    <tr>
                                        <td>Driver:</td>
                                        <td>
                                            <select name="driverID"  id="taxi_add_v_type" id="cars" required>
                                            <option value="<?php echo $data['driverID']?>" selected  hidden><?php echo $data['driver']?></option>
                                                <?php
                                                    $alldrivers=$data['drivers'];
                                                    foreach($alldrivers as $driver):
                                                ?>
                                                    
                                                    <?php echo "<option value='".$driver->TaxiDriverID."'>".$driver->Name."</option>" ?>

                                                    
                                                <?php
                                                    endforeach;
                                                ?>

                                            </select>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>No of Passengers:</td>
                                        <td><input type="text" id="taxi_add_v_year" name="color" placeholder="Vehicle's Colour"  value="<?php echo $data['color']?>"required ></td>
                                    </tr>
  

                                    <tr>
                                        <td>No of Passengers:</td>
                                        <td><input name="noOfSeats" id="tax-dash-vec-editBut"  type="number" value="<?php echo $data['noOfSeats']?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Price per KM(Rs):</td>
                                        <td><input name="price_per_km" id="tax-dash-vec-editBut"  type="number" value="<?php echo $data['price_per_km']?>"></td>
                                    </tr>

                                    <!-- <tr>
                                        <td>Paymnet method:</td>
                                        <td>
                                        <select id="taxi-dash-vec-view-slt">
                                            <option value="End of the Trip">End of the Trip</option>
                                            <option value="Full Payment before Trip">Full Payment before Trip</option>
                                        </select>
                                        </td>
                                        
                                    </tr> -->

                                    <tr>
                                        <td>Based In:</td>
                                        <td>
                                        <select class="district-labels-1" id="taxi_add_v_area" name="area">
                                          
                                            <option value="<?php echo $data['area']?>" selected  hidden><?php echo $data['area']?></option>
                                            
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
                                        <td><input type="checkbox"  id="taxi_ac" name="TaxiAC" value="Air Condition" <?php if ($data['AC']): ?>checked<?php endif; ?>></td>
                                        
                                    </tr>

                                    <tr>
                                        <td><label > Media</label><br></td>
                                        <td><input type="checkbox"  id="taxi_ac" name="media" value="Media" <?php if ($data['media']): ?>checked<?php endif; ?>></td>
                                        
                                    </tr>
                                    
                                    <div class="taxi-checkBox">
                                        <td><label > Free Wifi</label></td>
                                        <td><input type="checkbox" id="taxi_ac" name="wifi" value="Free Wifi" <?php if ($data['wifi']): ?>checked<?php endif; ?>></td>
                                        
                                    </div>

                                    
                                
                                </table>
                            </div>
                        </div>

                        <div class="taxi_veh_editBut_cont">
                            <input type="submit" id="taxi_add_v_but" value="Edit Info">
                        </div>


                    </form>
                    
                </div>
                
                

            </div>  
        

        </div>    
    </main>
 </div>

<script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageuploadGallary.js"></script>
<!-- <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/imageUpload/imageUpload.js"></script> -->

