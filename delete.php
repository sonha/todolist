<?php

require 'db.php';

/**
 * Author: Son Ha Anh (sonhaanh@vccorp.vn)
 * Just remember, when we create a new instance of this class...
 * we automatically open a connection to our database, thanks to the __construct() magic method.
 */
$db = new Db();
$response = $db->delete_by_id($_GET['id']);
header("Location: index.php");

