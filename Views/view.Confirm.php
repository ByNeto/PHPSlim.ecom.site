<?php
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Menu.php');// inclui a classe da model Menu.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
require_once('Models/model.Confirm.php');// inclui a classe da model Confirm.
$objModelMenu = new ModelMenu();
$objModelAutocomplete = new ModelAutocomplete();
$objModelConfirm = new ModelConfirm();
?>

<?php print_r($objComponentsClass->Scope($objFunctionClass->UrlFixed(),$objFunctionClass->URLSeo($_SERVER["REQUEST_URI"])));?>
<body>

<div id="loader" class="loader"><center><img class="img-responsive rotaciona top" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon_loading.png"/></center></div>
<header class="menu_fixo">
	<div class="menu_bg">
		<div class="content">
			<div class="menu_empresa">
				<div class="logo"><a href="<?php print_r($objFunctionClass->UrlFixed()); ?>/"><img class="img-responsive" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/logos/logo.png"/></a></div>
				<div class="social-top">
					<a href="https://www.facebook.com/autopec.1" target="_blank"><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon-top-facebook.jpg" class="img-responsive float-up"></a>
					<a href="https://twitter.com/autopec" target="_blank"><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon-top-twitter.jpg" class="img-responsive float-up"></a>
					<a href="https://www.youtube.com/user/autopec1" target="_blank"><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon-top-youtube.jpg" class="img-responsive float-up"></a>
					<a href="https://plus.google.com/+AutopecBr/" target="_blank"><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon-top-googlemais.jpg" class="img-responsive float-up"></a>
				</div>
				<ul class="menu_emp_links">
					<li><a class="text-shadow" href="<?php print_r($objFunctionClass->UrlFixed());?>/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li><a class="text-shadow" href="<?php print_r($objFunctionClass->UrlFixed());?>/sobrenos/">Sobre nós</a></li>
					<li><a class="text-shadow" href="<?php print_r($objFunctionClass->UrlFixed());?>/contato/">Contato</a></li>
					<li><a class="text-shadow" href="<?php print_r($objFunctionClass->UrlFixed());?>/localizacao/">Localização</a></li>
					<!--<li><a class="text-shadow" href="<?php print_r($objFunctionClass->UrlFixed());?>/blog/">Blog</a></li>-->
				</ul>
			</div>
		</div>
	</div>
<?php
	session_start();
	if(empty($_SESSION['idCar'])){$_SESSION['idCar'] = date('YmdHis', time());}
	else{$_SESSION['idCar'] = $_SESSION['idCar'];}
	if(empty($_SESSION['clienteId'])){$_SESSION['clienteId'] = 0;}else{$_SESSION['clienteId'] = $_SESSION['clienteId'];}
	if(empty($_SESSION['CepId'])){$_SESSION['CepId'] = 0;}else{$_SESSION['CepId'] = $_SESSION['CepId'];}
	$CepId = $objFunctionClass->ClearCep($_SESSION['CepId']);
	if(isset($_SESSION['nameUser'])){$label='<li title="'.utf8_encode($_SESSION['nameUser']).'" data-toggle="tooltip"><a><i style="margin-right:.1em;font-size:1.0em;" class="fa fa-user margin-top-icon" aria-hidden="true"></i><p onmouseover="dropDownUserShow();" onmouseout="dropDownUserHide();">'.$objFunctionClass->FirstWord(utf8_encode($_SESSION['nameUser'])).'</p></a><div class="alert alert-default" id="dropDownUser"><a href="'.$objFunctionClass->UrlFixed().'" class="cursor-class" onclick="SessionDestroy();" title="Clique para fazer Logoff" data-toggle="tooltip" data-placement="bottom"><i style="font-size:1.0em;" class="fa fa-sign-out margin-top-icon text-red" aria-hidden="true"></i> Logout</a></div></li>';}
	else{$label = '<li title="Acessar ou Criar Conta" data-toggle="tooltip"><a href="'.$objFunctionClass->UrlFixed().'/login/autopec/"><i style="margin-right:.1em;font-size:1.1em;" class="fa fa-sign-in margin-top-icon" aria-hidden="true"></i><p>Login / Conta</p></a></li>';}
?>
<?php print_r($objComponentsClass->MenuCar($objFunctionClass->UrlFixed(),$label,$_SESSION['idCar']));?>
</header>

<?php print_r($objComponentsClass->Banner($objFunctionClass->UrlFixed()));?>

