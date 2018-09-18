<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Register.php');// inclui a classe da model Register.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelRegister = new ModelRegister();//inicia a classe ModelRegister.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$query_Select = $objModelRegister->SelectRegisterCpf($objConn,$objFunctionClass->CheckParameter($objFunctionClass->InjectionSQL($objFunctionClass->ClearCpfCnpj($_POST['cpfRegisterPf']))));

if($fetch_Select = $query_Select->fetch(PDO::FETCH_ASSOC)){print_r($fetch_Select['CNPJ']);}
else{print_r('returnNull');}
?>