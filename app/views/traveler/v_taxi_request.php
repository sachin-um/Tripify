<?php require APPROOT.'/views/inc/components/header.php'; ?>
<?php require APPROOT.'/views/inc/components/navbars/home_nav.php'; ?> 

<?php
$_SESSION['user_id'];


if (empty($_SESSION['user_id'])) {
    flash('reg_flash', 'You need to have logged in first...');
    redirect('Users/login');
}
elseif ($_SESSION['user_type']!='Traveler') {
    flash('reg_flash', 'Only the Travelers can add Taxi Request..');
    redirect('Users/login');
}
else {
    ?>
    <div class="form">
        <div >
            <img id="logo" src="<?php echo URLROOT; ?>/img/logo1-removebg-preview.png" alt="logo">
            <p id="tag">Tell Us About Your Ride</p> 
        </div>
    
        <div >
            <form action="<?php echo URLROOT; ?>/Request/addTaxiRequest" method="POST">
                

                <select class="search" id="vehicle_type" name="vehicle_type">
                    <option value="" disabled>Vehicle type you prefer</option>
                    <option value='tok-tok'>Tok Tok</option>
                    <option value='car'>Car</option>
                    <option value='van'>Van</option>
                    
                </select>
                <input type="text" id="pickuplocation" name="pickuplocation" placeholder="From Where journey Begin...?" value="<?php echo $data['pickuplocation']; ?>">
                <span class="invalid"><?php echo $data['pickuplocation_err']; ?></span>
                <span>Select the pickup location on Map(Optional)</span>
                <div id="map-container">
                    <div id="map"></div>
                </div>
                <input type="hidden" name="p-latitude" id="p-latitude" value="">
                <input type="hidden" name="p-longitude" id="p-longitude" value="">
                <input type="text" id="destination" name="destination" placeholder="From Where journey End...?"  value="<?php echo $data['destination']; ?>">
                <span class="invalid"><?php echo $data['destination_err']; ?></span>
                <span>Select the destination on Map(Optional)</span>
                <div id="map-container">
                    <div id="map-d"></div>
                </div>
                <input type="hidden" name="d-latitude" id="d-latitude" value="">
                <input type="hidden" name="d-longitude" id="d-longitude" value="">
                <input type="text" id="date" name="date" placeholder="Request Date" onfocus="(this.type='date')" value="<?php echo $data['date']; ?>" min="<?php echo date('Y-m-d'); ?>">
                <span class="invalid"><?php echo $data['date_err']; ?></span>
                <input type="text" id="time" name="time" placeholder="Pickup Time" onfocus="(this.type='time')" value="<?php echo $data['time']; ?>">
                <span class="invalid"><?php echo $data['time_err']; ?></span>
                <select class="search" id="passengers" name="passengers">
                    <option value="" disabled>No: of Passengers</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                </select>
                <span class="invalid"><?php echo $data['passengers_err']; ?></span>
                <textarea name="description" id="description" cols="52" rows="10" placeholder="Additional Details"></textarea>
                <span class="invalid"><?php echo $data['description_err']; ?></span>
                <button id="sign-up-btn-1" type="submit">Request a Taxi</button>
                <input type="hidden" name="travelerid" id="travelerid" value="<?php echo $_SESSION['user_id'];?>">
                <span class="invalid"><?php echo $data['travelerid_err']; ?></span>
              </form> 
        </div>
    </div>
    <?php
}

?>
<script>
    let map;
    let map_d;
    let srilanka={lat: 7.8731 ,lng: 80.7718};
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
        center: srilanka,
        zoom: 8,
    });


        var marker = new google.maps.Marker({
        position: srilanka,
        map: map,
        draggable:true,
        title:"Pickup location"
        });

        google.maps.event.addListener(marker,'position_changed',
            function () {
                document.getElementById('p-latitude').value=marker.position.lat();
                document.getElementById('p-longitude').value=marker.position.lng();
            }
        )


        // destination map
        map_d = new google.maps.Map(document.getElementById("map-d"), {
        center: srilanka,
        zoom: 8,
    });

        var marker_d = new google.maps.Marker({
            position: srilanka,
            map: map_d,
            draggable:true,
            title:"Destination"
        });
        google.maps.event.addListener(marker_d,'position_changed',
            function () {
                document.getElementById('d-latitude').value=marker_d.position.lat();
                document.getElementById('d-longitude').value=marker_d.position.lng();
            }
        )
    }
    function initialize() {
        initMap();
    }

    
    

</script>
 
 <script
      src="<?php echo MAP_URL ?>"
      defer>
</script>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>

