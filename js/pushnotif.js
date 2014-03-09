/**
 * PushNotification
 */
var pushNotification;

document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady(){
	pushNotification = window.plugins.pushNotification;
	if(device.platform.toLowerCase() == 'android'){
		pushNotification.register(push.successHandler, push.errorHandler, {
			'senderID': '764406565523',
			'ecb': 'push.onNotif'
		});
	}

	var push = {
		successHandler = function(result){
			alert('Registered: '+result);
		},
		errorHandler = function(err){
			alert('Error: '+err);
		},
		onNotif = function(e){
			switch(e.event)
			{
				case 'registered' :
					alert(e.regid);
					break;
				case 'message' :
					alert(e.payload.message);
					break;
				case 'error' :
					alert(e.msg);
					break;
			}
		}
	}	
}

