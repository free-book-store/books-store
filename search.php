<?php 

require "./_bootstrap.php";

if (!$logged_in_user) {
	header('Location:  index.php');
	exit();
}

$title = "";
if (isset($_GET['title'])) $title = $_GET['title'];

$books = Books::search($title);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Books</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
	
	<?php include './_navbar.php'; ?>

	<div class="container">

		<h1>Search</h1>
		<p>Search matching "<?= $title ?>" returned <strong><?= count($books) ?> results.</strong></p>

		<hr>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Title</th>
					<th>Category</th>
					<th>Author</th>
					<th>Subject</th>
					<th>Date Published</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($books as $book) { ?>
				<tr>
					<td><?= $book->title ?></td>
					<td><?= $book->category ?></td>
					<td><?= $book->author ?></td>
					<td><?= $book->subject ?></td>
					<td><?= $book->date_published ?></td>
				</tr>
				<?php } ?>
			</thead>
		</table>
	</div>

</body>
</html>
