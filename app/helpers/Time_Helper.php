<?php

    //Default time zone
    date_default_timezone_set('Asia/Colombo');

    function convertTime($time){
        $pass_time=strtotime($time);
        $sys_time=time();
        $time_diff=$sys_time-$pass_time;


        $seconds=$time_diff;
        $min=round($seconds/60);
        $hours=round($seconds/3600);
        $days=round($seconds/86400);
        $weeks=round($seconds/604800);
        $months=round($seconds/2629440);
        $years=round($seconds/31553280);


        if ($seconds <=60) {
            return 'Just now';
        }
        elseif ($min<=60) {
            if ($min==1) {
                return 'One minute ago';
            }
            else {
                return $min.'minutes ago';
            }
        }
        elseif ($hours<=24) {
            if ($hours==1) {
                return 'one hour ago';
            }
            else {
                return $hours.'hours ago';
            }
        }
        elseif ($days<=7) {
            if ($days==1) {
                return 'yesterday';
            }
            else {
                return $days.'days ago';
            }
        }
        elseif ($weeks<=4.3) {
            if ($weeks==1) {
                return 'a week ago';
            }
            else {
                return $weeks.'weeks ago';
            }
        }
        elseif ($months<=12) {
            if ($months==1) {
                return 'a month ago';
            }
            else {
                return $months.'months ago';
            }
        }
        else {
            if ($years==1) {
                return 'one year ago';
            }
            else {
                return $years.'years ago';
            }
        }
    }




?>