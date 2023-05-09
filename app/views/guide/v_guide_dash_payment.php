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
                <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Trip Request</a>
                <a href="<?php echo URLROOT; ?>/Offers/guideoffers" class="menu-item">Offers</a>
                <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type']; ?>/<?php echo $_SESSION['user_id']; ?>" class="menu-item">Bookings</a>
                <a href="<?php echo URLROOT; ?>/Payments/GuidePayments/" class="menu-item">Payments</a>
                <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <h2 style="text-align: left; margin-left:8%;">Trip Requests</h1>
        <table class="message-table" id="message-table">
                    <thead>
                        <tr>
                            <th>Traveler ID</th>
                            <th>Booking ID</th>
                            <th>Payment Amount</th>
                            <th>Payment Method</th>
                           
                            <th style="display: none;">Verification status</th>
                            <th>View </th>    
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $guidePaymentDetails=$data['guidebookings'];
                            foreach($guidePaymentDetails as $guidePaymentDetail):
                        ?>
                        <tr>
                            <td data-lable="TraverlerID"><?php echo $guidePaymentDetail->TravelerID ?></td>
                            <td data-lable="BookingId"><?php echo $guidePaymentDetail->BookingID ?></td>
                            <td data-lable="Payment"><?php echo $guidePaymentDetail->payment ?></td>
                            <td data-lable="Payment Status"><?php echo $guidePaymentDetail->PaymentStatus ?></td>
                            <td data-lable="view"><a href="<?php echo URLROOT; ?>/Trips/viewTripPlan/<?php echo $trip->TourPlanID?>"><button class="acc-view-btn" type="button"> <i class="fa-solid fa-eye" style="margin-right: 10px"></i>View </button></a></td>

    
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
        </table>

    </main>
</div>
