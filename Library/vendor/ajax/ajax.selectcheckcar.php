<?php
error_reporting(0);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
//ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Home.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelHome = new ModelHome();//inicia a classe ModelHome.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

@$query_SelectCheckCar = $objModelHome->SelectCheckCar($objConn,$objFunctionClass->InjectionSQL($objFunctionClass->CheckParameter(@$_POST['idCar'])));

if($fetch_SelectCheckCar = $query_SelectCheckCar->fetch(PDO::FETCH_ASSOC)){print_r($fetch_SelectCheckCar['car']);}
else{print_r('returnNull');}
?>