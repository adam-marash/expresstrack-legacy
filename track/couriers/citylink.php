<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="post" action="http://www.citylinkexpress.com/shipmentTrack/index.php">',
	'<input name="type" value="consignment" type="hidden">',
	'<input name="no" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>