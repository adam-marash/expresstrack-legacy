<?php
defined('_JEXEC') or die('Restricted access');

/*
echo
'<form id="track" method="get" action="http://www.dhl.com.my/content/my/en/express/tracking.shtml">',
	'<input name="AWB" value="' . $tracking_no . '" type="hidden">',
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