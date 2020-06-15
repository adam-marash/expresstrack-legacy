<?php
defined('_JEXEC') or die('Restricted access');

define("ERROR_SERVER", '<p id="status">System is currently busy. Please try again later.</p>');
define("ERROR_TRACKING", '<p id="status">Tracking information is not available. Please make sure that the tracking number is correct or try again later.</p>');

require "couriers/poslaju/config.php";
require "couriers/poslaju/classes/poslaju.php";
require "couriers/poslaju/classes/easyparcel.php";
require "couriers/poslaju/classes/posmalaysia.php";

require "libraries/common.php";

function DisplayResult($records) {

	if (!empty($records)) {
		echo "<table>";
		echo "<thead><tr>" .
					"<th><strong>Date/Time</strong></th>" .
					"<th><strong>Status</strong></th>" .
					"<th><strong>Location</strong></th>" .
					"</tr></thead>";

		foreach($records as $record) {
			echo "<tr id=\"rows\">" .
						"<td>" . $record['date_time'] . "</td>" .
						"<td>" . $record['status'] . "</td>" .
						"<td>" . $record['location'] . "</td>" .
						"</tr>";
		}

		echo "</table>";
	}

}

$tracking_no = isset($_GET['tracking_no']) ? $_GET['tracking_no'] : FALSE;	// assign a default value if this URL parameter is not available
$continue = isset($_GET['continue']) ? $_GET['continue'] : FALSE;	// assign a default value if this URL parameter is not available

if (!$tracking_no) {
	http_response_code(400);
	exit();
}

$poslaju = new PosLaju($tracking_no);
$easyparcel = new EasyParcel($tracking_no);
$posmalaysia = new PosMalaysia($tracking_no);

$servers = array($poslaju, $easyparcel, $posmalaysia);

foreach ($servers as $server) {
	$successful = FALSE;

	if (isset($server)) {
		$successful = $server->GetResults();	// this will indicate whether the connection to the server was successful

		if ($successful) {
			$server_name = get_class($server);
			$server_name = str_rot13($server_name);
			$server_name = bin2hex($server_name);
			echo "<!--" . $server_name . "-->";

			if ($server->result_valid)	// this will indicate whether the tracking result is available
				DisplayResult($server->json_array);	// if the tracking result is available, a JSON response will be generated
			else
				echo ERROR_TRACKING;

			if ($continue) continue;	// continue testing the next server. enable this for testing purposes only
			break;	// exit this loop once a server has responded
		}
	}

}

if (!$successful) echo ERROR_SERVER;	// this will indicate that the connection to all servers were unsuccessful

?>