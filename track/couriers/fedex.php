<?php
defined('_JEXEC') or die('Restricted access');

/*
echo
'<form id="track" method="get" action="https://www.fedex.com/apps/fedextrack/?">',
	'<input name="action" value="track" type="hidden">',
	'<input name="cntry_code" value="my" type="hidden">',
	'<input name="trackingnumber" value="' . $tracking_no . '" type="hidden">',
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