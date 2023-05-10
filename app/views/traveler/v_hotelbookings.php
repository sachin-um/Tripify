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
            <a href="<?php echo URLROOT; ?>/Bookings/HotelBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item is-active">Hotel Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/TaxiBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Taxi Bookings</a>
            <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type'] ?>/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Guide Bookings</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item">Taxi Requests</a>
            <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Guide Requests</a>
            <a href="<?php echo URLROOT; ?>/Trips/yourtrips/<?php echo $_SESSION['user_id'] ?>" class="menu-item">Your Trips</a>
            <a href="<?php echo URLROOT; ?>/Request/TaxiRequest" class="menu-item ">Complains</a>
            <a href="<?php echo URLROOT; ?>/Pages/home" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2 style="text-align: left;">Hotel Bookings</h1>
        <hr>
        <br>
        <div class="booking-filter-area">
            <input type="text" placeholder="Search bookings..." id="searchInput">
            <select name="booking-type" id="booking-type">
                <option value="" disabled selected>Booking Type</option>
                <option value="all">All</option>
                <option value="in progress">In progress</option>
                <option value="completed">Completed</option>
                <option value="canceled">Canceled</option>
                <option value="paid">Paid</option>
                <option value="yet to pay">Yet to pay</option>
            </select>
        </div>
        <?php flash('booking_flash'); ?>
        <div class="first-container">
            <div class="admin-table-container">
                <?php
                    if (empty($data['hotelbookings'])) {
                ?>
                    <p style="font-size: 1.2rem; margin: auto;">No records to show...</p>
                <?php        
                } else {
                ?>
                <table class="message-table" id="message-table">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Hotel Name</th>
                            <th>Room number-Room type</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Payment</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>booking Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $bookings=$data['hotelbookings'];
                            foreach($bookings as $booking):
                        ?>
                        <tr>
                            <!-- <td data-lable="ID"></td> -->
                            <td data-lable="Name"  data="<?php echo  $booking->booking_id ?>">H<?php echo $booking->booking_id ?></td>
                            <td data-lable="Name"><a href="<?php echo URLROOT; ?>/Pages/profile/<?php echo $booking->hoteldetails->HotelID; ?>/Hotel"><?php echo $booking->hoteldetails->Name ?></a> </td>
                            <td data-lable="Name"><?php echo $booking->hoteldetails->Name?></td>
                            <td data-lable="Name"><?php echo $booking->checkin_date ?></td>
                            <td data-lable="Name"><?php echo $booking->checkout_date ?></td>
                            <td data-lable="Name"><?php echo $booking->payment ?></td>
                            <td data-lable="Name"><?php echo $booking->paymentmethod ?></td>
                            <td data-lable="Name"><?php echo $booking->payment_status ?></td>
                            <td data-lable="Name"><?php echo $booking->status ?></td>
                            <?php
                                if ($booking->status=='In progress') {
                                    if ($booking->payment_status!='Paid') {
                                        if ($booking->paymentmethod=='Online') {
                                            ?>
                                                <td style="display: inline-grid;" data-lable="Name">
                                                    <i class="fa fa-info-circle" style="font-size:24px; vertical-align: inherit; margin-right: 10px;" title="If You Want to Cancel The Booking Please Contact the Service Provider"></i> 
                                                    <button class="pay-btn" type="button">
                                                        <i class="fa-solid fa-money-check-dollar" style="margin-right: 10px"></i>
                                                        Pay Now
                                                    </button>
                                                </td>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <td style="display: inline-grid;" data-lable="Name">
                                            <?php
                                            // Assuming your date variable is stored in $checkin_date
                                            $checkin_date = $booking->checkin_date;

                                            // Get the current date
                                            $current_date = date('Y-m-d');

                                            // Calculate the date 2 days before the stored date variable
                                            $two_days_before = date('Y-m-d', strtotime('-2 days', strtotime($checkin_date)));

                                            // Check if the current date is 2 days before the stored date variable
                                            if ($current_date <= $two_days_before) {
                                               ?>
                                                    <a href="<?php echo URLROOT; ?>/Bookings/EditTaxiBooking/<?php echo $booking->ReservationID ?>"><button class="edit-btn" type="button" style="margin-top:10px">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                    <a href="<?php echo URLROOT; ?>/Bookings/CancelTaxiBooking/<?php echo $booking->ReservationID ?>"><button class="btn" type="button" style="margin-top:10px">
                                                        <i class="fa-solid fa-xmark"></i>
                                                        Cancel
                                                        </button>
                                                    </a>

                                               <?php
                                            }
                                            else {
                                                ?>
                                                <i class="fa fa-info-circle" style="font-size:24px; vertical-align: inherit; margin-right: 10px;" title="If You Want to Cancel The Booking Please Contact the Service Provider"></i>
                                                <?php
                                            }
                                            ?>
                                            
                                                    
                                                    <button class="add-to-plan-btn" type="button" onclick="showPopup(this,'hotel','<?php echo URLROOT; ?>')" style="margin-top: 10px;">
                                                        <i class="fa-solid fa-plane" style="margin-right: 10px"></i>
                                                        Add to Trip Plan
                                                    </button>
                                                
                                            </td>
                                            <?php
                                        }
                                    }
                                    else {
                                        ?>
                                            <td style="display: inline-grid;" data-lable="Name">
                                                <?php
                                                if ($current_date <= $two_days_before) {
                                                ?>
                                                        <a href="<?php echo URLROOT; ?>/Bookings/EditTaxiBooking/<?php echo $booking->ReservationID ?>"><button class="edit-btn" type="button" style="margin-top:10px">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <a href="<?php echo URLROOT; ?>/Bookings/CancelTaxiBooking/<?php echo $booking->ReservationID ?>"><button class="btn" type="button" style="margin-top:10px">
                                                            <i class="fa-solid fa-xmark"></i>
                                                            Cancel
                                                            </button>
                                                        </a>
                                                        <br>
                                                <?php
                                                }
                                                else {
                                                    ?>
                                                    <i class="fa fa-info-circle" style="font-size:24px; vertical-align: inherit; margin-right: 10px;" title="If You Want to Cancel The Booking Please Contact the Service Provider"></i>
                                                    <?php
                                                }
                                                ?>    
                                                <button class="add-to-plan-btn" type="button" onclick="showPopup(this,'hotel','<?php echo URLROOT; ?>')" style="margin-top: 10px;">
                                                    <i class="fa-solid fa-plane" style="margin-right: 10px"></i>
                                                    Add to Trip Plan
                                            </button>
                                            </td>
                                        <?php
                                    }
                                    
                                }
                                elseif ($booking->status=='completed') {
                                    ?>
                                    <td data-lable="Name"><i class="fa-solid fa-check"style="margin-right: 10px"></i>Completed
                                    <?php
                                }
                                elseif ($booking->status=='Canceled') {
                                    ?>
                                    <td data-lable="Name"><i class="fa-solid fa-xmark"></i>Canceled</td>
                                    <?php
                                }
                            ?>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
            <div id="popup" class="trip-popup">
                <div id="popup-content" class="trip-popup-content"></div>
            </div>
        </div>
    </main>
 </div>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/search/booking_search.js"></script>
 <script type="text/JavaScript" src="<?php echo URLROOT;?>/js/components/popups.js"></script>
 <?php
}
?>