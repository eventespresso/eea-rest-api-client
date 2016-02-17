<?php
//this script is meant to be ran outside of WP


$curdate_utc = date("Y-m-d H:i:s");

//Retrieve the upcoming events and their related datetimes
$data_url = "http://demoee.org/demo/wp-json/ee/v4.8.29/events?include=Datetime&filter[where][Datetime.DTT_EVT_end][]=>&filter[where][Datetime.DTT_EVT_end][]=" . urlencode($curdate_utc);

$json = file_get_contents($data_url, true); //getting the file content
$events = json_decode($json, true); //getting the file content as array
$count = count( $events ); //counting the number of results

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>EE4 JSON REST API - Upcoming Events</title>
<p>As fetched from <a href='<?php echo $data_url;?>'><?php echo $data_url;?></a></p>
</head>

<body>
<h1>Upcoming Events</h1>
<div id="events">
<?php
if ($count > 0){
	foreach ($events as $event){
		echo '<div class="event">';
		echo $event['featured_image_url'] ? '<a href="' . htmlspecialchars( $event['link'] ). '"><img src="' . htmlspecialchars( $event['featured_image_url'] ) . '" /></a>' : '';
		echo '<a href="' . $event[ 'link' ] . '">' . $event[ 'EVT_name' ] . '</a><ul>';
		foreach( $event[ 'datetimes' ] as $datetime ) {
			echo '<li>' . date( 'l jS \of F Y @h:i A',strtotime( $event[ 'datetimes' ][ 0 ][ 'DTT_EVT_start' ] ) ).'</a>';
		}
		echo '</ul></div>';
	}
}
?>
</div>
<div id="footer"><p>Showing <strong><?php echo $count ?></strong> events, that start after <strong><?php echo date('l jS \of F Y h:i:s A', strtotime($curdate_utc)) ?> UTC</strong>, using this url:<br />
<a href="<?php echo $data_url ?>" target="_blank"><?php echo $data_url ?></a></p>
</body>
</html>