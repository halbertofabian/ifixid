<?php

class ConexionSoftmor
{

	static public function conectar()
	{

		//cPHEYt5nxfW3
		//  $link = new PDO("mysql:host=localhost;dbname=u203735599_soft",
		//     "u203735599_soft",
		//              "1Q8jeQzVtmVULd5dpX");
		$link = new PDO(
			"mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
			DB_USER,
			DB_PASSWORD
		);

		$link->exec("set names utf8");

		return $link;
	}

	static public function conectarBDProyecto($bd)
	{

		
		$link = new PDO(
			"mysql:host=" . DB_HOST . ";dbname=" . $bd['db_name'],
			$bd['user_name'],
			$bd['password_db']
		);

		$link->exec("set names utf8");

		return $link;
	}
}