<?php print_r($objComponentsClass->AutomakersMenu($objModelMenu->MenuAutomakers($objConn),$objFunctionClass));?>

<?php
$query_SelectCheckSession = $objModelConfirm->SelectCheckSession($objConn,$_SESSION['idCar']);
if($fetch_SelectCheckSession = $query_SelectCheckSession->fetch(PDO::FETCH_ASSOC)){$CodClienteCheck = $fetch_SelectCheckSession['cliente'];}
else{print_r($objFunctionClass->ModalMessengerAlertLogin('Para finalizar sua compra.','Por favor efetue seu login!'));}

$query_ModelConfirm = $objModelConfirm->SelectStateTax($objConn,strtoupper(trim($stateId)));
if($fetch_ModelConfirm = $query_ModelConfirm->fetch(PDO::FETCH_ASSOC)){
	$Aliq_ICMS_Interna = $fetch_ModelConfirm['Aliq_ICMS_Interna'];
	$Aliq_ICMS_InterEstadual = $fetch_ModelConfirm['Aliq_ICMS_InterEstadual'];
	$Estado_Emitente = 'SP';
	$Estado_Destino = strtoupper(trim($stateId));
	$Protocolo_ST = $fetch_ModelConfirm['Protocolo_ST'];
	$str = $Aliq_ICMS_InterEstadual;
	$arr = explode('|', $str);
	$arrN = array();
	foreach($arr as $item){
		$valor = explode('=', $item);
		$arrN[$valor[0]] = $valor[1];
	}
}
$Aliq_ICMS_InterEstadual = ($arrN[$Estado_Destino] * 1);$Aliq_ICMS_Interna = ($arrN['SP'] * 1);
$iec = strtolower(trim($ieId));
$iec = preg_replace('/([\.,-\/])/i', '', strtolower($iec));
$ich = array("isento","isenta", "", 0, "0");
$query_SelectCar = $objModelConfirm->SelectCar($objConn,$pedidoId);
while($fetch_SelectCar = $query_SelectCar->fetch(PDO::FETCH_ASSOC)){
	if(strtolower($Estado_Emitente) != strtolower($Estado_Destino) && $Protocolo_ST == 'S'){
		if($fetch_SelectCar['ORIGEM'] == 1 || $fetch_SelectCar['ORIGEM'] == 2 ){$Aliq_ICMS_InterEstadual_AU = 4;}
		else{$Aliq_ICMS_InterEstadual_AU  = $Aliq_ICMS_InterEstadual;}
		if((!in_array($iec,$ich, true))){
			if($Aliq_ICMS_Interna > $Aliq_ICMS_InterEstadual_AU){$AL_ICMSST =  $Aliq_ICMS_Interna - $Aliq_ICMS_InterEstadual_AU;}
			else{$AL_ICMSST = 0.00;}
		}
		else{$AL_ICMSST = 0.00;}
	}
	else{$AL_ICMSST = 0.00;$Aliq_ICMS_InterEstadual_AU = $Aliq_ICMS_Interna;}
	$query_UpdateCarProducts = $objModelConfirm->UpdateCarProducts($objConn,$AL_ICMSST,$Aliq_ICMS_InterEstadual_AU,$fetch_SelectCar['id_carrinho'],$fetch_SelectCar['CodAutopec']);
	if($fetch_UpdateCarProducts = $query_UpdateCarProducts->fetch(PDO::FETCH_ASSOC)){}
	//else{print_r('Lembrar de checar esse else - FETCH_ASSOC');}
}
?>
<!--Confirmação do Carrinho -->
<div class="container" id="confirma">
	<div class="row">
		<div class="bol_icon_cart" style="border:2px solid #717171;"><i style="font-size: 1.5em;" class="fa fa-cart-arrow-down text-gray-max" aria-hidden="true"></i></div>
		<div class="bol_icon_cart_active" style="border:2px solid #717171;"><i style="font-size:1.5em;margin-left:0.1rem;" class="fa fa-unlock text-white" aria-hidden="true"></i></div>
		<div class="bol_icon_cart" style="border:2px solid #717171;"><i style="font-size: 1.5em;margin-left:-0.2rem;" class="fa fa-credit-card-alt text-gray-max" aria-hidden="true"></i></div>
		<hr class="tracejada"></hr>
	</div>
	<div class="row">
		<div class="col-sm-12 col-xs-12 titulo">
			<h2>1 - ENDEREÇO</h2>
		</div>
		<div class="col-sm-12 col-xs-12 conteudo">
