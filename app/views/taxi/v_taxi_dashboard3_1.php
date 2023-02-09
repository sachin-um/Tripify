




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
            <a href="<?php echo URLROOT; ?>/Taxies/trip" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Taxies/offers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <div class="taxi_off_cont">
            <button id="tax_book_backBut" onclick="window.location='<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles'">Back</button>

            <div class="tax_vech_view_cont">

                <div class="tax-vec-sp-cont">
                
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
                                <td>V1025</td>
                            </tr>

                            <tr>
                                <td>Vehicle Type:</td>
                                <td>Car</td>
                            </tr>

                            <tr>
                                <td>Vehicle Number:</td>
                                <td>PE-5659</td>
                            </tr>

                            <tr>
                                <td>No of Passengers:</td>
                                <td><input id="tax-dash-vec-editBut"  type="number" value="6"></td>
                            </tr>

                            <tr>
                                <td>Price per KM(Rs):</td>
                                <td><input id="tax-dash-vec-editBut"  type="number" value="1000"></td>
                            </tr>

                            <tr>
                                <td>Paymnet method:</td>
                                <td>
                                <select id="taxi-dash-vec-view-slt">
                                    <option value="End of the Trip">End of the Trip</option>
                                    <option value="Full Payment before Trip">Full Payment before Trip</option>
                                </select>
                                </td>
                                
                            </tr>

                            <tr>
                                <td>Based In:</td>
                                <td><input id="tax-dash-vec-editBut"  type="text"  value="Colombo"></td>
                            </tr>
                        
                        </table>
                    </div>
                </div>
                
                <div>
                    <button id="tax_book_comBut">Edit Info</button>
                </div>

            </div>  
        

        </div>    
    </main>
 </div>

