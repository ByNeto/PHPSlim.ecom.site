<?php
Class InfoDB{
/*Método construtor do banco de dados ou seja da classe InfoDB*/
	public function __construct(){}

/*Evita que a classe InfoDB seja clonada*/
	public function __clone(){}

/*Metodo que destroi a Classe*/
	public function __destruct(){}

/*Variaveis de Definição com acesso privado*/
	private static $dbtype	='dblib';
	private static $host	='189.888.888.888';
	private static $port	='1433';
	private static $user	='usr';
	private static $password='usr@@#$2017!';
	private static $db		='dbusr';

/*Metodos que trazem o conteudo da variavel desejada @return $xxx = conteudo da variavel solicitada*/
	public static function getDBType()		{return self::$dbtype;}
	public static function getHost()		{return self::$host;}
	public static function getPort()		{return self::$port;}
	public static function getUser()		{return self::$user;}
	public static function getPassword()	{return self::$password;}
	public static function getDB()			{return self::$db;}
	public static function disconnectDB($objConn){foreach($objConn as $key => $value){unset($value);$objConn= null;}}
	public static function LogClassInfoDB($msgError){$data=date('d-m-y');$hora=date('H:i:s');$file='Log_Class_InfoDB.txt';$manipular=fopen($file, "a+b");fwrite($manipular,$msgError);fclose($manipular);}
}
/*Utilizando os metodos criados na conexão*/
	try{$objConn= new PDO (InfoDB::getDBType().':host='.InfoDB::getHost().':'.InfoDB::getPort().';dbname='.InfoDB::getDB(),InfoDB::getUser(),InfoDB::getPassword());$objConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);}catch(PDOException $msgError){header("Refresh: 0");print_r('<center><b>Ops!! Houve uma pequena instabilidade na internet.</b></center>');InfoDB::LogClassInfoDB($msgError->getMessage());exit;}
?>