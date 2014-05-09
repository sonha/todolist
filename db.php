<?php
/**
 * Class Db will contain several functions.
 */
class Db {
	
	public $mysql;

    /**
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * This function automatically runs as soon as the object is instantiated.
     */

    /**
     * The __construct() method (class talk for "function") is known as a "magic method".
     * It will run immediately after a class is instantiated.
     * We're going to use this method to make our initial connection to the MySql database.
     */
    function __construct() {
		$this->mysql = new mysqli('localhost', 'root', '', 'db') or die("problem");
	}

    /**
     * Todo: Deletes the necessary row by passing in the row's unique id.
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * Create:
     * Update:
     * @param $id
     * @return string
     * Output: None
     */
    function delete_by_id($id) {
		$query = "DELETE from todo WHERE id = $id";
		$result = $this->mysql->query($query) or die("There was a problem");
		
		if($result) return 'yay!';
	}

    /**
     * Todo: Updates the row by passing in its unique id.
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * Create:9/5/2014
     * Update:
     * @param $id
     * @param $description
     * @return string
     * Output: None
     */
    function update_by_id($id, $description) {
		$query = "UPDATE todo
		         SET description = ?
				 WHERE id = ?
				 LIMIT 1";
				 
		 if($stmt = $this->mysql->prepare($query)) {
		 	$stmt->bind_param('si', $description, $id);
			$stmt->execute();
			return "good job!";
		 }
	}
} // end class


