<?php
	$data = json_encode(array(
		'platform' => array(
			'1'
		),
		'msg' => 'Testar från phpscript',
		'sound' => '',
		'badge' => '1'
	));

	var_dump($data);

	$ch = curl_init('https://api.pushbots.com/push/all');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'X-PUSHBOTS-APPID: 531ca2661d0ab1f27c8b457b',
		'X-PUSHBOTS-SECRET: 940ed91adc90d86750e7884623142cbe',
		'content-Type: application/json'
	));

	$result = curl_exec($ch);
	var_dump($result);
?>