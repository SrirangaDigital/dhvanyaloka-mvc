<?php

class data extends Controller {

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
}

?>
