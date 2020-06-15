<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="post" action="http://www.nationwide2u.com/cgi-bin/trackbe.cfm">',
	'<input name="CNNO" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>