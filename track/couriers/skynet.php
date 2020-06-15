<?php
defined('_JEXEC') or die('Restricted access');

define("SYSTEM_ERROR", '<p id="status">System is not available. Please try again later.</p>');
define("TRACKING_ERROR", '<p id="status">Tracking information is not available. Please ensure that the tracking number is correct or try again later.</p>');

define("HTTP_GET", "GET");
define("HTTP_POST", "POST");

function GetHTML($url, $parameters, $type) {
	$html = FALSE;

	if ($type == HTTP_GET)
		$url .= http_build_query($parameters);

	$curl_config = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_SSL_VERIFYPEER => FALSE
	);

	if ($type == HTTP_POST) {

		$post_config = array(
			CURLOPT_POST => TRUE,
			CURLOPT_POSTFIELDS => $parameters
		);

		$curl_config += $post_config;
	}

	$curl = curl_init();
	curl_setopt_array($curl, $curl_config);
	$html = curl_exec($curl);
	curl_close($curl);

	return $html;
}

function SimulateSkynet($tracking_no) {
  $html = GetHTML("http://track.skynetexpressict.com", array('x' => '1', 'y' => '4', 'hawbNoList' => $tracking_no), HTTP_POST);

  if($html != FALSE) {

    $dom = new DOMDocument();
    $dom->loadHTML($html);

    $xpath = new DOMXpath($dom);
    $rows = $xpath->query('//table[@width="100%" and @cellspacing="2" and @cellpadding="1" and @bgcolor="#AECBF1"]/tr');

  	  if ($rows->length > 0) {
  	  	echo "<table>";
  	  	echo "<thead><tr>" .
  	  		"<th><strong>Date</strong></th>" .
					"<th><strong>Status</strong></th>" .
					"<th><strong>Time</strong></th>" .
					"<th><strong>Location</strong></th>" .
					"</tr></thead>";

		  foreach ($rows as $row) {
			  $columns = $row->getElementsByTagName('td');
	
			  echo "<tr>";
	
			  foreach ($columns as $column) {
				  if (IsDate($column->nodeValue) == FALSE AND strstr($column->nodeValue, "Time") == FALSE AND strstr($column->nodeValue, "Location") == FALSE)
				      echo "<td>" . $column->nodeValue . "</td>";
				  else
				      echo '<td style="background-color: #e5f3ff;">' . $column->nodeValue . "</td>";
			  }
	
			  echo "<tr/>";
		  }
	
		  echo "</table>";
	  } else
	  	echo TRACKING_ERROR;
  } else
    echo SYSTEM_ERROR;

}

function IsDate($date) {
  return DateTime::createFromFormat('D, d M Y', $date);
}

SimulateSkynet($tracking_no);

?>