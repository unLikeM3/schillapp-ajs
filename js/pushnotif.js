/**
 * PushNotification
 */
var pushNotification;

var push = {
	successHandler = function(result){
		alert('Registered: '+result);
		console.log('Result: '+result)
	},
	errorHandler = function(err){
		alert('Error: '+err);
		console.log('Error: '+err);
	},
	onNotif = function(e){
		console.log('Event: '+e);
		switch(e.event)
		{
			case 'registered' :
				alert(e.regid);
				console.log('RegID: '+e.regid)
				break;
			case 'message' :
				alert('Message: '+e.message);
				console.log('Message: '+e.message);
				break;
			case 'error' :
				alert(e.msg);
				console.log('Error: '+e.msg);
				break;
			default :
				console.log("Default, unknown, GCM event");
				break;
		}
	}
}

document.addEventListener("deviceready", onDeviceReady, false);

function onDeviceReady(){
	console.log("Device Ready");
	pushNotification = window.plugins.pushNotification;
	console.log(pushNotification);
	if(device.platform.toLowerCase() == 'android'){
		pushNotification.register(push.successHandler, push.errorHandler, {
			'senderID': '764406565523',
			'ecb': 'push.onNotif'
		});
	}	
}
