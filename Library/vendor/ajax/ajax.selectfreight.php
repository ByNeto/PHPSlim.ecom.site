<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
require_once('../../../Models/model.Cart.php');// inclui a classe da model Cart.

$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$objModelCart = new ModelCart();

$idfrete   = $_REQUEST['idFrete'];
$idSession = $_REQUEST['idSession'];

if($query_SelectFreightOption = $objModelCart->SelectFreightOption($objConn,$idfrete) ){
	$fetch_SelectFreightOption = $query_SelectFreightOption->fetch(PDO::FETCH_ASSOC);
	if( $query_UpdateFreightOption = $objModelCart->UpdateFreightOption($objConn,$idSession,$idfrete,$fetch_SelectFreightOption['vlFrete'],$fetch_SelectFreightOption['tipoFrete'],$fetch_SelectFreightOption['Id_Transportadora'],$fetch_SelectFreightOption['prazo']) ){
			$query_objModelCart = $objModelCart->SelectCarTotal($objConn,$idSession);
			$fetch_SelectFreightOption = $query_objModelCart->fetch(PDO::FETCH_ASSOC);
			echo 'R$' . number_format((floatval($fetch_SelectFreightOption['totalpro']) + floatval($fetch_SelectFreightOption['vl_freteEscolhido']) ),2,',','.');
	}
}
?>
