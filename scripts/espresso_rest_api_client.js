var myapp = angular.module( 'myapp', [] );

myapp.filter("sanitize", ['$sce', function($sce) {
  return function(htmlCode){
    return $sce.trustAsHtml(htmlCode);
  }
}]);
// Set the configuration
myapp.run( ['$rootScope', function($rootScope) {

	// Variables defined by wp_localize_script
	$rootScope.api = espresso_rest_api_client_data.api_endpoint + 'ee/v4.8.29/events';

}]);

// Add a controller
myapp.controller( 'mycontroller', ['$scope', '$http', function( $scope, $http ) {

	// Load posts from the WordPress API
	$http({
		method: 'GET',
		url: $scope.api,
		params: {
			'filter[limit]' : 5,
			'include' : 'Datetime.*'
		}
	}).
	success( function( data, status, headers, config ) {
		console.log( $scope.api );
		console.log( data );
		$scope.events = data;
	}).
	error(function(data, status, headers, config) {
		alert( 'an error occurred; do you have the WP JSON API v1.2 installed? And the EE4 JSON API v2 installed?');
	});

}]);

