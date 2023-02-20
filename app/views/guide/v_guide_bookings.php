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
                <a href="<?php echo URLROOT; ?>/Guides/viewGuideBookings" class="menu-item is-active">Bookings</a>
                <a href="#" class="menu-item">Payments</a><br>
                <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    
    </aside>

    <main class="right-side-content">

        <br><br>
        <h2>Bookings</h1>
        <hr>

        <table class="guide-table">
                <tr id="header">
                    <th>Booking Date</th>
                    <th>Traveler Name </th>
                    <th>Reservation Date</th>
                    <th>Starting Time</th>
                    <th>Duration</th>
                    <th>Location</th>
                    <th>Payment</th>
                    <th>Payment Status</th>
                    <th>Accept Booking</th>
                    <th>Ignore Booking</th>
                </tr>
                <tr>
                    <td>2023-09-3 </td>
                    <td>Doe </td>
                    <td>2023-11-10 </td>
                    <td>10 AM </td>
                    <td>3 Days </td>
                    <td>Colombo</td>
                    <td>50USD </td>
                    <td>card </td>
                    <td><button id="guide_booking">Accept</button></td>
                    <td><button id="guide_booking">Ignore</button></td>

                </tr>
                <tr>
                <td>2023-02-14 </td>
                    <td>john </td>
                    <td>2023-09-30 </td>
                    <td>8 AM </td>
                    <td>10 Days </td>
                    <td>panadura</td>
                    <td>50USD </td>
                    <td>card </td>
                    <td><button id="guide_booking">Accept</button></td>
                    <td><button id="guide_booking">Ignore</button></td>

                </tr>
                <tr>
                <td>2023-05-30 </td>
                    <td>dave </td>
                    <td>2023-10-10 </td>
                    <td>11 AM </td>
                    <td>5 Days </td>
                    <td>kaluthara</td>
                    <td>55USD </td>
                    <td>card </td>
                    <td><button id="guide_booking">Accept</button></td>
                    <td><button id="guide_booking">Ignore</button></td>

                </tr>
                <tr>
                <td>2023-06-15 </td>
                    <td>shevon </td>
                    <td>2023-08-10 </td>
                    <td>6 AM </td>
                    <td>4 Days </td>
                    <td>Katunayake</td>
                    <td>50USD </td>
                    <td>card </td>
                    <td><button id="guide_booking">Accept</button></td>
                    <td><button id="guide_booking">Ignore</button></td>

                </tr>
                <tr>
                <td>2023-05-31 </td>
                    <td>Doe </td>
                    <td>2024-04-10 </td>
                    <td>12 PM </td>
                    <td>7 Days </td>
                    <td>Colombo</td>
                    <td>50USD </td>
                    <td>card </td>
                    <td><button id="guide_booking">Accept</button></td>
                    <td><button id="guide_booking">Ignore</button></td>


                </tr>
                <tr>
                <td>2023-03-3 </td>
                    <td>Doe </td>
                    <td>2023-01-10 </td>
                    <td>2 PM </td>
                    <td>5 Days </td>
                    <td>Colombo</td>
                    <td>50USD </td>
                    <td>card </td>
                    <td><button id="guide_booking">Accept</button></td>
                    <td><button id="guide_booking">Ignore</button></td>

                </tr>
                

        </table> 
        
    </main>
 </div>