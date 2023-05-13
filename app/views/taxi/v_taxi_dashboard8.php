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
            <a href="<?php echo URLROOT; ?>/Taxi_Vehicle/viewvehicles" class="menu-item">Vehicles</a>
            <a href="<?php echo URLROOT; ?>/Taxies/payments" class="menu-item">Payments</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item is-active">Trip Requests</a>
            <a href="<?php echo URLROOT; ?>/Taxies/offers" class="menu-item">Offers</a>
            <a href="<?php echo URLROOT; ?>/Taxies/bookings" class="menu-item">Bookings</a>
            <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
    </aside>







    <!-- ....................... CAN BE DELETE....................... -->






    <!-- <main class="right-side-content">

        <p> Requests made by travelers to schedule trips appear here </p>

        <div class="taxi_dash_container">
               
            <div class="taxi_view_v_dash">
                
                <img src="<?php echo URLROOT; ?>/img/Group_profile.png" id="taxi_dash_Buser_img"  alt="Traveler image" >
        
                <article class="taxi_dash_trip_art" >
                    <div class="tax_dri_art">
                        <p id="taxi_view_d_p">Traveler ID :&ensp; </p><p id="taxi_view_d_p">U1234</p>
                    </div>
                    
                    <br>

                    <div class="tax_dri_art">
                        <p id="taxi_view_d_p">Start :&ensp; </p><p id="taxi_view_d_p">Colombo</p>
                    </div>

                    <br>

                <div class="tax_dri_art">
                        <p id="taxi_view_d_p">Destination :&ensp; </p><p id="taxi_view_d_p">Kandy</p>
                </div>

                <br>

                <div class="tax_dri_art">
                        <p id="taxi_view_d_p">Date :&ensp; </p><p id="taxi_view_d_p">18.10.2022</p>
                </div>
            
                
                </article>
                <button id="taxi_dash_Vreq" onclick="window.location='<?php echo URLROOT; ?>/Taxies/tripview'">View full request</button>

            </div>

            <div class="taxi_view_v_dash">
            
                    <img src="<?php echo URLROOT; ?>/img/Group_profile.png" id="taxi_dash_Buser_img"  alt="Traveler image" >
            
                    <article class="taxi_dash_trip_art" >
                        <div class="tax_dri_art">
                            <p id="taxi_view_d_p">Traveler ID :&ensp; </p><p id="taxi_view_d_p">U1234</p>
                        </div>
                        
                        <br>

                        <div class="tax_dri_art">
                            <p id="taxi_view_d_p">Start :&ensp; </p><p id="taxi_view_d_p">Colombo</p>
                        </div>

                        <br>

                       <div class="tax_dri_art">
                            <p id="taxi_view_d_p">Destination :&ensp; </p><p id="taxi_view_d_p">Kandy</p>
                       </div>

                       <br>

                       <div class="tax_dri_art">
                            <p id="taxi_view_d_p">Date :&ensp; </p><p id="taxi_view_d_p">18.10.2022</p>
                       </div>
                
                       
                    </article>
                    <button id="taxi_dash_Vreq" onclick="window.location='<?php echo URLROOT; ?>/Taxies/tripview'">View full request</button>

                </div>


                <div class="taxi_view_v_dash">
            
                    <img src="<?php echo URLROOT; ?>/img/Group_profile.png" id="taxi_dash_Buser_img"  alt="Traveler image" >
            
                    <article class="taxi_dash_trip_art" >
                        <div class="tax_dri_art">
                            <p id="taxi_view_d_p">Traveler ID :&ensp; </p><p id="taxi_view_d_p">U1234</p>
                        </div>
                        
                        <br>

                        <div class="tax_dri_art">
                            <p id="taxi_view_d_p">Start :&ensp; </p><p id="taxi_view_d_p">Colombo</p>
                        </div>

                        <br>

                       <div class="tax_dri_art">
                            <p id="taxi_view_d_p">Destination :&ensp; </p><p id="taxi_view_d_p">Kandy</p>
                       </div>

                       <br>

                       <div class="tax_dri_art">
                            <p id="taxi_view_d_p">Date :&ensp; </p><p id="taxi_view_d_p">18.10.2022</p>
                       </div>
                
                       
                    </article>
                    <button id="taxi_dash_Vreq" onclick="window.location='<?php echo URLROOT; ?>/Taxies/tripview'">View full request</button>

                </div>      

               
            </div>
    </main> -->
 </div>