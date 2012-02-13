<?php

require_once 'includes/db.php';
//	exect() allows us to perform SQL and not expect a result
//	the query thing allows us to perform SQL the database, and get something back
$results = $db->query('
	SELECT id, title, director, release_date 
	FROM movielist 
	ORDER BY title ASC');
		// the tabs above are for easier usage, not needed for funcitonality
?>		

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Movie List Browser</title>
<link href="css/general.css" rel="stylesheet">
</head>

<body>
<h1>Movie List Browser</h1>
<div class="stuff">

	<a href="add.php">Add a Movie</a>

	<ul>	
		<?php
			foreach ($results as $film) :?>
			<li>
			<a href="single.php?id=<?php echo $film['id']; ?>"><?php echo $film['title']; ?></a>
			---
   			<a href="edit.php?id=<?php echo $film['id']; ?>">Edit</a>
			<a href="delete.php?id=<?php echo $film['id']; ?>">Delete</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

</body>
</html>