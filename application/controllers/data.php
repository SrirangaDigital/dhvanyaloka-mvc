<?php

class data extends Controller {

	public $i = 0;
	public function __construct() {
		
		parent::__construct();
	}

	public function index($cms = 'journal') {

	}

	public function insertMetadata() {

		$db = DB_NAME;

		$metaData = $this->model->getMetadaData();

		if ($metaData) {

			$this->model->db->createDB($db,JOURNAL_DB_SCHEMA);

			$dbh = $this->model->db->connect($db);
			
			$this->model->db->dropTable(METADATA_TABLE, $dbh);

			$this->model->db->createTable(METADATA_TABLE, $dbh, METADATA_TABLE_SCHEMA);

			foreach ($metaData as $row) {
	
				$this->model->db->insertData(METADATA_TABLE, $dbh, $row);
			}
		}
		else{

			$this->view('error/blah');
		}
	}

	public function parseHTML() {


		$fileName = PUBLIC_URL . 'html/test.html';
		$xml = simplexml_load_file($fileName);

		$dom = dom_import_simplexml($xml);

		$counter = 1;
		$xpath = new DOMXpath($dom->ownerDocument);
		foreach($xpath->query('//text()') as $text_node) {

		    if(preg_replace('/\s+/', '', $text_node->nodeValue)) $text_node->nodeValue = $this->APS2Unicode($text_node->nodeValue);
		}

		// $this->recurseXML($xml);

		var_dump($xml->asXML());
	}

	public function recurseXML($xml) {

		$childCount = $xml->count();
		$ifStringExists = preg_replace('/\s+/', '', $xml->__toString());

		if($childCount > 0) {

			if($ifStringExists) {

				// Compound: Both text and elements are present
				
				$dom = dom_import_simplexml($xml);

				$counter = 1;
				$xpath = new DOMXpath($dom->ownerDocument);
				foreach($xpath->query('//text()') as $text_node) {

					// var_dump($text_node);
				    $text_node->nodeValue = $this->APS2Unicode($text_node->nodeValue);
				}

				// echo $sx->asXML();

				foreach ($xml as $key => $child) {

					$this->recurseXML($child);
				}
				// $xml[0] = $this->APS2Unicode($xml->__toString());
			}	
			else{

				// Recursive: only elements found
				foreach ($xml as $key => $child) {

					$this->recurseXML($child);
				}
			}
		}
		else {

			// Only text found
			$xml[0] = $this->APS2Unicode($xml->__toString());
		}
	}

	public function APS2Unicode($text) {

		return 'Hello';
	}
}

?>
