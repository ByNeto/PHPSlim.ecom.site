<?php
Class FunctionClass{
	private static $UrlFixed;
	private static $XssClean;
	private static $InjectionSQL;
	private static $EmailInjectionSQL;
	private static $CheckPicture;
	private static $CheckPictureOne;
	private static $CheckPictureTwo;
	private static $CheckPictureThree;
	private static $PlotVerify;
	private static $PlotVerifyMultiValue;
	private static $LimitText;
	private static $RenderMenu;
	private static $RenderMenuAutomakers;
	private static $InvalidParameter;
	private static $ModalMessengerAlert;
	private static $ModalMessengerAlertLogin;
	private static $ClearString;
	private static $ClearSalary;
	private static $ClearFormatDate;
	private static $ClearCpfCnpj;
	private static $ClearCep;
	private static $ClearPhone;
	private static $ClearNameGrupo;
	private static $ClearNameGrupoLink;
	private static $ClearLettersAndCharacters;
	private static $ClearURL;
	private static $TransCorreioWs;
	private static $TransJadLogWs;
	private static $CheckParameter;
	private static $PlotVerifyMultiValueConfirm;
	private static $GeneratePassword;
	private static $FirstWord;
	private static $InsertZero;
	private static $PlotVerifyMultiValueSelect;
	private static $URLSeo;

/*@Param UrlFixed @Functions UrlFixed function.FunctionClass.php*/
public function UrlFixed(){
	$return = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://$_SERVER[HTTP_HOST]" : "http://$_SERVER[HTTP_HOST]";
return $return;
}

/*@Param XssClean @Functions XssClean function.FunctionClass.php*/
public function XssClean($data){
$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
// Removendo atributos xmlns
$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
// Remove javascript: and vbscript: protocols
$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
// Tratando expressoes Javascript <span style="width: expression(alert('Ping!'));"></span>
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
// Removendo namespaced e elementos do javascript (we do not need them)
$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
do{
// Removendo as Tags indesejadas
$old_data = $data;
$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
}
while($old_data !== $data);
return $data;
}

/* @Param InjectionSQL @Functions InjectionSQL function.FunctionClass.php*/
public function InjectionSQL($sql){
	$sql = trim($sql);
	$sql = get_magic_quotes_gpc() == 0 ? addslashes($sql) : $sql;
	$sql = strip_tags($sql);
	$sql = preg_replace(sql_regcase('/(from|select|insert|delete|where|drop table|show tables|\\\\)/'),'',$sql);
	$sql = preg_replace('@(--|\#|\*|;|=)@s', '', $sql);
	$sql = mb_strtoupper($sql);
return $sql;
}

/* @Param EmailInjectionSQL @Functions EmailInjectionSQL function.FunctionClass.php*/
public function EmailInjectionSQL($sql){
	$sql = trim($sql);
	$sql = get_magic_quotes_gpc() == 0 ? addslashes($sql) : $sql;
	$sql = strip_tags($sql);
	$sql = preg_replace(sql_regcase('/(from|select|insert|delete|where|drop table|show tables|\\\\)/'),'',$sql);
	$sql = mb_strtolower($sql);
return $sql;
}

/* @Param CheckPicture @Functions CheckPicture function.FunctionClass.php*/
public function CheckPicture($CheckPicture,$Size){
	if($_SERVER['REMOTE_ADDR'] == '10.48.40.226'){if(trim($CheckPicture)==''){$return=$this->UrlFixed().'/Library/imagens/img/unavailable.jpg';}else{$img=str_replace('.jpg','',$CheckPicture);$return='https://www.autopec.com.br/images/img_produtos/img_'.$img.'_'.$Size.'.jpg';$path=$_SERVER['DOCUMENT_ROOT'].'/images/img_produtos/img_'.$img.'_'.$Size.'.jpg';if(file_exists($path)){}else{$return = $this->UrlFixed().'/Library/imagens/img/unavailable.jpg';}}return $return;}
	else{$ch=curl_init('https://www.autopec.com.br/images/img_produtos/img_'.str_replace('.jpg','_'.$Size.'.jpg',$CheckPicture));curl_setopt($ch,CURLOPT_NOBODY,true);curl_exec($ch);$code=curl_getinfo($ch,CURLINFO_HTTP_CODE);curl_close($ch);if($code == 200){$return='https://www.autopec.com.br/images/img_produtos/img_'.str_replace('.jpg','_'.$Size.'.jpg',$CheckPicture);if('https://www.autopec.com.br/images/img_produtos/img_'.str_replace('.jpg','_'.$Size.'.jpg',$CheckPicture)){$return='https://www.autopec.com.br/images/img_produtos/img_'.str_replace('.jpg','_'.$Size.'.jpg',$CheckPicture);return $return;}else{$return = $this->UrlFixed().'/Library/imagens/img/unavailable.jpg';return $return;}}else{$return=$this->UrlFixed().'/Library/imagens/img/unavailable.jpg';return $return;}}
}

/* @Param CheckPictureOne @Functions CheckPictureOne function.FunctionClass.php*/
public function CheckPictureOne($CheckPicture){
	if($_SERVER['REMOTE_ADDR'] == '10.48.40.226'){if(trim($CheckPicture)==''){$return=$this->UrlFixed().'/Library/imagens/img/unavailable.jpg';}else{$img=str_replace('01.jpg','02_b.jpg',$CheckPicture);$return='https://www.autopec.com.br/images/img_produtos/img_'.$img;$path=$_SERVER['DOCUMENT_ROOT'].'/images/img_produtos/img_'.$img;if(file_exists($path)){}else{$return = $this->UrlFixed().'/Library/imagens/img/unavailable.jpg';}}return $return;}
	else{$ch = curl_init('https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','02_b.jpg',$CheckPicture));curl_setopt($ch, CURLOPT_NOBODY, true);curl_exec($ch);$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);curl_close($ch);if($code == 200){$return = 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','02_b.jpg',$CheckPicture);if($return == 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','02_b.jpg',$CheckPicture)){$return = 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','02_b.jpg',$CheckPicture);return $return;}else{return $return;}}else{$return = $this->UrlFixed().'/Library/imagens/img/unavailable.jpg';return $return;}}
}

