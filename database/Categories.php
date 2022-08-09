<?php

$pdo = require '_PDO.php';

class Categories 
{

	public static function all()
	{
   		global $pdo;
		$statement = $pdo->prepare("
			SELECT *
			FROM categories
		");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
	}

}