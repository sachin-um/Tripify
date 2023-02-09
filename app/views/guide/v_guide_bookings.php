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
        <h2 style="text-align: left; margin-left:8%;">Bookings</h1>
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
                </tr>
                <tr>
                    <td>John </td>
                    <td>Doe </td>
                    <td>25 </td>
                    <td>USA </td>
                    <td>Male </td>
                    <td>25 </td>
                    <td>USA </td>
                    <td>Male </td>

                </tr>
                <tr>
                    <td>steve </td>
                    <td>Doe </td>
                    <td>28 </td>
                    <td>USA </td>
                    <td>Male </td>
                    <td>25 </td>
                    <td>USA </td>
                    <td>Male </td>

                </tr>
                <tr>
                    <td>simo </td>
                    <td>Doe </td>
                    <td>26 </td>
                    <td>USA </td>
                    <td>Male </td><td>25 </td>
                    <td>USA </td>
                    <td>Male </td>

                </tr>
                <tr>
                    <td>karim </td>
                    <td>Doe </td>
                    <td>21 </td>
                    <td>USA </td>
                    <td>Male </td>
                    <td>25 </td>
                    <td>USA </td>
                    <td>Male </td>

                </tr>
                <tr>
                    <td>adam </td>
                    <td>Doe </td>
                    <td>20 </td>
                    <td>USA </td>
                    <td>Male </td>
                    <td>25 </td>
                    <td>USA </td>
                    <td>Male </td>

                </tr>
                <tr>
                    <td>keven </td>
                    <td>Doe </td>
                    <td>20 </td>
                    <td>USA </td>
                    <td>Male </td>
                    <td>25 </td>
                    <td>USA </td>
                    <td>Male </td>

                </tr>
                

        </table> 
        
    </main>
 </div>