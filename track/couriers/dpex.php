<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="get" action="https://ws01.ffdx.net/v4/etrack_blank.aspx">',
	'<input name="cn" value="' . $tracking_no . '" type="hidden">',
	'<input name="stid" value="dpex" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>