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
		<h1 class="font-bold text-red font-uppercase space-top space-bottom space-left-rem">Autopec - Como Comprar</h1>
	</div>
	<div class="rows">
		<p class="text-gray">Ao acessar a página principal do site da <strong>Autopec</strong> é possível visualizar o campo de pesquisa, onde os produtos podem ser encontrados de acordo com suas informações: nome, automóvel ou marca. </p><br/>
		<p><strong class="text-red">Por exemplo:</strong> <strong>O produto Pestana de Vidro, ele pode ser encontrado pesquisando as palavras</strong> <strong class="text-red">"Pestana" "Vidro"</strong> ou <strong class="red">"Topic" "Besta 2.2" "Besta 2.7" ou "Asia Motors".</strong></p>
		<p class="text-gray">Além do campo de pesquisa os produtos são apresentados logo abaixo do banner na página inicial, há um menu lateral com todas Montadoras, após clicar sobre uma das Montadoras é possível ainda escolher o Carro, um Grupo e um Sub-Grupo.</p><br/>
		<p><strong class="text-red">Por Exemplo:</strong> <strong>O produto Pestana de Vidro, pode ser acessado selecionando a Montadora</strong> -> <strong>Asia Motors</strong>, <strong>Carro</strong> -> <strong>TOPIC</strong>, <strong class="text-red">Grupo</strong> -> <strong>ACABAMENTOS</strong> e <strong class="text-red">Sub-Grupo</strong> -> <strong>ACESSORIOS.</strong></p><br/>
		<p class="text-gray">Ao clicar sobre um produto todas suas informações serão exibidas: Nome, aplicação, marca, parcelado em cartões de crédito das bandeiras Visa ou Mastercard, com opções de parcelamento de até 12 vezes sem juros(com parcelas mínimas de R$ 20,00). A imagem do produto correspondente irá aparecer e pode ser visualizada melhor clicando sobre a imagem menor. O cálculo do frete é feito correspondente ao produto que está sendo visualizado, este valor pode mudar no final da compra caso sejam adicionados mais itens.</p><br/>
		<p class="text-gray">Logo abaixo da imagem do produto estão todos os veículos e anos a qual o produto se aplica e suas informações adicionais.</p>
		<p><img src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/comocomprar/produto.jpg" class="center-block img-responsive img-fluid" style="max-width: 100%;height: auto;"></p>
		<p><strong class="text-red font-uppercase">Carrinho </strong></p><br/>
		<p class="text-gray">Clicando sobre o botão <strong>COMPRAR</strong> o produto é colocado no Carrinho, onde são listados todos os produtos da sua compra, você pode adicionar um produto no carrinho e continuar procurando por mais itens clicando em <strong>VOLTAR AS COMPRAS</strong> ou simplesmente buscando por outro item na barra de pesquisa.</p><br/>
		<p class="text-gray">O carrinho fica posicionado na parte superior direita da tela e pode ser visualizado a qualquer momento clicando sobre <strong>MEU CARRINHO</strong>, o cálculo do frete no carrinho é referente a todos os produtos inclusos na lista. Você pode alterar a quantidade de um produto clicando sobre o ícone de ( ) ou diminuir a quantidade clicando sobre o ( - ), o ( x ) ao lado do total exclui o produto do seu carrinho, assim que é feita a alteração em um produto da sua lista o valor total é recalculado automaticamente.</p>
		<p><img src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/comocomprar/carrinho.jpg" class="center-block img-responsive img-fluid" style="max-width: 100%;height: auto;"></p>
		<p class="text-gray">Ao clicar em finalizar pedido surgirá uma nova tela de identificação. A identificação é necessária para dar continuidade a compra:</p><br/>
		<p class="text-gray"><strong>- Para usuários que possuem cadastro no SITE - somente é necessário informar o e-mail e a senha do cadastro no site.<br/>- Para usuários não cadastrados no SITE - é necessário informar o e-mail ou CPF/CNPJ para continuar e realizar o cadastro. </strong></p><br/>
		<p><strong class="text-red font-uppercase">Cadastro</strong></p><br/>
		<p class="text-gray">O endereço onde serão entregue os produtos será o mesmo do cadastro ! Todos os campos com ( * ) são obrigatórios, após preenche-los é necessário escolher uma senha de acesso ao site, por fim finalizar clicando em cadastrar. Os dados do cadastro e endereço de entrega podem ser confirmados e então é só necessário clicar em continuar.</p><br/>
		<p><img src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/comocomprar/cadastro.jpg" class="center-block img-responsive img-fluid" style="max-width: 100%;height: auto;"></p>
		<p><strong class="text-red font-uppercase">Opções de Pagamento</strong></p><br/>
		<p class="text-gray">As opções de pagamento irão aparecer após a escolha do Frete, o pagamento pode ser efetuado em até 12x sem juros nos cartões Visa ou Mastercard, com o valor das parcelas minimo de R$ 20,00. </p><br/>
		<p class="text-gray">É possível colocar uma observação adicional(caso necessário), no final da página de pagamento.</p><br/>
		<p><strong>Cartão de Crédito</strong></p>
		<p class="text-gray">Para as opções de pagamento no cartão de crédito:</p>
		<p class="text-gray">A próxima página após a escolha do produto e do frete irá informar o número da transação, valor total do pedido, número de parcelas e a bandeira do cartão.</p><br/>
		<p><strong>Boleto</strong></p>
		<p class="text-gray">Para a opção de pagamento no boleto:</p>
		<p class="text-gray">O cliente será redirecionado a página de impressão do boleto, caso exista a necessidade de re-impressão do boleto um link estará no e-mail que foi enviado com as informações do pedido.</p><br/>
		<p><strong class="text-red font-uppercase">Meus Pedidos</strong></p><br/>
		<p class="text-gray">No menu superior ao lado da caixa de pesquisa está localizada a aba "Login/Conta", é possível verificar o status do pedido nesta área, para isto é preciso ter o CPF/CNPJ e o número do pedido(o número do pedido pode ser conferido no e-mail que foi enviado). Nesta área será possível conferir todas informações do seu pedido, inclusive o código de rastreio junto a transportadora(consulte Opções de Frete para mais informações de entrega) e o status do pedido: aprovação, separação, expedição, enviado...</p><br/>
		<p><img src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/comocomprar/central.jpg" class="center-block img-responsive img-fluid" style="max-width: 100%;height: auto;"></p>
		<p class="text-gray"><strong>Obs. Todas as imagens e preços desta página são apenas simulações e estão sujeitos a mudanças.</strong><p><br/>
		<p><strong class="text-red font-uppercase">Diferencial Aliquota</strong></p><br/>
		<p class="text-gray">Entrou em vigor a Emenda Constitucional nº. 87, onde o valor final do produto pode variar de acordo com o estado de entrega e tipo de cliente (CPF/CNPJ).</p><br/>
		<p><strong>VARIAÇÕES NO PREÇO FINAL </strong></p><br/>
		<p class="text-gray">O valor final da sua compra pode variar de acordo com perfil de cliente e região de entrega. Cada região possui tributação fiscal própria, como ICMS, o que pode alterar o valor final. Confira o valor final de sua compra no Carrinho de Compras ou durante o preenchimento dos Dados de Entrega após selecionar o estado entrega e perfil de cliente, que poderá ser:</p><br/>
		<p class="text-gray"><strong>- "Empresa Contribuinte de ICMS" ou</strong></p>
		<p class="text-gray"><strong>- "CPF / Empresa não contribuinte de ICMS"</strong></p>
		<p class="text-gray">Os impostos incidentes sobre a venda serão destacados na Nota Fiscal que acompanha o produto.</p><br/>
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