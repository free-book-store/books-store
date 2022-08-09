<?php 

require "./_bootstrap.php";

unset($_SESSION['user']);
unset($_SESSION['is_admin']);

header('Location:  index.php');
exit();
