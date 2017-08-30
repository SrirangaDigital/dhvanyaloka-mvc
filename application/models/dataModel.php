<?php

class dataModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function getMetadaData() {

		$fileName = XML_SRC_URL . 'books.xml';

		if (!(file_exists(PHY_XML_SRC_URL . 'books.xml'))) {
		
			return False;
		}

		$xml = simplexml_load_file($fileName);

		$metaData = array();
		$booksList = array();

		foreach ($xml->book as $book) {

			foreach ($book->s1 as $s1Level) {
		
				$booksList['book_id'] = (string) $book['code'];
				$booksList['btitle'] = (string) $book['btitle'];
				$booksList['level'] = 1;
				$booksList['title'] = (string) $s1Level['title'];
				$booksList['page'] = (string) $s1Level['page'];
				
				array_push($metaData, $booksList);
				$booksList = array();


				if(isset($s1Level->s2)){
					foreach ($s1Level->s2 as $s2Level) {

						$booksList['book_id'] = (string) $book['code'];
						$booksList['btitle'] = (string) $book['btitle'];
						$booksList['level'] = 2;
						$booksList['title'] = (string) $s2Level['title'];
						$booksList['page'] = (string) $s2Level['page'];

						array_push($metaData, $booksList);
						$booksList = array();
					}
				}
			}			
		}

		return $metaData;
	}
}

?>
