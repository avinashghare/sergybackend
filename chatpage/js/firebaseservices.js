var adminurl = "http://localhost/sergybackend/index.php/json/";
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
                //                json1=JSON.stringify(message);
                //                console.log(json1);
                //                $http.get(adminurl + "addchat?json="+json1+"&user=0&type=1&url=&imageurl=&status=1",{});
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
        connecttouser: function (uid, email, callback, callbackforgettingdata) {
            console.log(uid);
            //            $http.get(adminurl + "userfromemail?email="+email,{}).success(callbackuserid);
            $http.get(adminurl + "getchatbyuser?email=" + email, {}).success(callbackforgettingdata);
            ref.child(previousuid).off("value", previouscallback);
            previousuid = uid;
            previouscallback = callback;
            ref.child(uid).on("value", callback)
        },
        changecurrentuser: function (user) {
            currentuser = user;
        },
        getchatbyuser: function (userid) {
            return $http.get(adminurl + "getchatbyuser?userid=" + userid, {});

        },
        getcurrentuser: function () {
            return currentuser;
        },
        userfromemail: function (email) {
            return $http.get(adminurl + "userfromemail?email=" + email, {});
        },
        sendmessage: function (text, uid) {
            timestamp = new Date();

            // To database
            //            $http.get(adminurl + 'addchat?user=' + bigbagplan.user + '&category=' + bigbagplan.category, {});

            ref.child(currentuser.uid).set({
                email: currentuser.email,
                name: "Sergy",
                text: text,
                timestamp: timestamp.getTime()
            });

            var json1 = {
                email: currentuser.email,
                name: "Sergy",
                text: text,
                timestamp: timestamp.getTime()
            };
            json1 = JSON.stringify(json1);

            return $http({
                url: adminurl + 'addchat',
                method: "POST",
                data: {
                    'json': json1,
                    'user': uid,
                    'type': '1',
                    'url': '',
                    'imageurl': '',
                    'status': '1'
                }
            });

            //            $http.get(adminurl + "addchat?json="+json1+"&user="+uid+"&type=1&url=&imageurl=&status=1",{});
        }

    }


    return returnval;
});