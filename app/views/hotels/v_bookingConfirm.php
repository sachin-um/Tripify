<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="wrapper">

    <div class="content">

        <div class="hotel-room-top-picks">
            <!-- <div class="booking-header">
                <b>The rooms you requested are available for booking.</b>
            </div> -->

        <form action="">
        <div class="main-details">
                <div class="price-details">
                    <h2 style="color: green;">Price Details</h2>
                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Check In Date : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo $_SESSION['checkin']?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Check Out Date : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php echo $_SESSION['checkout']?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>Requested Rooms : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <?php 
                                $roomnames = $data['bookedRoomNames'];
                                $noofroomsfromeach = $data['noofbookedrooms'];
                                for($a=0;$a<count($roomnames);$a++){
                                    echo $roomnames[$a]." - ".$noofroomsfromeach[$a]."<br>";
                                }
                            ?>
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>No of rooms : </b>
                        </div>
                        <div class="sub-sub-items-pricing">
                            <!-- <?php echo $data['noofrooms']?> -->
                        </div>
                    </div>

                    <div class="sub-items-pricing">
                        <div class="sub-sub-items-pricing">
                            <b>No of nights : </b>
                        </div>
                        <?php 
                            $date1 = new DateTime($_SESSION['checkin']);
                            $date2 = new DateTime($_SESSION['checkout']);
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
                        <div class="sub-sub-items-pricing">
                            <?php echo $data['payment'].".00 "?>LKR
                        </div>
                    </div>
                </div>

                <!-- <div class="price-details">
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
                </div> -->
            </div>
            <br>
            <div class="hotel-reg-form-div-2">
                <button class="all-purpose-btn" type="submit" style="margin: auto;">Book Now</button>
            </div> 
        </form>
            

            <!-- <form action="<?php echo URLROOT ?>/HotelBookings/bookaroom" method="post">
                
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
                
                
            </form> -->
            
        </div>
        
    </div>

</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>