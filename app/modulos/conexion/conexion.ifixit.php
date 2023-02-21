<?php

class ConexionIfixit
{

	static public function conectar()
	{

		$db_name = strtolower($_SESSION['db_name']);
		$user_name = strtolower($_SESSION['user_name']);
		$password_db = $_SESSION['password_db'];

		//cPHEYt5nxfW3
		//  $link = new PDO("mysql:host=localhost;dbname=u203735599_soft",
		//     "u203735599_soft",
		//              "1Q8jeQzVtmVULd5dpX");
		$link = new PDO(
			"mysql:host=" . DB_HOST . ";dbname=" . $db_name,
			$user_name,
			$password_db
		);

		$link->exec("set names utf8");

		return $link;
	}
	static public function conectarSucOrigen($db_name, $user_name, $password_db)
	{

		//cPHEYt5nxfW3
		//  $link = new PDO("mysql:host=localhost;dbname=u203735599_soft",
		//     "u203735599_soft",
		//              "1Q8jeQzVtmVULd5dpX");
		$link = new PDO(
			"mysql:host=" . DB_HOST . ";dbname=" . strtolower($db_name),
			strtolower($user_name),
			$password_db
		);

		$link->exec("set names utf8");

		return $link;
	}
	static public function conectarSucDestino($db_name, $user_name, $password_db)
	{

		//cPHEYt5nxfW3
		//  $link = new PDO("mysql:host=localhost;dbname=u203735599_soft",
		//     "u203735599_soft",
		//              "1Q8jeQzVtmVULd5dpX");
		$link = new PDO(
			"mysql:host=" . DB_HOST . ";dbname=" . strtolower($db_name),
			strtolower($user_name),
			$password_db
		);

		$link->exec("set names utf8");

		return $link;
	}

	static public function conectarSoporte($db_name, $user_name, $password_db)
	{

		
		$link = new PDO(
			"mysql:host=" . DB_HOST . ";dbname=" . strtolower($db_name),
			strtolower($user_name),
			$password_db
		);

		$link->exec("set names utf8");

		return $link;
	}
}
