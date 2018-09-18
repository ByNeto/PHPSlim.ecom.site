<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
require_once('../../../Models/model.Cart.php');// inclui a classe da model Cart.

$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$objModelCart = new ModelCart();

$idSession = $_REQUEST['idSession'];

session_start();

if(empty($_SESSION['idCar'])){$_SESSION['idCar'] = date('YmdHis', time());}
else{$_SESSION['idCar'] = $_SESSION['idCar'];}

if($query_SelectClientInfo = $objModelCart->SelectClientInfo($objConn,$idSession) ){
	$fetch_SelectClientInfo = $query_SelectClientInfo->fetch(PDO::FETCH_ASSOC);
	if( $fetch_SelectClientInfo['CodCliente'] == '0' ){
		$_SESSION['redirectCar']  = 'carrinho';
		$_SESSION['idPedSession'] = $_SESSION['idCar'];
		echo '/login/autopec/';
	}
	else{
		$_SESSION['redirectCar'] = '';
		// echo '/confirmacao/'.base64_encode($fetch_SelectClientInfo['Estado']).'/'.base64_encode($idSession).'/'.base64_encode($fetch_SelectClientInfo['IE']).'/';
		echo '/confirmacao/'.$fetch_SelectClientInfo['Estado'].'/'.$fetch_SelectClientInfo['IE'].'/'.$idSession.'/';
	}
}

?>