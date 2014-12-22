var userid = 0;
var check = 0;
//var order = 0;
var phonecatControllers = angular.module('phonecatControllers', ['firebaseservices', 'angularModalService']);

phonecatControllers.controller('home', function ($scope, FireBaseServices, ModalService) {

    $scope.users = [];
    $scope.comments = [];
    $scope.message = {};
    //    check = 0;
//    $scope.chatdir = "chatdir";
    $scope.currentuser = {};
    $scope.currentuser.email = '';

    
//    
//$(function () {
//    // Create a form from some JSON
//    $("#demo-1-form").dform({
//        "action":"index.html",
//        "method":"get",
//        "html":[
//            {
//                "type":"p",
//                "html":"You must login"
//            },
//            {
//                "name":"username",
//                "id":"txt-username",
//                "caption":"Username",
//                "type":"text",
//                "placeholder":"E.g. u...@example.com"
//            },
//            {
//                "name":"password",
//                "caption":"Password",
//                "type":"password"
//            },
//            {
//                "type":"submit",
//                "value":"Login"
//            }
//        ]
//    });
//});
// 
////$("#myform").buildForm(formdata);
//    
    
    
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
        console.log(userid);
        //        FireBaseServices.userfromemail($scope.currentuser.email).success(useremailsuccess);
        //        if (check == 1) {
        $scope.comments.push(data);
        //        }
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
        userid = data;

        //        FireBaseServices.getchatbyuser(userid).success(onuserloadsuccess);
    };

    $scope.userchange = function (user) {
        console.log(user);
        //        userid = "";
        //        FireBaseServices.userfromemail(user.email).success(useremailsuccess);
        for (var i = 0; i < $scope.users.length; i++) {
            $scope.users[i].active = "";
        }
        user.active = "active";
        $scope.currentuser = user;
        FireBaseServices.changecurrentuser(user);
        $scope.comments = [];
        FireBaseServices.userfromemail(user.email).success(useremailsuccess);
        FireBaseServices.connecttouser(user.uid, user.email, onuserload, gettingdata, userorder);
    }

    $scope.sendmessage = function (msg,type) {
        check = 1;
        console.log("now im user");
        console.log(userid);
        if (userid != 0) {
            FireBaseServices.sendmessage(msg, userid, type);
        } else {
            alert("try again later");
        }
        $scope.message.text = "";
    };

    FireBaseServices.getcurrentusers(ongettingusers);

    // angular popup

    // get all forms############################################################################################################################
    $scope.forms = [];
    var formssuccess = function (data, status) {
        console.log(data.queryresult);
        $scope.forms = data.queryresult;
    };
    FireBaseServices.getallforms().success(formssuccess);

    //get all forms by search
    $scope.searchforms = function (searchtr) {
        console.log(searchtr);
        FireBaseServices.getallformssearch(searchtr).success(formssuccess);
    }

    // Send form in chat
    $scope.form = [];
    $scope.checkforms = function (form) {
        console.log(form);
        $scope.form.id = form.id;
        $scope.form.name = form.name;
        $scope.form.json = form.json;
        
        $scope.sendmessage($scope.form,3);
    }

    // get all products#####################################################################################################################3
    $scope.products = [];
    var productssuccess = function (data, status) {
        console.log(data.queryresult);
        $scope.products = data.queryresult;
    };
    FireBaseServices.getallproduct().success(productssuccess);

    //get all forms by search
    $scope.searchproducts = function (searchpr) {
        console.log(searchpr);
        FireBaseServices.getallproductsearch(searchpr).success(productssuccess);
    }

    // Send form in chat
    $scope.checkproducts = function (product) {
        console.log(product);
        //        $scope.sendmessage(transcript.text);
    }

    // get all transcript###########################################################################################################################
    $scope.transcripts = [];
    var transcriptsuccess = function (data, status) {
        console.log("transcriptdata");
        console.log(data.queryresult);
        $scope.transcripts = data.queryresult;
    };

    FireBaseServices.getalltranscript().success(transcriptsuccess);


    // get transcript by search
    $scope.searchtranscript = function (searchfr) {
        console.log(searchfr);
        FireBaseServices.getalltranscriptsearch(searchfr).success(transcriptsuccess);
    }

    // Get checked transcript
    $scope.checktranscript = function (transcript) {
        console.log(userid);
//        console.log(transcript);
        $scope.sendmessage(transcript.text, 1);
    }

    $scope.showtranscript = function () {

        ModalService.showModal({
            templateUrl: 'transcript.html',
            controller: "home"
        }).then(function (modal) {
            modal.element.modal();
            modal.close.then(function (result) {
                $scope.message = "You said " + result;
            });
        });
        //        FireBaseServices.getalltranscript().success(transcriptsuccess);
    };

    $scope.showforms = function () {

        ModalService.showModal({
            templateUrl: 'forms.html',
            controller: "home"
        }).then(function (modal1) {
            modal1.element.modal();
            modal1.close.then(function (result) {
                $scope.message = "You said " + result;
            });
        });
        //        FireBaseServices.getalltranscript().success(transcriptsuccess);
    };

    $scope.showproducts = function () {

        ModalService.showModal({
            templateUrl: 'products.html',
            controller: "home"
        }).then(function (modal2) {
            modal2.element.modal();
            modal2.close.then(function (result) {
                $scope.message = "You said " + result;
            });
        });
        //        FireBaseServices.getalltranscript().success(transcriptsuccess);
    };


    // On order click oneorder()#########################################################################################################

        $scope.oneorder = [];
        $scope.oneorderitem = [];
    
        $scope.oneorderfun = function (order) {
            console.log(order);
            FireBaseServices.getorderbyid(order).success(oneordersuccess);
        }
    
        var oneordersuccess = function (data, status) {
            $scope.ordder = data;
            $scope.oneorder = data.order;
            $scope.oneorderitem = data.orderitem;
            FireBaseServices.setorderid(data);
            $scope.showorder();
        };


    $scope.showorder = function (order) {
        
        ModalService.showModal({
            templateUrl: 'order.html',
            controller: "ModalController"
        }).then(function (modal3) {
            modal3.element.modal();
            modal3.close.then(function (result) {
                $scope.message = "You said " + result;
            });
        });
    };


});

phonecatControllers.controller('ModalController', function ($scope, FireBaseServices, close) {


    $scope.oneorder = [];
    $scope.oneorderitem = [];
    console.log("###########################################");
    $scope.order=FireBaseServices.getorderid();
    console.log($scope.order);
//    console.log($scope.order);
//    FireBaseServices.getorderbyid($scope.order).success(oneordersuccess);
//
//    var oneordersuccess = function (data, status) {
//        $scope.ordder = data;
//        $scope.oneorder = data.order;
//        $scope.oneorderitem = data.orderitem;
//        $scope.showorder();
//    };
    console.log($scope.oneorder);
    $scope.close = function (result) {
        close(result, 500); // close, but give 500ms for bootstrap to animate
    };
    $scope.users = "Android";

});