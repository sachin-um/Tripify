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
    <p class="home-title-2">Reviews</p>
    <div class="hotel-bookings-main-div">
        <table>
    
            <tr>
                <th>UserID</th>
                <th>Rating</th>
                <th style="width:50%">Review</th>
                <th>Delete</th>
            </tr>

            <tr>
                <td>U1024</td>
                <td>4.0</td>
                <td>Great Hotel. Good Customer Service plus good food.</td>
                <td><button>Delete</button></td>
            </tr>

            <tr>
                <td>U4254</td>
                <td>3.5</td>
                <td>Great Hotel. Good Customer Service plus good food.</td>
                <td><button>Delete</button></td>
            </tr>

            <tr>
                <td>U1324</td>
                <td>3.0</td>
                <td>Great Hotel. Good Customer Service plus good food.</td>
                <td><button>Delete</button></td>
            </tr>

        </table>
    </div>
    
</main>

<?php
}
?>