/* @Param CheckPictureTwo @Functions CheckPictureTwo function.FunctionClass.php*/
public function CheckPictureTwo($CheckPicture){
	if($_SERVER['REMOTE_ADDR'] == '10.48.40.226'){if(trim($CheckPicture)==''){$return=$this->UrlFixed().'/Library/imagens/img/unavailable.jpg';}else{$img=str_replace('01.jpg','03_b.jpg',$CheckPicture);$return='https://www.autopec.com.br/images/img_produtos/img_'.$img;$path=$_SERVER['DOCUMENT_ROOT'].'/images/img_produtos/img_'.$img;if(file_exists($path)){}else{$return = $this->UrlFixed().'/Library/imagens/img/unavailable.jpg';}}return $return;}
	else{$ch = curl_init('https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','03_b.jpg',$CheckPicture));curl_setopt($ch, CURLOPT_NOBODY, true);curl_exec($ch);$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);curl_close($ch);if($code == 200){$return = 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','03_b.jpg',$CheckPicture);if($return == 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','03_b.jpg',$CheckPicture)){$return = 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','03_b.jpg',$CheckPicture);return $return;}else{return $return;}}else{$return = $this->UrlFixed().'/Library/imagens/img/unavailable.jpg';return $return;}}
}

/* @Param CheckPictureThree @Functions CheckPictureThree function.FunctionClass.php*/
public function CheckPictureThree($CheckPicture){
	if($_SERVER['REMOTE_ADDR'] == '10.48.40.226'){if(trim($CheckPicture)==''){$return=$this->UrlFixed().'/Library/imagens/img/unavailable.jpg';}else{$img=str_replace('01.jpg','04_b.jpg',$CheckPicture);$return='https://www.autopec.com.br/images/img_produtos/img_'.$img;$path=$_SERVER['DOCUMENT_ROOT'].'/images/img_produtos/img_'.$img;if(file_exists($path)){}else{$return = $this->UrlFixed().'/Library/imagens/img/unavailable.jpg';}}return $return;}
	else{$ch = curl_init('https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','04_b.jpg',$CheckPicture));curl_setopt($ch, CURLOPT_NOBODY, true);curl_exec($ch);$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);curl_close($ch);if($code == 200){$return = 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','04_b.jpg',$CheckPicture);if($return == 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','04_b.jpg',$CheckPicture)){$return = 'https://www.autopec.com.br/images/img_produtos/img_'.str_replace('01.jpg','04_b.jpg',$CheckPicture);return $return;}else{return $return;}}else{$return = $this->UrlFixed().'/Library/imagens/img/unavailable.jpg';return $return;}}
}

