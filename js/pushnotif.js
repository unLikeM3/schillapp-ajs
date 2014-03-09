/**
 * PushNotification
 */
var pushNotification;

var push = {
	successHandler: function(result){
		console.log('Result: '+result);
	},
	errorHandler: function(err){
		console.log('Error: '+err);
	},
	onNotif: function(e){
		console.log('Event: ', e);
		var platforms = ['1'];
		switch(e.event)
		{
			case 'registered' :
				var regid = e.regid;
				console.log('RegID: '+regid);
				var url = "https://api.pushbots.com/deviceToken";
				$.ajax({
					method: 'PUT',
					dataType: 'json',
					url: url,
					beforeSend: function(req){
						req.setRequestHeader('X-PUSHBOTS-APPID', '531ca2661d0ab1f27c8b457b');
					},
					contentType: 'application/json',
					
					success: function(data){
						alert('Success');
						console.log('data', data)
					},
					error: function(err){
						alert('Error');
						console.log('err', err);
					}
				});
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

$(window).load(function(){
	console.log("Device Ready");
	pushNotification = window.plugins.pushNotification;
	
	pushNotification.register(push.successHandler, push.errorHandler, {
		'senderID': '764406565523',
		'ecb': 'push.onNotif'
	});
});
