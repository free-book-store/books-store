<?php

require "./_bootstrap.php";

$categories = Categories::all();

$filter_category = "0";
if (isset($_GET['categories'])) $filter_category = $_GET['categories'];

if ($filter_category == "0") $books = Books::all();
else $books = Books::getByCategory($filter_category);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web-based Books Archive</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>

	<?php include './_navbar.php'; ?>

	<div class="container">

		<div class="row">
            <div class="col-lg-12 text-center">
                <h1>Web-based Books Archive</h1>
                <p class="lead">Search books and any information about it.</p>
            </div>
        </div>

		<hr>

	  	<?php if ($logged_in_user) { ?>

		<label for="categories">Filter by category:</label>
		<form role="form" class="form row" method="GET" action="<?= BASE_URL; ?>">
			<div class="form-group col-md-6">
			    <select id="categories" name="categories" class="form-control">
			    	<option value="0">All</option>
					<?php foreach($categories as $category) { ?>
			    		<option value="<?= $category->id ?>" <?php if ($filter_category == $category->id) echo 'selected'; ?>><?= $category->name ?></option>
			    	<?php } ?>
			    </select>
		  	</div>
			<div class="form-group col-md-6">
				<input class="btn btn-default" type="submit" value="Filter"/>
		  	</div>
	  	</form>

			<table class="table table-bordered">
				<thead class="dark">
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

		<?php } ?>

	</div>

</body>
</html>
