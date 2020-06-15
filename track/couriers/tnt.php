<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="get" action="https://www.tnt.com/express/en_my/site/shipping-tools/tracking.html">',
	'<input name="cons" value="' . $tracking_no . '" type="hidden">',
	'<input name="searchType" value="con" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>