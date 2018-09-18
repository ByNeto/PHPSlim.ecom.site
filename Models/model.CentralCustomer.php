<?php
Class ModelCentralCustomer{
	private static $objConn;
	private static $SelectIdsPedido;
	private static $SelectCabecalhoEstaticoPedido;
	private static $SelectTabelaEstaticoProdutos;
	private static $SelectTabelaAjaxProdutos;
	private static $SelectCabecalhoAjaxPedido;
	private static $SelectCheckClient;
	private static $SelectCheckUser;

/* @Param SelectIdsPedido @Functions SelectIdsPedido model.CentralCustomer.php*/
public function SelectIdsPedido($objConn,$value){
	$SelectIdsPedido = $objConn->query("SELECT DISTINCT id_pedido FROM View_CentralCliente WHERE CodCliSite = '$value'");
return $SelectIdsPedido;}

/* @Param SelectCabecalhoEstaticoPedido @Functions SelectCabecalhoEstaticoPedido model.CentralCustomer.php*/
public function SelectCabecalhoEstaticoPedido($objConn,$value){
	$SelectCabecalhoEstaticoPedido = $objConn->query("SELECT TOP 1 * FROM View_CentralCliente WHERE CodCliSite = '$value' ORDER BY id_pedido DESC");
return $SelectCabecalhoEstaticoPedido;}

/* @Param SelectTabelaEstaticoProdutos @Functions SelectTabelaEstaticoProdutos model.CentralCustomer.php*/
public function SelectTabelaEstaticoProdutos($objConn,$value){
	$SelectTabelaEstaticoProdutos = $objConn->query("SELECT pro.id_pedido,pro.CodProduto, pro.Produto, pro.vl_unit, pro.quantidade FROM ped_produtos AS pro WHERE pro.id_pedido = ( SELECT TOP 1 t.id_pedido FROM View_CentralCliente t WHERE CodCliSite = '$value'order by id_pedido desc)");
return $SelectTabelaEstaticoProdutos;}

/* @Param SelectTabelaAjaxProdutos @Functions SelectTabelaAjaxProdutos model.CentralCustomer.php*/
public function SelectTabelaAjaxProdutos($objConn,$value){
	$SelectTabelaAjaxProdutos = $objConn->query("SELECT pro.id_pedido, pro.CodProduto, pro.Produto, pro.vl_unit, pro.quantidade FROM ped_produtos AS pro WHERE pro.id_pedido = '$value'");
return $SelectTabelaAjaxProdutos;}

/* @Param SelectCabecalhoAjaxPedido @Functions SelectCabecalhoAjaxPedido model.CentralCustomer.php*/
public function SelectCabecalhoAjaxPedido($objConn,$value){
	$SelectCabecalhoAjaxPedido = $objConn->query("SELECT DISTINCT TOP 1 id_pedido,dthr_venda,desc_status as StatusCaptura,FormaPagto,vl_frete, idStu FROM View_CentralCliente WHERE id_pedido = '$value ' ORDER BY idStu DESC ");
return $SelectCabecalhoAjaxPedido;}

/* @Param SelectCheckClient @Functions SelectCheckClient model.CentralCustomer.php*/
public function SelectCheckClient($objConn,$value){
	$SelectCheckClient = $objConn->query("SELECT DISTINCT CodCliSite FROM View_CentralCliente WHERE CodCliSite = '$value'");
return $SelectCheckClient;}

/* @Param SelectCheckUser @Functions SelectCheckUser model.CentralCustomer.php*/
public function SelectCheckUser($objConn,$value){
	$SelectCheckUser = $objConn->query("SELECT RazaoSocial,CodCliSite,CEP FROM Clientes WHERE CodCliSite = '$value'");
return $SelectCheckUser;}

}

?>
