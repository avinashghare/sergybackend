var adminurl = "http://mafiawarloots.com/sergybackend/index.php/json/";
var firebaseservices = angular.module('firebaseservices', [])

.factory('FireBaseServices', function ($http, $location) {

    var ref = new Firebase("https://blinding-heat-5568.firebaseio.com/");
    var chats = [];
    var onchangecallback = function () {};

    var users = [];
    var currentuser = {
        email: "",
        uid: ""
    };
    var val = 0;

    var previousuid = "none";
    var previouscallback = function () {};

    var returnval = {
        firbasecallonchange: function () {
            ref.child(authdetails.uid).on('value', function (snapshot) {
                var message = snapshot.val();
                chats.push(message);
                json1=JSON.stringify(message);
            
                $http.get(adminurl + "addchat?json="+json1+"&user=0&type=1&url=&imageurl=&status=1",{});
                onchangecallback(message);
            });
        },
        getcurrentusers: function (callback) {
            
            ref.on("value", function (data) {
                data = data.val();
                users = [];
                for (uid in data) {
                    users.push({
                        uid: uid,
                        email: data[uid].email,
                        name: data[uid].name
                    });
                }

                callback(users);
            });



        },
        getusersonly: function () {
            return users;
        },
        connecttouser: function (uid, callback) {
            console.log(uid);
            ref.child(previousuid).off("value", previouscallback);
            previousuid = uid;
            previouscallback = callback;
            ref.child(uid).on("value", callback)
        },
        changecurrentuser: function (user) {
            currentuser = user;
        },
        getcurrentuser: function () {
            return currentuser;
        },
        addchat: function (text) {
//            var chat = {
//                ''
//            };
        },
        sendmessage: function (text) {
            timestamp=new Date();
            
            // To database
//            $http.get(adminurl + 'addchat?user=' + bigbagplan.user + '&category=' + bigbagplan.category, {});
            
            ref.child(currentuser.uid).set({
                email: currentuser.email,
                name: "Sergy",
                text: text,
                timestamp: timestamp.getTime()
            });
        }

    }


    return returnval;
});