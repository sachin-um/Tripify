


<!-- ............ Update or View Driver Info .......................... -->



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
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">User Profile</a>
            <!-- <a href="#" class="menu-item is-active">Company</a> -->
            <a href="<?php echo URLROOT; ?>/Taxi_Driver/viewdrivers" class="menu-item">Drivers</a>
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item ">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Offers/taxioffers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/taxies" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <div class="taxi_off_cont">
            <button id="tax_book_backBut" onclick="window.location='<?php echo URLROOT; ?>/Pages/profile'">Back</button>

            <div class="tax_vech_view_cont">

                <div class="tax-vec-sp-cont">
                    <form class="tax-vec-sp-cont" action="<?php echo URLROOT; ?>/Taxies/OwnerDeatails"  method="POST">
                        <div class="taxi_veh_grid_edit_cont">
                            <div class="taxi_dash_edit_veh">
                                <div>
                                    <img src="<?php echo URLROOT; ?>/img/Group_profile.png" id="tax-dash-view-veh-img"  alt="Driver image">
                                </div>
                                

                                <div class="taxi_add_v_imgbox"> 
                                    <label>Change Profile Picture</label>   
                                    <input type="file" name="tax_img" id="taxi_add_v_img"  placeholder="taxi_add_v_imgbox" accept="image/*">
                                </div>

                            </div>
                        
                            <div>
                            
                                
                                <table class="tax_book_viewTable">
                                
                                    <tr>
                                        <td>Owner ID:</td>
                                        <td><?php echo $data['ownerID']?></td>
                                    </tr>

                                    <tr>
                                        <td>Owner Name:</td>
                                        <td><input name="name" type="text" value="<?php echo $data['name']?>"></td>
                                    </tr>

                                    <tr>
                                        <td>Company Name:</td>
                                        <td><input name="company_name" type="text" value="<?php echo $data['company_name']?>"></td>
                                    </tr>

                                    <tr>
                                        <td>NIC:</td>
                                        <td><?php echo $data['nic']?></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Contact Number:</td>
                                        <td><input name="contact_number"id="tax-dash-vec-editBut"  type="tel"  value="<?php echo $data['contact_number']?>"></td>
                                    </tr>

                                    
                                    <tr>
                                        <td>Address:</td>
                                        <td><input name='address'type="text" value="<?php echo $data['address']?>">
</td>
                                        <!-- <td><textarea name="address" id="" cols="20" rows="5" value=""><?php echo $data['address']?></textarea></td> -->
                                    </tr>

                                    


                                
                                </table>
                            </div>
                        </div>

                        <div class="taxi_veh_editBut_cont">
                            <input type="submit" id="taxi_add_v_but" value="UPDATE">
                        </div>
                    </form>
                </div>
                
                

            </div>  
        

        </div>    
    </main>
 </div>

