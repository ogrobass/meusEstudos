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

	$scope.nome = "";

	$scope.exibir = function() {
		var x = Math.floor(Math.random() * 3 + 0);
		$scope.queroMostrar = $scope.json[x].firstName;
		$scope.nome = $scope.json[0].firstName;
	};
});