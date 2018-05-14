<? 
require 'Db.class.php';

if(isset($_GET) && $_GET['password'] === "OMEGALUL") {
	$station_id = $_GET['station_id'];
	$lat = $_GET['lat'];
	$lng = $_GET['lng'];
	$air_polution = $_GET['air_polution'];
	$noise_polution = $_GET['noise_polution'];
};

$query = strtolower($_GET['q']);
	
SQL("INSERT INTO result VALUES('', '" . $station_id . "' , '" . $lat ."' , '" . $lng ."' , '" . $air_polution . "' , '" . $noise_polution "' '" .date("Y-m-d H:i:s"). "');");


?>