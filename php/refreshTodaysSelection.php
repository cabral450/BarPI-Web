<?php

// scheduled on system to run every morning at 5am 
 


require_once('SQL.php');


$TRACE = 0; // for debugging print statements

// get all the bar ids
$bar_ids = getAllBarIds();

// get todays day (only next day if past 5am NOT midnight)
$today = getTodaysDay();

// loop over all bars and set as appropriate
for ($i=0; $i < count($bar_ids); $i++){
	updateTodaysSelection($bar_ids[$i], $today);
}


/* takes a bar id numer and day ['sunday', 'monday', ... 'saturday'] as arguments
 * updateTodaysSelection removes any old 'isOnMenuToday' from drink table and 'IsEventToday' from event table
 * for a given bar based on today's day it checks the barCalendar table and selects isOnMenuToday & IsEventToday
 *		if event id matches, Returns VOID
 */
function updateTodaysSelection($barid, $today)
{
	if ($TRACE) {
		echo "TRACE: updating selection for barid=" . $barid . " and day =='".$today."'";
	}

	global $fdbName, $fdbLocation, $fdbUsername, $fdbPassword;
	

	// create connection
	global $servername, $DB_username, $DB_password, $defaultdb, $port;


	$db = mysqli_connect($servername, $DB_username, $DB_password, $defaultdb, $port);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysql_connect_error();
	}

	// check the connection
	if ($db->connect_error){
		echo "DEBUG: BAD! ERROR CONNECTING TO DB!<br>";
		die("connection failed: " . $db->connect_error);
	}

	// TODO: [mostly SQL work]
	//		1) for all drinks with barid=$barid, turn off 'isOnMenuToday'
	//		2) for all events with barid=$barid, turn off 'IsEventToday'
	//		3) get event id (if any) for $barid with todays day ($today) from barCalendar table
	//		4) set IsEventToday to TRUE for the event id we got above in step #3 from event table
	//		5) get list of drink id(s) from specialinfo table associated with the event id from step #3
	//		6) set isOnMenuToday to TRUE in drink table for drink ids above in step #5 



	// this is just starter code..
	$sql = "SELECT id FROM 'bars' WHERE 1";
	$result = $db->query($sql);

	

}

function getTodaysDay(){


}


?>

