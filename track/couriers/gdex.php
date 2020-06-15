<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="post" action="http://web2.gdexpress.com/official/iframe/etracking_v2.php">',
	'<input name="Submit" value="Track" type="hidden">',
	'<input name="capture" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>