<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Login.php');// inclui a classe da model Login.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelLogin = new ModelLogin();//inicia a classe ModelLogin.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

session_start();

if(empty($_SESSION['idCar'])){$_SESSION['idCar'] = date('YmdHis', time());}
else{$_SESSION['idCar'] = $_SESSION['idCar'];}

$query_CheckLogin_Select = $objModelLogin->SelectCheckLogin($objConn,$objFunctionClass->CheckParameter($objFunctionClass->EmailInjectionSQL($_POST['emailLogin'])),$objFunctionClass->CheckParameter($_POST['senhaLogin']));

if($fetch_CheckLogin = $query_CheckLogin_Select->fetch(PDO::FETCH_ASSOC)){

	$query_UpdateClientCode = $objModelLogin->UpdateClientCode($objConn,$fetch_CheckLogin['CodCliSite'],trim($_SESSION['idCar']));

	if( isset($_SESSION['redirectCar']) && $_SESSION['redirectCar'] == 'carrinho' ){
		
		$_SESSION['redirectCar']  = '';
		$idSession = $_SESSION['idPedSession'];

		// echo '/confirmacao/'.base64_encode($fetch_CheckLogin['Estado']).'/'.base64_encode($idSession).'/'.base64_encode($fetch_CheckLogin['IE']).'/';
		echo '/confirmacao/'.$fetch_CheckLogin['Estado'].'/'.$fetch_CheckLogin['IE'].'/'.$idSession.'/';
	}
	else{
		echo '/centraldocliente/' . $fetch_CheckLogin['CodCliSite'] . '/';
		$query_CheckCodPed_Select = $objModelLogin->SelectCheckCodPed($objConn,$objFunctionClass->InjectionSQL($fetch_CheckLogin['CodCliSite']));
		if($fetch_CheckCodPed = $query_CheckCodPed_Select->fetch(PDO::FETCH_ASSOC)){echo $fetch_CheckCodPed['id_pedido'];}
		else{print_r('pedido');}	
	}
	
}
else{print_r('returnNull');}
?>