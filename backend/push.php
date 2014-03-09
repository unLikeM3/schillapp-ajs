<?php
	$headers = array(
		'X-PUSHBOTS-APPID' => '531ca2661d0ab1f27c8b457b',
		'X-PUSHBOTS-SECRET' => '940ed91adc90d86750e7884623142cbe',
		'content-Type' => 'application/json'
	);
	$data = array(
		'platform' => array('1'),
		'msg' => 'NOTIF!',
		'sound' => '',
		'badge' => '1'
	);


	//$r = new HttpRequest('https://api.pushbots.com/push/all', HttpRequest::METH_POST);
	//$r->setHeaders($headers);
	//$r->addPostFields(array($data));

	/*try {
	    echo $r->send()->getBody();
	} catch (HttpException $ex) {
	    echo $ex;
	}*/
?>