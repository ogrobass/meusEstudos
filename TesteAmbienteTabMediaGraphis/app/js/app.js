// Create our angular module
var App = angular.module('app', [
    'ui.router'
]);

App.config(
    ['$stateProvider', '$urlRouterProvider',
     function ($stateProvider, $urlRouterProvider) {
         $urlRouterProvider.otherwise('/');
         $stateProvider
             .state('/', {
             url: '/',
             controller: 'entrarController',
             templateUrl: 'views/entrar/entrar.html',
             resolve: {
                 
             }
         })
     }
    ]
);

App.run(function($rootScope){

    // When view content is loaded
    $rootScope.$on('$viewContentLoaded', function () {
        //$('select').select2();
    });
});