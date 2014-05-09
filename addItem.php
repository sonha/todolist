<?php

require 'db.php';

/**
 * Author: Son Ha Anh (sonhaanh@vccorp.vn)
 * Just remember, when we create a new instance of this class...
 * we automatically open a connection to our database, thanks to the __construct() magic method.
 */
$db = new Db();

// adds new item

if(isset($_POST['addEntry'])) {
	$query = "INSERT INTO todo VALUES('', ?, ?)";
	
	if($stmt = $db->mysql->prepare($query));
	$stmt->bind_param('ss', $_POST['title'], $_POST['description']);
	$stmt->execute();
	header('location: index.php');
} else die($db->mysql->error);
