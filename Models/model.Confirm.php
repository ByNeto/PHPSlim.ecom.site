<?php
Class ModelConfirm{
	private static $objConn;
	private static $DeleteProductStorageZero;
	private static $SelectCheckCielo;
	private static $InsertPedCielo;
	private static $InsertPedCieloSub;
	private static $UpdateCheckCielo;
	private static $UpdatePedCielo;
	private static $InsertPedCieloEnd;
	private static $UpdatePedCieloReproved;
	private static $UpdatePedCieloReprovedSub;
	private static $SelectStateTax;
	private static $SelectCar;
	private static $UpdateCarProducts;
	private static $SelectDataClient;
	private static $SelectDataFreight;
	private static $SelectDataProducts;
	private static $SelectCheckSession;
	private static $UpdateCount;
	private static $SelectCount;
	private static $SelectDataCarClient;
	private static $InsertDataPed;
	private static $InsertRecorderA;
	private static $InsertRecorderB;
	private static $InsertRecorderProducts;
	private static $InsertRecorderFreight;
	private static $SelectProductStorage;
	private static $UpdateStorage;

/* @Param DeleteProductStorageZero @Functions DeleteProductStorageZero model.Confirm.php*/ 
public function DeleteProductStorageZero($objConn,$valueOne,$valueTwo){ 
  $DeleteProductStorageZero = $objConn->query("DELETE FROM [SITE].[dbo].[car_produtos] WHERE id_carrinho = '$valueOne' AND CodAutopec = '$valueTwo'"); 
return $DeleteProductStorageZero;} 

/* @Param SelectCheckCielo @Functions SelectCheckCielo model.Confirm.php*/
public function SelectCheckCielo($objConn,$value){
	$SelectCheckCielo = $objConn->query("SELECT Payment_Attempts FROM ped_cielo WHERE id_pedido = '$value'");
return $SelectCheckCielo;}

/* @Param InsertPedCielo @Functions InsertPedCielo model.Confirm.php*/
public function InsertPedCielo($objConn,$pedidoId,$Payment_CardNumber,$Payment_ExpirationDate,$Payment_Holder,$Payment_PaymentId,$MerchantOrderId,$Payment_Brand,$Payment_Type,$Payment_SoftDescriptor,$Payment_ReturnMessage,$Payment_ReturnCode,$Payment_Status,$Payment_ReceivedDate,$Payment_Installments,$Dthr_Hist_Log){
	$InsertPedCielo = $objConn->query("INSERT INTO ped_cielo_hist (id_pedido,Payment_CardNumber,Payment_ExpirationDate,Payment_Holder,Payment_PaymentId,MerchantOrderId,Payment_Brand,Payment_Type,Payment_SoftDescriptor,Payment_ReturnMessage,Payment_ReturnCode,Payment_Status,Payment_ReceivedDate,Payment_Installments,Dthr_Hist_Log) VALUES ('$pedidoId','$Payment_CardNumber','$Payment_ExpirationDate','$Payment_Holder','$Payment_PaymentId','$MerchantOrderId','$Payment_Brand','$Payment_Type','$Payment_SoftDescriptor','$Payment_ReturnMessage','$Payment_ReturnCode','$Payment_Status','$Payment_ReceivedDate','$Payment_Installments','$Dthr_Hist_Log')");
return $InsertPedCielo;}

/* @Param InsertPedCieloSub @Functions InsertPedCieloSub model.Confirm.php*/
public function InsertPedCieloSub($objConn,$pedidoId,$CardNumberF,$DateValidCard,$nameClient,$labelFlag,$Installments,$one){
	$InsertPedCieloSub = $objConn->query("INSERT INTO ped_cielo (id_pedido,Payment_CardNumber,Payment_ExpirationDate,Payment_Holder,Payment_Brand,Payment_Installments,Payment_Attempts) VALUES ('$pedidoId','$CardNumberF','$DateValidCard','$nameClient','$labelFlag','$Installments','$one')");
return $InsertPedCieloSub;}

/* @Param UpdateCheckCielo @Functions UpdateCheckCielo model.Confirm.php*/
public function UpdateCheckCielo($objConn,$valueOne,$valueTwo){
	$UpdateCheckCielo = $objConn->query("UPDATE ped_cielo SET Payment_Attempts = '$valueOne' WHERE id_pedido = '$valueTwo'");
return $UpdateCheckCielo;}

/* @Param UpdatePedCielo @Functions UpdatePedCielo model.Confirm.php*/
public function UpdatePedCielo($objConn,
$MerchantOrderId,
$PaymentReturnCode,
$PaymentReturnMessage,
$PaymentStatus,
$PaymentPaymentId,
$PaymentTid,
$PaymentAmount,
$PaymentCreditCardCardNumber,
$PaymentCreditCardHolder,
$PaymentCreditCardExpirationDate,
$PaymentCreditCardBrand,
$PaymentType,
$PaymentProvider,
$PaymentSoftDescriptor,
$PaymentReceivedDate,
$PaymentInstallments,
$PaymentLinks0Rel,
$PaymentLinks0Method,
$PaymentLinks0Href,
$pedidoAux,
$idPedido){
	$UpdatePedCielo = $objConn->query("UPDATE ped_cielo SET 
	MerchantOrderId = '$MerchantOrderId',
	Payment_ReturnCode = '$PaymentReturnCode',
	Payment_ReturnMessage = '$PaymentReturnMessage',
	Payment_Status = '$PaymentStatus',
	Payment_PaymentId = '$PaymentPaymentId',
	Payment_Tid = '$PaymentTid',
	Payment_Amount = '$PaymentAmount',
	Payment_CardNumber = '$PaymentCreditCardCardNumber',
	Payment_Holder = '$PaymentCreditCardHolder',
	Payment_ExpirationDate = '$PaymentCreditCardExpirationDate',
	Payment_Brand = '$PaymentCreditCardBrand',
	Payment_Type = '$PaymentType',
	Payment_Provider = '$PaymentProvider',
	Payment_SoftDescriptor = '$PaymentSoftDescriptor',
	Payment_ReceivedDate = '$PaymentReceivedDate',
	Payment_Installments = '$PaymentInstallments',
	Payment_Rel = '$PaymentLinks0Rel',
	Payment_Method = '$PaymentLinks0Method',
	Payment_Href = '$PaymentLinks0Href',
	Payment_Attempts = '$pedidoAux' WHERE id_pedido = '$idPedido'");
return $UpdatePedCielo;}


/* @Param InsertPedCieloEnd @Functions InsertPedCieloEnd model.Confirm.php*/
public function InsertPedCieloEnd($objConn,$pedidoId,$PaymentCreditCardCardNumber,$PaymentCreditCardExpirationDate,$PaymentCreditCardHolder,$PaymentPaymentId,$MerchantOrderId,$PaymentCreditCardBrand,$CreditCard,$PaymentSoftDescriptor,$EmptyOne,$EmptyTwo,$zero,$PaymentReceivedDate,$PaymentInstallments,$Dthr_Hist_Log){
	$InsertPedCieloEnd = $objConn->query("INSERT INTO ped_cielo_hist(id_pedido,Payment_CardNumber,Payment_ExpirationDate,Payment_Holder,Payment_PaymentId,MerchantOrderId,Payment_Brand,Payment_Type,Payment_SoftDescriptor,Payment_ReturnMessage,Payment_ReturnCode,Payment_Status,Payment_ReceivedDate,Payment_Installments,Dthr_Hist_Log) VALUES ('$pedidoId','$PaymentCreditCardCardNumber','$PaymentCreditCardExpirationDate','$PaymentCreditCardHolder','$PaymentPaymentId','$MerchantOrderId','$PaymentCreditCardBrand','$CreditCard','$PaymentSoftDescriptor','$EmptyOne','$EmptyTwo','$zero','$PaymentReceivedDate','$PaymentInstallments','$Dthr_Hist_Log')");
return $InsertPedCieloEnd;}


/* @Param UpdatePedCieloReproved @Functions UpdatePedCieloReproved model.Confirm.php*/
public function UpdatePedCieloReproved($objConn,$PaymentPaymentId,$PaymentReturnCode,$PaymentReturnMessage,$PaymentTid,$pedidoId){
	$UpdatePedCieloReproved = $objConn->query("UPDATE ped_cielo SET Payment_PaymentId = '$PaymentPaymentId',Payment_ReturnCode = '$PaymentReturnCode',Payment_ReturnMessage = '$PaymentReturnMessage',Payment_Tid = '$PaymentTid' WHERE id_pedido = '$pedidoId'");
return $UpdatePedCieloReproved;}

/* @Param UpdatePedCieloReprovedSub @Functions UpdatePedCieloReprovedSub model.Confirm.php*/
public function UpdatePedCieloReprovedSub($objConn,$Code,$Message,$pedidoId){
	$UpdatePedCieloReprovedSub = $objConn->query("UPDATE ped_cielo SET Payment_ReturnCode = '$Code',Payment_ReturnMessage = '$Message' WHERE id_pedido = '$pedidoId'");
return $UpdatePedCieloReprovedSub;}

/* @Param SelectStateTax @Functions SelectStateTax model.Confirm.php*/
public function SelectStateTax($objConn,$value){
	$SelectStateTax = $objConn->query("SELECT lstEstado.Protocolo_ST, lstEstado.Aliq_ICMS_Interna, lstEstado.Aliq_ICMS_InterEstadual FROM V_Estados AS lstEstado WHERE lstEstado.Sigla = '$value'");
return $SelectStateTax;}

/* @Param SelectCar @Functions SelectCar model.Confirm.php*/
public function SelectCar($objConn,$value){
	$SelectCar = $objConn->query("SELECT car.id_carrinho, car.CodAutopec, car.ORIGEM FROM car_produtos as car WHERE car.id_carrinho = $value");
return $SelectCar;}

/* @Param UpdateCarProducts @Functions UpdateCarProducts model.Confirm.php*/
public function UpdateCarProducts($objConn,$valueOne,$valueTwo,$valueThree,$valueFour){
	$UpdateCarProducts = $objConn->query("UPDATE car_produtos SET BC_ICMSST = (( (vl_unit * isnull(quantidade,1)) - isnull(VL_Desconto,0)) + isnull(VL_Frete,0)),AL_ICMSST = '$valueOne', VL_ICMSST = ( (((vl_unit * isnull(quantidade,1)) - isnull(VL_Desconto,0)) + isnull(VL_Frete,0)) * ($valueOne) / 100), AL_ICMSINTER = '$valueTwo' WHERE id_carrinho = '$valueThree' AND CodAutopec = '$valueFour'");
return $UpdateCarProducts;}

/* @Param SelectDataClient @Functions SelectDataClient model.Confirm.php*/
public function SelectDataClient($objConn,$value){
	$SelectDataClient = $objConn->query("SELECT cli.CodCliente,cli.RazaoSocial,cli.NomeFantasia,cli.Endereco,cli.Numero,cli.Bairro,cli.Cidade,cli.CEP,cli.Estado,cli.Fone,cli.Fone2,cli.Fax,cli.Email,cli.IE,cli.CNPJ,cli.TipoCliente, (SELECT sum((pro.vl_unit) * pro.quantidade) FROM car_produtos AS pro WHERE pro.id_carrinho = '$value') AS totalpro, (SELECT sum((pros.VL_ICMSST) * pros.quantidade) FROM car_produtos AS pros WHERE pros.id_carrinho = '$value') AS totalicmsst FROM Clientes AS cli INNER JOIN car_carrinho ON car_carrinho.CodCliente = cli.CodCliSite WHERE car_carrinho.id_carrinho = '$value'");
return $SelectDataClient;}

/* @Param SelectDataFreight @Functions SelectDataFreight model.Confirm.php*/
public function SelectDataFreight($objConn,$value){
	$SelectDataFreight = $objConn->query("SELECT car.cep,car.vl_frete,car.endereco,car.mod_envio,car.vl_frete_jaglog,car.vl_freteEscolhido,car.temp as prazo,Max(fre.osbFim) as res,Max(fre.cidade) as cidade,Max(fre.msgsite) as txt,car.vai_por,max(fre.prazo) as prazos FROM car_carrinho AS car INNER JOIN dbo.car_frete AS fre ON car.id_carrinho = fre.id_carrinho WHERE car.id_carrinho = '$value' GROUP BY car.cep,car.vl_frete,car.endereco,car.mod_envio,car.vl_frete_jaglog,car.vl_freteEscolhido,car.vai_por,car.temp");
return $SelectDataFreight;}

/* @Param SelectDataProducts @Functions SelectDataProducts model.Confirm.php*/
public function SelectDataProducts($objConn,$value){
	$SelectDataProducts = $objConn->query("SELECT pro.CodOriginal,pro.CodAutopec,pro.Descricao,pro.Aplicacao,pro.ClFiscal,pro.Estoque,dbo.limpaIMG(pro.Imagem1, 'd') as img ,pro.Fabricante,pro.Multiplo,car.quantidade,car.vl_unit,car.erro FROM dbo.car_produtos AS car INNER JOIN dbo.V_ProdSite AS pro ON car.CodAutopec = pro.CodAutopec WHERE car.id_carrinho = '$value' and car.quantidade > 0");
return $SelectDataProducts;}

/* @Param SelectCheckSession @Functions SelectCheckSession model.Confirm.php*/
public function SelectCheckSession($objConn,$value){
	$SelectCheckSession = $objConn->query("SELECT car.CodCliente as cliente FROM car_carrinho AS car WHERE car.id_carrinho = '$value'");
return $SelectCheckSession;}

/* @Param UpdateCount @Functions UpdateCount model.Confirm.php*/
public function UpdateCount($objConn){
	$UpdateCount = $objConn->query("UPDATE glb_contator SET valor = valor + 1 WHERE id_contador = 1");
return $UpdateCount;}

/* @Param SelectCount @Functions SelectCount model.Confirm.php*/
public function SelectCount($objConn){
	$SelectCount = $objConn->query("SELECT valor FROM glb_contator WHERE id_contador = 1");
return $SelectCount;}

/* @Param SelectDataCarClient @Functions SelectDataCarClient model.Confirm.php*/
public function SelectDataCarClient($objConn,$value){
	$SelectDataCarClient = $objConn->query("SELECT car.id_carrinho,car.CodCliente,car.dthr_venda,car.cod_formpag,car.parcelas,car.cep,ISNULL(car.vl_freteEscolhido , 0.00) as vl_frete,car.endereco,car.tipo_frete,car.peso,car.peso_jaglog,ISNULL(car.vai_por , 'AUTOPEC') as mod_envio,car.vl_frete_jaglog,car.dimersoes,ISNULL(car.Id_Transportadora , 6) as Id_Transportadora,ISNULL(car.temp , 2) as temp, (SELECT sum((pro.vl_unit) * pro.quantidade) FROM car_produtos AS pro WHERE pro.id_carrinho = '$value') AS totalpro FROM dbo.car_carrinho AS car WHERE car.id_carrinho ='$value'");
return $SelectDataCarClient;}

/* @Param InsertDataPed @Functions InsertDataPed model.Confirm.php*/
public function InsertDataPed($objConn,$idPedido,$CodCliente,$CodForPag,$bandeira,$n_parcelas,$totalpro,$vl_frete,$Id_Transportadora,$server,$serverSub,$Id_TransportadoraA,$Id_TransportadoraB){
	$InsertDataPed = $objConn->query("INSERT INTO ped_resumido(id_pedido,CodCliSite,CodStatus,dthr_venda,dthr_vencimento,CodForPag,n_parcelas,vl_venda,vl_frete,vl_desconto,tp_envio,setor_atual,ip,descip,PercDesconto,Id_Transportadora,praEntrega,numboleto) VALUES ('$idPedido','$CodCliente',1,GETDATE(),DATEADD(day, $CodForPag, GETDATE()),'$bandeira','$n_parcelas','$totalpro','$vl_frete',0,'$Id_Transportadora',1,'$server','$serverSub','0','$Id_TransportadoraA','$Id_TransportadoraB','".substr($idPedido, 0, 2) . substr($idPedido, 4)."')");
return $InsertDataPed;}

/* @Param InsertRecorderA @Functions InsertRecorderA model.Confirm.php*/
public function InsertRecorderA($objConn,$value){
	$InsertRecorderA = $objConn->query("INSERT INTO ped_stuCompras(CodStatus, CodSertor, DtHr, id_pedido) values (1, 0, GETDATE(), '$value')");
return $InsertRecorderA;}

/* @Param InsertRecorderB @Functions InsertRecorderB model.Confirm.php*/
public function InsertRecorderB($objConn,$value){
	$InsertRecorderB = $objConn->query("INSERT INTO ped_stuCompras(CodStatus, CodSertor, DtHr, id_pedido) VALUES ( 1, 1, GETDATE(), '$value')");
return $InsertRecorderB;}

/* @Param InsertRecorderProducts @Functions InsertRecorderProducts model.Confirm.php*/
public function InsertRecorderProducts($objConn,$valueOne,$valueTwo){
	$InsertRecorderProducts = $objConn->query("INSERT INTO ped_produtos(id_pedido,CodProduto,Produto,vl_unit,quantidade,Peso,CodSubGrupo,CodGrupo,CodMarca,vl_unit_ipi,pe_alic_ipi,VL_Desconto,VL_Frete,PC_Calculo,BC_ICMSST,AL_ICMSST,VL_ICMSST,AL_ICMSINTER,ORIGEM) (SELECT $valueOne,cpro.CodAutopec,pro.DescricaoAbrv,cpro.vl_unit,cpro.quantidade,pro.Peso,pro.CodSubGrupo,pro.CodGrupo,pro.CodMarca,cpro.vl_unit_ipi,cpro.pe_alic_ipi,cpro.VL_Desconto,cpro.VL_Frete,cpro.PC_Calculo,cpro.BC_ICMSST,cpro.AL_ICMSST,cpro.VL_ICMSST,cpro.AL_ICMSINTER,cpro.ORIGEM FROM dbo.car_produtos AS cpro left JOIN dbo.V_ProdSite AS pro ON cpro.CodAutopec = pro.CodAutopec WHERE cpro.id_carrinho = $valueTwo and cpro.quantidade >= 1)");
return $InsertRecorderProducts;}

/* @Param InsertRecorderFreight @Functions InsertRecorderFreight model.Confirm.php*/
public function InsertRecorderFreight($objConn,$valueOne,$valueTwo){
	$InsertRecorderFreight = $objConn->query("
INSERT INTO ped_frete(idFrete,dimencoes,tipoFrete,vlFrete,dad_cubados,id_pedido,pesoReal,dimenMax,prazo,Id_Transportadora,obsFim) (SELECT frt.idFrete,frt.dimencoes,frt.tipoFrete,frt.vlFrete,frt.dad_cubados,'$valueOne',frt.pesoReal,frt.dimenMax,frt.prazo,frt.Id_Transportadora,frt.osbFim FROM dbo.car_frete AS frt WHERE frt.id_carrinho = '$valueTwo')");
return $InsertRecorderFreight;}

/* @Param SelectProductStorage @Functions SelectProductStorage model.Confirm.php*/
public function SelectProductStorage($objConn,$value){
	$SelectProductStorage = $objConn->query("
SELECT ped.id_pedido,ped.CodCliSite,pro.CodProduto,pro.vl_unit,pro.quantidade,cli.CodCliSite,cli.RazaoSocial FROM dbo.ped_resumido AS ped left JOIN dbo.Clientes AS cli ON ped.CodCliSite = cli.CodCliSite left JOIN dbo.ped_produtos AS pro ON ped.id_pedido = pro.id_pedido WHERE ped.id_pedido = '$value'");
return $SelectProductStorage;}

/* @Param UpdateStorage @Functions UpdateStorage model.Confirm.php*/
public function UpdateStorage($objConn,$idpedido){
	$UpdateStorage = $objConn->query("UPDATE ped_resumido SET VL_ICMSST = (SELECT Sum(pro.VL_ICMSST) FROM dbo.ped_produtos AS pro WHERE pro.id_pedido = '$idpedido' GROUP BY pro.id_pedido) WHERE id_pedido = '$idpedido'");
return $UpdateStorage;}

}
?>
