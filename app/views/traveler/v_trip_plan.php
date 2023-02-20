<?php require APPROOT.'/views/inc/components/header.php'; ?>
<div class="wrapper">


    <?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

    <div class="content">
    <div class="white-space">
        <p class="home-title-2">Plan Your Trip</p>
        <br>
    </div>
    <br>
    <br>
    <div class="trip-details">
       <form class="form-div" action="" method="post">   
    
            <div class="flex-2">
                <div class="trip-name">
                    <input type="text" class="info-2" id="trip_name" name="trip_name" placeholder="Name your Trip">
                </div>
                <div class="trip-location">
                    <input type="text" class="info-2" id="trip_location" name="trip_location" placeholder="Where you plant to go ?">
                </div>

                <div class="trip-startdate">
                    <input type="text" id="trip_startdate" name="trip_startdate" placeholder="When your trip begin ?" onfocus="(this.type='date')" value="<?php  ?>" min="<?php echo date('Y-m-d'); ?>">
                </div>
                
                <div class="trip_enddate">
                    <input type="text" id="trip_enddate" name="trip_enddate" placeholder="When your trip begin ?" onfocus="(this.type='date')" value="<?php   ?>" min="<?php echo date('Y-m-d'); ?>">
                </div>
                
            </div>
         
    </div>
    <br>
    <div class="plan-div">
            <div class="plan-table-container">
                <table class="plan-table">
                    <thead>
                        <tr>
                            <th>Hotels</th>
                            <th>Taxi</th>
                            <th>Guide</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="hotel-column" data-lable="ID">
                                <button class="plan-item-add-button" type="button">Add Stays</button>
                            </td>
                            <td id="taxi-column" data-lable="Name">
                                <button class="plan-item-add-button" type="button">Add a Ride</button>
                            </td>
                            <td id="guide-column" data-lable="Email">
                                <button class="plan-item-add-button" type="button">Add a Guide</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    <div class="btn-div">
            <button class="reg-btn" type="button">Create Your Trip</button>
    </div>
    <!-- <br>
        <hr>
        <div class="white-space">
            <h2 class="title" >Didn't find what you looking for ? Don't Worry you can still get what you want</h2>
        </div>
        <div class="btn-div">
            <button class="reg-btn" type="button">Request a Guide</button>
        </div>
        <br>
        <hr>
        <div class="white-space">
            <h2 class="title" >Join our network today..</h2>
        </div>
        <div class="btn-div">
            <button class="reg-btn" type="button" onclick="window.location='<?php echo URLROOT; ?>/Guides/register'">Register as a Guide</button>
    </div> -->
    
        <?php require APPROOT.'/views/inc/components/footer.php'; ?>  
</div>   