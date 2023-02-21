<?php

class ConexionIfixid
{

	static public function conectar()
	{

		//cPHEYt5nxfW3
		//  $link = new PDO("mysql:host=localhost;dbname=u203735599_soft",
		//     "u203735599_soft",
		//              "1Q8jeQzVtmVULd5dpX");
		$link = new PDO(
			"mysql:host=" . DB_HOST_IFX . ";dbname=" . DB_NAME_IFX,
			DB_USER_IFX,
			DB_PASSWORD_IFX
		);

		$link->exec("set names utf8");

		return $link;
	}

	static public function conectarBDProyecto($bd)
	{

		
		$link = new PDO(
			"mysql:host=" . DB_HOST_IFX . ";dbname=" . $bd['db_name'],
			$bd['user_name'],
			$bd['password_db']
		);

		$link->exec("set names utf8");

		return $link;
	}
}
