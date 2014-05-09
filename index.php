<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>To Do List - SơnHA</title>
		<link rel="stylesheet" href="css/default.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
		<!--[if lt IE 7]>
			<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
			<link rel="stylesheet" href="css/ie.css" />
		<![endif]-->
	</head>
	<body>
	<div id="container">
		<h1>My To-Do List</h1>
		<ul id="tabs">
			<li id="todo_tab" class="selected"><a href="#">To-Do</a></li>
		</ul>
		<div id="main">
			<div id="todo">
				<?php
				require 'db.php';
				$db = new Db();
				$query = "SELECT * FROM todo ORDER BY id asc";
				$results = $db->mysql->query($query);
				
				if($results->num_rows) {
					while($row = $results->fetch_object()) {
						$title = $row->title;
						$description = $row->description;
						$id = $row->id;
						
				echo '<div class="item">';
				
				$data = <<<EOD
                        <h4>$title</h4>
                        <p>$description</p>
                        <input type="hidden" name="id" id="id" value="$id" />

                        <div class="options">
                        	<a class="deleteEntryAnchor" href="delete.php?id=$id">D</a>
                        	<a class="editEntry" href="#">E</a>
                        </div>
EOD;
						echo $data;
						echo '</div>';
					} // end while
				}
				else {
					echo "<p>There are zero items. Add one now! </p>";
				}	
				?>
			</div><!--end todo-->
			
			<div id="addNewEntry">
				<h2>Add New Entry</h2>
				<form action="addItem.php" method="post">
					<p>
						<label for="title"> Title</label>
						<input type="text" name="title" id="title" class="input"/>
					</p>
				
					<p>
						<label for="description"> Description</label>
						<textarea name="description" id="description" rows="10" cols="35"></textarea>
					</p>	
					
					<p>
						<input type="submit" name="addEntry" id="addEntry" value="Add New Entry" />
					</p>
				</form>
			</div><!--end addNewEntry-->
		</div><!--end main-->
	</div><!--end container-->
	</body>
</html>
