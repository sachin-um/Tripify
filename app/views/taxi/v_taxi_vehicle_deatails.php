




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
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <div class="taxi_off_cont">
            <button id="tax_book_backBut" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles'">Back</button>

            <div class="tax_vech_view_cont">

                <div class="tax-vec-sp-cont">
                    
                    <form class="tax-vec-sp-cont" action="<?php echo URLROOT; ?>/Taxi_Vehicle/edit/<?php echo $data['ID']?>"  method="POST">
                        
                        <div class="taxi_veh_grid_edit_cont">
                            <div class="taxi_dash_edit_veh">
                                
                                <div>
                                    <img src="<?php echo URLROOT; ?>/img/car.png" id="tax-dash-view-veh-img"  alt="Driver image">
                                </div>
                                

                                <div class="taxi_add_v_imgbox"> 
                                    <label>Change Vehicle Photos</label>   
                                    <input type="file" name="tax_img" id="taxi_add_v_img"  placeholder="taxi_add_v_imgbox" accept="image/*"  multiple>
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
                                            <select name="driver"  id="taxi_add_v_type" id="cars" required>
                                            <option value="<?php echo $data['driver']?>" selected  hidden><?php echo $data['driver']?></option>
                                                <?php
                                                    $alldrivers=$data['drivers'];
                                                    foreach($alldrivers as $driver):
                                                ?>
                                                    
                                                    <?php echo "<option value='" . $driver->driverID. "'>" . $driver->Name. "</option>"?>

                                                    
                                                <?php
                                                    endforeach;
                                                ?>

                                            </select>

                                        </td>
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
                                        <td><input name="area" id="tax-dash-vec-editBut"  type="text"  value="<?php echo $data['area']?>"></td>
                                    </tr>

                                    
                                
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

