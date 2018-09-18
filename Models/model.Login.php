<?php
Class ModelLogin{
	private static $objConn;
	private static $SelectCheckLogin;
	private static $SelectCheckCodPed;
	private static $SelectRecoverPassword;
	private static $UpdateRecoverPassword;
	private static $UpdateClientCode;

/* @Param SelectCheckLogin @Functions SelectCheckLogin model.Login.php*/
public function SelectCheckLogin($objConn,$email,$password){
	$SelectCheckLogin = $objConn->query("SELECT CodCliSite, Estado, IE FROM [SITE].[dbo].[Clientes] WHERE Email = '$email' AND Pass = '$password'");
return $SelectCheckLogin;}

/* @Param SelectCheckCodPed @Functions SelectCheckCodPed model.Login.php*/
public function SelectCheckCodPed($objConn,$value){
	$SelectCheckCodPed = $objConn->query("SELECT TOP 1 id_pedido from View_CentralCliente where CodCliSite = '$value' order by id_pedido desc");
return $SelectCheckCodPed;}

/* @Param SelectRecoverPassword @Functions SelectRecoverPassword model.Login.php*/
public function SelectRecoverPassword($objConn,$email){
	$SelectRecoverPassword = $objConn->query("SELECT RazaoSocial,Email FROM [SITE].[dbo].[Clientes] WHERE Email = '$email'");
return $SelectRecoverPassword;}

/* @Param UpdateRecoverPassword @Functions UpdateRecoverPassword model.Login.php*/
public function UpdateRecoverPassword($objConn,$email,$password){
	$UpdateRecoverPassword = $objConn->query("UPDATE [SITE].[dbo].[Clientes] SET Pass = '$password' WHERE Email = '$email'");
return $UpdateRecoverPassword;}

/* @Param UpdateClientCode @Functions UpdateClientCode model.Login.php*/
public function UpdateClientCode($objConn,$codcliente,$session){
	$UpdateClientCode = $objConn->query("UPDATE [SITE].[dbo].[car_carrinho] SET CodCliente = '$codcliente' WHERE id_carrinho = '$session'");
return $UpdateClientCode;}

}

?>