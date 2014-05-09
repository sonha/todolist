<?php
require 'db.php';

/**
 * Author: Son Ha Anh (sonhaanh@vccorp.vn)
 * Just remember, when we create a new instance of this class...
 * we automatically open a connection to our database, thanks to the __construct() magic method.
 */
$db = new Db();
$response = $db->update_by_id($_POST['id'], $_POST['description']);