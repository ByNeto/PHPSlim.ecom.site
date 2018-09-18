<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Login.php');// inclui a classe da model Login.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
require_once('../../../Functions/function.SendMailerClass.php');// inclui a classe da function FunctionSendMailer.

$objModelLogin = new ModelLogin();//inicia a classe ModelLogin.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$objFunctionSendMailer = new FunctionSendMailer();//inicia a classe FunctionSendMailer.

$query_EmailRegister_Select = $objModelLogin->SelectRecoverPassword($objConn,$objFunctionClass->CheckParameter($objFunctionClass->EmailInjectionSQL($_POST['emailRegister'])));

if($fetch_EmailRegister = $query_EmailRegister_Select->fetch(PDO::FETCH_ASSOC)){
	$fetch_RecoverPasword['RazaoSocial'];
}

else{print_r('returnNull');}
?>