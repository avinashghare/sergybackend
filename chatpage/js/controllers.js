var phonecatControllers = angular.module('phonecatControllers', ['firebaseservices']);

phonecatControllers.controller('home', function ($scope, FireBaseServices) {

    $scope.users = [];
    $scope.comments = [];
    $scope.message = {}

    $scope.currentuser = {};

    function ongettingusers(data) {
        $scope.users = data;
        $scope.$apply();


    }

    function onuserload(data) {
        data = data.val();

        $scope.comments.push(data);
        if (data.email == $scope.currentuser.email) {
            //$scope.$apply();
        }
    }

    $scope.userchange = function (user) {

        for (var i = 0; i < $scope.users.length; i++) {
            $scope.users[i].active = "";
        }
        user.active = "active";
        $scope.currentuser = user;
        FireBaseServices.changecurrentuser(user);
        $scope.comments = [];
        FireBaseServices.connecttouser(user.uid, onuserload);
    }

    $scope.sendmessage = function () {
        FireBaseServices.sendmessage($scope.message.text);
        $scope.message.text="";
    };

    FireBaseServices.getcurrentusers(ongettingusers);
});