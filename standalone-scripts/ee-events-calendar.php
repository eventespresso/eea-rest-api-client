<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link rel='stylesheet' type='text/css' href='ee-events-calendar-includes/cupertino/jquery-ui.min.css' />
<meta charset='utf-8' />
<link href='ee-events-calendar-includes/fullcalendar.min.css' rel='stylesheet' />
<link href='ee-events-calendar-includes/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='ee-events-calendar-includes/moment.min.js'></script>
<script src='ee-events-calendar-includes/jquery.min.js'></script>
<script src='ee-events-calendar-includes/fullcalendar.min.js'></script>
<script type="text/javascript">

  $(document).ready(function() {

		$('#calendar').fullCalendar({
			events: function( start, end, timezone, callback ){
				var objectdata = {
						filter:{
							where:{
								'Datetime.DTT_EVT_end':[
									'>',start.format()
								],
								'Datetime.DTT_EVT_start':[
									'<', end.format()
								]
							}
						},
						"include": 'Datetime.*'
					};
				$.ajax({
					url: 'http://dev2.eventespresso.com/wp-json/ee/v4.6/events',
					dataType: 'json',
//					crossDomain:true,
//					mimeType:'json',
					data: objectdata ,
					success: function(doc) {
						var events = [];
						$(doc).each(function() {
							//only add events to the calendar if they have a datetime (they all should)
							if( this.datetimes[0] ){
								events.push({
									title: this.EVT_name,
									start: this.datetimes[0].DTT_EVT_start // will be parsed
								});
							}
						});
						callback(events);
					},
					error: function( xhr, status, error ) {
						alert('error communicating with server ' + status );
					}
				});
			},
			theme: true,
			cache: false,
			lazyFetching: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}

		});

	});

</script>
<style type='text/css'>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#loading {
		position: absolute;
		top: 5px;
		right: 5px;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}


</style>
</head>
<body>
<div id='loading' style='display:none'>loading...</div>
<div id='calendar'></div>
<p>This page is using the Event Espresso API</p>

<p>If you are making a request from a different domain, you will probably need to <a href='https://github.com/thenbrent/WP-API-CORS/blob/master/wp-api-cors.php'>install and activate the WP API CORS addon</a>, which is however currently in BETA.</p>
</body>
</html>