<?php
$query_SelectDataClient = $objModelConfirm->SelectDataClient($objConn,$pedidoId);
if($fetch_SelectDataClient = $query_SelectDataClient->fetch(PDO::FETCH_ASSOC)){
	echo'<p>'.utf8_encode($fetch_SelectDataClient['RazaoSocial']).' - '.$fetch_SelectDataClient['CNPJ'].' - '.$fetch_SelectDataClient['IE'].'</p>';
	echo'<p>'.utf8_encode($fetch_SelectDataClient['Endereco']).', '.$fetch_SelectDataClient['Numero'].' - '.utf8_encode($fetch_SelectDataClient['Cidade']).'/'.$fetch_SelectDataClient['Estado'].' - '.$fetch_SelectDataClient['CEP'].'</p>';
	echo'<p>'.$fetch_SelectDataClient['Fone'].' - '.$fetch_SelectDataClient['Fone2'].'</p>';
	echo'<p>'.strtolower($fetch_SelectDataClient['Email']).'</p>';
}
?>
		</div>
		<div class="col-sm-12 col-xs-12 titulo">
			<h2>2 - ENVIO</h2>
		</div>
	</div>

<?php
$query_SelectDataFreight = $objModelConfirm->SelectDataFreight($objConn,$pedidoId);
if($fetch_SelectDataFreight = $query_SelectDataFreight->fetch(PDO::FETCH_ASSOC)){
	echo'<div class="row envio">';
		echo'<div class="col-sm-6 col-xs-12 dados">';
			echo'<p>Valor: R$'.number_format($fetch_SelectDataFreight['vl_freteEscolhido'], 2, ',', '.').'</p>';
			echo'<p>Entregue por: '.utf8_encode($fetch_SelectDataFreight['vai_por']).'</p>';
		if(strlen( isset($fetch_SelectDataFreight['res'])) && $fetch_SelectDataFreight['res'] >= 6){
			echo'<span>O CEP de destino está sujeito a condições especiais de entrega pela ECT e será realizada com o acréscimo de até 7 (sete) dias ao prazo regular.</span>';
		}
		if( isset($fetch_SelectDataFreight['txt']) ){
			echo'<span>Identificamos que seu CEP é de '.(utf8_encode($fetch_SelectDataFreight['cidade'])).', '.(utf8_encode($fetch_SelectDataFreight['txt'])).'</span>';
		}
		echo'</div>';
		echo'<div class="col-sm-6 col-xs-12 prazo">';
			echo'<p>Prazo para entrega: '.utf8_encode($fetch_SelectDataFreight['prazo']).' dias úteis após confirmação do pagamento</p>';
		echo'</div>';
	echo'</div>';
}
?>
	<div class="row">
		<div class="col-sm-12 col-xs-12 titulo">
			<h2>3 - FORMA DE PAGAMENTO</h2>
		</div>
	</div>
	<div class="row borda-pagamento">
		<div class="col-sm-12 col-xs-12 pagamento">
			<ul>
				<li class="cartao"><input class="checked" type="radio" value="VISA" /><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/visa.png"/></li>
				<li class="cartao"><input class="checked" type="radio" value="MASTER CARD"/><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/master.png"/></li>
				<!--<li class="cartao"><input class="checked" type="radio" value="AMERICAN EXPRESS"/><img src="<?php //print_r($objFunctionClass->UrlFixed());?>/Library/imagens/american.png"/></li>-->
				<!--<li class="cartao"><input class="checked" type="radio" value="DINERS CLUB INTERNACIONAL"/><img src="<?php //print_r($objFunctionClass->UrlFixed());?>/Library/imagens/diners.png"/></li>-->
				<!--<li class="cartao"><input class="checked" type="radio" value="ELO"/><img src="<?php //print_r($objFunctionClass->UrlFixed());?>/Library/imagens/elo.png"/></li>-->
				<li class="boleto"><input class="checked" type="radio" value="BOLETO"/><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/BOLETO.png"/></li>
			</ul>
		</div>
		<form id="formCartao" style="width:100%;">
			<div class="col-sm-12 col-xs-12 campo">
