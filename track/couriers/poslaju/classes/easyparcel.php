<?php

class EasyParcel
{
	public $connected = FALSE, $result_valid = FALSE, $json_array;
	private $tracking_no, $html, $tracking_result;

	function __construct($tracking_no) {
		$this->tracking_no = $tracking_no;	// assign $tracking_no to the instance of this class
	}

	private function Debug() {
		$this->connected = TRUE;	// indicate to the instance of this class that the CURL session was successful
		$this->html = file_get_contents("examples/easyparcel_valid.html");
		//$this->html = file_get_contents("examples/easyparcel_invalid.html");
	}

	private function Connect() {
		$config = EasyParcelConfig($this->tracking_no);	// setup the options used to initialize the CURL session
		$curl = InitializeCurl($config);	// connect to the target server using CURL and wait for response

		if ($curl['response'] and $curl['http_code'] == 200) {	// if CURL session is successful
			$this->connected = TRUE;	// indicate to the instance of this class that the CURL session was successful
			$this->html = $curl['response'];	// assign HTML response from CURL session to the instance of this class
		}
	}

	private function Validate() {

		if ($this->connected) {
			$query = "//ul[@class='statuspoints__list']";	// query used to search for a specific element in the HTML response
			$node = GetNodesXPath($this->html, $query);	// initiate the search on the HTML response using the query

			if ($node->length) {	// if element is found in the HTML response
				$this->result_valid = TRUE;	// indicate to the instance of this class that the tracking result is available
				$this->tracking_result = GetElementHTML($node->item(0));	// convert the element found to HTML
			}
		}

	}

	private function Process() {

		if ($this->result_valid) {
			$json_array = array();	// create an empty array to collect and encode the tracking result in JSON format

			$query = "//ul[@class='statuspoints__list']/li[@class='statuspoint']";	// query used to search for records in the tracking result
			$records = GetNodesXPath($this->tracking_result, $query);	// initiate the search on the tracking result using the query

			foreach ($records as $index => $record) {	// for each record (or list item) found
				$record_html = GetElementHTML($record);	// convert the record (or element) found to HTML

				$query = "//div[@class='statuspoint__time']";	// query used to search for an item in each record
				$date_time = GetNodesXPath($record_html, $query);	// initiate the search on each record using the query
				$date_time = $date_time->item(0)->nodeValue;	// represents the date and time of a tracking result in each record
				$date_time = FormatDateTime($date_time);	// return a new date and time format

				$query = "//div[@class='statuspoint__content']/strong/text()";	// query used to search for an item in each record
				$status = GetNodesXPath($record_html, $query);	// initiate the search on each record using the query
				$status = $status->item(0)->nodeValue;	// represents the status of a tracking result in each record

				$query = "//div[@class='statuspoint__content']/div";	// query used to search for an item in each record
				$location = GetNodesXPath($record_html, $query);	// initiate the search on each record using the query
				$location = $location->item(0)->nodeValue;	// represents the location of a tracking result in each record

				$json_object = array($index => array("date_time" => $date_time, "status" => $status, "location" => $location));			// create an array object to store all values found in each record
				$json_array = array_merge($json_array, $json_object);			// append the $json_object to the end of the $json_array and continue with the next record
			}

			usort($json_array, "SortByDate");	// sort the $json_array by date
			$this->json_array = $json_array;	// return the JSON response to the instance of this class once the tracking result has been processed
		}

	}

	public function GetResults() {
		//self::Debug();	// disable self::Connect() in the line below if self::Debug() is enabled
		self::Connect();	// establish a connection to the target server using CURL
		self::Validate();	// check if the tracking result is available
		self::Process();	// process and format the tracking result in JSON format

		return $this->connected;	// if the connection is not successful, it will return false by default to the instance of this class
	}
}

?>