<?php
defined('_JEXEC') or die('Restricted access');

/*
echo
'<form id="track" method="post" action="http://wwwapps.ups.com/WebTracking/track">',
	'<input name="track.x" value="Track" type="hidden">',
	'<input name="trackNums" value="' . $tracking_no . '" type="hidden">',
'</form>';
*/
/*
echo
'<form id="track" method="get" action="https://www.theupsstore.com/tools/track-a-package">',
	'<input name="t" value="' . $tracking_no . '" type="hidden">',
'</form>';
*/
echo
'<form id="track" method="post" action="https://iship.com/trackit/track.aspx">',
	'<input name="Track" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>