/* @Param PlotVerify @Functions PlotVerify function.FunctionClass.php*/
public function PlotVerify($PlotValue, $PlotNumber){
	$return = (int)($PlotValue / $PlotNumber);
	$return = ($return > 12?12:$return);
	$return = ($return > 1? 'em até ' . $return . 'x de R$ ' . number_format(($PlotValue / $return ),2,',','.'):'em 1x de R$'. number_format(($PlotValue / 1 ),2,',','.'));
return $return;
}

/* @Param PlotVerifyMultiValue @Functions PlotVerifyMultiValue function.FunctionClass.php*/
public function PlotVerifyMultiValue($PlotValue, $PlotNumber){
	$return = (int)($PlotValue / $PlotNumber);
	$return = ($return > 12?12:$return);
	for($i=1; $i <= $return; $i++){
		print_r('<div class="parcela"><div class="um_quart parcela_produto">'.$i.'x</div><div class="um_quart de_produtos">de R$'.number_format(($PlotValue / $i ),2,',','.').'</div><div class="um_quart juros_produto" >sem juros</div><div class="um_quart total_produto" >total: R$'.number_format(($PlotValue / $i ),2,',','.').'</div></div>');
	}
}

/* @Param PlotVerifyMultiValueConfirm @Functions PlotVerifyMultiValueConfirm function.FunctionClass.php*/
public function PlotVerifyMultiValueConfirm($PlotValue, $PlotNumber){
	$return = (int)($PlotValue / $PlotNumber);
	$return = ($return > 12?12:$return);
	for($i=1; $i <= $return; $i++){
		print_r('<option><div class="um_quart parcela_produto">'.$i.'x </div><div class="um_quart de_produtos"> de R$'.number_format(($PlotValue / $i ),2,',','.').'</div><div class="um_quart juros_produto" > sem juros</div><div class="um_quart total_produto" > total: R$'.number_format(($PlotValue / $i ),2,',','.').'</div></option>');
	}
}

/* @Param PlotVerifyMultiValueSelect @Functions PlotVerifyMultiValueSelect function.FunctionClass.php*/
public function PlotVerifyMultiValueSelect($PlotValue, $PlotNumber){
	$return = (int)($PlotValue / $PlotNumber);
	if($PlotValue < $PlotNumber){$i =1;print_r('<option value='.$i.'><div class="um_quart parcela_produto">'.$i.'x </div><div class="um_quart de_produtos"> de R$'.number_format(($PlotValue ),2,',','.').'</div><div class="um_quart juros_produto" > sem juros</div><div class="um_quart total_produto" > total: R$'.number_format(($PlotValue ),2,',','.').'</div></option>');}
	else{$return = ($return > 12?12:$return);for($i=1; $i <= $return; $i++){print_r('<option value='.$i.'><div class="um_quart parcela_produto">'.$i.'x </div><div class="um_quart de_produtos"> de R$'.number_format(($PlotValue / $i ),2,',','.').'</div><div class="um_quart juros_produto" > sem juros</div><div class="um_quart total_produto" > total: R$'.number_format(($PlotValue / $i ),2,',','.').'</div></option>');}}
}

