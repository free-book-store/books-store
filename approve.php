<?php 

require "./_bootstrap.php";

if (!$logged_in_user || !$is_admin) {
	header('Location:  index.php');
	exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$approve = $_POST['approve'];
	Users::approveUser($approve);
}

$users = Users::getMembersToApprove();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Approve Users</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
	
	<?php include './_navbar.php'; ?>

	<div class="container">

		<h1>Approve Users</h1>
		
		<hr>

		<form role="form" method="POST" action="approve.php">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user) { ?>
					<tr>
						<td><?= $user->name ?></td>
						<td><?= $user->email ?></td>
						<td>
							<input type="hidden" value="<?= $user->id ?>" name="approve">
							<input type="submit" value="Approve" class="btn btn-default btn-xs">
						</td>
					</tr>
					<?php } ?>
				</thead>
			</table>
		</form>
	</div>

</body>
</html>
