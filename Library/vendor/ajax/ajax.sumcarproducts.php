<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Home.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelHome = new ModelHome();//inicia a classe ModelHome.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$query_SumCarProducts=$objModelHome->SumCarProducts($objConn,$objFunctionClass->CheckParameter($_POST['idCar']));
if($fetch_SumCarProducts=$query_SumCarProducts->fetch(PDO::FETCH_ASSOC)){$val = number_format($fetch_SumCarProducts['tcar'],2,',','.');echo $val;}
else{echo '0.00';}
?>

