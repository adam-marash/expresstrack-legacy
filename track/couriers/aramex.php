<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="get" action="http://www.aramex.com/track-results-multiple.aspx">',
	'<input name="ShipmentNumber" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>