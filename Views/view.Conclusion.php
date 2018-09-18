<?php
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Menu.php');// inclui a classe da model Menu.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
require_once('Models/model.Conclusion.php');// inclui a classe da model Conclusion.
require_once('Functions/function.SendMailerClass.php');

$objModelMenu = new ModelMenu();
$objModelAutocomplete = new ModelAutocomplete();
$objModelConclusion = new ModelConclusion();
$objFunctionSendMailer = new FunctionSendMailer();//inicia a classe FunctionSendMailer.
/*
function datainv($glInData, $glbTipoData=0){
	/* Função que inverte a data de acordo com a função - $glbInData = recebe a data passada vinda do sistema - atravez do time() $glbTipoData é o formato de saída - 0 = yyyy-mm-dd / 1 = dd/mm/yyyy
	$admDt[0] = '/';$admDt[1] = '-';
	$admRs = explode($admDt[$glbTipoData], $glInData);
	$admSp = ($admDt[$glbTipoData] == '/'?'-':'/');
	return $admRs[2] . $admSp . $admRs[1] . $admSp . $admRs[0];
}*/
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
	$query_SelectFinalPedido = $objModelConclusion->SelectFinalPedido($objConn, $pedidoId);
	$fetch_SelectFinalPedido = $query_SelectFinalPedido->fetch(PDO::FETCH_ASSOC);
?>

<!--Conclusão-->
<div class="container" id="concluido">
	<div class="row">
		<div class="bol_icon_cart" style="border:2px solid #717171;"><i style="font-size: 1.5em;" class="fa fa-cart-arrow-down text-gray-max" aria-hidden="true"></i></div>
		<div class="bol_icon_cart" style="border:2px solid #717171;"><i style="font-size:1.5em;margin-left:0.1rem;" class="fa fa-unlock text-gray-max" aria-hidden="true"></i></div>
		<div class="bol_icon_cart_active" style="border:2px solid #717171;"><i style="font-size: 1.5em;margin-left:-0.2rem;" class="fa fa-credit-card-alt text-white" aria-hidden="true"></i></div>
		<hr class="tracejada"></hr>
	</div>
	<div class="row">
		<div class="col-sm-6 col-xs-12 pagar">
		<?php if($fetch_SelectFinalPedido['CodForPag'] == 1){?>
			<h2>PAGAR</h2>
			<p><a target="_blank" href="<?php print_r($objFunctionClass->UrlFixed());?>/antigo/boleto_bradesco.php?pedido=<?php echo $pedidoId; ?>"><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/impri_boleto.png" /></a></p>
			<p class="info">Para imprimir o boleto clique na imagem acima, para ser redirecionado ao BOLETO, para efetuar o pagamento.</p><!---com vencimento em 13/02/2017--->
		<?php } else{?>
			<h2>CARTÃO DE CRÉDITO</h2>
<br>
			<div class="alert alert-warning">Pedido recebido pelo nosso sistema, assim que o financeiro aprovar, você recebera um e-mail e cada mudança de status você será avisado.</div>
<br>
			<p class="info">&nbsp;</p>
		<?php }?>
		</div>
		<div class="col-sm-6 col-xs-12 pedido">
			<h2>PEDIDO NÚMERO</h2>
			<div class="row">
				<div class="col-sm-12 col-xs-12 info">
					<h3>PEDIDO: <?php echo $pedidoId; ?></h3>
					<p><?php echo $fetch_SelectFinalPedido['dthvenda']; ?></p>
					<!-- <p class="imprimir"><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/printer_icon.png"/>IMPRIMIR PEDIDO - 170207886</p> -->
				</div>
			</div>
			<p class="info">Não é necessário imprimir, pois você receberá uma cópia do mesmo em seu e-mail. Não esqueça de liberar nosso e-mail em seu filtro anti-spam pedidos@autopec.com.br, você receberá um e-mail a cada mudança de status do seu pedido</p>
		</div>
	</div>
	<hr>
	<div class="row dados">
		<div class="col-sm-12 col-xs-12 nome">
			<h2>Sr (a), <?php echo utf8_encode($fetch_SelectFinalPedido['RazaoSocial']); ?></h2>
			<p>Agradecemos sua preferéncia, acima há um botão de acordo com a forma de pagamento escolhida no passo anterior!</p>
			<p>Não precisa se preocupar com a impressão do pedido. nosso sistema enviou uma cópia do mesmo ao seu e-mail <?php echo $fetch_SelectFinalPedido['email']; ?>. caso não apareça em sua caixa de entrada, verifique sua pasta de "Lixo eletrônico ou spam", e libere nosso e-mail pedidos@autopec.com.br em seu filtro, para que todos os e-mails de status possam chegar até você!</p>
			<hr>
		</div>
		
		<div class="col-sm-12 col-xs-12 pagamento">
			<h2>Forma de pagamento:</h2>
			<p>Valor pedido: R$ <?php echo number_format($fetch_SelectFinalPedido['vl_venda'], 2, ',', '.'); ?></p>
			<p>Data do pedido: <?php echo $fetch_SelectFinalPedido['dthvenda']; ?></p>
			<p>Forma de pagamento: <?php echo utf8_encode($fetch_SelectFinalPedido['FormaPagto']); ?></p>
		</div>
	</div>
