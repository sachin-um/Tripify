<?php

session_start();

function flash($name='',$message='', $class='message'){
    
    if (!empty($name)) {
        
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name.'_class'])) {
                unset($_SESSION[$name.'_class']);
            }

            $_SESSION[$name]=$message;
            $_SESSION[$name.'_class']=$class;


        }
        else if(empty($message) && !empty($_SESSION[$name])) {
            $class=!empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
            echo '<div class="'.$class.'" id="'.$class.'">'.$_SESSION[$name].'</div>';

            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
    
}



function filteritems($items,$usertype,$userid){
    switch ($usertype) {
        case 'Taxi':
            return $items;
            break;
        case 'Guide':
            return $items;
            break;
        case 'Traveler':
            return array_filter($items,function ($item) use($userid){
                return ($item->traveler_id == $userid);
            });
            break;
    }

    
}

function filteroffers($items,$usertype,$request_id){
    switch ($usertype) {
        case 'Taxi':
            return $items;
            break;
        case 'Guide':
            return $items;
            break;
        case 'Traveler':
            return array_filter($items,function ($item) use($request_id){
                return ($item->traveler_id == $userid);
            });
            break;
    }

    
}

function filterBookings($items,$usertype,$userid){
    switch ($usertype) {
        case 'Taxi':
            return array_filter($items,function ($item) use($userid){
                return ($item->traveler_id == $userid);
            });
            break;
        case 'Guide':
            return array_filter($items,function ($item) use($userid){
                return ($item->traveler_id == $userid);
            });
            break;
        case 'Hotel':
            return array_filter($items,function ($item) use($userid){
                return ($item->traveler_id == $userid);
            });
            break;
        case 'Traveler':
            return array_filter($items,function ($item) use($userid){
                return ($item->TravelerID == $userid);
            });
            break;
    }

    
}

//user session
function createUserSession($user){
    $_SESSION['user_id']=$user->UserID;
    $_SESSION['user_name']=$user->Name;
    $_SESSION['user_email']=$user->Email;
    $_SESSION['user_type']=$user->UserType;
    
    $data=[
        'isLoggedIn'=>$this->isLoggedIn()
    ];
    $this->view('v_home',$data);
    // redirect('Pages/home',$data);
}

function isLoggedIn(){
    if (isset($_SESSION['user_id'])) {
        return true;
    }
    else{
        return false;
    }
}


function createVerifySession($email){
    $_SESSION['v_email']=$email;
}


?>