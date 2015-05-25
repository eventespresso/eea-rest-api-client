<?php
//this script is meant to be ran outside of WP

session_start();

//Upcoming Events w/Caching
/* This shows how you can utilize Event Espresso's internal caching to create a cached the result on the server. Then display the results. */

$curdate = date("Y-m-d H:i:s");

//Clear the session
if ( isset($_REQUEST['clear_session']) && !empty($_REQUEST['clear_session']) ){
  if ($_REQUEST['clear_session'] == 'true'){
		$_SESSION['ee_api_session'] = '';
		header( 'Location: '.$_SERVER['HTTP_REFERER'] ) ;
	}
}
//Retrieve the cached data
$data_url = "http://dev2.eventespresso.com/wp-json/ee/v4.6/events?include=Datetime&filter[where][Datetime.DTT_EVT_end][]=>&filter[where][Datetime.DTT_EVT_end][]=" . urlencode($curdate);

$json = file_get_contents($data_url, true); //getting the file content
$events = json_decode($json, true); //getting the file content as array
$count = count( $events ); //counting the number of results

//Show raw results
/*echo "<pre>";
print_r($events_response);
echo "</pre>";*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EE4 JSON REST API - Upcoming Events</title>
</head>

<body>
<div class="style">
<h1>Upcoming Events</h1>
<div id="events">
<?php
if ($count > 0){
	foreach ($events as $event){
		echo '<div class="event">';
		echo $event['featured_image_url'] ? '<div class="json-image"><a href="' . esc_attr( $event['link'] ). '"><img src="' . esc_attr( $event['featured_image_url'] ) . '" /></a></div>' : '';
		echo '<a href="' . $event[ 'link' ] . '">' . $event[ 'EVT_name' ] . '</a><ul>';
		foreach( $event[ 'datetimes' ] as $datetime ) {
			echo '<li>' . date( 'l jS \of F Y @h:i A',strtotime( $event[ 'datetimes' ][ 0 ][ 'DTT_EVT_start' ] ) ).'</a>';
		}
		echo '</ul></div>';
	}
}
?>
</div>
</div>
<div id="footer"><p>Showing <strong><?php echo $count ?></strong> events, that start after <strong><?php echo date('l jS \of F Y h:i:s A', strtotime($curdate)) ?></strong>, using this url:<br />
<a href="<?php echo $data_url ?>" target="_blank"><?php echo $data_url ?></a></p>