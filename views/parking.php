<?php 
/* Parking  */
?>
<div class="inner-meta">
	
	<label>General Parking Information</label>
	<input type="text" name="parking_desc" value="<?=$custom['parking_desc'][0]?>" size="50"/>
	<br>

	<label>Parking Lot Name</label>
	<input type="text" name="parking_lot" value="<?=$custom['parking_lot'][0]?>" size="50"/>
	<br>

	<label>GPS Coordinates</label>
	<input type="text" name="gps_coord1" placeholder="Latitude in decimal format" value="<?=$custom['gps_coord1'][0]?>" size="30"/>
    <input type="text" name="gps_coord2" placeholder="Longitude in decimal format" value="<?=$custom['gps_coord2'][0]?>" size="30"/>
    <br>

    <label>Driving Directions URL</label>
    <input type="url" name="parking_url" placeholder="URL" value="<?=$custom['parking_url'][0]?>" size="50">
    
</div>