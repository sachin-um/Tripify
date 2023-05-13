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
            <a href="<?php echo URLROOT; ?>/Admins/viewStats" class="menu-item is-active">Site Statistics</a>
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
            
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Traveler" class="menu-item" id="user-profiles-link">User Profiles</a>            
            <a href="#" class="menu-item">Exit Dashboard</a>
        </nav>
    </aside>


    <div class="right-side-content">
        <div class="hotel-home-join-network" style="background-color: white; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
        
            <div style="width: 65%; height: 400px; margin: auto;">
                <p style="font-size: 1.1rem; text-align: center;">All users in the system</p>
                <canvas id="myChart"></canvas>
            </div>

            <div style="width: 100%; height: 400px;">                
                <p style="font-size: 1.1rem; text-align: center;margin-top: 5%;">All bookings made through Tripify<br>for the past 30 days</p>
                <canvas id="bookings"></canvas>
            </div>

            <div style="width: 100%; height: 400px;">                
                <p style="font-size: 1.1rem; text-align: center;">All payments received by Service Providers<br>for the past 30 days</p>
                <canvas id="payments"></canvas>
            </div>

            <div style="width: 100%; height: 400px;">                
                <p style="font-size: 1.1rem; text-align: center;">All new Service Providers registered<br>during the past 30 days</p>
                <canvas id="newUsers"></canvas>
            </div>
        </div>
    
    </div>


</div>



<?php
}
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>


<script>
    const userData = [
  { userType: 'Hotel', count: <?php echo $data->users[1]?> },
  { userType: 'Taxi', count: <?php echo $data->users[2]?> },
  { userType: 'Guide', count: <?php echo $data->users[3]?> },
  { userType: 'Users', count: <?php echo $data->users[4]?> },
];

// Extract labels and data
const labels = userData.map((data) => data.userType);
const data = userData.map((data) => data.count);

// Create pie chart
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: labels,
    datasets: [{
      data: data,
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#E7E9ED'],
    }],
  },
});



//Booking Data chart
const bookingData = [
  { service: 'Hotel', bookings: <?php echo $data->hotelBookingTotal?> },
  { service: 'Taxi', bookings: <?php echo $data->taxiBookingTotal?> },
  { service: 'Guide', bookings: <?php echo $data->guideBookingTotal?> },
];

// Extract labels and data
const labels1 = bookingData.map((data) => data.service);
const data1 = bookingData.map((data) => data.bookings);

// Create bar chart
const ctx1 = document.getElementById('bookings').getContext('2d');
const myChart1 = new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: labels1,
    datasets: [{
      label: 'Bookings',
      data: data1,
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#E7E9ED'],
    }],
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
        },
      }],
    },
  },
});



//Payment data chart
const paymentData = [
  { service: 'Hotel', payments: <?php echo $data->hoteltotal; ?> },
  { service: 'Taxi', payments: <?php echo $data->taxitotal; ?> },
  { service: 'Guide', payments: <?php echo $data->guideTotal; ?> },
];

// Extract labels and data
const labels2 = paymentData.map((data) => data.service);
const data2 = paymentData.map((data) => data.payments);

// Create bar chart
const ctx2 = document.getElementById('payments').getContext('2d');
const myChart2 = new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: labels1,
    datasets: [{
      label: 'Payments',
      data: data2,
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#E7E9ED'],
    }],
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
        },
      }],
    },
  },
});




//New User data chart
const newUserData = [
  { service: 'Hotel', users: 2 },
  { service: 'Taxi', users: 2 },
  { service: 'Guide', users: 1 },
];

// Extract labels and data
const labels3 = newUserData.map((data) => data.service);
const data3 = newUserData.map((data) => data.users);

// Create bar chart
const ctx3 = document.getElementById('newUsers').getContext('2d');
const myChart3 = new Chart(ctx3, {
  type: 'bar',
  data: {
    labels: labels1,
    datasets: [{
      label: 'New Users',
      data: data3,
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#E7E9ED'],
    }],
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
        },
      }],
    },
  },
});
</script>