</div>
<!--Fim Conclusão -->
<?php print_r($objComponentsClass->Footer($objFunctionClass->UrlFixed()));?>
<?php
$MsgBody ='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br"> <!--<![endif]-->
<head>
	<title>Autopec</title>
	<meta name="author" content="ByNeto"/>
	<meta name="description" content="Autopec"/>
	<meta name="keywords" content="Autopec"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,chrome=IE9">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="HandheldFriendly" content="true"/>
	<meta name="MobileOptimized" content="320"/>
	<!-- Mobile Internet Explorer ClearType Technology -->
	<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
	<!-- Fav Icon -->
	<link rel="shortcut icon" href="#">
	<link rel="apple-touch-icon" href="#">
	<link rel="apple-touch-icon" sizes="114x114" href="#">
	<link rel="apple-touch-icon" sizes="72x72" href="#">
	<link rel="apple-touch-icon" sizes="144x144" href="#">
	<link rel="apple-touch-startup-image" href="#"/><!----320x460.png-BBC4CB-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
	<table align="center">
		<tr valign="top">
			<th valign="top" width="700px" height="105px"><img src="https://autopec.com.br/images/img_emails.jpg" width="700px" height="105px" align="top" border="0"></th>
		</tr>
		<tr>
			<th valign="top" width="700px">
				<p style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;padding:0 30px;margin-top:10px;">Prezado(a) <strong>'.$fetch_SelectFinalPedido['RazaoSocial'].'</strong>. Informamos que seu pedido <strong>'.$pedidoId.'</strong>, j&aacute; encontra-se em nosso sistema e est&aacute; em processamento pelo nosso departamento financeiro. </p>
				<p style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;padding:0 30px;">A cada mudan&ccedil;a de status do mesmo voc&ecirc; ser&aacute; avisado por e-mail.O detalhamento do pedido est&aacute; abaixo, caso esteja em desacordo com o que foi visto no site, favor entrar em contato. </p>
			</th>
		</tr>
	</table>
	<table align="center" width="700px" style="margin-top:20px;">
		<tr valign="top" style="background:#BCC3C9;">
			<th valign="top" width="500px" style="text-align:left;font-family: Open Sans, sans-serif;font-weight:600;font-size:14px;color:#ffffff;">Produtos</th>
			<th valign="top" width="60px" style="text-align:left;font-family: Open Sans, sans-serif;font-weight:600;font-size:14px;color:#ffffff;">Qtd</th>
			<th valign="top" width="70px" style="text-align:left;font-family: Open Sans, sans-serif;font-weight:600;font-size:14px;color:#ffffff;"> Unit</th>
			<th valign="top" width="70px" style="text-align:left;font-family: Open Sans, sans-serif;font-weight:600;font-size:14px;color:#ffffff;">Total</th>
		</tr>';
		$MsgBodyOneArray = "";
	$query_SelectFinalProduto = $objModelConclusion->SelectFinalProduto($objConn,$pedidoId);
	while($fetch_SelectFinalProduto = $query_SelectFinalProduto->fetch(PDO::FETCH_ASSOC)){
		$MsgBodyOne = '
		<tr valign="top">
			<th valign="top" width="500px" style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;">'.$fetch_SelectFinalProduto['CodProduto'].' - '.$fetch_SelectFinalProduto['Produto'].'</th>
			<th valign="top" width="60px" style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;">'.$fetch_SelectFinalProduto['quantidade'].'</th>
			<th valign="top" width="70px" style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;">R$ '.number_format($fetch_SelectFinalProduto['vl_unit'], 2, ',', '.').'</th>
			<th valign="top" width="70px" style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;">R$ '.number_format($fetch_SelectFinalProduto['vlt'], 2, ',', '.').'</th>
		</tr>';
		$MsgBodyOneArray .= $MsgBodyOne;
	}
	$MsgBodyTwo ='</table>
	<table align="center">
		<tr>
			<th valign="top" width="700px">
				<p style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;padding:10px 30px;margin-top:10px;border-top:1px solid #BEC3C9;border-bottom:1px solid #BEC3C9;"><strong>Endere&ccedil;o de entrega:</strong><br/>'.$fetch_SelectFinalPedido['enda'].'<br/>
				'.$fetch_SelectFinalPedido['endb'].'</p>
			</th>
		</tr>
		<tr>
			<th valign="top" width="700px">
				<p style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;padding:10px 30px;margin-top:10px;border-bottom:1px solid #BEC3C9;"><strong>Dados pagamento e envio:</strong><br/>
				Forma pagamento: '.$fetch_SelectFinalPedido['FormaPagto'].'<br/>
				N&uacute;mero de parcela(s):  '.$fetch_SelectFinalPedido['n_parcelas'].'<br/>
				Valor produto(s): R$ '.number_format($fetch_SelectFinalPedido['vl_venda'], 2, ',', '.').'<br/>
				Valor frete: R$ '.number_format($fetch_SelectFinalPedido['vl_frete'], 2, ',', '.').'<br/>
				Diferencial aliquota R$ '.number_format($fetch_SelectFinalPedido['VL_ICMSST'], 2, ',', '.').'<br/>
				Valor pedido: R$ '.number_format($fetch_SelectFinalPedido['vl_venda'], 2, ',', '.').'<br/><br>
				Modo de Envio: '.$fetch_SelectFinalPedido['tp_envio'].'<br>
				Prazo Entrega: '.$fetch_SelectFinalPedido['praEntrega'].' dia(s) &uacute;teis ap&oacute;s confirma&ccedil;&atilde;o do pagamento <br><br>';
				if($fetch_SelectFinalPedido['CodForPag'] == 1){
				$MsgBodyThree = 'Caso n&atilde;o tenha conseguido imprimir o boleto clique no link abaixo:<br>
				<a href="'.$objFunctionClass->UrlFixed().'/antigo/boleto_bradesco.php?pedido='.$pedidoId.'">'.$objFunctionClass->UrlFixed().'/antigo/boleto_bradesco.php?pedido='.$pedidoId.'</a><br><br>';
				}
				else{$MsgBodyThree = '';}
				$MsgBodyFour = '</p>
			</th>
		</tr>
		<tr>
			<th valign="top" width="700px">
				<p style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;padding:10px 30px;margin-top:10px;border-bottom:1px solid #BEC3C9;"><strong>Informa&ccedil;&otilde;es Importantes:</strong><br/>
				- Prezado cliente, &eacute; um prazer te-lo como nosso cliente, para cumprimento da legisla&ccedil;&atilde;o tribut&aacute;ria do ICMS entre as unidades federativas brasileira, pedimos para que se voc&ecirc; estiver estabelecido em outro estado e for um comercio atacadista ou varejista que ir&aacute; utilizar nossos produtos para opera&ccedil;&atilde;o de revenda, entre em contato conosco pelo fone: (19) 3241-5341 ap&oacute;s efetuar a sua compra<br/>
				- Os pedidos ser&atilde;o processados pelo setor financeiro em hor&aacute;rio comercial de segunda a sexta-feira, exceto feriados locais e nacionais<br/>
				- Nossas entregas s&atilde;o feitas de segunda &aacute;  sexta-feira, das 08h00 &aacute;s 18h00, exceto feriados locais e nacionais, efetuado pelos correios ou transportadoras devidamente cadastradas.<br/>
				- Nosso prazo de entrega passa a contar a partir da aprova&ccedil;&atilde;o do pagamento do pedido. Para pedidos de boleto banc&aacute;rio, o prazo para envio da confirma&ccedil;&atilde;o pelo banco &eacute; de tr&ecirc;s dias &uacute;teis.<br/>
				- Nosso atendimento funciona de segunda &aacute; sexta-feira, das 08h00 &aacute;s 18h00 e aos s&aacute;bados das 08h00 &aacute;s 11h00, exceto feriados nacionais.<br/>
				- N&atilde;o realizamos entregas em endere&ccedil;o diferente do cadastro, como vizinhos, por exemplo.<br/>
				- Est&atilde;o autorizados a receber mercadoria porteiros, recepcionistas, secret&aacute;rias, familiares, desde que assinem o protocolo de entrega e apresentem documento de identifica&ccedil;&atilde;o.<br/>
				- Em caso de pedidos com mais de um produto, os mesmos ser&atilde;o cobrados e enviados de acordo com a disponibilidade dos mesmos em nosso estoque.<br/><br/>
				</p>
			</th>
		</tr>
		<tr>
			<th valign="top" width="700px">
				<p style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:14px;color:#000000;padding:10px 30px;margin-top:10px;"><strong>Diferencial de al&iacute;quota do ICMS</strong><br/>
				Em Janeiro de 2016 entrou em vigor a Emenda Constitucional n&ordm;. 87, onde o valor final do produto pode variar de acordo com o estado de entrega e tipo de cliente (CPF/CNPJ). VARIA&Ccedil;&Otilde;ES NO PRE&Ccedil;O FINAL<br/><br/>
				O valor final da sua compra pode variar de acordo com perfil de cliente e regi&atilde;o de entrega.
				Cada regi&atilde;o possui tributa&ccedil;&atilde;o fiscal pr&oacute;pria, como ICMS, o que pode alterar o valor final.
				Confira o valor final de sua compra no Carrinho de Compras ou durante o preenchimento dos Dados de Entrega ap&oacute;s selecionar o estado entrega e perfil de cliente, que poder&aacute; ser:
				<br/><br/>
				- Empresa Contribuinte de ICMS ou<br/>
				- CPF / Empresa n&atilde;o contribuinte de ICMS<br/><br/>
				Os impostos incidentes sobre a venda ser&atilde;o destacados na Nota Fiscal que acompanha o produto.<br/>
				</p>
			</th>
		</tr>
	</table>
	<table align="center" width="700px" style="background:#1C1714;">
		<tr>
			<th valign="top" width="400px">
				<img style="margin-top:34px;" src="https://autopec.com.br/images/logo-negativo.jpg">
				<td>
					<a href="https://plus.google.com/+AutopecBr/">
						<img src="https://www.autopec.com.br/images/upload/source/icon_googlemais.jpg" alt="Google+" width="26" height="26" style="display: block;" border="0"/>
					</a>
				</td>
				<td>
					<a href="https://twitter.com/autopec">
						<img src="https://www.autopec.com.br/images/upload/source/icon_twitter.jpg" alt="Twitter" width="26" height="26" style="display: block;" border="0"/>
					</a>
				</td>
				<td>
					<a href="https://www.facebook.com/autopec.1">
						<img src="https://www.autopec.com.br/images/upload/source/icon_facebook.jpg" alt="Facebook" width="26" height="26" style="display: block;" border="0"/>
					</a>
				</td>
				<td>
					<a href="https://www.youtube.com/user/autopec1">
						<img src="https://www.autopec.com.br/images/upload/source/icon_youtube.jpg" alt="YouTube" width="26" height="26" style="display: block;" border="0"/>
					</a>
				</td>
			</th>
			<th valign="top" width="300px">
				<p style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:12px;color:#ffffff;padding:10px 30px;margin-top:10px;">
					<a href="https://www.autopec.com.br" border="0" style="color:#ffffff;text-decoration:none;">www.autopec.com.br</a><br />
					<a href="mailto:pedidos@autopec.com.br" border="0" style="color:#ffffff;text-decoration:none;">pedidos@autopec.com.br</a><br />
					<br /><a border="0" style="color:#ffffff;text-decoration:none;">(19) 3241-5341</a><br />
					<a border="0" style="color:#ffffff;text-decoration:none;">08hrs &aacute;s 18hrs seg &aacute; sex.</a><br />
					<a border="0" style="color:#ffffff;text-decoration:none;">08hrs &aacute;s 12hrs aos s&aacute;b.</a><br />
			</th>
		</tr>
	</table>
