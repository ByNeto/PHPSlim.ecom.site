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
		<h1 class="font-bold text-red font-uppercase space-top space-bottom space-left-rem">Autopec - Politica de Segurança e de Privacidade</h1>
	</div>
	<div class="rows">
		<p class="text-gray">O website da Autopec possui o selo de Site Blindado, onde passou por uma bateria de testes de vulnerabilidades e foi aprovado. </p><br/>
		<p class="text-gray">Isso significa que este website está protegido contra tentativas de exploração e obtenção de informações confidenciais não autorizados através das técnicas de invasão mais conhecidas.</p><br/>
		<p class="text-gray">Blindagem de Sites é um conceito desenvolvido pela Site Blindado S/A e trata dos esforços e necessidades de proteção de portais web contra ataques de hacker, infecção por malware, roubo e clonagem de informações e números de cartão de crédito.</p><br/>
		<p class="text-gray"><strong>Propriedade das Informações</strong></p><br/>
		<p class="text-gray">Todas as informações contidas neste site são propriedade da empresa Autopec Comércio de Autopeças ltda, portanto, não poderão ser alteradas, copiadas, extraídas ou de qualquer forma utilizadas sem a prévia e expressa autorização por escrito. Desta forma, ao acessar o site Autopec, o usuário fica ciente que a utilização indevida das informações aqui contidas pode acarretar sanções civis e criminais.</p><br/>
		<p class="text-gray"><strong>Histórico de Páginas Visualizadas</strong></p>
		<p class="text-gray">Na utilização do e-commerce, o uso do histórico (cookies) é feito apenas para reconhecer um visitante constante e melhorar a experiência de compra. Os cookies são pequenos arquivos de dados transferidos de um site da web para o disco do seu computador e não armazenam dados pessoais.</p><br/>
		<p class="text-gray"><strong>PRIVACIDADE DE DADOS DO CLIENTE</strong></p><br/>
		<p class="text-gray"><strong>Informações pessoais</strong></p><br/>
		<p class="text-gray">Toda a coleta de informações pessoais através de nosso site é feita com o total conhecimento e consentimento de nossos usuários. </p>
		<p class="text-gray">Para realizar uma compra em nosso site, é necessário o fornecimento de algumas informações do cliente.</p>
		<p class="text-gray"><strong>Informações de navegação</strong></p><br/>
		<p class="text-gray">As informações que coletamos sobre os clientes que acessam nosso website tem como objetivo proporcionar um melhor acesso ao cliente, desde onde e como ele acessa, até a finalização de sua compra e satisfação com o produto.</p><br/>
		<p class="text-gray"><strong>Compartilhamento de informações</strong></p>
		<p class="text-gray">Todas as informações fornecidas por nossos clientes são utilizadas exclusivamente para a realização da compra e jamais serão cedidas a terceiros.</p><br/>
		<p class="text-gray"><strong>Acesso de informações pelos clientes</strong></p>
		<p class="text-gray">Os clientes podem acessar informações atualizadas relativas aos pedidos recentes, dados do cadastro e status do pedido.</p><br/>
		<p class="text-gray"><br/><strong>Utilização dos dados</strong></p>
		<p class="text-gray">São dados necessários para a realização da compra: CPF ou CNPJ; Nome completo da pessoa física ou jurídica, a fim de que o comprador seja identificado; E-mail e senha previamente cadastrados no próprio site; Endereço - com o objetivo de enviar os produtos requisitados pelo cliente; Telefone - para que possamos entrar em contato, se houver necessidade;</p>
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
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/jquery/jquery.mask.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/render-menu-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/validator-newsletter.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/render-time-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/popper/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/tooltip.js"></script>
</body>
</html>