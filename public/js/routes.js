app.config(function($routeProvider) {
$routeProvider

	// route for the home page
	.when('/home', {
		templateUrl : 'pages/home.html',
		controller  : 'homeController'
	})

	// route for the about page
	.when('/event/create', {
		templateUrl : 'pages/event/create.html',
		controller  : 'createEventController'
	})
	.when('/event/preview',{
		templateUrl : 'pages/event/preview.html',
		controller : ''
		});
});