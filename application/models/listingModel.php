<?php

class listingModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function listBooks() {
		
		$db = DB_NAME;
		
		$dbh = $this->db->connect($db);
		if(is_null($dbh))return null;
		
		// Issues which are actually Online resources are not included here
		$sth = $dbh->prepare('SELECT DISTINCT book_id, btitle FROM ' . METADATA_TABLE . ' ORDER BY book_id');
		
		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$details['book_id'] = $result->book_id; 
			$details['btitle'] = $result->btitle;
			array_push($data, $details);
		}

		$dbh = null;
		return $data;
	}	

	public function listToc($book_id) {
		
		$db = DB_NAME;
		
		$dbh = $this->db->connect($db);
		if(is_null($dbh))return null;
		
		// Issues which are actually Online resources are not included here
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE . ' WHERE book_id=:book_id');
		$sth->bindParam(':book_id', $book_id);

		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$details['book_id'] = $result->book_id; 
			$details['btitle'] = $result->btitle;
			$details['level'] = $result->level;
			$details['title'] = $result->title;
			$details['author'] = $result->author;
			$details['page'] = $result->page;
			array_push($data, $details);
		}

		$dbh = null;
		return $data;
	}

	public function listTitles($author) {
		
		$db = DB_NAME;
		
		$dbh = $this->db->connect($db);
		if(is_null($dbh))return null;
		
		// Issues which are actually Online resources are not included here
		$sth = $dbh->prepare('SELECT * FROM ' . METADATA_TABLE . ' WHERE author REGEXP :author ORDER BY book_id');
		$sth->bindParam(':author', $author);

		$sth->execute();

		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ))
		{
			$details['book_id'] = $result->book_id; 
			$details['btitle'] = $result->btitle;
			$details['level'] = $result->level;
			$details['title'] = $result->title;
			$details['author'] = $result->author;
			$details['page'] = $result->page;
			array_push($data, $details);
		}

		$dbh = null;
		return $data;
	}
}

?>
