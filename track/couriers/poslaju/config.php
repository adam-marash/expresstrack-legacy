<?php

function PosLajuConfig($tracking_no) {

	$parameters = array(
		'hvfromheader03' => '0',
		'hvtrackNoHeader03' => '',
		'trackingNo03' => $tracking_no
	);

	$headers = array(
		'Host' => 'poslaju.com.my',
		'Referer' => 'https://poslaju.com.my/track-trace-v2/',
		'Upgrade-Insecure-Requests' => '1'
	);

	$options = array(
		CURLOPT_URL => 'https://poslaju.com.my/track-trace-v2/',
		CURLOPT_CONNECTTIMEOUT => 2,
		CURLOPT_TIMEOUT => 10,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_SSL_VERIFYPEER => FALSE,
		CURLOPT_POST => TRUE,
		CURLOPT_POSTFIELDS => $parameters,
		CURLOPT_PROXY => 'sg.proxymesh.com:31280',
		CURLOPT_PROXYUSERPWD => 'ediblesites:slimMous365'
		//CURLOPT_HTTPHEADER => $headers,
		//CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0'
	);

	return $options;
}

function PosMalaysiaConfig($tracking_no) {

	$parameters = array(
		'hvfromheader03' => '0',
		'hvtrackNoHeader03' => '',
		'trackingNo03' => $tracking_no
	);

	$headers = array(
		'Host' => 'pos.com.my',
		'Referer' => 'https://pos.com.my/postal-services/quick-access/?track-trace',
		'Upgrade-Insecure-Requests' => '1'
	);

	$options = array(
		CURLOPT_URL => 'https://pos.com.my/postal-services/quick-access/?track-trace',
		CURLOPT_CONNECTTIMEOUT => 2,
		CURLOPT_TIMEOUT => 10,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_SSL_VERIFYPEER => FALSE,
		CURLOPT_POST => TRUE,
		CURLOPT_POSTFIELDS => $parameters,
		CURLOPT_PROXY => 'sg.proxymesh.com:31280',
		CURLOPT_PROXYUSERPWD => 'ediblesites:slimMous365'
		//CURLOPT_HTTPHEADER => $headers,
		//CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0'
	);

	return $options;
}

function EasyParcelConfig($tracking_no) {

	$parameters = array(
		'courier' => '1',
		'key' => $tracking_no
	);

	$headers = array(
		'Host' => 'secure.easyparcel.my',
		'Referer' => 'https://secure.easyparcel.my/pass/?pg=Track&t=Poslaju/' . $tracking_no,
		'X-Requested-With' => 'XMLHttpRequest'
	);

	$options = array(
		CURLOPT_URL => 'https://secure.easyparcel.my/pass/?ac=doTrackStatus',
		CURLOPT_CONNECTTIMEOUT => 2,
		CURLOPT_TIMEOUT => 10,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_SSL_VERIFYPEER => FALSE,
		CURLOPT_POST => TRUE,
		CURLOPT_POSTFIELDS => $parameters,
		CURLOPT_PROXY => 'sg.proxymesh.com:31280',
		CURLOPT_PROXYUSERPWD => 'ediblesites:slimMous365'
		//CURLOPT_HTTPHEADER => $headers,
		//CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:49.0) Gecko/20100101 Firefox/49.0'
	);

	return $options;
}

?>
