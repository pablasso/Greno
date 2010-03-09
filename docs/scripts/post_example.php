#!/usr/bin/php
<?php

/**
 * Example inserting floats: 'temp_amb' and 'hum_rel' and bool: 'ventilador'
 *
 */

$float_url = "http://adaptivertc.pablasso.com/api/float_add";
$bool_url = "http://adaptivertc.pablasso.com/api/bool_add";
$api_key = "examplesilokey";
$time = time(); // the api expects a unix timestamp

// float data 1
$float_data[0]['tagname'] = "temp_amb";
$float_data[0]['value'] = "23.5";
$float_data[0]['time'] = $time;
$float_data[0]['api_key'] = $api_key;

// float data 2
$float_data[1]['tagname'] = "hum_rel";
$float_data[1]['value'] = "82";
$float_data[1]['time'] = $time;
$float_data[1]['api_key'] = $api_key;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $float_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);

foreach ($float_data as $data) {
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$output = curl_exec($ch);
	echo $output."\n";
}

// bool data 1
$bool_data['tagname'] = "ventilador";
$bool_data['value'] = "0";
$bool_data['time'] = $time;
$bool_data['api_key'] = $api_key;

curl_setopt($ch, CURLOPT_URL, $bool_url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $bool_data);
$output = curl_exec($ch);
echo $output."\n";

curl_close($ch);
?>