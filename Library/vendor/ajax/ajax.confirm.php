<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Confirm.php');// inclui a classe da model Confirm.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

session_start();

$objModelConfirm = new ModelConfirm();//inicia a classe ModelHome.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$pedidoId = $objFunctionClass->CheckParameter($_POST['pedidoId']);
$parcelas = $objFunctionClass->CheckParameter($_POST['parcelas']);
$bandeira = $objFunctionClass->CheckParameter($_POST['bandeira']);
$valueT = $objFunctionClass->CheckParameter($_POST['valueT']);

if($bandeira != 'BOLETO'){
	$cardCodSecurity = $objFunctionClass->CheckParameter($_POST['cardCodSecurity']);
	$cardValidate = $objFunctionClass->CheckParameter($_POST['cardValidate']);
	$cardNumberClient = $objFunctionClass->CheckParameter($_POST['cardNumber']);
	$cardNumberClient=str_replace(" ","",$cardNumberClient);
	$nameClient = $objFunctionClass->CheckParameter($_POST['nameClient']);
	$sumB = $objFunctionClass->CheckParameter($_POST['sumB']);
	switch($bandeira){
		case 'VISA':
			$labelFlag = 'Visa';
			$bandeira = 8;
			$CodForPag = 1;
			$n_parcelas = $parcelas;
		break;
		case 'MASTER CARD':
			$labelFlag = 'Master';
			$bandeira = 9;
			$CodForPag = 1;
			$n_parcelas = $parcelas;
		break;
	}
	$query_SelectDataClient = $objModelConfirm->SelectDataClient($objConn,$pedidoId);
	if($fetch_SelectDataClient = $query_SelectDataClient->fetch(PDO::FETCH_ASSOC)){
		$CNPJ = utf8_encode($objFunctionClass->ClearCpfCnpj($fetch_SelectDataClient['CNPJ']));
		$IE = utf8_encode($fetch_SelectDataClient['IE']);
		$Endereco = utf8_encode($fetch_SelectDataClient['Endereco']);
		$Numero = utf8_encode($fetch_SelectDataClient['Numero']);
		$Cidade = utf8_encode($fetch_SelectDataClient['Cidade']);
		$Estado = utf8_encode($fetch_SelectDataClient['Estado']);
		$totalicmsst = utf8_encode($fetch_SelectDataClient['totalicmsst']);
		$totalpro = utf8_encode($fetch_SelectDataClient['totalpro']);
		$IdeType = utf8_encode($fetch_SelectDataClient['TipoCliente']);
		$CEP = utf8_encode($objFunctionClass->ClearCep($fetch_SelectDataClient['CEP']));
		$Fone = utf8_encode($objFunctionClass->ClearPhone($fetch_SelectDataClient['Fone']));
		$Fone = str_replace(" ","",$Fone);
		$Email = utf8_encode(mb_strtolower($fetch_SelectDataClient['Email']));
	}
	$cardValid = explode("/",$cardValidate);
	$valueSumIcms = number_format(($sumB + $totalicmsst), 2, "",".");
		$pedidoAux=0*1;
		if($IdeType == "F"){$IdeType = "CPF";}else{$IdeType = "CNPJ";}
		$MerchantOrderId = trim($pedidoId . str_pad($pedidoAux, 2, "0", STR_PAD_LEFT));
		$NameBuyer = $nameClient;
		$EmailBuyer = $Email;
		$Birthdate = date('Y-m-d');
		$Identity = $CNPJ;
		$IdentityType = $IdeType;
		$AddressStreet = $Endereco;
		$AddressNumber = $Numero;
		$AddressComplement = 'NULL';
		$AddressZipCode = $CEP;
		$AddressCity = $Cidade;
		$AddressState = $Estado;
		$AddressCountry = 'BRA';
		$DeliveryAddressStreet = $Endereco;
		$DeliveryAddressNumber = $Numero;
		$DeliveryAddressComplement = 'NULL';
		$DeliveryAddressZipCode = $CEP;
		$DeliveryAddressCity = $Cidade;
		$DeliveryAddressState = $Estado;
		$DeliveryAddressCountry = 'BRA';
		$SoftDescriptor = 'USR SITE';
		$Phone = $Fone;
		$Amount = $valueSumIcms;
		$Installments = $parcelas;
		$CardNumber = $cardNumberClient;
		$Holder = $nameClient;
		$ExpirationDateMonth = $cardValid[0];
		$ExpirationDateYear = $cardValid[1];
		$SecurityCode = $cardCodSecurity;
		$Brand = $labelFlag;
		$Dthr_Hist_Log = date('Y-m-d H:m:s');
		$DepartureTime = date('Y-m-d');
		$PaymentIdHist = 00;
					$query_SelectCheckSession = $objModelConfirm->SelectCheckSession($objConn,$pedidoId);
					if($query_SelectCheckSession){
						$query_UpdateCount = $objModelConfirm->UpdateCount($objConn);
						$query_SelectCount = $objModelConfirm->SelectCount($objConn);
						if($fetch_SelectCount = $query_SelectCount->fetch(PDO::FETCH_ASSOC)){
							$idPedido = date('ym', time()) . $objFunctionClass->InsertZero($fetch_SelectCount['valor'],5);
							$_SESSION['idPedidoFinal'] = $idPedido;
							$_SESSION['finalizou'] = 'sim';
							$query_SelectDataCarClient = $objModelConfirm->SelectDataCarClient($objConn,$pedidoId);
							if($fetch_SelectDataCarClient = $query_SelectDataCarClient->fetch(PDO::FETCH_ASSOC)){
								$totalpro = $fetch_SelectDataCarClient['totalpro'];
								$server = $_SERVER['REMOTE_ADDR'];
								$serverSub = substr(gethostbyaddr($_SERVER['REMOTE_ADDR']), 0, 249);
								if($fetch_SelectDataCarClient['Id_Transportadora'] == ''){$Id_Transportadora = 'AUTOPEC';}else{$Id_Transportadora = $fetch_SelectDataCarClient['mod_envio'];}
								if($fetch_SelectDataCarClient['Id_Transportadora'] == ''){$Id_TransportadoraA = 6;}else{$Id_TransportadoraA = $fetch_SelectDataCarClient['Id_Transportadora'];}
								if($fetch_SelectDataCarClient['Id_Transportadora'] == ''){$Id_TransportadoraB = 2;}else{$Id_TransportadoraB = $fetch_SelectDataCarClient['temp']*1;}
								$query_InsertDataPed = $objModelConfirm->InsertDataPed($objConn,$idPedido,$fetch_SelectDataCarClient['CodCliente'],$CodForPag,$bandeira,$n_parcelas,$totalpro,$fetch_SelectDataCarClient['vl_frete'],$Id_Transportadora,$server,$serverSub,$Id_TransportadoraA,$Id_TransportadoraB);
								if($query_InsertDataPed){
									$query_InsertRecorderA = $objModelConfirm->InsertRecorderA($objConn,$idPedido);
									if($query_InsertRecorderA){
										$query_InsertRecorderB = $objModelConfirm->InsertRecorderB($objConn,$idPedido);
										if($query_InsertRecorderB){
											$query_InsertRecorderProducts = $objModelConfirm->InsertRecorderProducts($objConn,$idPedido,$pedidoId);
											if($query_InsertRecorderProducts){
												$query_InsertRecorderFreight = $objModelConfirm->InsertRecorderFreight($objConn,$idPedido,$pedidoId);
												if($query_InsertRecorderFreight){
													$query_SelectProductStorage = $objModelConfirm->SelectProductStorage($objConn,$idPedido);
													if($query_SelectProductStorage){
														while($fetch_SelectProductStorage = $query_SelectProductStorage->fetch(PDO::FETCH_ASSOC)){
															$idpedido = $fetch_SelectProductStorage['id_pedido'];
															$CodProduto = $fetch_SelectProductStorage['CodProduto'];
															$razaosocial = $fetch_SelectProductStorage['RazaoSocial'];
															$quantidade = $fetch_SelectProductStorage['quantidade'];
															$valor_unitario = $fetch_SelectProductStorage['vl_unit'];
															$myServer	= "188.888.888.888";
															$myUser		= "usr";
															$myPass		= "usr@@#$2017!";
															$myDB		= "dbusr";
															$ServCom = mssql_connect($myServer, $myUser, $myPass) or die ("Could not connect to database: " . mssql_get_last_message()); 
															$BancCon = mssql_select_db($myDB, $ServCom) or die ("Could not connect to database: ". mssql_get_last_message() );
															@$que_ComproMete = mssql_query("Declare @Retorno Int Exec @Retorno = [dbo].New_Movimentacao 'S', ". $CodProduto.", 'PEDIDO INTERNET ". $idPedido ." - ". $razaosocial ."', ". $quantidade .", ". $valor_unitario ."Select  @Retorno As Retorno");
														}
														//====cielo=======Ini
															$query_SelectCheckCielo= $objModelConfirm->SelectCheckCielo($objConn,$pedidoId);
															$rowCount_SelectCheckCielo = $query_SelectCheckCielo->rowCount();
															//echo $rowCount_SelectCheckCielo;
															if($rowCount_SelectCheckCielo == -1){}
															else if($rowCount_SelectCheckCielo == 1){
															$query_InsertPedCielo = $objModelConfirm->InsertPedCielo($objConn,$idpedido,$CardNumber,$ExpirationDateMonth.'/'.$ExpirationDateYear,$Holder,$PaymentIdHist,$MerchantOrderId,$Brand,'CreditCard',$SoftDescriptor,'Empty','Empty','0',$Dthr_Hist_Log,$Installments,$Dthr_Hist_Log);
																if($query_InsertPedCielo){
																	$query_UpdateCheckCielo = $objModelConfirm->UpdateCheckCielo($objConn,$pedidoAux,$pedidoId);
																}else{print_r('query_InsertPedCielo returnNull');}
															}
															else{
																$CardNumberF = substr($CardNumber, 0,4) . "-" . substr($CardNumber, -4);
																$DateValidCard = $ExpirationDateMonth . $ExpirationDateYear;
																$query_InsertPedCieloSub = $objModelConfirm->InsertPedCieloSub($objConn,$idpedido,$CardNumberF,$DateValidCard,$Holder,$Brand,$Installments,'1');
																
																if($query_InsertPedCieloSub){
																	$pedidoAux = 1;
																}else{
																	//var_dump($query_InsertPedCieloSub );
																	print_r('query_InsertPedCieloSub returnNull');}
															}
															$cabecalhos = array("Content-Type: application/json",'MerchantId: 5d49f9f9-13b6-4e63-a479-499424deab81/822017','MerchantKey: sMr0dzXAb5ADJ4nd2JuVO1pTIhrBUuXxWVSamdNSlmdsnEto'
															);
															$corpo = array(
																"MerchantOrderId" => $MerchantOrderId,
																"Customer" => array("Name" => $NameBuyer,"Email" => $EmailBuyer,"Birthdate" => $Birthdate,"Identity" => $Identity,"IdentityType" => $IdentityType),
																"Address" =>array("Street" => $AddressStreet,"Number" => $AddressNumber,"Complement" => $AddressComplement,"ZipCode" => $AddressZipCode,"City" => $AddressCity,"State" => $AddressState,"Country" => $AddressCountry),
																"DeliveryAddress" => array("Street" => $DeliveryAddressStreet,"Number" => $DeliveryAddressNumber,"Complement" => $DeliveryAddressComplement,"ZipCode" => $DeliveryAddressZipCode,"City" => $DeliveryAddressCity,"State" => $DeliveryAddressState,"Country" => $DeliveryAddressCountry),
																"Payment" => array("Type" => "CreditCard","Amount" => $Amount,"ServiceTaxAmount" => 0,"Installments" => $Installments,"SoftDescriptor" => $SoftDescriptor,"Interest" => "ByMerchant", /*Tipo de parcelamento - Loja (ByMerchant) ou Cartão (ByIssuer).*/"Capture" => false,"Authenticate" => false,"ReturnUrl" => "https://www.usr.com.br/","SoftDescriptor" => $SoftDescriptor,"CreditCard" => array("CardNumber" => $CardNumber,"Holder" => $Holder,"ExpirationDate" => $ExpirationDateMonth.'/'.$ExpirationDateYear,"SecurityCode" => $SecurityCode, /*Codigo de segurança do cartao*/"SaveCard" => false, /*false ou true para guardar os dados do cartão*/"Brand" => $Brand)),
																"FraudAnalysis" => array("Sequence" => "AuthorizeFirst","SequenceCriteria" => "Always","FingerPrintId" => "","Browser" => array("CookiesAccepted" => false,"Email" => $EmailBuyer,"HostName" => "ubuntu1604dev-Virtual-Machine","IpAddress" => "189.8888.88888.8888","Type" => "Chrome")
																),
																"Cart" => array(
																	"IsGift" => false,
																	"ReturnsAccepted" => true,
																	"Items"=> array("GiftCategory" => "Undefined","HostHedge" => "Off","NonSensicalHedge" => "Off","ObscenitiesHedge" => "Off","PhoneHedge" => "Off","Name" => "ProdutoAutopec","Quantity"=>$quantidade,"Sku" => $pedidoId,"UnitPrice" => 100,"Risk" => "High","TimeHedge" => "Normal","Type" => "AdultContent","VelocityHedge" => "High","Passenger" => array("Email" => $EmailBuyer,"Identity" => $Identity,"Name" => $NameBuyer,"Rating" => "Adult","Phone" => $Phone,"Status" => "Accepted"
																		)
																	)
																),
																"MerchantDefinedFields" => array("Id" => 95,"Value" => "CASO DE NECESSIDADE"
																),
																"Shipping" => array("Addressee" => $NameBuyer,"Method" => "LowCost","Phone" => $Phone
																),
																"Travel" => array("DepartureTime" => $DepartureTime,"JourneyType" => "Ida","Route" => "MAO-RJO",
																	"Legs" => array("Destination" => "GYN","Origin" => "VCP"
																	)
																)
															);
															$ch = curl_init();
															curl_setopt_array($ch, array(CURLOPT_CUSTOMREQUEST => 'POST',CURLOPT_URL => 'https://api.cieloecommerce.cielo.com.br/1/sales/',CURLOPT_HTTPHEADER => $cabecalhos,CURLOPT_POSTFIELDS => json_encode($corpo),CURLOPT_ENCODING => 'utf-8',CURLOPT_RETURNTRANSFER => true));
															$resposta = curl_exec($ch);
															curl_close($ch);
															$json_output = json_decode($resposta, true);
															//print_r($json_output);
																	$MerchantOrderId = $json_output['MerchantOrderId'];
																	$PaymentReturnCode = $json_output['Payment']['ReturnCode'];
																	$PaymentReturnMessage = $json_output['Payment']['ReturnMessage'];
																	$PaymentStatus = $json_output['Payment']['Status'];
																	$PaymentPaymentId = $json_output['Payment']['PaymentId'];
																	$PaymentTid = $json_output['Payment']['Tid'];
																	$PaymentAmount = $json_output['Payment']['Amount'];
																	$PaymentCreditCardCardNumber = $json_output['Payment']['CreditCard']['CardNumber'];
																	$PaymentCreditCardHolder = $json_output['Payment']['CreditCard']['Holder'];
																	$PaymentCreditCardExpirationDate = $json_output['Payment']['CreditCard']['ExpirationDate'];
																	$PaymentCreditCardBrand = $json_output['Payment']['CreditCard']['Brand'];
																	$PaymentType = $json_output['Payment']['Type'];
																	$PaymentProvider = $json_output['Payment']['Provider'];
																	$PaymentSoftDescriptor = $json_output['Payment']['SoftDescriptor'];
																	$PaymentReceivedDate = $json_output['Payment']['ReceivedDate'];
																	$PaymentInstallments = $json_output['Payment']['Installments'];
																	$PaymentLinks0Rel = $json_output['Payment']['Links'][0]['Rel'];
																	$PaymentLinks0Method = $json_output['Payment']['Links'][0]['Method'];
																	$PaymentLinks0Href = $json_output['Payment']['Links'][0]['Href'];
															if(isset($json_output['Payment']['ReturnMessage'])){
																if($json_output['Payment']['ReturnMessage'] == 'Transacao autorizada'){
																	$query_UpdatePedCielo = $objModelConfirm->UpdatePedCielo($objConn,$MerchantOrderId,$PaymentReturnCode,$PaymentReturnMessage,$PaymentStatus,$PaymentPaymentId,$PaymentTid,$PaymentAmount,$PaymentCreditCardCardNumber,$PaymentCreditCardHolder,$PaymentCreditCardExpirationDate,$PaymentCreditCardBrand,$PaymentType,$PaymentProvider,$PaymentSoftDescriptor,$PaymentReceivedDate,$PaymentInstallments,$PaymentLinks0Rel,$PaymentLinks0Method,$PaymentLinks0Href,$pedidoAux,$idpedido);
																	$query_InsertPedCieloEnd = $objModelConfirm->InsertPedCieloEnd($objConn,$pedidoId,$PaymentCreditCardCardNumber,$PaymentCreditCardExpirationDate,$PaymentCreditCardHolder,$PaymentPaymentId,$MerchantOrderId,$PaymentCreditCardBrand,'CreditCard',$PaymentSoftDescriptor,'Empty','Empty','0',$PaymentReceivedDate,$PaymentInstallments,$Dthr_Hist_Log);
																	if($query_InsertPedCieloEnd){
																		print_r('<div class="alert alert-warning text-center text-shadow">Transação Aprovada!</div>');print_r('|'.$idpedido);
																	}else{print_r('query_InsertPedCieloEnd returnNull');}
																}
																else{
																	$query_UpdatePedCieloReproved = $objModelConfirm->UpdatePedCieloReproved($objConn,$json_output['Payment']['PaymentId'],$json_output['Payment']['ReturnCode'],$json_output['Payment']['ReturnMessage'],$json_output['Payment']['Tid'],$idpedido);
																	print_r('<div class="alert alert-danger text-center text-shadow">Pagamento Reprovado: '.$json_output['Payment']['ReturnMessage'].'</div>');
																	print_r('|0');
																}
															}
															if(isset($json_output[0]['Code'])){
																$query_UpdatePedCieloReprovedSub = $objModelConfirm->UpdatePedCieloReprovedSub($objConn,$json_output[0]['Code'],$json_output[0]['Message'],$idpedido);
																print_r('<div class="alert alert-danger text-center text-shadow">Pagamento Reprovado: '.$json_output[0]['Message'].'</div>');
																print_r('|0');
															}
														//====cielo=======End
													}else{print_r('query_SelectProductStorage returnNull');}
												}else{print_r('query_InsertRecorderFreight returnNull');}
											}else{print_r('query_InsertRecorderProducts returnNull');}
										}else{print_r('query_InsertRecorderB returnNull');}
									}else{print_r('query_InsertRecorderA returnNull');}
								}else{print_r('query_InsertDataPed returnNull');}
							session_destroy();session_write_close();
							}
						}else{print_r('fetch_SelectCount returnNull');}
					}else{print_r('query_SelectCheckSession returnNull');}
}
else{
$pedidoId = $objFunctionClass->CheckParameter($_POST['pedidoId']);
$parcelas = $objFunctionClass->CheckParameter($_POST['parcelas']);
$bandeira = $objFunctionClass->CheckParameter($_POST['bandeira']);
$valueT = $objFunctionClass->CheckParameter($_POST['valueT']);
		$bandeira = 1;
		$CodForPag = 3;
		$n_parcelas = 1;
$query_SelectCheckSession = $objModelConfirm->SelectCheckSession($objConn,$pedidoId);
if($query_SelectCheckSession){
	$query_UpdateCount = $objModelConfirm->UpdateCount($objConn);
	$query_SelectCount = $objModelConfirm->SelectCount($objConn);
if($fetch_SelectCount = $query_SelectCount->fetch(PDO::FETCH_ASSOC)){
	$idPedido = date('ym', time()) . $objFunctionClass->InsertZero($fetch_SelectCount['valor'],5);
	$_SESSION['idPedidoFinal'] = $idPedido;
	$_SESSION['finalizou'] = 'sim';
	$query_SelectDataCarClient = $objModelConfirm->SelectDataCarClient($objConn,$pedidoId);
	if($fetch_SelectDataCarClient = $query_SelectDataCarClient->fetch(PDO::FETCH_ASSOC)){
		$totalpro = $fetch_SelectDataCarClient['totalpro'];
		$server = $_SERVER['REMOTE_ADDR'];
		$serverSub = substr(gethostbyaddr($_SERVER['REMOTE_ADDR']), 0, 249);
		if($fetch_SelectDataCarClient['Id_Transportadora'] == ''){$Id_Transportadora = 'AUTOPEC';}else{$Id_Transportadora = $fetch_SelectDataCarClient['mod_envio'];}
		if($fetch_SelectDataCarClient['Id_Transportadora'] == ''){$Id_TransportadoraA = 6;}else{$Id_TransportadoraA = $fetch_SelectDataCarClient['Id_Transportadora'];}
		if($fetch_SelectDataCarClient['Id_Transportadora'] == ''){$Id_TransportadoraB = 2;}else{$Id_TransportadoraB = $fetch_SelectDataCarClient['temp']*1;}
		$query_InsertDataPed = $objModelConfirm->InsertDataPed($objConn,$idPedido,$fetch_SelectDataCarClient['CodCliente'],$CodForPag,$bandeira,$n_parcelas,$totalpro,$fetch_SelectDataCarClient['vl_frete'],$Id_Transportadora,$server,$serverSub,$Id_TransportadoraA,$Id_TransportadoraB);
		if($query_InsertDataPed){
			$query_InsertRecorderA = $objModelConfirm->InsertRecorderA($objConn,$idPedido);
			if($query_InsertRecorderA){
				$query_InsertRecorderB = $objModelConfirm->InsertRecorderB($objConn,$idPedido);
				if($query_InsertRecorderB){
					$query_InsertRecorderProducts = $objModelConfirm->InsertRecorderProducts($objConn,$idPedido,$pedidoId);
					if($query_InsertRecorderProducts){
						$query_InsertRecorderFreight = $objModelConfirm->InsertRecorderFreight($objConn,$idPedido,$pedidoId);
						if($query_InsertRecorderFreight){
							$query_SelectProductStorage = $objModelConfirm->SelectProductStorage($objConn,$idPedido);
							if($query_SelectProductStorage){
								while($fetch_SelectProductStorage = $query_SelectProductStorage->fetch(PDO::FETCH_ASSOC)){
									$idpedido = $fetch_SelectProductStorage['id_pedido'];
									$CodProduto = $fetch_SelectProductStorage['CodProduto'];
									$razaosocial = $fetch_SelectProductStorage['RazaoSocial'];
									$quantidade = $fetch_SelectProductStorage['quantidade'];
									$valor_unitario = $fetch_SelectProductStorage['vl_unit'];
									$myServer	= "188.888.88.888";
									$myUser		= "usr";
									$myPass		= "usr@@#$2017!";
									$myDB		= "dbusr";
									$ServCom = mssql_connect($myServer, $myUser, $myPass) or die ("Could not connect to database: " . mssql_get_last_message()); 
									$BancCon = mssql_select_db($myDB, $ServCom) or die ("Could not connect to database: ". mssql_get_last_message() );
									@$que_ComproMete = mssql_query("Declare @Retorno Int Exec @Retorno = [dbo].New_Movimentacao 'S', ". $CodProduto.", 'PEDIDO INTERNET ". $idpedido ." - ". $razaosocial ."', ". $quantidade .", ". $valor_unitario ."Select  @Retorno As Retorno");
								}
							}else{print_r('query_SelectProductStorage returnNull');}
						}else{print_r('query_InsertRecorderFreight returnNull');}
					}else{print_r('query_InsertRecorderProducts returnNull');}
				}else{print_r('query_InsertRecorderB returnNull');}
			}else{print_r('query_InsertRecorderA returnNull');}
			echo '|'.$idpedido;
		}else{print_r('query_InsertDataPed returnNull');}
		session_destroy();session_write_close();
	}
}
else{print_r('returnNull');}
	}
else{print_r('returnNull');}

}
?>