/*@Param Text Limit Flag true or false @Functions LimitText function.FunctionClass.php*/
public function LimitText($Text, $Limit, $Flag = true){
	$origtext = $Text;$count = strlen(strip_tags($Text));
	if($count <= $Limit){$newtext = $Text;}
	else{if($Flag == true){$newtext = trim(mb_substr($Text, 0, $Limit)).'<a title="'.$origtext.'" data-toggle="tooltip" data-placement="top">...</a>';}else{$endspace = strrpos(mb_substr($Text, 0, $Limit),' ');$newtext = trim(mb_substr($Text, 0, $endspace)).'<a title="'.$origtext.'" data-toggle="tooltip" data-placement="top">...</a>';}
	}
return $newtext;
}

/*@Param RenderMenu @Functions RenderMenu function.FunctionClass.php*/
public function RenderMenu($valueTwo,$valueOne){
	$return= '<a href="'.$this->UrlFixed().'/montadora/'.$this->ClearURL(utf8_encode($valueTwo)).'/'.$valueOne.'"><h5 class="mega-dropdown" style="color:#fff;"><img class="img-responsive" src="'.$this->UrlFixed().'/Library/imagens/menu/'.$valueOne.'.png">&nbsp; &nbsp;<span class="text-white text-shadow">'.$valueTwo.'</span></h5></a>';
return $return;
}

/*@Param RenderMenu @Functions RenderMenu function.FunctionClass.php*/
public function RenderMenuAutomakers($valueTwo,$valueOne){
	$return= '<h5 class="mega-dropdown" style="color:#fff;"><img class="img-responsive" src="'.$this->UrlFixed().'/Library/imagens/menu/'.$valueOne.'.png">&nbsp; &nbsp;<span class="text-white text-shadow">'.$valueTwo.'</span></h5>';
return $return;
}

/*@Param InvalidParameter @Functions InvalidParameter function.FunctionClass.php*/
public function InvalidParameter($CodError){
$return='<meta http-equiv="refresh" content="0;URL='.$this->UrlFixed().'"/>
			<div id="ModalFunction" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="alert alert-danger" role="alert"><h4 class="text-center">Invalid Parameter!<p>Error Level <strong>'.$CodError.'</strong></p></h4></div>
					</div>
				</div>
			</div>';
return $return;
}

/*@Param ModalMessengerAlert @Functions ModalMessengerAlert function.FunctionClass.php*/
public function ModalMessengerAlert($MsgOne,$MsgTwo){
$return= '<meta http-equiv="refresh" content="0;URL='.$this->UrlFixed().'" />
			<div id="ModalFunction" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				<h5 class="modal-title"><img class="img-responsive" src="'.$this->UrlFixed().'/Library/imagens/logos/logo-min.png"></h5>
					<div class="modal-content">
						<div class="alert alert-danger" role="alert">
							<h2 class="text-center"><b>'.$MsgOne.'</b></h2>
							<h3 class="text-center">'.$MsgTwo.'</h3>
						</div>
					</div>
				</div>
			</div>';
return $return;
}

/*@Param ModalMessengerAlertLogin @Functions ModalMessengerAlertLogin function.FunctionClass.php*/
public function ModalMessengerAlertLogin($MsgOne,$MsgTwo){
$return= '<meta http-equiv="refresh" content="4;URL='.$this->UrlFixed().'/login/autopec/" />
			<div id="ModalFunction" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				<h5 class="modal-title"><img class="img-responsive" src="'.$this->UrlFixed().'/Library/imagens/logos/logo-min.png"></h5>
					<div class="modal-content">
						<div class="alert alert-danger" role="alert">
							<h2 class="text-center"><b>'.$MsgOne.'</b></h2>
							<h3 class="text-center">'.$MsgTwo.'</h3>
						</div>
					</div>
				</div>
			</div>';
return $return;
}
/*@Param ClearString @Functions ClearString function.FunctionClass.php*/
public function ClearString($parameter){
	$parameter = trim($parameter);$parameter = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a ã e E i I o O u U n N ç ç"),$parameter);
return $parameter;
}