<?php
$sumA=0;
$query_SelectDataProducts = $objModelConfirm->SelectDataProducts($objConn,$pedidoId);
while($fetch_SelectDataProducts = $query_SelectDataProducts->fetch(PDO::FETCH_ASSOC)){$sumA+= ($fetch_SelectDataProducts['vl_unit']*$fetch_SelectDataProducts['quantidade']);}
?>
			<label> Parcelas</label>
			<select id="parcelas">
				<?php print_r($objFunctionClass->PlotVerifyMultiValueSelect($sumA, 20));?>
			</select>
			</div>
			<div class="col-sm-12 col-xs-12 campo">
				<input onblur="nameClientFc()" type="text" id="nameClient" name="nameClient" placeholder="Nome Completo:" required />
				<span id="msg-nameClient"></span>
			</div>
			<div class="col-sm-12 col-xs-12 campo">
				<input id="bandeira" name="bandeira"type="text" value="" />
			</div>
			<div class="col-sm-12 col-xs-12 campo">
				<input onblur="cardNumberFc();" type="text" id="cardNumber" name="cardNumber" placeholder="Número do cartão:" data-mask="0000 0000 0000 0000" required />
				<span id="msg-cardNumber"></span>
			</div>
			<div class="row dividir">
				<div class="col-sm-6 col-xs-12 campo">
					<input onblur="cardValidateFc()" type="text" id="cardValidate" name="cardValidate" placeholder="Expira em:" data-mask="00/0000" required />
					<span id="msg-cardValidate"></span>
				</div>
				<div class="col-sm-6 col-xs-12 campo">
					<input onblur="cardCodSecurityFc()" type="text" id="cardCodSecurity" name="cardCodSecurity" data-mask="000" placeholder="Código de Segurança:" required />
					<span id="msg-cardCodSecurity"></span>
				</div>
			</div>
		</form>
	</div>
	<div class="text-center" id="msg-formPag"></div>
	<div class="row">
		<div class="col-sm-12 col-xs-12 titulo">
			<h2>4 - RESUMO DO PEDIDO</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-2 titulo">
			<h2>Produto</h2>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-3 titulo">
			<h2>Preço</h2>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-3 titulo">
			<h2>Quantidade</h2>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-3 titulo">
			<h2>Total</h2>
		</div>
	</div>
