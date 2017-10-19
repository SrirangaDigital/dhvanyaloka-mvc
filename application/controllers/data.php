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

	public function process() {

		// stage1.html : Input html from adobe acrobat
		$fileName = PUBLIC_URL . 'html/stage1.html';
		$rawHTML = file_get_contents($fileName);

		// Process html to strip off unwanted tags and elements
		$processedHTML = $this->processRawHTML($rawHTML);

		// stage2.html : Output html for conversion
		$fileName = PHY_PUBLIC_URL . 'html/stage2.html';
		// $processedHTML = html_entity_decode($processedHTML, ENT_QUOTES);
		file_put_contents($fileName, $processedHTML);

		// Convert APS data to Unicode retaining html tags
		$unicodeHTML = $this->parseHTML($processedHTML);

		// stage3.html : Output Unicode html with tags, english retained as it is
		$fileName = PHY_PUBLIC_URL . 'html/stage3.html';
		file_put_contents($fileName, $unicodeHTML);
	}

	public function parseHTML($html) {

		$dom = new DOMDocument("1.0");
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;

		$dom->loadXML($html);
		$xpath = new DOMXpath($dom);

		foreach($xpath->query('//text()') as $text_node) {

			if(preg_replace('/\s+/', '', $text_node->nodeValue) === '') continue; 

			if($text_node->parentNode->hasAttribute('class'))
				if($text_node->parentNode->getAttribute('class') == 'en')
					 continue;

			$text_node->nodeValue = $this->APS2Unicode($text_node->nodeValue);
		}

		return $dom->saveXML();
	}

	public function processRawHTML($text) {

		$text = preg_replace('/<!--.*/', "", $text);
		$text = preg_replace('/<BODY.*>/', "<BODY>", $text);

		$text = str_replace("\n", "", $text);
		$text = str_replace("\r", "", $text);

		$text = str_replace('<', "\n<", $text);
		$text = str_replace('>', ">\n", $text);
		$text = preg_replace('/<!--.*/', "", $text);


		$text = str_replace('font-weight:normal', "", $text);
		$text = preg_replace('/text-align:.+?\b/', "", $text);
		$text = preg_replace('/color:#[0-9A-F]+/', "", $text);
		$text = preg_replace('/margin-.+?\b:.+?\b/', "", $text);
		$text = preg_replace('/line-height:.+?\b/', "", $text);
		$text = preg_replace('/text-indent:[\-]*.+?\b/', "", $text);
		$text = preg_replace('/list-style-type:.+?\b/', "", $text);
		$text = preg_replace('/font-size:[0-9\.]+?pt\b/', "", $text);
		$text = preg_replace('/<SPAN .*(Times|serif).*>/', '<SPAN class="en">', $text);
		$text = preg_replace("/\n<IMG.*/", "", $text);

		$text = str_replace("; ", ";", $text);
		$text = preg_replace("/;+/", ";", $text);
		$text = str_replace(' style=";', ' style="', $text);
		$text = str_replace(' style=";"', '', $text);
		$text = str_replace(' style=" "', '', $text);
		$text = str_replace(' style=""', '', $text);

		$text = preg_replace("/\n+/", "\n", $text);

		$text = preg_replace("/(<SPAN.*)\n/", "$1", $text);
		$text = preg_replace("/\n(<SPAN.*)/", "$1", $text);
		$text = str_replace("\n</SPAN>", "</SPAN>", $text);

		$text = str_replace("<Sup>\n", "<Sup>", $text);
		$text = str_replace("\n</Sup>", "</Sup>", $text);

		$text = str_replace("<Sub>\n", "<Sub>", $text);
		$text = str_replace("\n</Sub>", "</Sub>", $text);

		$text = str_replace("\n</P>", "</P>", $text);
		$text = str_replace("\n</LI>", "</LI>", $text);
		$text = str_replace("\n</DT>", "</DT>", $text);
		$text = str_replace("\n</DD>", "</DD>", $text);
		$text = preg_replace("/\n(<\/H\d>)/", "$1", $text);
		$text = str_replace("\n ", " ", $text);

		$text = str_replace("<SPAN", "\n<SPAN", $text);
		$text = str_replace("</SPAN>", "</SPAN>\n", $text);
		$text = preg_replace("/\n<SPAN>(.*)<\/SPAN>\n/", "$1", $text);
		$text = preg_replace("/\n(<SPAN.*<\/SPAN>)\n/", "$1", $text);

		$text = str_replace("\n<SPAN", "<SPAN", $text);
		$text = str_replace("</SPAN>\n", "</SPAN>", $text);

		$text = str_replace("\n<Sup>", "<Sup>", $text);
		$text = str_replace("</Sup>\n", "</Sup>", $text);

		$text = str_replace("\n<Sub>", "<Sub>", $text);
		$text = str_replace("</Sub>\n", "</Sub>", $text);

		$text = str_replace("<DIV", "<SECTION", $text);
		$text = str_replace("</DIV>", "</SECTION>", $text);

		return $text;
	}

	public function APS2Unicode($text) {

		return 'Hello';
	}
}

?>
