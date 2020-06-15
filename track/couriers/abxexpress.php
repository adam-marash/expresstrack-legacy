<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="post" action="http://www.abxexpress.com.my/track_b.asp?search=True">',
	'<input name="itemHAWB" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>