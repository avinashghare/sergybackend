//var adminurl = "http://localhost/sergybackend/index.php/json/";
var adminurl = "http://mafiawarloots.com/sergybackend/index.php/json/";
var firebaseservices = angular.module('firebaseservices', [])

.factory('FireBaseServices', function ($http, $location) {

    var ref = new Firebase("https://blinding-heat-5568.firebaseio.com/");
    var chats = [];
    var onchangecallback = function () {};
    var users = [];
    var order = [];
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
                for(uid in data) {
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
        connecttouser: function (uid, email, callback, callbackforgettingdata, callbackuserorder) {
            
            $http({
                url: adminurl + 'getchatbyuser',
                method: "POST",
                data: {
                    'email': email
                }
            }).success(callbackforgettingdata);
            
//             return $http({
//                url: adminurl + 'getordersbyuser',
//                method: "POST",
//                data: {'email': email}
//            }).success(callbackuserorder);
            $http.get(adminurl + "getordersbyuser?email=" + email, {}).success(callbackuserorder);
            ref.child(previousuid).off("value", previouscallback);
            previousuid = uid;
            previouscallback = callback;
            ref.child(uid).on("value", callback)
        },
        changecurrentuser: function (user) {
            currentuser = user;
        },
        getchatbyuser: function (userid) {
//            return $http.get(adminurl + "getchatbyuser?userid=" + userid, {});
            return $http({
                url: adminurl + 'getchatbyuser',
                method: "POST",
                data: {
                    'userid': userid
                }
            });

        },
        getcurrentuser: function () {
            return currentuser;
        },
        getalltranscript: function () {
            return $http.get(adminurl + "getalltranscript", {});
        },
        getallforms: function () {
            return $http.get(adminurl + "getallforms", {});
        },
        getallformssearch: function (searchfr) {
            return $http.get(adminurl + "getallforms?search="+searchfr, {});
        },
        getallproduct: function () {
            return $http.get(adminurl + "getallproduct", {});
        },
        getallproductsearch: function (searchpr) {
            return $http.get(adminurl + "getallproduct?search="+searchpr, {});
        },
        getalltranscriptsearch: function (searchtr) {
            return $http.get(adminurl + "getalltranscript?search="+searchtr, {});
        },
        getorderbyid: function (id) {
            return $http.get(adminurl + "getorderbyid?id="+id, {});
        },
        setorderid: function (id) {
            order=id;
        },
        getorderid: function () {
            return order;
        },
        userfromemail: function (email) {
            return $http.get(adminurl + "userfromemail?email=" + email, {});
//            return $http({
//                url: adminurl + 'userfromemail',
//                method: "POST",
//                data: {
//                    'email': email
//                }
//            });
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

//            return $http({
//                url: adminurl + 'addchat',
//                method: "POST",
//                data: {
//                    'json': json1,
//                    'user': uid,
//                    'type': '1',
//                    'url': '',
//                    'imageurl': '',
//                    'status': '1'
//                }
//            });

                        return $http.get(adminurl + "addchat?json="+json1+"&user="+uid+"&type=1&url=&imageurl=&status=1",{});
        }

    }


    return returnval;
});