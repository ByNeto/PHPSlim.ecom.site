<?php
Class ModelProducts{
	private static $objConn;
	private static $SelectProducts;
	private static $SelectProductsRandom;
	private static $ProductsYears;
	private static $SearchRangerCep;
	private static $TransJadLogDb;
	private static $TransJamefDb;
	private static $TransByBusDb;
	private static $TransBelloniDb;
	private static $TransTotalWeight;
	private static $TransCarFrete;
	private static $TransSelectOptions;
	private static $UpdateProductIniConc;
	private static $DeleteCarStorage;
	private static $DeleteCarStorageFreight;
	private static $SumCarProducts;
	private static $InsertCarFrete;

/* @Param SelectProducts @Functions SelectProducts model.Products.php*/
public function SelectProducts($objConn,$value){
	if(!is_numeric($value)){$value=0;}
	$SelectProducts = $objConn->query('SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,DescricaoCompleta,Aplicacao,Fabricante,Multiplo,Estoque,VendaVarejo,Foto,PesoB,Imagem1 FROM VIEW_PRODUTOS WHERE CodProduto = '.$value.';');
return $SelectProducts;}

/* @Param SelectProductsRandom @Functions SelectProductsRandom model.Products.php*/
public function SelectProductsRandom($objConn,$value){
	$SelectProductsRandom = $objConn->query('SELECT TOP '.$value.' CodProduto,CodOriginal,Descricao,DescricaoAbrv,DescricaoCompleta,Aplicacao,Fabricante,Multiplo,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS ORDER BY NEWID();');
return $SelectProductsRandom;}


/* @Param ProductsYears @Functions ProductsYears model.Products.php*/
public function ProductsYears($objConn,$value){
	if(!is_numeric($value)){$value=0;}
	$ProductsYears = $objConn->query('SELECT SubCategoria, CAST (Anos as VARCHAR) Anos FROM View_Produtos_Anos WHERE CodAutopec = '.$value.'');
return $ProductsYears;}


/* @Param SearchRangerCep @Functions SearchRangerCep model.Products.php*/
public function SearchRangerCep($objConn){
	$SearchRangerCep = $objConn->query("SELECT fre.cidade, fre.cep_inicio, fre.cep_final, fre.vl_compra, fre.vl_frete, fre.msgsite FROM dbo.glb_fre_gratis AS fre WHERE fre.ativo = 'S'");
return $SearchRangerCep;}

/* @Param TransJadLogDb @Functions TransJadLogDb model.Products.php*/
public function TransJadLogDb($objConn,$value){
	$TransJadLogDb = $objConn->query("SELECT ceps.tarifa,ceps.uf,tra.idtarifa,tra.p3,tra.p5,tra.p10,tra.p15,tra.p20,tra.p30,tra.p50,tra.p75,tra.p100,tra.pesoextra,tra.gris, case when ceps.tarifa = 'Interior' then ceps.rod when ceps.tarifa = 'Capital' then ceps.rod end as prazo FROM tra_cidades AS ceps LEFT JOIN tra_tarifas AS tra ON ceps.uf = tra.estado AND ceps.tarifa = tra.tarifa WHERE (ceps.id_config = 1) and '". $value ."' >= ceps.cep and '". $value ."' <= ceps.cepfim");
return $TransJadLogDb;}

/* @Param TransJamefDb @Functions TransJamefDb model.Products.php*/
public function TransJamefDb($objConn,$value){
	$TransJamefDb = $objConn->query("SELECT ceps.tarifa,ceps.uf,tra.idtarifa,tra.p10,tra.p20,tra.p30,tra.p50,tra.p75,tra.p100,tra.pesoextra,tra.gris, case when ceps.tarifa = 'Interior-1' then ceps.rod when ceps.tarifa = 'Interior-2' then ceps.rod when ceps.tarifa = 'Capital' then ceps.rod end as prazo FROM tra_cidades AS ceps LEFT JOIN tra_tarifas AS tra ON ceps.uf = tra.estado AND ceps.tarifa = tra.tarifa WHERE (tra.id_config = 20) and '". $value ."' >= ceps.cep and '". $value ."' <= ceps.cepfim");
return $TransJamefDb;}

/* @Param TransByBusDb @Functions TransByBusDb model.Products.php*/
public function TransByBusDb($objConn,$value){
	$TransByBusDb = $objConn->query("SELECT tx.porvlnfe,tx.valorExcedente,tx.vlFrenteMinimo,vl.cidade,vl.estado,tx.pesoMinimo FROM dbo.tra_vinculo AS vl INNER JOIN dbo.tra_config AS tx ON vl.idConfig = tx.id_config WHERE (tx.codFornecedor = 482) and '". $value ."' >= vl.cepInicial AND '". $value ."' <= vl.cepFinal");
return $TransByBusDb;}

/* @Param TransBelloniDb @Functions TransBelloniDb model.Products.php*/
public function TransBelloniDb($objConn,$value){
	$TransBelloniDb = $objConn->query("SELECT tx.porvlnfe,tx.valorExcedente,tx.vlFrenteMinimo,vl.cidade,vl.estado,tx.pesoMinimo,tx.pesoMax FROM dbo.tra_vinculo AS vl INNER JOIN dbo.tra_config AS tx ON vl.idConfig = tx.id_config WHERE (tx.codFornecedor = 155) and '". $value ."' >= vl.cepInicial AND '". $value ."' <= vl.cepFinal");
return $TransBelloniDb;}

/* @Param TransTotalWeight @Functions TransTotalWeight model.Products.php*/
public function TransTotalWeight($objConn,$value){
	$TransTotalWeight = $objConn->query("SELECT CASE WHEN MAX ( PRO.COMPRIMENTO ) > 105 THEN 'J'WHEN MAX ( PRO.ALTURA ) > 105 THEN 'J' WHEN MAX ( PRO.LARGURA ) > 105 THEN 'J' WHEN ( MAX ( PRO.COMPRIMENTO ) + MAX ( PRO.ALTURA ) + MAX ( PRO.LARGURA ) ) > 200 THEN 'J' WHEN SUM(PRO.PESO * CAR.QUANTIDADE) > 30 THEN 'J' ELSE 'C' END AS MOD_ENVIO, CONVERT(DECIMAL(10,2), SUM(PRO.PESO * CAR.QUANTIDADE)) AS PESO, (PRO.CUBADO / 3333) * CAR.QUANTIDADE as PsRodo, (PRO.CUBADO / 6000) * CAR.QUANTIDADE as PsAero, (PRO.CUBADO / 6000) * CAR.QUANTIDADE as PsCorr, (CONVERT(VARCHAR(50), MAX ( PRO.COMPRIMENTO )) + ' x ' + CONVERT(VARCHAR(50),MAX ( PRO.ALTURA )) +' x ' + CONVERT(VARCHAR(50),MAX ( PRO.LARGURA )) +' = '+ (CONVERT(VARCHAR(50), MAX(PRO.COMPRIMENTO) + MAX(PRO.ALTURA) + MAX(PRO.LARGURA)))) as desDimes, MAX(PRO.COMPRIMENTO) + MAX(PRO.ALTURA) + MAX(PRO.LARGURA) as dimMax, CONVERT(DECIMAL(10,2),SUM(CAR.VL_UNIT * CAR.QUANTIDADE)) AS VLT, SUM(CAR.QUANTIDADE) AS TTQ FROM DBO.CAR_PRODUTOS AS CAR INNER JOIN DBO.V_PRODSITE AS PRO ON CAR.CODAUTOPEC = PRO.CODAUTOPEC WHERE CAR.ID_CARRINHO = '". $value ."' GROUP BY CAR.ID_CARRINHO,  CAR.QUANTIDADE, PRO.CUBADO");
return $TransTotalWeight;}

/* @Param TransCarFrete @Functions TransCarFrete model.Products.php*/
public function TransCarFrete($objConn,$value,$dimenMax,$vaiPor,$vlTotal,$pesoCalc,$peso,$vlMax,$prazo,$idTransportadora,$msg,$idtransporte){
	$TransCarFrete = $objConn->query("INSERT INTO car_frete( id_carrinho, dimencoes, tipoFrete, vlFrete, dad_cubados, pesoReal, dimenMax, prazo, Id_Transportadora, osbFim, idtransporte ) VALUES ( '".$value."', '".$dimenMax."', '".$vaiPor."', '".$vlTotal."', '".$pesoCalc."', '".$peso."', '".$vlMax."','".$prazo."', '".$idTransportadora."', '".$msg."', '".$idtransporte."' )");
return $TransCarFrete;}

/* @Param TransSelectOptions @Functions TransSelectOptions model.Products.php*/
public function TransSelectOptions($objConn,$value){
	$TransSelectOptions = $objConn->query("SELECT frt.idFrete, frt.id_carrinho, frt.dimencoes, frt.tipoFrete, frt.vlFrete, frt.dimenMax, frt.pesoReal, frt.prazo, frt.Id_Transportadora, frt.osbFim, frt.idtransporte FROM car_frete AS frt WHERE frt.id_carrinho = '".$value."' and frt.vlFrete > 0 ORDER BY frt.vlFrete, frt.prazo ASC");
return $TransSelectOptions;}

/* @Param UpdateProductIniConc @Functions UpdateProductIniConc model.Products.php*/
public function UpdateProductIniConc($objConn,$valueOne){
	$UpdateProductIniConc = $objConn->query("UPDATE car_carrinho set cep = NULL, vl_freteEscolhido = NULL, vai_por = NULL WHERE id_carrinho = '$valueOne'");
return $UpdateProductIniConc;}

/* @Param DeleteCarStorage @Functions DeleteCarStorage model.Products.php*/ 
public function DeleteCarStorage($objConn,$valueOne){ 
	$DeleteCarStorage = $objConn->query("DELETE FROM car_frete WHERE id_carrinho = '$valueOne'");
return $DeleteCarStorage;}

/* @Param DeleteCarStorageFreight @Functions DeleteCarStorageFreight model.Products.php*/
public function DeleteCarStorageFreight($objConn,$valueOne){
	$DeleteCarStorageFreight = $objConn->query("DELETE FROM car_frete_erro WHERE idPedido = '$valueOne'");
return $DeleteCarStorageFreight;}

/* @Param SumCarProducts @Functions SumCarProducts model.Products.php*/
public function SumCarProducts($objConn,$valueOne){
	$SumCarProducts = $objConn->query("SELECT Sum(car.vl_unit * car.quantidade) as tcar FROM car_produtos AS car WHERE car.id_carrinho = '$valueOne'");
return $SumCarProducts;}

/* @Param InsertRegisterPhysicalPerson @Functions InsertRegisterPhysicalPerson model.ModelRegister.php*/
public function InsertCarFrete($objConn,$idCarrinho, $dimencoes, $tipoFrete, $vlFrete, $dadCubados, $pesoReal, $dimenMax, $prazo, $id_Transportadora, $cidade, $msgsite){
	$InsertCarFrete = $objConn->query("INSERT INTO car_frete (id_carrinho, dimencoes, tipoFrete, vlFrete, dad_cubados, pesoReal, dimenMax, prazo, Id_Transportadora, cidade, msgsite ) VALUES('$idCarrinho', '$dimencoes', '$tipoFrete', '$vlFrete', '$dadCubados', '$pesoReal', '$dimenMax', '$prazo', '$id_Transportadora', '$cidade', '$msgsite' )");
return $InsertCarFrete;}

}
?>

