<?php

	// All date and time columns shall be INT UNSIGNED NOT NULL, and shall store a Unix timestamp in UTC.
	//if ($_SERVER['HTTP_HOST'] == 'localhost') {
		$host = 'localhost';
		$dbname = 'statwatch';
		$user = 'root';
		$pass = '';
	//} else {
		
	//}
	try {	
		$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}

	// set error mode
	$errorMode = 'ERRMODE_SILENT';
	$errorMode = 'ERRMODE_WARNING';
	$errorMode = 'ERRMODE_EXCEPTION';
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	
	// fetch_assoc
	/*
	$query = $db->query('SELECT name, addr, city from folks');
	$query->setFetchMode(PDO::FETCH_ASSOC);
	while ($row = $db->fetch()) {
		echo $row['name'];
		echo $row['addr'];
		echo $row['city'];
	}
	*/
	
	// basic insert
	/*
	$query->bindParam(1, $name); $query->bindParam(':name', $name);
	$query->bindParam(2, $addr); $query->bindParam(':addr', $addr);
	$query->bindParam(3, $city); $query->bindParam(':city', $city);
	
	$query = $db->prepare("INSERT INTO folks ( name, addr, city ) values ( ?, ?, ? )");
	$data = array('Cathy', '1 Wicked Way', 'Arlington Heights');
	$query->execute($data);
	
	$data = array('Daniel', '9 Dark and Twisty Road', 'Cardiff');
	$query->execute($data);
	//^^^ shortcut
	$data = array( 'name' => 'Cathy', 'addr' => '9 Dark and Twisting Road', 'city' => 'Arlington Heights');
	$query = $db->prepare("INSERT INTO folks (name, addr, city) values (:name, :addr, :city)");
	$query->execute($data);
	*/
	 
	
	// close connection
	// $db = null;