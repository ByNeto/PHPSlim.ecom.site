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

$CodCliente=$objFunctionClass->CheckParameter(@$_POST['Cliente']);
$CodCliente=$CodCliente*1;
@$query_InsertCarIni=$objModelHome->InsertCarIni($objConn,$objFunctionClass->InjectionSQL(@$objFunctionClass->CheckParameter(@$_POST['Car'])),$objFunctionClass->InjectionSQL($CodCliente),$objFunctionClass->InjectionSQL($objFunctionClass->CheckParameter(@$_POST['CEP'])));

if($query_InsertCarIni){print_r('returnSuccess');}
else{print_r('returnNull');}
?>