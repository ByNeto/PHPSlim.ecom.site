<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Home.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelHome = new ModelHome();//inicia a classe ModelHome.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$qtdProduct = $objFunctionClass->CheckParameter($_POST['qtdProduct']);
$qtdProduct = ($qtdProduct*1);
$query_InsertProductIni = $objModelHome->InsertProductIni($objConn,
$objFunctionClass->CheckParameter($_POST['idCar']),
$objFunctionClass->CheckParameter($_POST['ProductCod']),
$qtdProduct
//$objFunctionClass->CheckParameter((int)$_POST['Multiple'])
);

$query_UpdateProductIniConc = $objModelHome->UpdateProductIniConc($objConn,
$objFunctionClass->CheckParameter($objFunctionClass->InjectionSQL($_POST['idCar'])));

$query_DeleteProductIniConc = $objModelHome->DeleteProductIniConc($objConn,
$objFunctionClass->CheckParameter($objFunctionClass->InjectionSQL($_POST['idCar'])));

if($query_InsertProductIni){print_r('returnSuccess');}
else{print_r('returnNull');}

if($query_UpdateProductIniConc){print_r('returnSuccess query_UpdateProductIniConc');}
else{print_r('returnNull');}

if($query_DeleteProductIniConc){print_r('returnSuccess query_DeleteProductIniConc');}
else{print_r('returnNull');}

?>