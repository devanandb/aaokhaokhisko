var app = angular.module('eventApp', ['ngRoute'])


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
	});

/*app.config(function($interpolateProvider) { $interpolateProvider.startSymbol('(('); $interpolateProvider.endSymbol('))'); });*/