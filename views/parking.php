<?php 
/* Parking  */
?>
<div class="inner-meta">
	
	<p>General Parking Information</p>
	<input type="text" name="parking_desc" value="<?=$custom['parking_desc'][0]?>" size="50"/>

	<p>Parking Lot Name</p>
	<input type="text" name="parking_lot" value="<?=$custom['parking_lot'][0]?>" size="50"/>

	<p>GPS Coordinates</p>
	<input type="text" name="gps_coord1" placeholder="Latitude in decimal format" value="<?=$custom['gps_coord1'][0]?>" size="30"/>
    <input type="text" name="gps_coord2" placeholder="Longitude in decimal format" value="<?=$custom['gps_coord2'][0]?>" size="30"/>
    
</div>