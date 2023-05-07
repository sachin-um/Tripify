<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler') {
    flash('reg_flash', 'Only the Traveler can have access...');
    redirect('Pages/home');
}
else {
    ?>
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
            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Hotel Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item is-active">Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Trips/yourtrips/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Your Trips</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Complains</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left;">Guide Bookings</h1>
        <hr>
        <br>
        <div class="booking-filter-area">
            <input type="text" placeholder="Search bookings..." id="searchInput">
            <select name="booking-type" id="booking-type">
                <option value="" disabled selected>Booking Type</option>
                <option value="all">All</option>
                <option value="Yet To Confirm">Yet To Confirm</option>
                <option value="Confirmed">Confirmed</option>
                <option value="Completed">Completed</option>
                <option value="canceled">Canceled</option>
            </select>
        </div>
        <?php flash('booking_flash'); ?>
        <br>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table" id="message-table">
                    <thead>
                        <tr>
                            
                            <th>Booking ID</th>
                            <th>Guide Name</th>
                            <th>Location</th>
                            <th>Starting Date</th>
                            <th>End Date</th>
                            <th>Payment</th>
                            <th>Payment Method</th>
                            <th>Booking Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $bookings=$data['guidebookings'];
                            foreach($bookings as $booking):
                        ?>
                        <tr>
                            <td data-lable="ID">G<?php echo $booking->BookingID ?></td>
                            <td data-lable="Name"><a href="<?php echo URLROOT; ?>/Pages/profile/<?php echo $booking->Guides_GuideID; ?>/Guide"><?php echo $booking->guide->Name ?></a></td>
                            <td data-lable="Email"><?php echo $booking->Location ?></td>
                            <td data-lable="Message"><?php echo $booking->StartDate ?></td>
                            <td data-lable="Message"><?php echo $booking->EndDate ?></td>
                            <td data-lable="Message"><?php echo $booking->payment ?></td>
                            <td data-lable="Message"><?php echo $booking->PaymentMethod ?></td>
                            <td data-lable="Message"><?php echo $booking->status ?></td>
                            <?php
                                if ($booking->status=='Yet To Confirm') {
                                    ?>
                                    
                                    <td data-lable="Name">
                                        <a href="<?php echo URLROOT; ?>/Bookings/EditlGuideBooking/<?php echo $booking->BookingID ?>"><button class="edit-btn" type="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                            </button>
                                        </a>
                                        <a href="<?php echo URLROOT; ?>/Bookings/CancelGuideBooking/<?php echo $booking->BookingID ?>">
                                            <button class="btn" type="button">
                                                <i class="fa-solid fa-xmark"></i>
                                                Cancel
                                            </button>
                                        </a>
                                        <!-- <button class="add-to-plan-btn" type="button" onclick="showPopup(this,'guide','<?php echo URLROOT; ?>')">Add to Trip Plan</button> -->
                                            <!-- <a href="<?php echo URLROOT; ?>/Trips/addToTripPlan/<?php echo $booking->ReservationID ?>/Guide"></a> -->
                                            
                                    </td>
                                    
                                    <?php
                                }
                                elseif ($booking->status=='Confirmed') {
                                    ?>
                                    <td data-lable="Name">
                                                <button class="add-to-plan-btn" type="button" onclick="showPopup(this,'guide','<?php echo URLROOT; ?>')">
                                                    <i class="fa-solid fa-plane" style="margin-right: 10px"></i>    
                                                    Add to Trip Plan
                                                </button>
                                                </td>
                                    <?php
                                }
                                elseif ($booking->status=='Completed') {
                                    if ($booking->PaymentStatus!='Paid') {
                                        if ($booking->PaymentMethod=='Online') {
                                            ?>
                                                <td data-lable="Name">
                                                <button class="pay-btn" type="button" onclick="paymentGateway('Guide',<?php echo $booking->payment ?>,<?php echo  $booking->BookingID ?>,<?php echo  $booking->guide->GuideID ?>,'<?php echo URLROOT; ?>')">
                                                    <i class="fa-solid fa-money-check-dollar" style="margin-right: 10px"></i>
                                                    Pay Now
                                                </button>
                                                </td>
                                            <?php
                                        }
                                        else {
                                            ?>
                                                <td data-lable="Name"><img src="<?php echo URLROOT; ?>/img/done.png" alt="user" class="post-by-img"><br>Payment is due
                                                <br>
                                    
                                                </td>
                                            <?php
                                        }
                                    }
                                    else {
                                        ?>
                                                <td data-lable="Name"><img src="<?php echo URLROOT; ?>/img/done.png" alt="user" class="post-by-img"><br>Completed
                                                <br>
                                    
                                                </td>
                                        <?php
                                    }
                                    ?>
                                    
                                    <?php
                                }
                                elseif ($booking->status=='Canceled') {
                                    ?>
                                    <td data-lable="Name"><img src="<?php echo URLROOT; ?>/img/cancel.png" alt="user" class="post-by-img">Canceled</td>
                                    <?php
                                }
                            ?>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="popup" class="trip-popup">
                <div id="popup-content" class="trip-popup-content"></div>
            </div>
        </div>
    </main>
 </div>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/search/booking_search.js"></script>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/popups.js"></script>
 <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/payment/payment.js"></script>
 <?php
}
?>