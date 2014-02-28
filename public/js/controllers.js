app.controller('globalController', function($rootScope, $scope, $location) {
	
	
	$rootScope.$on('databank-ready', function() {
		$rootScope.users = $rootScope.db.users;


	});

	$scope.greeting = "Hello Wassup";

});