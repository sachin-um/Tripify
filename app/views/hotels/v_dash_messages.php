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
    <br><br>
    <p class="home-title-2">Messages</p>
    <div class="hotel-bookings-main-div">
        <table>
    
            <tr>
                <th>UserID</th>
                <th>User Type</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>

            <tr>
                <td>U4530</td>
                <td>Admin</td>
                <td><button>View</button></td>
                <td><button>Delete</button></td>
            </tr>

            <tr>
                <td>U3245</td>
                <td>traveler</td>
                <td><button>View</button></td>
                <td><button>Delete</button></td>
            </tr>

            <tr>
                <td>U7810</td>
                <td>traveler</td>
                <td><button>View</button></td>
                <td><button>Delete</button></td>
            </tr>

        </table>
    </div>
    
</main>

<?php
}
?>