<?php
Class ModelHome{
	private static $objConn;
	private static $SelectProductsRandom;
	private static $SelectCheckCar;
	private static $InsertCarIni;
	private static $UpdateCarIni;
	private static $SelectCheckProduct;
	private static $InsertProductIni;
	private static $UpdateProductIni;
	private static $UpdateProductIniConc;
	private static $DeleteProductIniConc;
	private static $SelectCheckProductStorage;
	private static $UpdateProductStorage;
	private static $UpdateCarStorage;
	private static $DeleteCarStorage;
	private static $DeleteCarStorageFreight;
	private static $SumCarProducts;
	private static $SelectFinalPedido;

/* @Param SelectProductsRandom @Functions SelectProductsRandom model.Home.php*/ //WHERE CodProduto = 45492
public function SelectProductsRandom($objConn,$value){
	$SelectProductsRandom=$objConn->query('SELECT TOP '.$value.' CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Multiplo,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS WHERE Estoque > 0 ORDER BY NEWID();');
return $SelectProductsRandom;}

/* @Param SelectCheckCar @Functions SelectCheckCar model.Home.php*/
public function SelectCheckCar($objConn,$value){
	$SelectCheckCar=$objConn->query("SELECT count(id_carrinho) as car FROM car_carrinho WHERE id_carrinho='$value'");
return $SelectCheckCar;}

/* @Param InsertCarIni @Functions InsertCarIni model.Home.php*/
public function InsertCarIni($objConn,$valueOne,$valueTwo,$valueThree){
	$InsertCarIni=$objConn->query("INSERT INTO car_carrinho(id_carrinho,CodCliente,cep,mod_envio,vl_freteEscolhido,vai_por,Id_Transportadora,temp)VALUES('$valueOne','$valueTwo','$valueThree',NULL,NULL,NULL,NULL,NULL)");
return $InsertCarIni;}

/* @Param UpdateCarIni @Functions UpdateCarIni model.Home.php*/
public function UpdateCarIni($objConn,$valueOne,$valueTwo,$valueThree){
	$UpdateCarIni=$objConn->query("UPDATE car_carrinho SET CodCliente='$valueTwo',cep='$valueThree',mod_envio=NULL,vl_freteEscolhido=NULL,vai_por=NULL,Id_Transportadora=NULL,temp=NULL WHERE id_carrinho='$valueOne'");
return $UpdateCarIni;}

/* @Param SelectCheckProduct @Functions SelectCheckProduct model.Home.php*/
public function SelectCheckProduct($objConn,$valueOne,$valueTwo){
	$SelectCheckProduct=$objConn->query("SELECT count(id_carrinho) as t FROM [SITE].[dbo].[car_produtos] WHERE id_carrinho = '$valueOne' AND CodAutopec='$valueTwo'");
return $SelectCheckProduct;}

/* @Param InsertProductIni @Functions InsertProductIni model.Home.php*/
public function InsertProductIni($objConn,$valueOne,$valueTwo,$valueThree){
	$InsertProductIni=$objConn->query("INSERT INTO car_produtos (id_carrinho, CodAutopec, quantidade, vl_unit, vl_unit_ipi, pe_alic_ipi, ORIGEM) (select '$valueOne','$valueTwo',($valueThree),VendaVarejo,VendaVarejoSIPI,AliqIPI,Origem FROM V_ProdSite WHERE CodAutopec='$valueTwo')");
return $InsertProductIni;}

/* @Param UpdateProductIni @Functions UpdateProductIni model.Home.php*/
public function UpdateProductIni($objConn,$valueOne,$valueTwo,$valueThree){
	$UpdateProductIni=$objConn->query("UPDATE car_produtos SET quantidade = (quantidade + ($valueThree)) WHERE id_carrinho='$valueOne' AND CodAutopec='$valueTwo'");
return $UpdateProductIni;}

/* @Param UpdateProductIniConc @Functions UpdateProductIniConc model.Home.php*/
public function UpdateProductIniConc($objConn,$valueOne){
	$UpdateProductIniConc=$objConn->query("UPDATE car_carrinho set cep = NULL, vl_freteEscolhido = NULL, vai_por = NULL WHERE id_carrinho='$valueOne'");
return $UpdateProductIniConc;}

/* @Param DeleteProductIniConc @Functions DeleteProductIniConc model.Home.php*/
public function DeleteProductIniConc($objConn,$valueOne){
	$DeleteProductIniConc=$objConn->query("UPDATE car_carrinho set cep = NULL, vl_freteEscolhido = NULL, vai_por = NULL WHERE id_carrinho='$valueOne'");
return $DeleteProductIniConc;}

/* @Param SelectCheckProductStorage @Functions SelectCheckProductStorage model.Home.php*/
public function SelectCheckProductStorage($objConn,$valueOne){
	$SelectCheckProductStorage=$objConn->query("SELECT car.quantidade,pro.Estoque,pro.Descricao,car.id_carrinho,pro.CodAutopec FROM car_produtos AS car INNER JOIN V_ProdSite AS pro ON car.CodAutopec = pro.CodAutopec WHERE id_carrinho='$valueOne'");
return $SelectCheckProductStorage;}

/* @Param UpdateProductStorage @Functions UpdateProductStorage model.Home.php*/
public function UpdateProductStorage($objConn,$valueOne,$valueTwo,$valueThree){
	$UpdateProductStorage=$objConn->query("UPDATE car_produtos SET erro = 1, quantidade = '$valueTwo' WHERE CodAutopec='$valueThree' AND id_carrinho='$valueOne'");
return $UpdateProductStorage;}

/* @Param UpdateCarStorage @Functions UpdateCarStorage model.Home.php*/
public function UpdateCarStorage($objConn,$valueOne){
	$UpdateCarStorage=$objConn->query("UPDATE car_carrinho SET mod_envio = NULL, vl_freteEscolhido = NULL FROM car_carrinho WHERE id_carrinho='$valueOne'");
return $UpdateCarStorage;}

/* @Param DeleteCarStorage @Functions DeleteCarStorage model.Home.php*/
public function DeleteCarStorage($objConn,$valueOne){
	$DeleteCarStorage=$objConn->query("DELETE FROM car_frete WHERE id_carrinho='$valueOne'");
return $DeleteCarStorage;}

/* @Param DeleteCarStorageFreight @Functions DeleteCarStorageFreight model.Home.php*/
public function DeleteCarStorageFreight($objConn,$valueOne){
	$DeleteCarStorageFreight=$objConn->query("DELETE FROM car_frete_erro WHERE idPedido='$valueOne'");
return $DeleteCarStorageFreight;}

/* @Param SumCarProducts @Functions SumCarProducts model.Home.php*/
public function SumCarProducts($objConn,$valueOne){
	$SumCarProducts=$objConn->query("SELECT Sum(car.vl_unit * car.quantidade) as tcar FROM car_produtos AS car WHERE car.id_carrinho='$valueOne'");
return $SumCarProducts;}

/* @Param SelectFinalPedido @Functions SelectFinalPedido model.Home.php*/
public function SelectFinalPedido($objConn,$value){
	$SelectFinalPedido=$objConn->query("SELECT cli.RazaoSocial,cli.NomeFantasia,cli.email,cli.TipoCliente,obs.obs,(cli.endereco + ', ' + cli.Numero) AS enda,(cli.bairro + ' - ' + cli.cidade +'/' +cli.estado + ' - ' + cli.cep) AS endb,ped.vl_venda,ped.vl_frete,ped.vl_desconto,(SELECT Sum(pro.VL_ICMSST) FROM ped_produtos AS pro WHERE pro.id_pedido = ped.id_pedido) as VL_ICMSST,CONVERT(VARCHAR(10), ped.dthr_venda, 103) AS dthvenda,frm.FormaPagto,frm.Codigo,ped.n_parcelas,ped.CodForPag,ped.cancelado FROM ped_resumido AS ped left JOIN Clientes AS cli ON ped.CodCliSite = cli.CodCliSite left JOIN ped_observacoes as obs ON ped.id_pedido = obs.id_pedido left JOIN FormaPagtoCompra as frm ON ped.CodForPag = frm.CodForPag WHERE ped.id_pedido ='$value'");
return $SelectFinalPedido;}

}
?>