/*@Param ClearSalary @Functions ClearSalary function.FunctionClass.php*/
public function ClearSalary($parameter){
	$parameter = trim($parameter);
	$parameter = str_replace("R$", "", $parameter);
return $parameter;
}

/*@Param ClearFormatDate @Functions ClearFormatDate function.FunctionClass.php*/
public function ClearFormatDate($parameter){
	$parameter = trim($parameter);
	$parameter = str_replace("/", "-", $parameter);
return $parameter;
}

/*@Param ClearCpfCnpj @Functions ClearCpfCnpj function.FunctionClass.php*/
public function ClearCpfCnpj($parameter){
	$parameter = trim($parameter);
	$parameter = str_replace(".", "", $parameter);
	$parameter = str_replace(",", "", $parameter);
	$parameter = str_replace("-", "", $parameter);
	$parameter = str_replace("/", "", $parameter);
return $parameter;
}

/*@Param ClearCep @Functions ClearCep function.FunctionClass.php*/
public function ClearCep($parameter){
	$parameter = trim($parameter);$parameter = str_replace("-", "", $parameter);
return $parameter;
}

/*@Param ClearPhone @Functions ClearPhone function.FunctionClass.php*/
public function ClearPhone($parameter){
	$parameter = str_replace("(", "", $parameter);
	$parameter = str_replace(")", "", $parameter);
	$parameter = str_replace("-", "", $parameter);
return $parameter;
}

/*@Param ClearNameGrupo @Functions ClearNameGrupo function.FunctionClass.php*/
public function ClearNameGrupo($parameter){
	$parameter = str_replace(",", "", $parameter);
	$parameter = str_replace(" ", "-", $parameter);
return $parameter;
}

/*@Param ClearNameGrupoLink @Functions ClearNameGrupoLink function.FunctionClass.php*/
public function ClearNameGrupoLink($parameter){
	$parameter = trim($parameter);$parameter = str_replace("-", " ", $parameter);
return $parameter;
}

/*@Param ClearLettersAndCharacters @Functions ClearLettersAndCharacters function.FunctionClass.php*/
public function ClearLettersAndCharacters($parameter){
	$parameter = preg_replace('/[^0-9-]/', '', $parameter);
	return $parameter;
}

/*@Param ClearURL @Functions ClearURL function.FunctionClass.php*/
public function ClearURL($str){
	$what = array('ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','Ã','À','Á','Â','É','Ê','Í','Ó','Ô','Ú','ñ','Ñ','ç','Ç','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º','.' ); 
	$by = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','A','A','E','E','I','O','O','U','n','n','c','C','','','','','','','','','','','','','','','','','','','','','','','' ); 
	$str = str_replace($what, $by, $str);
	$str = preg_replace("/( +)/", "-", $str);
	$str = str_replace("//", "-", $str);
return strtolower($str);
}

