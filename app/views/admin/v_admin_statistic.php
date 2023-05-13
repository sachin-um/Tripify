<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Admin') {
    flash('reg_flash', 'Only the Traveler can have access...');
    redirect('Pages/home');
}
else {
    ?>
<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>

<div class="app">
    <aside class="sidebar">
        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">Admin Profile</a>
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item is-active">Site Statistics</a>
            <a href="<?php echo URLROOT; ?>/Users/messages" class="menu-item">Messages</a>
            <?php

                if($data->details->AssignedArea=='Super Admin'){
                    ?>
                    <a href="<?php echo URLROOT; ?>/Admins/manageadmins" class="menu-item">Manage Admins</a>
                    <?php
                }
                elseif($data->details->AssignedArea=='verification'){
                    ?>
                    <a href="<?php echo URLROOT; ?>/Admins/verification/Guide" class="menu-item">Account Verifcation</a>
                    <?php
                }
            ?>
            
            <a href="<?php echo URLROOT; ?>/Articles/articles" class="menu-item">Articles</a>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Traveler" class="menu-item" id="user-profiles-link">User Profiles</a>
            
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>


    <div class="right-side-content">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">1217</div>
                        <div class="card-name">Students</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">42</div>
                        <div class="card-name">Teachers</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">68</div>
                        <div class="card-name">Employees</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">$4500</div>
                        <div class="card-name">Earnings</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="charts">
                <div class="chart">
                    <h2>Earnings (past 12 months)</h2>
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="chart doughnut-chart">
                    <h2>Employees</h2>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
}
?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="<?php echo URLROOT;?>/js/components/chart1.js"></script>
    <script src="<?php echo URLROOT;?>/js/components/chart2.js"></script>
