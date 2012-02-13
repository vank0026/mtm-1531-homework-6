<?php

require_once 'includes/filter-wrapper.php';


$errors = array();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$director = filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING);
$release_date = filter_input(INPUT_POST, 'release_date', FILTER_SANITIZE_STRING);

if (empty($id)){
	header('Location: index.php');
	exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (empty($title)){
		$errors['title'] = true;
	}
	
	if (empty($director)){
		$errors['director'] = true;
	}
	if (empty($release_date)){
		$errors['release_date'] = true;
	}
	if (empty($errors)){
		require_once 'includes/db.php';
		
		$sql = $db->prepare('
			UPDATE movielist
			SET title = :title, director = :director, release_date = :release_date
			WHERE id = :id
		');
		$sql->bindValue(':title', $title, PDO::PARAM_STR);
		$sql->bindValue(':director', $director, PDO::PARAM_STR);
		$sql->bindValue(':release_date', $release_date, PDO::PARAM_STR);

		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		
		header('Location: index.php');
		exit;
	}
}else{
	
	require_once 'includes/db.php';
	
	$sql = $db->prepare('
		SELECT id, title, director, release_date 
		FROM movielist 
		WHERE id = :id
		');
	
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		$results = $sql->fetch();
		
		$title = $results['title'];
		$director = $results['director'];
		$release_date = $results['release_date'];
	
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Add A Movie</title>
<link href="css/general.css" rel="stylesheet">

</head>
<body>
<h1>Movie List Browser</h1>

<div class="stuff">
<form method="post" action="edit.php?id=<?php echo $id; ?>">
	<div>
		<label for="title">Film Name:<?php if (isset($errors["title"])) : ?><strong>Required</strong> <?php endif; ?></label>
		<input id="title" name="title" value="<?php echo $title; ?>" required>
	</div>
	<div>
		<label for="director">Director:<?php if (isset($errors["director"])) : ?><strong>Required</strong> <?php endif; ?></label>
		<input id="director" name="director" value="<?php echo $director; ?>" required>
	</div>
	<div>
		<label for="release_date">Released:<?php if (isset($errors["release_date"])) : ?><strong>Required</strong> <?php endif; ?></label>
		<input type="date" id="release_date" name="release_date" value="<?php echo $release_date; ?>" required>
	</div>

	<button type="submit">Save to List</button>
	</form>
</div>
</body>
</html>