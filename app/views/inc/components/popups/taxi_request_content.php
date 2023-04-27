<div id="popup" class="request-popup">
                <div id="request-content" class="request-popup-content">
                    <form action="<?php echo URLROOT; ?>/Request/addTaxiRequest" method="POST">
                

                        
                        <input type="text" id="vehicle_type" name="vehicle_type" placeholder="From Where journey Begin...?" disabled>
                        <input type="text" id="pickuplocation" name="pickuplocation" placeholder="From Where journey Begin...?" value="<?php echo $data['pickuplocation']; ?>" disabled>
                        
                        <div id="map-container">
                            <div id="map"></div>
                        </div>
                        <input type="hidden" name="p-latitude" id="p-latitude" value="">
                        <input type="hidden" name="p-longitude" id="p-longitude" value="">
                        <input type="text" id="destination" name="destination" placeholder="From Where journey End...?"  value="<?php echo $data['destination']; ?>" disabled>
                        <div id="map-container">
                            <div id="map-d"></div>
                        </div>
                        <input type="hidden" name="d-latitude" id="d-latitude" value="">
                        <input type="hidden" name="d-longitude" id="d-longitude" value="">
                        <input type="text" id="date" name="date" placeholder="Request Date" value="<?php echo $data['date']; ?>" disabled>
                        <input type="text" id="time" name="time" placeholder="Pickup Time" value="<?php echo $data['time']; ?>" disabled>
                        
                        <input type="text" id="passengers" name="passengers" placeholder="From Where journey Begin...?" disabled>
                        <textarea name="description" id="description" cols="52" rows="10" placeholder="Additional Details" disabled></textarea>
                        <input type="hidden" name="travelerid" id="travelerid" value="<?php echo $_SESSION['user_id'];?>">
                    </form>
                </div>
</div>