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
        when('/chat1', {
            templateUrl: base_url + 'views/chat1.html',
            controller: 'home'
        }).
        when('/insertform', {
            templateUrl: base_url + 'views/chat1.html',
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
firstapp.filter('chatt', function (FireBaseServices) {
    return function (input) {
        var j = JSON.parse(input);
        return j.form;
    };
});
firstapp.filter('chattt', function (FireBaseServices) {
    return function (input) {
        var j = JSON.parse(input);
        return j;
    };
});

firstapp.filter('imagepath', function () {
    return function (input) {
        if (input == "" | !input) {
            return "http://mafiawarloots.com/sergybackend/assets/img/user.png";
//                return "http://localhost/sergybackend/assets/img/user.png";
        } else {
            return "http://mafiawarloots.com/sergybackend/uploads/" + input;
//            return "http://localhost/sergybackend/uploads/" + input;
        }
    };
});
firstapp.directive("chat", function () {
    return {
        restrict: "E",
        replace: "true",
        templateUrl: base_url+"views/directive/chat.html"
    }
})

firstapp.directive('myRepeatDirective', function() {
  return function(scope, element, attrs) {
    //angular.element(element).css('color','blue');
    if (scope.$last){
        $('.profile-activity').animate({ scrollTop: $(".profile-activity div.chintan").height() }, 'slow', function () {
                            });
      
    }
  };
})


var formvalidation = function(allvalidation) {
            var isvalid2 = true;
            for (var i = 0; i < allvalidation.length; i++) {
                console.log("checking");
                console.log(allvalidation[i].field);
                if (allvalidation[i].field == "" || !allvalidation[i].field) {
                    allvalidation[i].validation = "ng-dirty";
                    isvalid2 = false;
                }
            }
            return isvalid2;
        };



//firstapp.directive("chatdir1", function(){
//    return{
//        templateUrl: 'chat1.html'
////        restrict: "E",
////        template: "<div class='activity-desk'><div class='panel'><div class='panel-body'><div class='{{comment.name|chatclass}}'></div><i class='fa fa-clock-o'></i><h4>{{comment.timestamp|converttime}}</h4><p ng-repeat='form in comment.text|chatt'><input type='{{form.type}}' placeholder='{{form.placeholder}}'></p></div></div></div>"
//    }
//})
//
//firstapp.directive("chatdir2", function(){
//    return function (scope, element, attrs) {
////        element.text(attrs.message);
//        if(attrs.message=="transcript"){
//            element.template("<div class='activity-desk'><div class='panel'><div class='panel-body'><div class='{{comment.name|chatclass}}'></div><i class='fa fa-clock-o'></i><h4>{{comment.timestamp|converttime}}</h4><p>{{comment.text}}</p></div></div></div>");
//        }
//    }
//})