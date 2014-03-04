<?php
	require('app/db.php');
	if ($_POST['method'] == 'add'){		
		if (!empty($_POST['siteID']) && !empty($_POST['profitCenter']) && !empty($_POST['serviceID']) ) {					
			$query = $db->prepare("INSERT INTO customservices (siteID, profitCenter, serviceID) values (:siteID, :profitCenter, :serviceID)");
			$query->bindParam(':siteID', $_POST['siteID']);
			$query->bindParam(':profitCenter', $_POST['profitCenter']);
			$query->bindParam(':serviceID', $_POST['serviceID']);
			$query->execute();			
		}	
	} else if ($_POST['method'] == 'delete') {
		if (!empty($_POST['siteID']) && !empty($_POST['profitCenter']) && !empty($_POST['serviceID']) ) {					
			$query = $db->prepare("DELETE FROM customservices WHERE siteID = :siteID AND profitCenter = :profitCenter AND serviceID = :serviceID");
			$query->bindParam(':siteID', $_POST['siteID']);
			$query->bindParam(':profitCenter', $_POST['profitCenter']);
			$query->bindParam(':serviceID', $_POST['serviceID']);
			$query->execute();
		}
	}

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
	 