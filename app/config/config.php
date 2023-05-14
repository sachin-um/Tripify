<?php
    
    //Database Configuration
    // define('DB_HOST','localhost:3308');
    // define('DB_USER', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'tripifydb');

    define('DB_HOST','rds-tripify.ctzclainftmu.ap-south-1.rds.amazonaws.com');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'tripify456');
    define('DB_NAME', 'tripify');

    define('MAIL_PASSWORD', 'dwaarmfrqetxsnuy');

    // define('AUTO_MAP_URL','https://maps.googleapis.com/maps/api/js?key=AIzaSyD-J84eYkpCT8Oa7quqBdZhYlCIxty7CH8&callback=initMap&libraries=places&v=weekly');
    define('AUTO_MAP_URL','https://maps.googleapis.com/maps/api/js?key=AIzaSyCo0cnVa0-HmEMm2M5wGXP_DQ37Z2L0teo&callback=initMap&libraries=places&v=weekly');
    


    //approot
    define('APPROOT',dirname(dirname(__FILE__)));

    //urlroot
    define('URLROOT','http://localhost/Tripify');

    //Public root
    define('PUBROOT',dirname(dirname(dirname(__FILE__))).'\public');

    define('SITENAME','Tripify');






?>