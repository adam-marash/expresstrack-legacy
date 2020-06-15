<?php
defined('_JEXEC') or die('Restricted access');

echo
'<form id="track" method="post" action="http://etrace.9625taqbin.com/gli_trace/GDXTX010S10Action_doSearch.action">',
	'<input name="CHAR_SET" value="3f572693955bb3ff" type="hidden">',
	'<input name="action%3AGDXTX010S10Action_doSearch" value="Track" type="hidden">',
	'<input name="jvCd" value="42dec70a4f25166d" type="hidden">',
	'<input name="sCharSetCsv" value="3f572693955bb3ff" type="hidden">',
	'<input name="sCountryCd" value="0968983fa1feb763" type="hidden">',
	'<input name="sDefCharSet" value="3f572693955bb3ff" type="hidden">',
	'<input name="sLanguageMode" value="0" type="hidden">',
	'<input name="sSelectedLanguage" value="73f9a3a3f2cf56bc" type="hidden">',
	'<input name="sTimeDifference" value="671cb6bcdedd72c7" type="hidden">',
	'<input name="tTrackingNoInputVal1" value="' . $tracking_no . '" type="hidden">',
	'<input name="tTrackingNoInputVal2" type="hidden">',
	'<input name="tTrackingNoInputVal3" type="hidden">',
	'<input name="tTrackingNoInputVal4" type="hidden">',
	'<input name="tTrackingNoInputVal5" type="hidden">',
	'<input name="tTrackingNoInputVal6" type="hidden">',
	'<input name="tTrackingNoInputVal7" type="hidden">',
	'<input name="tTrackingNoInputVal8" type="hidden">',
	'<input name="tTrackingNoInputVal9" type="hidden">',
	'<input name="tTrackingNoInputVal10" type="hidden">',
'</form>';

echo
'<script>',
	'window.onload = document.getElementById("track").submit();',
'</script>';
?>