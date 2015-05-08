<div ng-app="myapp">
	Events retrieved via Angular.js: (May take a second to load)
	<div ng-controller="mycontroller">
		<article ng-repeat="event in events">
			<h3>Event Name: {{ event.EVT_name }}</h3>
			<p>Description: {{ event.EVT_desc }}</p>
		</article>
	</div>
</div>