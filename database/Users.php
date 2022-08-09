<?php

$pdo = require '_PDO.php';

class Users
{

	public static function insert($name, $password, $email, $is_admin = 0, $is_approved = 0)
	{
   		global $pdo;
		$statement = $pdo->prepare("
			INSERT INTO users(
				name, password, email, is_admin, is_approved
			) VALUES (
				:name, :password, :email, :is_admin, :is_approved
			)
		");
		if ($is_admin == 1) $is_approved = 1;
        $statement->execute([
        	':name' => $name, 
        	':password' => md5($password), 
        	':email' => $email, 
        	':is_admin' => $is_admin,
        	':is_approved' => $is_approved
        ]);
        return $pdo->lastInsertId('id');
	}

	public static function getByNamePassword($name, $password)
	{
   		global $pdo;
		$statement = $pdo->prepare("
			SELECT *
			FROM users
			WHERE name = ?
			AND password = ?
		");
        $statement->execute([$name, md5($password)]);
        return $statement->fetch(PDO::FETCH_OBJ);
	}

	public static function getMembersToApprove()
	{
   		global $pdo;
		$statement = $pdo->prepare("
			SELECT *
			FROM users
			WHERE is_approved = 0
		");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public static function approveUser($id)
	{
   		global $pdo;
		$statement = $pdo->prepare("
			UPDATE users 
			SET is_approved = 1
			WHERE id = ? 
		");
        $statement->execute([$id]);
        return $statement->fetchAll(PDO::FETCH_CLASS);
	}

}