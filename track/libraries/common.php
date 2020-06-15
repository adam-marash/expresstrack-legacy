<?php

// establish a curl session using the $options provided
function InitializeCurl($options) {
	$curl = curl_init();
	curl_setopt_array($curl, $options);

	$response = curl_exec($curl);
	$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

	curl_close($curl);

	return array("http_code" => $http_code, "response" => $response);
}

// returns a DOMNodeList containing all nodes matching the given XPath $query from the $html provided
function GetNodesXPath($html, $query) {
	$dom = new DOMDocument();
	$dom->loadHTML($html);

	$xPath = new DOMXpath($dom);
	$nodes = $xPath->query($query);

	return $nodes;	// returns DOMNodeList
}

// converts a DOMNodelist::item (or DOMElement) to HTML format
function GetElementHTML($element) {
	$dom = new DOMDocument();
	$element = $dom->importNode($element, true);	// this method will recursively import all sub-elements under $element and returns a copy of $element as a DOMNode

	return $dom->saveXML($element);	// use the saveXML method to create the HTML representation of $element (DOMNode)
}

// strips excess whitespace from a string
function CleanString($string) {
	$string = preg_replace('/\s\s+/', ' ', $string);

	return trim($string);
}

// returns a new date and time format
function FormatDateTime($date_time) {
	$date_time = date_parse($date_time);

	$date = sprintf("%04d-%02d-%02d", $date_time["year"], $date_time["month"], $date_time["day"]);	// e.g. %04d-%02d-%02d = 2017-09-12 (yyyy-mm-dd with leading zeros)
	$time = sprintf("%02d:%02d", $date_time["hour"], $date_time["minute"]);	// e.g. %02d:%02d = 01:23 (hh:mm with leading zeros)

	$date_time = strtotime($date . $time);	// parse date and time into a Unix timestamp
	$date_time = date("d M Y, h:i A", $date_time);	// return the new date and time according to the format provided

	return $date_time;
}

// callback function to sort an array by date
function SortByDate($array_one, $array_two) {
	return strtotime($array_two["date_time"]) - strtotime($array_one["date_time"]);
}

?>