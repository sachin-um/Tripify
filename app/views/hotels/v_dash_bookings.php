<?php
$_SESSION['user_id'];
$_SESSION['user_type'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Hotel') {
    flash('reg_flash', 'Access Denied');
    redirect('Pages/home');
}
else {
?> 

<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?>
<?php require APPROOT.'/views/inc/components/sidebars/hotel_sidebar.php'; ?>


<main class="right-side-content">
    <div class="hotel-bookings-main-div">
        <table>
    
            <tr>
                <th>BookingID</th>
                <th>Customer Name</th>
                <th>Date Added</th>
                <th>Payment Amount</th>
                <th>Room ID</th>
                <th>Payment Status</th>
                <th>View Details</th>
            </tr>

            <tr>
                <td>B1024</td>
                <td>Sarath Gunapala</td>
                <td>2022.02.12</td>
                <td>12000.00</td>
                <td>R1024</td>
                <td>Paid</td>
                <td><button>View</button></td>
            </tr>

            <tr>
                <td>B1035</td>
                <td>Nimal Siripala</td>
                <td>2023.01.10</td>
                <td>10000.00</td>
                <td>R2024</td>
                <td>Unpaid</td>
                <td><button>View</button></td>
            </tr>

            <tr>
                <td>B1045</td>
                <td>Danapala Gunasekara</td>
                <td>2023.02.10</td>
                <td>17850.00</td>
                <td>R2424</td>
                <td>Unpaid</td>
                <td><button>View</button></td>
            </tr>

        </table>
    </div>
    
</main>

<?php
}
?>