</body>
</html>';
	$MsgSuccess = '<div class="alert alert-default alert-dismissible fade show text-center text-gray" role="alert"><h3>Processo de Envio Realizado!</h3></div>';
	$AddAddressEmail = $fetch_SelectFinalPedido['email'];
	$AddAddressName = 'Retorno de Pagamento';
	$UserName = 'envionfe@autopec.com.br';
	$Password = 'AutopecGeral@';
	$SetFromMail = 'pedidos@autopec.com.br';
	$SetFromName = 'Retorno de Pagamento';
	$AddReplyToMail = 'pedidos@autopec.com.br';
	$AddReplyToSubject = 'Retorno de Pagamento AutoPec';
	$AltBody = 'Retorno de Pagamento';
	$objFunctionSendMailer->SendMailer($MsgBody.$MsgBodyOneArray.$MsgBodyTwo.$MsgBodyThree.$MsgBodyFour,$MsgSuccess,$AddAddressEmail,$AddAddressName,$UserName,$Password,$SetFromMail,$SetFromName,$AddReplyToMail,$AddReplyToSubject,$AltBody);
	?>
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
<script language="JavaScript" type="text/javascript">$(document).ready(function(){var idCar = <?=$_SESSION['idCar']?>;$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},function(returnIdCar){if(returnIdCar != false){$('#car-sun').html(returnIdCar).show();}else{$('#car-sun').html('0.00').show();}});});</script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/sessiondestroy.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownuser.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect-input.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/autoredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/bestsellers.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/render-menu-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/render-time-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/validator-newsletter.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/popper/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/bootstrap/js/tooltip.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/flickity/flickity-docs.min.js"></script>
</body>
</html>