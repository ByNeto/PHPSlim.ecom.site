<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Products.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
$objModelProducts = new ModelProducts();
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$cepEnd = $_GET['cep'];
$cepIni = null;
$cepFim = null;
$idSession = "";

if(isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp'){
	$idSession = $_GET['idSession'];
	$query_UpdateProductIniConc = $objModelProducts->UpdateProductIniConc($objConn,$idSession);
	$query_DeleteCarStorage = $objModelProducts->DeleteCarStorage($objConn,$idSession);
	$query_DeleteCarStorageFreight = $objModelProducts->DeleteCarStorageFreight($objConn,$idSession);
	$query_SumCarProducts = $objModelProducts->SumCarProducts($objConn, $idSession);
	if($fetch_SumCarProducts = $query_SumCarProducts->fetch(PDO::FETCH_ASSOC)){$value=$fetch_SumCarProducts['tcar'];}
}
else{
	$weight = $_GET['peso'];
	$value = $_GET['value'];
	$cepIni = null;
	$cepFim = null;
	print_r('<hr class="hr_border"></hr>');
}
	$query_SearchRangerCep = $objModelProducts->SearchRangerCep($objConn);
	while($fetch_SearchRangerCep = $query_SearchRangerCep->fetch(PDO::FETCH_ASSOC)){
		if($cepEnd >= $fetch_SearchRangerCep['cep_inicio'] && $cepEnd <= $fetch_SearchRangerCep['cep_final']){
		$cidade = $fetch_SearchRangerCep['cidade'];
		$vlFret = $fetch_SearchRangerCep['vl_frete'];
		$msgSit = $fetch_SearchRangerCep['msgsite'];
		$cepIni = $fetch_SearchRangerCep['cep_inicio'];
		$cepFim = $fetch_SearchRangerCep['cep_final'];
		$vlComp = $fetch_SearchRangerCep['vl_compra'];
		}
	}
	if($cepEnd >= $cepIni && $cepEnd <= $cepFim){
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp'){}
			else{
				print_r('<div style="margin-top:3%;" class="alert alert-success text-center" role="alert">Identificamos que seu CEP é de <strong>'. utf8_encode($cidade) .' <br /> '. utf8_encode($msgSit) .'<br/> E vai custar R$ '. number_format( (($value*1) >= $vlComp?0.001:$vlFret) ,2,',','.') .'</strong></div>');
			}
			if($value >= $vlComp){
				$frete = 0.001;
			}
			else{
				$frete = $vlFret;
			}
			if($query_InsertCarFrete = $objModelProducts->InsertCarFrete($objConn, $idSession,0,'AutoPec',$frete,'Peso: 0 - Peso Cubado: 0',0,0,1,6,$cidade,$msgSit)){}else{}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				$selectFrete = "";
				$query_TransSelectOptions = $objModelProducts->TransSelectOptions($objConn, $idSession);
				while( $fetch_TransSelectOptions = $query_TransSelectOptions->fetch(PDO::FETCH_ASSOC) ) {
					$selectFrete .= "<option value='".$fetch_TransSelectOptions['idFrete']."'>".$fetch_TransSelectOptions['tipoFrete']." - R$ ".number_format($fetch_TransSelectOptions['vlFrete'],2,',','.')." - ".$fetch_TransSelectOptions['prazo']." Dias</option>";
				}
				echo $selectFrete;
			}
			exit;
	}
	$cepFinal = $cepEnd;
	if(isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp'){
		$modEnvioPr = "C";
		$PsCorr = 0;
		$PESOT  = 0;
		$PsRodo = 0;
		$PsAero = 0;
		$VLT    = 0;
		$Final  = 0;
		$TpFre  = 0;
		$grava = '';
		$query_TransTotalWeight = $objModelProducts->TransTotalWeight($objConn, $idSession);
		$fetch_TransTotalWeight = $query_TransTotalWeight->fetch(PDO::FETCH_ASSOC);
			$PsCorr += $fetch_TransTotalWeight['PsCorr'];
			$PESOT  += $fetch_TransTotalWeight['PESO'];
			$PsRodo += $fetch_TransTotalWeight['PsRodo'];
			$PsAero += $fetch_TransTotalWeight['PsAero'];
			$VLT    += $fetch_TransTotalWeight['VLT'];
			$dimen[$fetch_TransTotalWeight['dimMax']] = $fetch_TransTotalWeight['desDimes'];
			if($fetch_TransTotalWeight['MOD_ENVIO'] == "J"){
				$modEnvioPr = $fetch_TransTotalWeight['MOD_ENVIO'];
			}
		$dimenMax = $dimen[max(array_keys($dimen))];
		$ValorMax = max(array_keys($dimen));

		if($PsCorr < 10){$pesoCorrei = $PESOT;}
		else if(($PsCorr > 10) && ($PsCorr < $PESOT)){$pesoCorrei = $PESOT;}
		else{$pesoCorrei = $PsCorr;}
		if($pesoCorrei < 0.300){$pesoCorrei = 0.500;}

	$PesoTota	=$pesoCorrei;
	$pesoJadLog	=$PsRodo;
	$pesoJadLoga=$PsAero;
	$valorTotalp=$VLT;
	$sCdMaoPropria="N";
	$nVlValorDeclarado=$valorTotalp;
	$sCdAvisoRecebimento="N";
	$vl_frete_jaglogR= 0;
	$vl_frete_jaglogA= 0;
	$PrazoEntregaP= 10;
	$PrazoEntregaS= 10;
	$totals= 0;
	$totalsP= 0;
	$erroGeral= 0;
	$peso=$PESOT;
	$pieces=explode('.', $VLT);
	if($modEnvioPr != 'J'){
		$retornoCalc = $objFunctionClass->TransCorreioWs('13063340',$cepFinal,$peso,$pieces[0], 1);
			$arReturn= explode(',', $retornoCalc);
			if($arReturn[0] == 'ok'){
				if($objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Correios - SEDEX', ( floatval(str_replace(',', '.', $arReturn[2])) * 1), 'Peso: '.$peso.' - Peso Cubado: '.$PsCorr.' - [6000]', $pesoCorrei, $ValorMax, ($arReturn[1] == 0?4:$arReturn[1]) + 1, 2, '', '0' )){}
				else{echo 'error';}
			}
		}
		if($objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Retirada em loja', 0.0001, 'Peso: 0 - Peso Cubado: 0 - [4 / 3333] 0 - [6000]', $pesoCorrei, $ValorMax, 2, 10, '', '1' ) ){
		}
		else{echo 'error';}
	}
	else{
		$peso= $weight;
		$pieces= explode('.', $value);
		print_r($objFunctionClass->TransCorreioWs('13063340', $cepFinal, $peso, $pieces[0]));
	}
	$query_TransJadLogDb = $objModelProducts->TransJadLogDb($objConn, $cepFinal);
	if($fetch_TransJadLogDb = $query_TransJadLogDb->fetch(PDO::FETCH_ASSOC)){
	$Prazo= $fetch_TransJadLogDb['prazo'];
	if(isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp'){
		$pp = $pesoJadLog;
	}
	else{
		$pp = intval($weight);
	}
	$SumDays= 3;
	$transPrazo= ($Prazo + $SumDays);
	switch($pp){
		case ($pp <= 3):$transValorDb = $fetch_TransJadLogDb['p3'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if(isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 3 && $pp <= 5):
		$transValorDb = $fetch_TransJadLogDb['p5'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 5 && $pp <= 10):
		$transValorDb = $fetch_TransJadLogDb['p10'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 10 && $pp <= 15):
		$transValorDb = $fetch_TransJadLogDb['p15'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 15 && $pp <= 20):
		$transValorDb = $fetch_TransJadLogDb['p20'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 20 && $pp <= 30):
		$transValorDb = $fetch_TransJadLogDb['p30'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 30 && $pp <= 50):
		$transValorDb = $fetch_TransJadLogDb['p50'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 50 && $pp <= 75):
		$transValorDb = $fetch_TransJadLogDb['p75'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 75 && $pp <= 100):
		$transValorDb = $fetch_TransJadLogDb['p100'] + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		case ($pp > 100):
		$transValorDb = ($fetch_TransJadLogDb['pesoextra'] * $weight) + ($pieces[0] * (($fetch_TransJadLogDb['gris'] / 100)));
		if($transValorDb!= 0){$valueFreight = number_format($transValorDb,2,',','.');}else{$valueFreight = $objFunctionClass->TransJadLogWs($pieces[0], $cepFinal, $peso);}
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Jadlog', ( $valueFreight * 1), 'Peso: '.$peso.' - Peso Cubado: '.$pesoJadLog.' - [6000]', $pesoJadLog, $ValorMax, ($transPrazo) + 3, 5, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>JADLOG</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazo.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$valueFreight.'</h4></div>';
			}
			print_r($return);
		break;
		}
	$query_TransByBusDb = $objModelProducts->TransByBusDb($objConn, $cepFinal);
	if($fetch_TransByBusDb = $query_TransByBusDb->fetch(PDO::FETCH_ASSOC)){
	$vlP = $pieces[0] * ($fetch_TransByBusDb['porvlnfe'] / 100);
	if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
		$pp = $peso;
	}
	else{
		$pp = intval($weight);
	}
	if($vlP > $fetch_TransByBusDb['vlFrenteMinimo']){
		$pp = ($pp - $fetch_TransByBusDb['pesoMinimo']);
		if($pp > 0){$transValorByBusDb = $vlP + ($pp * $fetch_TransByBusDb['valorExcedente']);}
		else{$transValorByBusDb = $vlP;}
			$transPrazoByBusDb = 0;
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'By Bus', ( number_format($transValorByBusDb,2,',','.') ), 'Peso: '.$peso.' - Peso Cubado: '.$peso.' - [6000]', $peso, $ValorMax, ($transPrazoByBusDb + 1), 7, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>ByBus</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazoByBusDb.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.number_format($transValorByBusDb,2,',','.').'</h4></div>';
			}
			print_r($return);
		}
		elseif($pp <= $fetch_TransByBusDb['pesoMinimo']){
			$transValorByBusDb = $fetch_TransByBusDb['vlFrenteMinimo'];
			$transPrazoByBusDb = 0;
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'By Bus', ( number_format($transValorByBusDb,2,',','.') ), 'Peso: '.$peso.' - Peso Cubado: '.$peso.' - [6000]', $peso, $ValorMax, ($transPrazoByBusDb + 1), 7, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>ByBus</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazoByBusDb.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.number_format($transValorByBusDb,2,',','.').'</h4></div>';
			}
			print_r($return);
		}
		else{
			$pp = ($pp - $fetch_TransByBusDb['pesoMinimo']);
			$transValorByBusDb = $fetch_TransByBusDb['vlFrenteMinimo'] + ($pp * $fetch_TransByBusDb['valorExcedente']);
			$transPrazoByBusDb = 1;
			if( isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'By Bus', ( number_format($transValorByBusDb,2,',','.') ), 'Peso: '.$peso.' - Peso Cubado: '.$peso.' - [6000]', $peso, $ValorMax, ($transPrazoByBusDb) + 1, 7, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>ByBus</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazoByBusDb.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.number_format($transValorByBusDb,2,',','.').'</h4></div>';
			}
			print_r($return);
		}
	}
	$query_TransBelloniDb = $objModelProducts->TransBelloniDb($objConn,$cepFinal);
	if($fetch_TransBelloniDb = $query_TransBelloniDb->fetch(PDO::FETCH_ASSOC)){
		$pp = intval($weight);
		$vTransBelloniDb = $pieces[0] * ($fetch_TransBelloniDb['porvlnfe'] / 100);
		if($pp <= $fetch_TransBelloniDb['pesoMax']){
		$transValorBelloni = $fetch_TransBelloniDb['vlFrenteMinimo'] + $vTransBelloniDb;
		$transPrazoBelloniDb = 0;
			if(isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp' ){
				if($objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Transbelloni', ( number_format($transValorBelloni,2,',','.') ), 'Peso: '.$peso.' - Peso Cubado: '.$peso.' - [6000]', $peso, $ValorMax, ($transPrazoBelloniDb + 1), 8, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>Transbelloni</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazoBelloniDb.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.number_format($transValorBelloni,2,',','.').'</h4></div>';
			}
			print_r($return);
		
		}
		else{
		$transValorBelloni = 0;
		$transPrazoBelloniDb = 0;
			if(isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp'){
				if( $objModelProducts->TransCarFrete($objConn, $idSession, $dimenMax, 'Transbelloni', ( number_format($transValorBelloni,2,',','.') ), 'Peso: '.$peso.' - Peso Cubado: '.$peso.' - [6000]', $peso, $ValorMax, ($transPrazoBelloniDb + 1), 8, '', '1' ) ){ $return = ''; }
				else{ $return = 'error';}
			}
			else{
				$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>Transbelloni</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$transPrazoBelloniDb.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.number_format($transValorBelloni,2,',','.').'</h4></div>';
			}
			print_r($return);
		}
	}
	if(isset($_GET['tipoEntrega']) && $_GET['tipoEntrega'] == 'transp'){
		$selectFrete = "";
		$query_TransSelectOptions = $objModelProducts->TransSelectOptions($objConn, $idSession);
		while( $fetch_TransSelectOptions = $query_TransSelectOptions->fetch(PDO::FETCH_ASSOC) ) {
			$selectFrete .= "<option value='".$fetch_TransSelectOptions['idFrete']."'>".$fetch_TransSelectOptions['tipoFrete']." - R$ ".number_format($fetch_TransSelectOptions['vlFrete'],2,',','.')." - ".$fetch_TransSelectOptions['prazo']." Dias</option>";
		}
		echo $selectFrete;
	}
}
?>