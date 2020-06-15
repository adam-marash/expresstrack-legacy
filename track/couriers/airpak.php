<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="post" action="https://ws01.ffdx.net/v4/etrack_blank.aspx">',
	'<input name="stid" value="airpak" type="hidden">',
	'<input name="cn" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>