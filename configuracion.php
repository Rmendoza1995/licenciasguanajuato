<?php
$server="192.185.131.113";
$user="segur359_root";
$pass="HZTa.yk#R~AG";
$bd="segur359_bd";


//$server="localhost:3306";
//$user="root";
//$pass="";
//$bd="bdnew";


	class Conexion extends mysqli {
		public function __construct() {
			parent::__construct($server,$user,$pass,$bd);
			$this->query("SET NAMES 'utf8';");
			$this->connect_errno ? die('Error con la Conexion '.mysqli_connect_error()) : $x = 'Conectado';
			unset($x);
		}
	}

	$link = mysqli_connect($server,$user,$pass,$bd);
///password  HZTa.yk#R~AG
	
?>