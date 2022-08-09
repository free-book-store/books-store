<?php

$pdo = require '_PDO.php';

class Books 
{

	public static function all()
	{
   		global $pdo;
		$statement = $pdo->prepare("
			SELECT books.*, categories.name as category
			FROM books
			LEFT JOIN categories
			ON books.category_id = categories.id
		");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public static function getByCategory($category_id)
	{
   		global $pdo;
		$statement = $pdo->prepare("
			SELECT books.*, categories.name as category
			FROM books
			LEFT JOIN categories
			ON books.category_id = categories.id
			WHERE categories.id = ?
		");
        $statement->execute([$category_id]);
        return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public static function search($title)
	{
   		global $pdo;
		$statement = $pdo->prepare("
			SELECT books.*, categories.name as category
			FROM books
			LEFT JOIN categories
			ON books.category_id = categories.id
			WHERE books.title LIKE ?
		");
        $statement->execute(["%$title%"]);
        return $statement->fetchAll(PDO::FETCH_CLASS);
	}

}