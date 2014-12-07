// JavaScript Document
var firstapp = angular.module('firstapp', [
  'ngRoute',
  'phonecatControllers',
    'firebaseservices'
]);

firstapp.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/home', {
            templateUrl: base_url + 'views/content.html',
            controller: 'home'
        }).
        otherwise({
            redirectTo: '/home'
        });
  }]);

firstapp.filter('converttime', function (FireBaseServices) {
    return function (input) {
        input = parseInt(input);
        var date = new Date(input);
        return date.toUTCString();
    };
});
firstapp.filter('chatclass', function (FireBaseServices) {
    return function (input) {
        user = FireBaseServices.getcurrentuser();
        if (input == "Sergy") {
            return "arrow-alt";
        } else {
            return "arrow";
        }

    };
});
firstapp.filter('chatcolor', function (FireBaseServices) {
    return function (input) {
        user = FireBaseServices.getcurrentuser();
        if (input == "Sergy") {
            return "alt blue";
        } else {
            return "terques";
        }

    };
});