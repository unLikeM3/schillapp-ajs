alert('init');
var pushNotification = window.plugins.pushNotification;
pushNotification.register(
	push.successHandler, 
	push.errorHandler,
	{
		"senderID":"snappy-tine-514",
		"ecb":"push.onNotificationGCM"
	});

var push = {
	successHandler: function(result){
		alert('Callback: '+result);
	},
	errorHandler: function(error){
		alert(error);
	},
	onNotificationGCM: function(e){
		switch (e.event) {
			case 'registered' :
				if(e.regid > 0){
					alert('Registered: ' + e.regid);

				}
				break;
			case 'message' :
				alert(e.message);
				break;
			case 'error' : 
				alert(e.msg);
				break;
			default :
				alert('Something pushy happened');
				break;
		}
	}
}