<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="post" action="http://track.kangaroo.com.my/cgi-bin/track.pl">',
	'<input name="CN_NO" value="' . $tracking_no . '" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>