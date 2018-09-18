<?php
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Menu.php');// inclui a classe da model Home.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
$objModelMenu = new ModelMenu();
$objModelAutocomplete = new ModelAutocomplete();
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

<div class="container">
	<div class="row">
		<h1 class="font-bold text-red font-uppercase space-top space-bottom space-left-rem">Autopec - Termos de Vendas</h1>
	</div>
	<div class="rows">
		<p class="text-gray">Termos de venda referente ao e-commerce Autopec - https://www.autopec.com.br <br/>
		Todos os itens relacionados tanto ao desenvolvimento deste website, quanto a venda dos produtos e preços propostos estão sob responsabilidade da empresa Autopec Comércio de autopeças ltda, situada no endereço:<br/>
		Rua Sargento João Batista Sarubbi, 77 Jd. Eulina - Campinas - 13063-340 - Telefone: (19) 3241-5341 - E-mail: sac@autopec.com.br<br/>
		O usuário fica ciente que a utilização indevida das informações aqui contidas pode acarretar sanções civis e criminais.</p><br/>
		<p class="text-red font-uppercase"><strong>PRIVACIDADE DE DADOS DO CLIENTE</strong></p><br/>
		<p><strong>Informações pessoais</strong></p>
		<p class="text-gray">Toda a coleta de informações pessoais através de nosso site é feita com o total conhecimento e consentimento de nossos usuários. <br/>
		Para realizar uma compra em nosso site, é necessário o fornecimento de algumas informações do cliente.</p>
		<p><strong>Utilização dos dados</strong></p>
		<p class="text-gray">São dados necessários para a realização da compra: CPF ou CNPJ; Nome completo da pessoa física ou jurídica, a fim de que o comprador seja <br/>
		identificado; E-mail e senha - os quais o cliente preencherá no momento do cadastro, para garantir maior segurança do negócio jurídico; Endereço - com o objetivo de enviar os produtos requisitados pelo cliente; Telefone - para que possamos entrar em contato, se houver necessidade;</p><br/>
		<p class="text-red font-uppercase"><strong>FORMAS DE PAGAMENTO</strong></p><br/>
		<p class="text-gray">Os preços, condições de pagamento e opções de entrega apresentados no site www.autopec.com.br são exclusivos deste canal de venda. Não correspondem aos mesmos dos praticados pelas lojas físicas, estão sujeitos à disponibilidade de estoque e têm validade somente para a data em que são veiculados na internet.</p><br/>
		<p><strong>Pagamento - Cartão de crédito</strong><p>
		<p class="text-gray">O parcelamento pode ser feito em até 12 vezes sem juros nos cartões de crédito da bandeira Visa ou Mastercard.<br/>
		Nas compras efetuadas por meio de cartão de crédito, o pedido está sujeito à aprovação da GETNET.<br/>
		O prazo da entrega ocorrerá a partir da confirmação do pagamento.<br/>
		A fim de garantir a segurança dos clientes, as compras realizadas estão sujeitas a confirmação de alguns dados e envio de documentos a Autopec. Isso porque algumas pessoas realizam compras pela internet com o cartão de terceiros sem que os verdadeiros proprietários do cartão tenham conhecimento.</p><br/>
		<p class="text-red font-uppercase"><strong>FRETE</strong></p><br/>
		<p class="text-gray">As opções de preços e prazos de Frete são fornecidas após o cálculo do frete, com seus respectivos preços e prazo de entrega.<br/>
		O cálculo do frete oferece 5 opções de entrega, onde o cliente pode optar pela opção que melhor atende sua necessidade. <br/>
		- Nossas entregas são feitas de segunda á  sexta-feira, das 08h00 ás 18h00, exceto feriados locais e nacionais, efetuado pelos correios ou transportadoras devidamente cadastradas.<br/>
		- Nosso prazo de entrega passa a contar a partir da aprovação do pagamento do pedido. Para pedidos de boleto bancário, o prazo para envio da confirmação pelo banco é de três dias úteis.<br/>
		- Nosso atendimento funciona de segunda á sexta-feira, das 08h00 ás 18h00 e aos sábados das 08h00 ás 11h00, exceto feriados nacionais.<br/>
		- Não realizamos entregas em endereço diferente do cadastro, como vizinhos, por exemplo.<br/>
		- Estão autorizados a receber mercadoria porteiros, recepcionistas, secretárias, familiares, desde que assinem o protocolo de entrega e apresentem documento de identificação.<br/>
		- Em caso de pedidos com mais de um produto, os mesmos serão cobrados e enviados de acordo com a disponibilidade dos mesmos em nosso estoque.</p><br/>
		<p class="text-red font-uppercase"><strong>TROCAS E DEVOLUÇÕES</strong></p><br/>
		<p class="text-gray">Para devolução de mercadorias é necessário enviar um e-mail formalizando o pedido para: sac@autopec.com.br;<br/>
		Após o envio deste a Autopec entrará em contato para protocolação da devolução e assim que a peça voltar para a empresa ela será <br/>
		analisada e caso constatada a veracidade do pedido as devidas ações de devolução serão tomadas.<br/>
		De acordo com a Lei Nº 14.627 de 13 de Junho de 2013.<br/>
		1. Troca de mercadorias que não apresentam defeitos - o prazo para troca é de 07(sete) dias corridos.<br/>
		2. Troca de mercadorias com defeito - o prazo é de 90 (noventa) a 180<br/>
		(cento e oitenta) dias corridos seguindo as regras de cada fabricante. O prazo é considerado a partir da data da compra ou do término da execução do serviço que deve ser comprovado mediante apresentação de nota fiscal emitida pelo responsável por esta execução, não sendo aceito ordens de serviços e outros que não estão de acordo com a lei federal.<br/>
		Obs: Em caso de trocas de mercadorias que não possuem vícios ocultos de
		fabricação será necessário envia para análise e emissão de laudo do fabricante, podendo demorar até 30 dias o retorno deste.<br/></p>
		<p class="text-gray">3. Para troca de mercadorias é necessário: </p><br/>
		<p class="text-red font-uppercase"><strong>Pessoa física:</strong></p><br/>
		<p class="text-gray">Nota fiscal da compra.<br/>
		Certificado de garantia devidamente preenchido - para itens que acompanham o mesmo de fábrica.<br/>
		Nota fiscal da execução dos serviços - Para casos que será reclamado de acordo com o término de execução de serviços.</p><br/>
		<p class="text-red font-uppercase"><strong>Pessoa Jurídica:</strong></p><br/>
		<p class="text-gray">Pedir autorização de devolução para o setor responsável.<br/>
		Autorização de devolução - devidamente preenchida conforme orientação e assinada pelo responsável representante do Grupo AUTOPEC.<br/>
		Certificado de garantia devidamente preenchido - para itens que acompanham o mesmo de fábrica.</p><br/>
		<p class="text-gray"><strong>Obs: </strong>As peças do Grupo AUTOPEC são controladas e a garantia só é concedida após a confirmação de que a peça foi realmente comercializada por nós, a troca só é autorizada mediante esta confirmação.</p>
	</div>
</div>

<?php print_r($objComponentsClass->Footer($objFunctionClass->UrlFixed()));?>

<a href="javascript:void(window.open('http://c4publicidade.com.br/autopec/chat/chat.php','','width=660,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="chat"><img width="60%" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_chat.png"></a>
<!-- Core JavaScript -->
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript">$(document).ready(function(){var idCar = <?=$_SESSION['idCar']?>;$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},function(returnIdCar){if(returnIdCar != false){$('#car-sun').html(returnIdCar).show();}else{$('#car-sun').html('0.00').show();}});});</script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/sessiondestroy.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownuser.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect-input.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/autoredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/bestsellers.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/render-menu-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/validator-newsletter.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/render-time-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/popper/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/tooltip.js"></script>
</body>
</html>