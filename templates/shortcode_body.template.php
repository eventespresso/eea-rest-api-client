<div ng-app="myapp">
	Events retrieved via Angular.js: (May take a second to load)
	<div ng-controller="mycontroller">
		<article ng-repeat="event in events">
			<h3>Event Name: {{ event.EVT_name }}</h3>
			<p>Description: {{ event.EVT_desc | sanitize }}</p>
			<h4>Datetimes:</h4>
			<ul>
				<li ng-repeat="datetime in event.datetimes">
					<b>{{ datetime.DTT_EVT_start }}</b>
				</li>
			</ul>
		</article>
	</div>
</div>