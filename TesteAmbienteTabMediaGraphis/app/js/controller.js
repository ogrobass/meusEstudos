App.controller('entrarController', function ($scope, $rootScope, $state) {
    var self = this;
    console.log('controller');
    $scope.json = [
	
	    {"firstName":"John", "lastName":"Doe"}, 
	    {"firstName":"Anna", "lastName":"Smith"},
	    {"firstName":"Peter", "lastName":"Jones"}

	];

	console.log($scope.json);

	$scope.queroMostrar = "--";

	$scope.exibir = function() {
		var x = Math.floor(Math.random() * 3 + 0);
		console.log(x);
		$scope.queroMostrar = $scope.json[x].firstName;
	};
});