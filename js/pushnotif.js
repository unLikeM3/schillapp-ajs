/**
 * PushNotification
 */
/* jslint devel: true */
var pushNotification;

var push = {
    successHandler: function (result) {
        console.log('Result: ' + result);
    },
    errorHandler: function (err) {
        console.log('Error: ' + err);
    },
    onNotif: function (e) {
        console.log('Event: ', e);
        switch (e.event) {
        case 'registered':
            var regid = e.regid;
            var url = "https://api.pushbots.com/deviceToken";
            var payload = {
                'token': regid,
                'platform': '1',
            };

            $.ajax({
                method: 'PUT',
                dataType: 'json',
                url: url,
                beforeSend: function (req) {
                    req.setRequestHeader('X-PUSHBOTS-APPID', '531ca2661d0ab1f27c8b457b');
                },
                contentType: 'application/json',
                data: JSON.stringify(payload),
                success: function (data) {
                    var tagData = {
                        'platform': "1",
                        'tag': "Dev",
                        'token': regid,
                    };

                    $.ajax({
                        method: "PUT",
                        dataType: 'json',
                        url: "http://api.pushbots.com/tag",
                        beforeSend: function (req) {
                            req.setRequestHeader('X-PUSHBOTS-APPID', '531ca2661d0ab1f27c8b457b');
                        },
                        contentType: "application/json",
                        data: JSON.stringify(tagData),
                        success: function (data) {
                        },
                        error: function (err) {
                        }
                    });
                },
                error: function (err) {
                }
            });
            break;
        case 'message':
            alert(e.message);
            break;
        case 'error':
            break;
        default:
            console.log("Default, unknown, GCM event");
            break;
        }
    }
};

$(window).load(function () {
    console.log("Device Ready");
    pushNotification = window.plugins.pushNotification;
    pushNotification.register(push.successHandler, push.errorHandler, {
        'senderID': '764406565523',
        'ecb': 'push.onNotif'
    });
});