<?php
$sumB=0;
$query_SelectDataProducts = $objModelConfirm->SelectDataProducts($objConn,$pedidoId);
while($fetch_SelectDataProducts = $query_SelectDataProducts->fetch(PDO::FETCH_ASSOC)){
	
	if($fetch_SelectDataProducts['Estoque'] == 0){ 
    	$query_DeleteProductStorageZero = $objModelConfirm->DeleteProductStorageZero($objConn,$pedidoId,$fetch_SelectDataProducts['CodAutopec']); 
	  	echo'<div class="row produto">'; 
	    echo'<div class="col-sm-12 col-xs-12 menu-responsivo">'; 
	    echo'<h4>Produto</h4>'; 
	  	echo'</div>'; 
	  	echo'<div class="col-md-1 col-sm-4 col-xs-12 imagem text-left">'; 
	  	echo'<img class="img-responsive cursor-class" src="'.$objFunctionClass->CheckPicture(trim(str_replace("_d","",$fetch_SelectDataProducts['img'])),"d").'" style="width: 100%;" data-toggle="tooltip" title="'.utf8_encode($fetch_SelectDataProducts['Descricao']).'">'; 
	  	echo'</div>'; 
	  	echo'<div class="col-md-3 col-sm-8 col-xs-12 descricao prod text-left">'; 
	    echo'<h3>'.$fetch_SelectDataProducts['Descricao'].'</h3>'; 
	    echo'<p>'.$fetch_SelectDataProducts['Aplicacao'].'.</p>'; 
	    echo'<span>'.$fetch_SelectDataProducts['Fabricante'].' - '.$fetch_SelectDataProducts['CodAutopec'].'</span>'; 
	    echo'</div>'; 
	    echo'<div class="col-sm-12 col-xs-12 menu-responsivo">'; 
	    echo'<h4>Entrega</h4>'; 
	    echo'</div>'; 
	    echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">'; 
	    echo'<h3></h3>'; 
	    echo'</div>'; 
	    echo'<div class="col-sm-12 col-xs-12 menu-responsivo">'; 
	    echo'<h4>Preço</h4>'; 
	    echo'</div>'; 
	    echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">'; 
	    echo'<h3>R$'.number_format($fetch_SelectDataProducts['vl_unit'], 2, ',', '.').'</h3>'; 
	    echo'</div>'; 
	    echo'<div class="col-sm-12 col-xs-12 menu-responsivo">'; 
	    echo'<h4>Quantidade</h4>'; 
	    echo'</div>'; 
	    echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">'; 
	    echo'<h3>Produto indisponivel</h3>'; 
	    echo'</div>'; 
	    echo'<div class="col-sm-12 col-xs-12 menu-responsivo">'; 
	    echo'<h4>Total</h4>'; 
	    echo'</div>'; 
	    echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">'; 
	    echo'<h3>R$'.number_format(($fetch_SelectDataProducts['vl_unit']*$fetch_SelectDataProducts['quantidade']), 2, ',', '.').'</h3>'; 
	    echo'</div>'; 
	  	echo'</div>'; 
	} 
	echo'<div class="row produto">';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
		echo'<h4>Produto</h4>';
	echo'</div>';
	echo'<div class="col-md-1 col-sm-4 col-xs-12 imagem text-left">';
	echo'<img class="img-responsive cursor-class" src="'.$objFunctionClass->CheckPicture(trim(str_replace("_d","",$fetch_SelectDataProducts['img'])),"d").'" style="width: 100%;" data-toggle="tooltip" title="'.utf8_encode($fetch_SelectDataProducts['Descricao']).'">';
	echo'</div>';
	echo'<div class="col-md-3 col-sm-8 col-xs-12 descricao prod text-left">';
		echo'<h3>'.$fetch_SelectDataProducts['Descricao'].'</h3>';
		echo'<p>'.$fetch_SelectDataProducts['Aplicacao'].'.</p>';
		echo'<span>'.$fetch_SelectDataProducts['Fabricante'].' - '.$fetch_SelectDataProducts['CodAutopec'].'</span>';
		echo'</div>';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
			echo'<h4>Entrega</h4>';
		echo'</div>';
		echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">';
			echo'<h3></h3>';
		echo'</div>';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
			echo'<h4>Preço</h4>';
		echo'</div>';
		echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">';
			echo'<h3>R$'.number_format($fetch_SelectDataProducts['vl_unit'], 2, ',', '.').'</h3>';
		echo'</div>';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
			echo'<h4>Quantidade</h4>';
		echo'</div>';
		echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">';
			echo'<h3>'.$fetch_SelectDataProducts['quantidade'].'</h3>';
		echo'</div>';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
			echo'<h4>Total</h4>';
		echo'</div>';
		echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">';
			echo'<h3>R$'.number_format(($fetch_SelectDataProducts['vl_unit']*$fetch_SelectDataProducts['quantidade']), 2, ',', '.').'</h3>';
		echo'</div>';
	echo'</div>';
	$sumB+= ($fetch_SelectDataProducts['vl_unit']*$fetch_SelectDataProducts['quantidade']);
}
$sumB += $fetch_SelectDataFreight['vl_freteEscolhido'];

?>

	<div class="row total">
		<div class="col-md-3 col-sm-6 col-xs-6 texto-cinza">
			<h3>TOTAL</h3>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-6 valor-cinza">
			<h3>R$<?php print_r(number_format($sumB, 2, ',', '.'));?><h3>
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12 continuar">
			<span id="inputEndSales"></span>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-xs-12 mensagem">
			<p>Caro Cliente, Por Favor conferir a(s) mercadoria(s) no ato da entrega. A não conferência pode incidir perda do Direito de Devolução caso o<br />
			 produto esteja danificado conforme Artigo 754 do Código Civil.</p>
		</div>
	</div>
</div>
	<div id="resposta"></div>
<!--Fim Confirmação do Carrinho -->
<?php print_r($objComponentsClass->Footer($objFunctionClass->UrlFixed()));?>

<a href="javascript:void(window.open('http://c4publicidade.com.br/autopec/chat/chat.php','','width=660,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="chat"><img width="60%" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_chat.png"></a>
<!-- MobileModal -->
<div class="modal fade bd-example-modal-lg" id="AutoPecApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 class="modal-title"><img class="img-responsive" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/logos/logo-min.png"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<span class="text-white">Use grátis o app da Autopec</span>
						<span class="text-white">Mais prático e mais rápido</span>
					</div><br>
					<div class="row">
						<center><span class="text-white">Selecione a plataforma de seu Smartphone</span></center>
					</div><br>
					<div class="row">
						<img class="img-responsive center-block" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon_googleplay.png"/>
					</div>
					<div class="row">
						<img class="img-responsive center-block" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon_appstore.png"/>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Agora não</button>
			</div>
		</div>
	</div>
