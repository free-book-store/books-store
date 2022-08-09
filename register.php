<?php 

require "./_bootstrap.php";

if ($logged_in_user) {
	header('Location:  index.php');
	exit();
}

$has_register_user = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$has_register_user = Users::insert($name, $password, $email);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
	
	<?php include './_navbar.php'; ?>

	<div class="container">

		<div class="row">
			<div class="col-md-6">
				<h1>Register</h1>
				<hr>

				<?php if ($has_register_user) { ?>
					<div class="alert alert-success" role="alert">
						Your registration application has been submitted. Please wait for the admin approval.
					</div>
				<?php } ?>
			</div>

		</div>
		<div class="row">

			<form role="form" class="col-md-6" method="POST" action="register.php">
			  	<div class="form-group">
			    	<label for="name">Username</label>
			    	<input type="text" class="form-control" name="name" required>
			  	</div>
			  	<div class="form-group">
			    	<label for="password">Password</label>
			    	<input type="password" class="form-control" name="password" required>
			  	</div>
			  	<div class="form-group">
			    	<label for="email">Email Address</label>
			    	<input type="email" class="form-control" name="email" required>
			  	</div>
	  			<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>

	</div>
</body>
</html>
