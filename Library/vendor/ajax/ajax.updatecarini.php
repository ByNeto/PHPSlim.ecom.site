<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Home.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelHome = new ModelHome();//inicia a classe ModelHome.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$CodCliente = $objFunctionClass->CheckParameter($_POST['Cliente']);
$CodCliente = $CodCliente*1;
$query_UpdateCarIni = $objModelHome->UpdateCarIni($objConn,$objFunctionClass->CheckParameter($_POST['Car']),$CodCliente,$objFunctionClass->CheckParameter($_POST['CEP']));

if($query_UpdateCarIni){print_r('returnSuccess');}
else{print_r('returnNull');}
?>