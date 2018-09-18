<?php
Class ModelCart{
	private static $objConn;
	private static $SelectCartProducts;
	private static $UpdateProductStorage;
	private static $SelectCheckProductStorageCart;
	private static $DeleteCartProduct;
	private static $SelectFreightOption;
	private static $UpdateFreightOption;
	private static $SelectClientInfo;
	private static $SelectCarTotal;
	private static $UpdateCartFreigh;

/* @Param SelectCartProducts @Functions SelectCartProducts model.Cart.php*/
public function SelectCartProducts($objConn,$idSession){
	$SelectCartProducts = $objConn->query("SELECT pro.CodOriginal,pro.CodAutopec,pro.Descricao,pro.Aplicacao,pro.ClFiscal,pro.Estoque,dbo.limpaIMG(pro.Imagem1, 'd') as img ,pro.Fabricante,pro.Multiplo,car.quantidade,car.vl_unit,car.erro FROM dbo.car_produtos AS car INNER JOIN dbo.V_ProdSite AS pro ON car.CodAutopec = pro.CodAutopec WHERE car.id_carrinho = '$idSession'");
return $SelectCartProducts;}

/* @Param UpdateProductStorage @Functions UpdateProductStorage model.Cart.php*/
public function UpdateProductStorage($objConn,$quantidadeCar,$codAutopec,$idSession){
	$UpdateProductStorage = $objConn->query("UPDATE car_produtos SET quantidade = '$quantidadeCar' WHERE CodAutopec = '$codAutopec' and id_carrinho = '$idSession'");
return $UpdateProductStorage;}

/* @Param SelectCheckProductStorage @Functions SelectCheckProductStorage model.Cart.php*/
public function SelectCheckProductStorageCart($objConn,$valueOne,$valueTwoo){
	$SelectCheckProductStorageCart = $objConn->query("SELECT car.quantidade,car.vl_unit,pro.Estoque,pro.Descricao,car.id_carrinho,pro.CodAutopec,pro.Multiplo FROM car_produtos AS car INNER JOIN V_ProdSite AS pro ON car.CodAutopec = pro.CodAutopec WHERE id_carrinho = '$valueOne' AND car.CodAutopec = '$valueTwoo'");
return $SelectCheckProductStorageCart;}

/* @Param DeleteCartProduct @Functions DeleteCartProduct model.Cart.php*/
public function DeleteCartProduct($objConn,$idSession,$codAutopec){
	$DeleteCartProduct = $objConn->query("DELETE FROM dbo.car_produtos WHERE id_carrinho = '$idSession' AND CodAutopec = '$codAutopec'");
return $DeleteCartProduct;}

/* @Param SelectFreightOption @Functions SelectFreightOption model.Cart.php*/
public function SelectFreightOption($objConn,$idFrete){
	$SelectFreightOption = $objConn->query("SELECT TOP 1 fr.tipoFrete, fr.vlFrete, fr.Id_Transportadora, fr.prazo FROM dbo.car_frete AS fr WHERE fr.idFrete = $idFrete ");
return $SelectFreightOption;}

/* @Param UpdateFreightOption @Functions UpdateFreightOption model.Cart.php*/
public function UpdateFreightOption($objConn,$idSession,$modalidade,$vlFrete,$tipofrete,$idTransportadora,$prazo){
	$UpdateFreightOption = $objConn->query("UPDATE car_carrinho SET mod_envio = '$modalidade',vl_freteEscolhido = '$vlFrete',vai_por = '$tipofrete',Id_Transportadora = '$idTransportadora',temp = '$prazo' where id_carrinho = '$idSession' ");
return $UpdateFreightOption;}

/* @Param SelectClientInfo @Functions SelectClientInfo model.Cart.php*/
public function SelectClientInfo($objConn,$value){
	$SelectClientInfo = $objConn->query("SELECT TOP 1 ISNULL(car.CodCliente, 0) CodCliente, ISNULL(cli.Estado,0) Estado, ISNULL(cli.IE,0) IE FROM dbo.car_carrinho car LEFT JOIN Clientes cli ON cli.CodCliSite = car.CodCliente WHERE car.id_carrinho = '$value' ");
return $SelectClientInfo;}

/* @Param SelectCarTotal @Functions SelectCarTotal model.Cart.php*/
public function SelectCarTotal($objConn,$value){
	$SelectCarTotal = $objConn->query("SELECT (SELECT sum((pro.vl_unit) * pro.quantidade) FROM car_produtos AS pro WHERE pro.id_carrinho = '$value') AS totalpro, vl_freteEscolhido FROM car_carrinho AS car INNER JOIN dbo.car_frete AS fre ON car.id_carrinho = fre.id_carrinho WHERE car.id_carrinho = '$value' GROUP BY car.cep, car.vl_frete,car.endereco, car.mod_envio, car.vl_frete_jaglog, car.vl_freteEscolhido, car.vai_por, car.temp ");
return $SelectCarTotal;}

/* @Param UpdateProductIniConc @Functions UpdateProductIniConc model.Cart.php*/ 
public function UpdateCartFreigh($objConn,$valueOne){
	$UpdateCartFreigh = $objConn->query("UPDATE car_carrinho set cep = NULL, vl_freteEscolhido = NULL, vai_por = NULL WHERE id_carrinho = '$valueOne'");
return $UpdateCartFreigh;}

}
?>
