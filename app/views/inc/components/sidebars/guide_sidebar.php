<div class="app">
		<div class="menu-toggle">
			<div class="hotel-hamburger">
				<span></span>
			</div>
		</div>

		<aside class="sidebar">
            <nav class="menu">
                <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">User Profile</a>
                <a href="<?php echo URLROOT; ?>/Request/GuideRequest" class="menu-item">Trip Request</a>
                <a href="<?php echo URLROOT; ?>/Offers/guideoffers" class="menu-item">Offers</a>
                <a href="<?php echo URLROOT; ?>/Bookings/GuideBookings/<?php echo $_SESSION['user_type']; ?>/<?php echo $_SESSION['user_id']; ?>" class="menu-item">Bookings</a>
                <a href="<?php echo URLROOT; ?>/Payments/GuidePayments/">Payments</a>
                <a href="#" class="menu-item">Exit Dashboard</a>
            </nav>

		</aside>