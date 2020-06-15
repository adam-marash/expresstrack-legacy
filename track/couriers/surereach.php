<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="post" action="https://gold.mxpress2u.net/gold/PublicShipmentTracking.aspx">',
	'<input name="__EVENTTARGET" value="ctl00$Content_Main$Button_Track" type="hidden">',
	'<input name="ctl00$Content_Main$Textbox_CN" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>