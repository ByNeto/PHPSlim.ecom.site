<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Home.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelHome = new ModelHome();//inicia a classe ModelHome.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$query_SelectCheckProduct = $objModelHome->SelectCheckProduct($objConn,
$objFunctionClass->CheckParameter($objFunctionClass->InjectionSQL($_POST['idCar'])),
$objFunctionClass->CheckParameter($objFunctionClass->InjectionSQL($_POST['ProductCod']))
);

if($fetch_SelectCheckProduct = $query_SelectCheckProduct->fetch(PDO::FETCH_ASSOC)){print_r($fetch_SelectCheckProduct['t']);}
else{print_r('returnNull');}
?>