var phonecatControllers = angular.module('phonecatControllers', ['firebaseservices', 'angularModalService']);

phonecatControllers.controller('home', function ($scope, FireBaseServices, ModalService) {

    $scope.users = [];
    $scope.comments = [];
    $scope.message = {};
    $scope.check = 0;

    $scope.currentuser = {};
    $scope.currentuser.email = '';
    $scope.userid = 0;

    function ongettingusers(data) {
        $scope.users = data;
        $scope.$apply();
    }

    //    var onuserloadsuccess = function (data, status) {
    //        if (data.queryresult != "") {
    //            for (var i = 0; i < data.queryresult.length; i++) {
    //                console.log(JSON.parse(data.queryresult[i].json));
    //                $scope.comments.push(JSON.parse(data.queryresult[i].json));
    //
    //            }
    //        }
    //    };

    function onuserload(data) {
        data = data.val();
        console.log("getchat");
        console.log($scope.userid);
        FireBaseServices.userfromemail($scope.currentuser.email).success(useremailsuccess);
        if ($scope.check == 1) {
            $scope.comments.push(data);
        }
        if (data.email == $scope.currentuser.email) {
            //$scope.$apply();
        }
    }


    function gettingdata(data) {
        console.log("new data");
        console.log(data);
        for (var i = 0; i < data.queryresult.length; i++) {
            //                console.log(JSON.parse(data.queryresult[i].json));
            $scope.comments.push(JSON.parse(data.queryresult[i].json));

        }
    }

    function userorder(data) {
        console.log(data);
        $scope.userorder = data.queryresult;
    }

    var useremailsuccess = function (data, status) {
        console.log(data);
        $scope.userid = data;

        //        FireBaseServices.getchatbyuser($scope.userid).success(onuserloadsuccess);
    };

    $scope.userchange = function (user) {
        console.log(user);
        //        $scope.userid = "";
        //        FireBaseServices.userfromemail(user.email).success(useremailsuccess);
        for (var i = 0; i < $scope.users.length; i++) {
            $scope.users[i].active = "";
        }
        user.active = "active";
        $scope.currentuser = user;
        FireBaseServices.changecurrentuser(user);
        $scope.comments = [];
        FireBaseServices.connecttouser(user.uid, user.email, onuserload, gettingdata, userorder);
    }

    $scope.sendmessage = function () {
        $scope.check = 1;
        console.log("now im user");
        console.log($scope.currentuser);
        FireBaseServices.sendmessage($scope.message.text, $scope.userid);
        $scope.message.text = "";
    };

    FireBaseServices.getcurrentusers(ongettingusers);

    // angular popup
    
    // get all transcript
    $scope.transcripts = [];
    var transcriptsuccess = function (data, status) {
        console.log("transcriptdata");
        console.log(data.queryresult);
        $scope.transcripts=data.queryresult;
    };
    
    FireBaseServices.getalltranscript().success(transcriptsuccess);
    
    // get transcript by search
    $scope.search = function (search) {
        console.log(search);
        FireBaseServices.getalltranscriptsearch(search).success(transcriptsuccess);
    }
    
    // Get checked transcript
    $scope.checktranscript = function (transcript){
        console.log($scope.userid);
        
//        FireBaseServices.sendmessage(transcript.text, $scope.userid);
    }
    
    $scope.show = function () {
        
        ModalService.showModal({
            templateUrl: 'modal.html',
            controller: "home"
        }).then(function (modal) {
            modal.element.modal();
            modal.close.then(function (result) {
                $scope.message = "You said " + result;
            });
        });
        FireBaseServices.getalltranscript().success(transcriptsuccess);
    };


});

phonecatControllers.controller('ModalController', function ($scope, close) {

    $scope.close = function (result) {
        close(result, 500); // close, but give 500ms for bootstrap to animate
    };
    $scope.users="Android";

});