/*@Param TransCorreioWs @Functions TransCorreioWs function.FunctionClass.php*/
public function TransCorreioWs($CepIni,$CepEnd,$Weight,$value,$tela=0){
	$url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem='.$CepIni.'&sCepDestino='.$CepEnd.'&nVlPeso='.$Weight.'&nCdFormato=1&nVlComprimento=20&nVlAltura=20&nVlLargura=20&sCdMaoPropria=n&nVlValorDeclarado='.$value.'&sCdAvisoRecebimento=n&nCdServico=04014&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3';
	$calcFreight = simplexml_load_string(file_get_contents($url));
	$freight = $calcFreight->cServico;
	if($freight->Erro == '0'){
		switch($freight->Codigo){
			case 04510: $service = 'PAC';break;
			case 40045: $service = 'SEDEX a Cobrar';break;
			case 40215: $service = 'SEDEX 10';break;
			case 40290: $service = 'SEDEX Hoje';break;
			default: $service = 'SEDEX';
		}
		$prazo = $freight->PrazoEntrega;
		$p=$prazo+1;
		if($tela == 1){$return = 'ok' . ',' . $p . ',' . $freight->Valor;}
		else{$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>CORREIOS</b></span><br><span class="font-responsive text-default font-bold">Entrega: '.$p.' dia(s) úteis</span><h4 class="text-red text-shadow">R$'.$freight->Valor.'</h4></div>';}
	return $return;
	}
	elseif($freight->Erro == '7'){
		$return = '<div class="col-md-3 col-sm-3 text-center"><span class="font-responsive text-default font-bold"><b>Serviço temporariamente indisponível, tente novamente mais tarde.</b></span></div>';
	return $return;
	}
	else{
		$return = 'Erro no cálculo do frete, código de erro: '.$freight->Erro;
	//return $return;
	}
}

/*@Param TransJadLogWs @Functions TransJadLogWs function.FunctionClass.php*/
public function TransJadLogWs($value, $CepFinal, $Weight){
	$url = 'http://www.jadlog.com.br:8080/JadlogEdiWs/services/ValorFreteBean?method=valorar&vModalidade=5&Password=2a0C1p4p&vSeguro=N&vVlDec='.$value.'&vVlColeta=7&vCepOrig=13063340&vCepDest='.$CepFinal.'&vPeso='.$Weight.'&vFrap=N&vEntrega=D&vCnpj=04014192000146';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$return = htmlspecialchars_decode(curl_exec($ch));
		$valueFreteR = preg_match('#<Retorno(?:\s+[^>]+)?>(.*?)'.'</Retorno>#s', $return, $parts);
		@$valueFrete = $parts[1];
		$valueFrete = (($valueFrete <= 0 ? 0 : $valueFrete));
		$transValor = floatval(str_replace(',', '.', $valueFrete));
	return $transValor;
}

/*@Param CheckParameter @Functions CheckParameter function.FunctionClass.php*/
public function CheckParameter($parameter){
	if(empty($parameter) OR !isset($parameter) OR $parameter == ""){
		$parameter = 'NULL';
	return $parameter;
	}
	else{return $parameter;}
}

/*@Param GeneratePassword @Functions GeneratePassword function.FunctionClass.php*/
public function GeneratePassword($size, $nivel){
	$vogais = 'aeuy';
	$consoantes = 'bdghjmnpqrstvz';
	if($nivel >= 1){$consoantes .= 'BDGHJLMNPQRSTVWXZ';}
	if($nivel >= 2){$vogais .= "AEUY";}
	if($nivel >= 4){$consoantes .= '23456789';}
	if($nivel >= 8){$vogais .= '@#$%';}
	$password = '';
	$alt = time() % 2;
	for($i = 0; $i < $size; $i++){
		if($alt == 1){$password .= $consoantes[(rand() % strlen($consoantes))];$alt = 0;}
		else{$password .= $vogais[(rand() % strlen($vogais))];$alt = 1;}
	}
	return $password;
}

/*@Param FirstWord @Functions FirstWord function.FunctionClass.php*/
public function FirstWord($parameter){
	$parameter=explode(" ",$parameter);
	return $parameter[0];
}

/*@Param InsertZero @Functions InsertZero function.FunctionClass.php*/
function InsertZero($string1, $nzeros){
	return str_pad($string1, $nzeros, "0", STR_PAD_LEFT);
}

/*@Param URLSeo @Functions URLSeo function.FunctionClass.php*/
function URLSeo($url){
	$pagina = explode('/',$url);
	if($pagina[1] == 'produtos'){
		$return = $pagina[1].'/'.$pagina[2].'/'.$pagina[3].'/'; 
	}
	elseif($pagina[1] == 'montadora'){
		$return = $pagina[1].'/'.$pagina[2].'/';
	}else{
		$return = $pagina[1];
	}
	return $return;
}

}
?>