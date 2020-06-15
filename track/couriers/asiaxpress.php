<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="get" action="http://www.asiaxpress.net.my/tracking/PubConsignmentTracking.aspx">',
	'<input name="awb" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>