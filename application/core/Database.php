<?php

class Database extends PDO {

	public function __construct() {
	
	}

	public function connect($db) {

		$db = $this->prependDB($db);
		if(!(defined($db . '_USER'))) {
		    
		    return null;
		}

		try {
		    $dbh = new PDO('mysql:host=' . DB_HOST . ';dbname=' .  $db, constant($db . '_USER'), constant($db . '_PASSWORD'));
		    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		    $sth = $dbh->prepare(CHAR_ENCODING_SCHEMA);
			$sth->execute();

		    return $dbh;
		}
		catch(PDOException $e) {
		    // echo $e->getMessage();
		    return null;
	    }
	}

	public function createDB($db, $schema) {

		$db = $this->prependDB($db);
		try {
		    $dbh = new PDO('mysql:host=' . DB_HOST . ';', constant($db . '_USER'), constant($db . '_PASSWORD'));
		    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    
		    $schema = str_replace(':db', $db, $schema);

			$sth = $dbh->prepare($schema);
			$sth->execute();
		}
		catch(PDOException $e) {
		    echo $e->getMessage();
	    }
	}

	public function createTable($table, $dbh, $schema) {
	
		$sth = $dbh->prepare($schema);
		$sth->execute();
	}

	public function dropTable($table, $dbh) {
	
		$sth = $dbh->prepare('DROP TABLE IF EXISTS '. $table);
		$sth->execute();
	}

	public function insertData($table, $dbh, $data) {

		// Take list of keys as in schema and data
	    $keys = implode(', ', array_keys($data));
	    // form unnamed placeholders with count number of ? marks
	    $bindValues =  str_repeat('?, ', count($data) - 1) . ' ?';
	    $sth = $dbh->prepare('INSERT INTO ' . $table . ' (' . $keys .') VALUES (' . $bindValues . ')');

		$sth->execute(array_values($data));
	}

	public function deleteDataByID($table, $dbh, $id) {

		// This method deletes a row based on id alone
		
	    $sth = $dbh->prepare('DELETE FROM ' . $table . ' WHERE id = :id');
	    $sth->bindParam(':id', $id);
		$sth->execute();
	}

	public function deleteData($table, $dbh, $data) {

		// This method deletes a row. If data does not exist, now warnings are returned
		
	    $deleteSQL = '';

	    foreach ($data as $key => $value) {

	    	$deleteSQL .= $key . ' = :' . $key . ' AND ';
	    }
	    $deleteSQL = preg_replace('/ AND $/', '', $deleteSQL);

	    $sth = $dbh->prepare('DELETE FROM ' . $table . ' WHERE ' . $deleteSQL);
		$sth->execute($data);
	}

	public function executeQuery($dbh = null, $query = '') {

	    $sth = $dbh->prepare($query);
		$sth->execute();
	}

	public function prependDB($db = DEFAULT_JOURNAL) {

		return $db;
	}

	public function updateFellowData($table, $dbh, $data) {
	
		$id = $data['id'];
		unset($data['id']);

		$sth = $dbh->prepare('UPDATE ' . $table . ' SET 
		name=:name, fname=:fname, lname=:lname, sal=:sal, type=:type, sex=:sex, birth=:birth, degree=:degree, honours=:honours, address=:address, city=:city, state=:state, country=:country, telephone_office=:telephone_office, telephone_residence=:telephone_residence, telephone_mobile=:telephone_mobile, fax=:fax, email=:email, specialization=:specialization, section=:section, yearelected=:yearelected, councilservice=:councilservice, url=:url, death=:death    
		where id=:id');

		$sth->bindParam(':name', $data['name']);
		$sth->bindParam(':fname', $data['fname']);
		$sth->bindParam(':lname', $data['lname']);
		$sth->bindParam(':sal', $data['sal']);
		$sth->bindParam(':type', $data['type']);
		$sth->bindParam(':sex', $data['sex']);
		$sth->bindParam(':birth', $data['birth']);
		$sth->bindParam(':degree', $data['degree']);
		$sth->bindParam(':honours', $data['honours']);
		$sth->bindParam(':address', $data['address']);
		$sth->bindParam(':city', $data['city']);
		$sth->bindParam(':state', $data['state']);
		$sth->bindParam(':country', $data['country']);
		$sth->bindParam(':telephone_office', $data['telephone_office']);
		$sth->bindParam(':telephone_residence', $data['telephone_residence']);
		$sth->bindParam(':telephone_mobile', $data['telephone_mobile']);
		$sth->bindParam(':fax', $data['fax']);
		$sth->bindParam(':email', $data['email']);
		$sth->bindParam(':specialization', $data['specialization']);
		$sth->bindParam(':section', $data['section']);
		$sth->bindParam(':yearelected', $data['yearelected']);
		$sth->bindParam(':councilservice', $data['councilservice']);
		$sth->bindParam(':url', $data['url']);
		$sth->bindParam(':death', $data['death']);

		$sth->bindParam(':id', $id);

		$sth->execute();
			
	}

	public function updateAssociateData($table, $dbh, $data) {
	
		$id = $data['id'];
		unset($data['id']);

		$sth = $dbh->prepare('UPDATE ' . $table . ' SET 
		name=:name, type=:type, sex=:sex, birth=:birth, degree=:degree, honours=:honours, address=:address, city=:city, state=:state, country=:country, telephone_office=:telephone_office, telephone_residence=:telephone_residence, fax=:fax, email=:email, specialization=:specialization, period=:period, url=:url where id=:id');

		$sth->bindParam(':name', $data['name']);
		$sth->bindParam(':type', $data['type']);
		$sth->bindParam(':sex', $data['sex']);
		$sth->bindParam(':birth', $data['birth']);
		$sth->bindParam(':degree', $data['degree']);
		$sth->bindParam(':honours', $data['honours']);
		$sth->bindParam(':address', $data['address']);
		$sth->bindParam(':city', $data['city']);
		$sth->bindParam(':state', $data['state']);
		$sth->bindParam(':country', $data['country']);
		$sth->bindParam(':telephone_office', $data['telephone_office']);
		$sth->bindParam(':telephone_residence', $data['telephone_residence']);
		$sth->bindParam(':fax', $data['fax']);
		$sth->bindParam(':email', $data['email']);
		$sth->bindParam(':specialization', $data['specialization']);
		$sth->bindParam(':period', $data['period']);
		$sth->bindParam(':url', $data['url']);
		$sth->bindParam(':id', $id);

		$sth->execute();
			
	}
		
}

?>
