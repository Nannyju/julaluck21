<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="refresh" content="15; url="<?php echo $_SERVER['PHP_SELF']; ?>">
 </head>
										   
<body>
   
<h1>Julaluck Noosuwan 62101639</h1>
 <?php

$api_url = 'https://api.thingspeak.com/channels/1479261/feeds.json?results=1';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data->feeds;

// Cut long data into small & select only first 10 records
$user_data = array_slice($user_data, 0);

// Print data if need to debug
//print_r($user_data);

// Traverse array and display user data

?>  
 <h2>Humidity</h2>                                                                                  
<iframe src="https://thingspeak.com/channels/1479261/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15" 
	height="300" width="500" frameBorder="0" title="Iframe Example"></iframe>
 <?php
   foreach ($user_data as $user) {
	echo "Humidity: ".$user->field1; 
      echo " % ";
   }?> 
 <br>  
 <h2>Temperature</h2>  
<iframe src="https://thingspeak.com/channels/1479261/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15" 
	height="300" width="500" frameBorder="0" title="Iframe Example"></iframe>
<?php
   foreach ($user_data as $user) {
	echo "Temperature: ".$user->field2; 
      echo " C ";
   }?> 
 <br> 
 <h2>Map</h2>  
<iframe src="https://thingspeak.com/channels/1479261/maps/channel_show" height="300" 
	width="500" frameBorder="0" title="Iframe Example"></iframe>
<br>        
 </body>
</html>