</div>
<!-- MobileModal -->
<!-- Core JavaScript -->
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.mask.js"></script>
<script>
$("#inputEndSales").html('<input type="submit" onclick="formPag()" value="Concluir Compra"/>').show();
function formPag(){$("#msg-formPag").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><h3><strong>Atenção!</strong></h3>Selecione a Forma de <strong>Pagamento</strong></div>').show().slideUp(8500);}

function nameClientFc(){
	if($("#nameClient").val() === ""){
		$("#check-nameClient").hide();
		$("#times-nameClient").show();
		$("#msg-nameClient").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome Completo</strong> não pode ser vazio!</div>');
		document.getElementById("nameClient").placeholder = "Preencha o Campo!";
		document.getElementById("nameClient").style.borderColor = "#ff0000";
		document.getElementById("nameClient").style.outline = "#ff0000";
		document.getElementById("nameClient").focus();
	return false;
	}
	if($("#nameClient").val().length < 5){
		$("#check-nameClient").hide();
		$("#times-nameClient").show();
		$("#msg-nameClient").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome Completo</strong> deve conter mais de 5 caracteres!</div>');
		document.getElementById("nameClient").placeholder = "Minimo 5 caracteres!";
		document.getElementById("nameClient").style.borderColor = "#ff0000";
		document.getElementById("nameClient").style.outline = "#ff0000";
		document.getElementById("nameClient").focus();
	return false;
	}
	else{
		$("#check-nameClient").show();
		$("#times-nameClient").hide();
		$("#msg-nameClient").hide();
		document.getElementById("nameClient").style.borderColor = "green";
		document.getElementById("nameClient").style.outline = "green";
	return false;
	}
}

function cardNumberFc(){
	if($("#cardNumber").val() === ""){
		$("#check-cardNumber").hide();
		$("#times-cardNumber").show();
		$("#msg-cardNumber").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero do Cartão</strong> não pode ser vazio!</div>');
		document.getElementById("cardNumber").placeholder = "Preencha o Campo. Ex: 0000 0000 0000 0000";
		document.getElementById("cardNumber").style.borderColor = "#ff0000";
		document.getElementById("cardNumber").style.outline = "#ff0000";
		document.getElementById("cardNumber").focus();
	return false;
	}
	if($("#cardNumber").val().length < 16){
		$("#check-cardNumber").hide();
		$("#times-cardNumber").show();
		$("#msg-cardNumber").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero do Cartão</strong> deve conter 16 numeros!</div>');
		document.getElementById("cardNumber").placeholder = "Cartão deve conter 16 numeros. Ex: 0000 0000 0000 0000";
		document.getElementById("cardNumber").style.borderColor = "#ff0000";
		document.getElementById("cardNumber").style.outline = "#ff0000";
		document.getElementById("cardNumber").focus();
	return false;
	}
	else{
		$("#check-cardNumber").show();
		$("#times-cardNumber").hide();
		$("#msg-cardNumber").hide();
		document.getElementById("cardNumber").style.borderColor = "green";
		document.getElementById("cardNumber").style.outline = "green";
	return false;
	}
}

function cardValidateFc(){
	if($("#cardValidate").val() === ""){
		$("#check-cardValidate").hide();
		$("#times-cardValidate").show();
		$("#msg-cardValidate").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Validade do Cartão</strong> não pode ser vazio!</div>');
		document.getElementById("cardValidate").placeholder = "Preencha o campo. Ex: 12/2018";
		document.getElementById("cardValidate").style.borderColor = "#ff0000";
		document.getElementById("cardValidate").style.outline = "#ff0000";
		document.getElementById("cardValidate").focus();
	return false;
	}
	if($("#cardValidate").val().length < 6){
		$("#check-cardValidate").hide();
		$("#times-cardValidate").show();
		$("#msg-cardValidate").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Validade do Cartão</strong> deve conter 6 numeros!</div>');
		document.getElementById("cardValidate").placeholder = "Validade do cartão deve conter 6 numeros. Ex: 12/2018";
		document.getElementById("cardValidate").style.borderColor = "#ff0000";
		document.getElementById("cardValidate").style.outline = "#ff0000";
		document.getElementById("cardValidate").focus();
	return false;
	}
	else{
		$("#check-cardValidate").show();
		$("#times-cardValidate").hide();
		$("#msg-cardValidate").hide();
		document.getElementById("cardValidate").style.borderColor = "green";
		document.getElementById("cardValidate").style.outline = "green";
	return false;
	}
}

function cardCodSecurityFc(){
	if($("#cardCodSecurity").val() === ""){
		$("#check-cardCodSecurity").hide();
		$("#times-cardCodSecurity").show();
		$("#msg-cardCodSecurity").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Codigo de Segurança</strong> não pode ser vazio!</div>');
		document.getElementById("cardCodSecurity").placeholder = "Preencha o Campo. Ex: 000";
		document.getElementById("cardCodSecurity").style.borderColor = "#ff0000";
		document.getElementById("cardCodSecurity").style.outline = "#ff0000";
		document.getElementById("cardCodSecurity").focus();
	return false;
	}
	if($("#cardCodSecurity").val().length < 3){
		$("#check-cardCodSecurity").hide();
		$("#times-cardCodSecurity").show();
		$("#msg-cardCodSecurity").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Codigo de Segurança</strong> deve conter 3 numeros!</div>');
		document.getElementById("cardCodSecurity").placeholder = "Codigo de Segurança deve conter 3 numeros. Ex: 000";
		document.getElementById("cardCodSecurity").style.borderColor = "#ff0000";
		document.getElementById("cardCodSecurity").style.outline = "#ff0000";
		document.getElementById("cardCodSecurity").focus();
	return false;
	}
	else{
		$("#check-cardCodSecurity").show();
		$("#times-cardCodSecurity").hide();
		$("#msg-cardCodSecurity").hide();
		document.getElementById("cardCodSecurity").style.borderColor = "green";
		document.getElementById("cardCodSecurity").style.outline = "green";
	return false;
	}
}
function EndSales(){
		$("#inputEndSales").html('<input type="submit" value="Processando Pagamento"/>').show();
		var pedidoId = <?=$pedidoId?>;
		var sumB = <?=$sumB?>;
		var bandeira = $("#bandeira").val();
		var parcelas = $("#parcelas").val();
		if($("#nameClient").val() === ""){nameClientFc();}
		else if($("#cardNumber").val() === ""){cardNumberFc();}
		else if($("#cardValidate").val() === ""){cardValidateFc();}
		else if($("#cardCodSecurity").val() === ""){cardCodSecurityFc();}
		else{
			var nameClient = $("#nameClient").val();
			var cardNumber = $("#cardNumber").val();
			var cardValidate = $("#cardValidate").val();
			var cardCodSecurity = $("#cardCodSecurity").val();
		}
		$.post(newURL+"/Library/vendor/ajax/ajax.confirm.php",{
		pedidoId:pedidoId,
		bandeira:bandeira,
		parcelas:parcelas,
		nameClient:nameClient,
		cardNumber:cardNumber,
		cardValidate:cardValidate,
		cardCodSecurity:cardCodSecurity,
		sumB:sumB},
		function(resposta){
			if(resposta != false){
				res = resposta.split("|");
				//alert(res[0]);
				//alert(res[1]);
				//alert(res[2]);
				$("#inputEndSales").html('<input type="submit" onclick="EndSales()" value="Concluir Compra"/>').show();
				if(res[1] == 0){
					$('#resposta').html(res[0]).show();
					return false;
				}
				else{
					$('#resposta').html(res[0]).show();
					window.location=newURL+'/concluido/'+res[1]+'/';
				}
			}
			else{$('#resposta').html(resposta).show();return false;}
		});
		return false;
}
</script>
<script language="JavaScript" type="text/javascript">$(document).ready(function(){var idCar = <?=$_SESSION['idCar']?>;$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},function(returnIdCar){if(returnIdCar != false){$('#car-sun').html(returnIdCar).show();}else{$('#car-sun').html('0.00').show();}});});</script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/sessiondestroy.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownpagform.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownuser.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/modal-mobile.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect-input.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/autoredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/bestsellers.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/start-modal-function.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/render-menu-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/render-time-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/validator-newsletter.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/popper/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/bootstrap/js/tooltip.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/flickity/flickity-docs.min.js"></script>
</body>
</html>