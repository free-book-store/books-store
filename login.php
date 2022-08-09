<?php 

require "./_bootstrap.php";

if ($logged_in_user) {
	header('Location:  index.php');
	exit();
}

$is_login_incorrect = false;
$is_not_yet_approved = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$password = $_POST['password'];
	if ($user = Users::getByNamePassword($name, $password)) {
		if ($user->is_approved) {
			$_SESSION['user'] = $name;
			$_SESSION['is_admin'] = $user->is_admin;
			header('Location:  index.php');
			exit();
		} else {
			$is_not_yet_approved = true;
		}
	} else {
		$is_login_incorrect = true;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
	
	<?php include './_navbar.php'; ?>

	<div class="container">

		<div class="row">
			<div class="col-md-6">
				<h1>Login</h1>
				<hr>

				<?php if ($is_login_incorrect) { ?>
					<div class="alert alert-danger" role="alert">
						Incorrect username or password.
					</div>
				<?php } else if ($is_not_yet_approved) { ?>
					<div class="alert alert-danger" role="alert">
						Your registration has not yet been approved.
					</div>
				<?php } ?>
			</div>

		</div>
		<div class="row">

			<form role="form" class="col-md-6" method="POST" action="login.php">
			  	<div class="form-group">
			    	<label for="name">Username</label>
			    	<input type="text" class="form-control" name="name" required>
			  	</div>
			  	<div class="form-group">
			    	<label for="password">Password</label>
			    	<input type="password" class="form-control" name="password" required>
			  	</div>
	  			<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>

	</div>
</body>
</html>
