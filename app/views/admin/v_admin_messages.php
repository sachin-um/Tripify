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

        <div class="menu-toggle">
            <div class="hamburger">
                <span></span>
            </div>
        </div>

        <nav class="menu">
            <a href="<?php echo URLROOT; ?>/Pages/profile" class="menu-item">Admin Profile</a>
            <a href="<?php echo URLROOT; ?>/Admins/viewStats" class="menu-item">Site Statistics</a>
            <a href="<?php echo URLROOT; ?>/Users/messages" class="menu-item is-active">Messages</a>
            <?php

                if($data['details']->AssignedArea=='Super Admin'){
                    ?>
                    <a href="<?php echo URLROOT; ?>/Admins/manageadmins" class="menu-item">Manage Admins</a>
                    <?php
                }
                elseif($data['details']->AssignedArea=='verification'){
                    ?>
                    <a href="<?php echo URLROOT; ?>/Admins/verification/Guide" class="menu-item">Account Verifcation</a>
                    <?php
                }
            ?>
            <a href="<?php echo URLROOT; ?>/Admins/profiles/Traveler" class="menu-item">User Profiles</a>
            <a href="<?php echo URLROOT; ?>/Pages/home/" class="menu-item" >Exit Dashboard</a>
        </nav>
    </aside>

    <main class="right-side-content">
        <br>
        <br>
        <h2>Messages</h1>
        <hr>
        <br>
        <div class="first-container">
            <div class="admin-table-container">
                <table class="message-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="max-width: 70px">Message</th>
                            <th>Reply</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $messages=$data['messages'];
                            foreach($messages as $message):
                        ?>
                        <tr>
                            <td data-lable="ID"><?php echo $message->MessageID ?></td>
                            <td data-lable="Name"><?php echo $message->Name ?></td>
                            <td data-lable="Email"><?php echo $message->Email ?></td>
                            <td data-lable="Message" style="max-width=70px;"><?php echo $message->Message ?></td>
                            <td data-lable="Email"><button class="reply-btn" type="button">Reply</button></td>
                            <td data-lable="Email"><button class="btn" type="button">Delete</button></td>
                        </tr>
                        <?php
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>
 </div>

 <?php
}
?>