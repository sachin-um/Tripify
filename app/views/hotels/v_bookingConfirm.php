<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">

    <div class="content">

        <div class="hotel-room-top-picks">
            <div class="booking-header">
                <b>The rooms you requested are available for booking.</b>
            </div>

            <div class="main-details">
                <div class="price-details">
                    <h2 style="color: green;">Price Details</h2>
                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Check In Date : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo $data['check_in']?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Check Out Date : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo $data['check_out']?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Room Type : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo $data['wantedRoom']->RoomTypeName?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>No of rooms : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo $data['noofrooms']?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>No of nights : </b>
                        </div>
                        <?php 
                            $date1 = new DateTime($data['check_in']);
                            $date2 = new DateTime($data['check_out']);
                            $nights = $date1->diff($date2);
                        ?>
                        <div class="sub-sub-items-pricing">
                            <?php echo $nights->format('%a nights');?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Total Price : </b>
                        </div>
                        <?php
                            $fullPrice = $nights->days*(double)$data['wantedRoom']->PricePerNight*(int)$data['noofrooms'];
                        ?>
                        <div class="sub-sub-items-pricing">
                            <?php echo $fullPrice.".00 "?>LKR
                        </div>
                    </div>
                </div>

                <div class="price-details">
                    <h2 style="color: green;">Billing Information</h2>
                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Name on card<b> 
                        </div>
                        <div class="sub-sub-items-pricing">
                            <input type="text">
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Credit/Debit Card No<b> 
                        </div>
                        <div class="sub-sub-items-pricing">
                            <input type="text">
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Exp Date<b> 
                        </div>
                        <div class="sub-sub-items-pricing">
                            <input type="text">
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Security Code<b> 
                        </div>
                        <div class="sub-sub-items-pricing">
                            <input type="text">
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <form action="<?php echo URLROOT ?>/HotelBookings/bookaroom" method="post">
                
                <input type="hidden" name="hotel_id" value="<?php echo $data['wantedRoom']->HotelID?>">
                <input type="hidden" name="travelerID" value="<?php echo $_SESSION['user_id']?>">
                <?php
                $serializedArray = serialize($data['availableRoomIDs']);
                ?>
                <input type="hidden" name="roomID" value="<?php echo htmlspecialchars($serializedArray)?>">
                <input type="hidden" name="roomTypeID" value="<?php echo $data['wantedRoom']->RoomTypeID?>">
                <input type="hidden" name="paymentDue" value="<?php echo $fullPrice ?>">
                <input type="hidden" name="checkin" value="<?php echo $data['check_in']?>">
                <input type="hidden" name="checkout" value="<?php echo $data['check_out']?>">
                <input type="hidden" name="neededRoomCount" value="<?php echo $data['noofrooms']?>">

                <div class="hotel-reg-form-div-2">
                    <button class="all-purpose-btn" type="submit" style="margin: auto;">Book Now</button>
                </div> 
                
                
            </form>
            
        </div>
        
    </div>

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>