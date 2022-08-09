<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require './_config.php';

require './database/Books.php';
require './database/Categories.php';
require './database/Users.php';

session_start();
$logged_in_user = '';
$is_admin = 0;

if (isset($_SESSION['user'])) $logged_in_user = $_SESSION['user'];
if (isset($_SESSION['is_admin'])) $is_admin = $_SESSION['is_admin'];