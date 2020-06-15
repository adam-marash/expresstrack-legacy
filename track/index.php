<?php
error_reporting(0);	// turn off all error reporting

define("_JEXEC", 1);

require_once('security/cors.php');
require_once('security/token.php');
require_once('couriers/couriers.php');

if ( isset($_GET['key']) ) {
	echo GenerateToken();
	exit();
}

if (!VerifyToken()) {
	//http_response_code(403);
	//exit();
}

$courier = $_GET['courier'];
$tracking_no = $_GET['tracking_no'];

//setcookie('tracking_no', $tracking_no, strtotime('+30 days'), '/');	// cookie set to expire in 30 days and available to entire domain

switch ($courier) {
	case COURIER_POSLAJU:
		require_once('couriers/poslaju.php');
		break;
	case COURIER_POSEKSPRESS:
		require_once('couriers/poslaju.php');
		break;
	case COURIER_SKYNET:
		require_once('couriers/skynet.php');
		break;
	case COURIER_CITYLINK:
		require_once('couriers/citylink.php');
		break;
	case COURIER_NATIONWIDE:
		require_once('couriers/nationwide.php');
		break;
	case COURIER_GDEX:
		require_once('couriers/gdex.php');
		break;
	case COURIER_KANGAROO:
		require_once('couriers/kangaroo.php');
		break;
	case COURIER_ABXEXPRESS:
		require_once('couriers/abxexpress.php');
		break;
	case COURIER_AIRPAK:
		require_once('couriers/airpak.php');
		break;
	case COURIER_TAQBIN:
		require_once('couriers/taqbin.php');
		break;
	case COURIER_SUREREACH:
		require_once('couriers/surereach.php');
		break;
	case COURIER_ASIAXPRESS:
		require_once('couriers/asiaxpress.php');
		break;
	case COURIER_DPEX:
		require_once('couriers/dpex.php');
		break;
	case COURIER_FEDEX:
		require_once('couriers/fedex.php');
		break;
	case COURIER_DHL:
		require_once('couriers/dhl.php');
		break;
	case COURIER_UPS:
		require_once('couriers/ups.php');
		break;
	case COURIER_TNT:
		require_once('couriers/tnt.php');
		break;
	case COURIER_ARAMEX:
		require_once('couriers/aramex.php');
		break;
	default:
		http_response_code(400);
}
?>