<?php
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Menu.php');// inclui a classe da model Menu.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
require_once('Models/model.CentralCustomer.php');// inclui a classe da model CentralCustomer.
$objModelMenu = new ModelMenu();
$objModelAutocomplete = new ModelAutocomplete();
$objModelCentralCustomer = new ModelCentralCustomer();
?>

<?php
if($pedidoId == 'pedido'){$pedidoId = 0;}
$clienteId = $objFunctionClass->ClearLettersAndCharacters($clienteId);
$pedidoId = $objFunctionClass->ClearLettersAndCharacters($pedidoId);

if($pedidoId != 0){
	$query_CheckPedidoId = $objModelCentralCustomer->SelectCabecalhoEstaticoPedido($objConn,$clienteId);
	if($fetch_CheckPedidoId = $query_CheckPedidoId->fetch(PDO::FETCH_ASSOC)){
		if($fetch_CheckPedidoId['id_pedido'] != $pedidoId){
			print_r($objFunctionClass->InvalidParameter(200));
			print_r('<body onload="SessionDestroy();"></body>');
		}
	}
}

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

if(empty($clienteId) or !isset($clienteId)){$clienteId = 0;}
else{
	session_start();
	$_SESSION['clienteId'] = $clienteId;
	$query_SelectCheckUser = $objModelCentralCustomer->SelectCheckUser($objConn,$clienteId);
	if($fetch_SelectCheckUsers = $query_SelectCheckUser->fetch(PDO::FETCH_ASSOC)){
		if($fetch_SelectCheckUsers['CodCliSite'] == $_SESSION['clienteId']){
		$_SESSION['nameUser'] = $fetch_SelectCheckUsers['RazaoSocial'];
		$_SESSION['CepId'] = $fetch_SelectCheckUsers['CEP'];
		$label='<li title="'.utf8_encode($_SESSION['nameUser']).'" data-toggle="tooltip"><a><i style="margin-right:.1em;font-size:1.0em;" class="fa fa-user margin-top-icon" aria-hidden="true"></i><p onmouseover="dropDownUserShow();" onmouseout="dropDownUserHide();">'.$objFunctionClass->FirstWord(utf8_encode($_SESSION['nameUser'])).'</p></a><div class="alert alert-default" id="dropDownUser"><a href="'.$objFunctionClass->UrlFixed().'" class="cursor-class" onclick="SessionDestroy();" title="Clique para fazer Logoff" data-toggle="tooltip" data-placement="bottom"><i style="font-size:1.0em;" class="fa fa-sign-out margin-top-icon text-red" aria-hidden="true"></i> Logout</a></div></li>';}
		else{print_r($objFunctionClass->InvalidParameter(200));print_r('<body onload="SessionDestroy();"></body>');}
	}
	else{
		$_SESSION['CepId'] = 0;
		$label = '<li title="Acessar ou Criar Conta" data-toggle="tooltip"><a href="'.$objFunctionClass->UrlFixed().'/login/autopec/"><i style="margin-right:.1em;font-size:1.1em;" class="fa fa-sign-in margin-top-icon" aria-hidden="true"></i><p>Login / Conta</p></a></li>'; 
	}
}

if(empty($_SESSION['idCar']) or !isset($_SESSION['idCar'])){$_SESSION['idCar'] = date('YmdHis', time());}else{$_SESSION['idCar'] = $_SESSION['idCar'];}
?>
<?php print_r($objComponentsClass->MenuCar($objFunctionClass->UrlFixed(),$label,$_SESSION['idCar']));?>
</header>
<?php print_r($objComponentsClass->Banner($objFunctionClass->UrlFixed()));?>

<?php print_r($objComponentsClass->AutomakersMenu($objModelMenu->MenuAutomakers($objConn),$objFunctionClass));?>

<?php

$query_Pedido_Id = $objModelCentralCustomer->SelectCabecalhoEstaticoPedido($objConn,$clienteId);
if($fetch_Pedido_Id = $query_Pedido_Id->fetch(PDO::FETCH_ASSOC)){
	$Numero_Pedido = $fetch_Pedido_Id['id_pedido'];
	$Data_Pedido = substr($fetch_Pedido_Id['dthr_venda'], 0, 10);
	$Status_Pedido = $fetch_Pedido_Id['StatusCaptura'];
	$Forma_Pagamento = $fetch_Pedido_Id['FormaPagto'];
	$Valor_Frete = $fetch_Pedido_Id['vl_frete'];
}
else{
	$Numero_Pedido = ' Nenhum pedido encontrado.';
	$Data_Pedido = date("d/m/Y");
	$Status_Pedido = ' Nenhum pedido encontrado.';
	$Forma_Pagamento = ' Nenhum pedido encontrado.';
	$Valor_Frete = 0;
}
?>
<div class="container" id="centralDoCliente">
	<div class="row">
		<h1 class="font-bold text-red font-uppercase space-top space-bottom space-left-rem">Central do Cliente</h1>
	</div>
	<div id="accordion">
		<div class="row">
			<div class="alert space-top space-bottom"><strong id="id_pedido">Número do Pedido: <?php echo $Numero_Pedido;?></strong></div>
		</div>
		<div class="panel-danger">
			<div class="panel-heading">
				<div class="text-center">
					<strong class="text-red" id="StatusCaptura">Status: <?php echo $Status_Pedido;?></strong>
				</div>
			</div>
			<hr></hr>
			<div class="row">
				<div class="col-md-6">
					<strong id="dataPedido">Data do pedido: <?php echo date("d/m/Y",strtotime(substr($Data_Pedido, 0, 10)));?></strong>
				</div>
				<div class="col-md-6">
					<strong id="FormaPagto">Forma de Pagamento: <?php echo utf8_encode($Forma_Pagamento);?></strong>
				</div>
			</div>
			<hr></hr>
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th>ID</th>
						<th>Produto</th>
						<th>Valor Unitário</th>
						<th>Quantidade</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody id="returnEstaticoDadosPedido">
					<?php
					$query_Dados_Tabela_Pedidos = $objModelCentralCustomer->SelectTabelaEstaticoProdutos($objConn,$clienteId);
					$total=0;
					$totalProduto=0;
					while($fetch_Select = $query_Dados_Tabela_Pedidos->fetch(PDO::FETCH_ASSOC)){
						$total = $fetch_Select['vl_unit']*$fetch_Select['quantidade'];
						$totalProduto = $totalProduto+$total;
					?>
					<tr>
						<td><?php echo $fetch_Select['CodProduto']?></td>
						<td><?php echo utf8_encode($fetch_Select['Produto'])?></td>
						<td>R$<?php echo number_format($fetch_Select['vl_unit'], 2, ',', '.')?></td>
						<td><?php echo $fetch_Select['quantidade']?></td>
						<td>R$<?php echo number_format($total, 2, ',', '.')?></td>
					</tr>
					<?php }?>
				</tbody>
				<tbody id="returnDadosPedido"></tbody>
			</table>
			<div class="col-md-12">
				<div class="alert alert-warning" role="alert">
					<div class="row">
						<div class="col-md-4">
							<h4 id="totalProduto">PRODUTO(S): R$<?php echo number_format($totalProduto, 2, ',', '.')?></h4>
						</div>
						<div class="col-md-4">
							<h4 id="vl_frete">FRETE:R$<?php echo number_format($Valor_Frete, 2, ',', '.'); ?></h4>
						</div>
						<div class="col-md-4">
							<h4><strong class="black" id="totalCompra">TOTAL COMPRA: R$<?php echo number_format($totalProduto+$Valor_Frete, 2, ',', '.'); ?></strong></h4>
						</div>
					</div>
				</div>
			</div> 
			<div class="col-md-12" style="margin-bottom:1.5rem;margin-top:1.5rem;">
				<div class="alert alert-default" role="alert" style="border: 1px solid #000; display:none;">
					<div class="row">
						<div class="col-md-1 text-center">&nbsp;</div>
						<div class="col-md-2 text-center" style="margin-bottom:1rem;margin-top:1rem;">
							<strong class="font-responsive">Pedido Realizado</strong>
							<div class="iconCentral">
								<i class="fa fa-align-justify fa-2x" aria-hidden="true"></i>
							</div>
							<strong class="text-green font-responsive">Pedido Aprovado</strong>
						</div>
						<div class="col-md-2 text-center" style="margin-bottom:1rem;margin-top:1rem;">
							<strong class="font-responsive">Análise no financeiro</strong>
							<div class="iconCentral">
								<i class="fa fa-usd fa-2x" aria-hidden="true"></i>
							</div>
							<strong class="text-green font-responsive">Pedido Aprovado</strong>
						</div>
						<div class="col-md-2 text-center" style="margin-bottom:1rem;margin-top:1rem;">
							<strong class="font-responsive">Expedição</strong>
							<div class="iconCentral">
								<i class="fa fa-dropbox fa-2x" aria-hidden="true"></i>
							</div>
							<strong class="text-green font-responsive">Pedido Aprovado</strong>
						</div>
						<div class="col-md-2 text-center" style="margin-bottom:1rem;margin-top:1rem;">
							<strong class="font-responsive">Transporte</strong>
							<div class="iconCentral">
								<i class="fa fa-truck fa-2x" aria-hidden="true"></i>
							</div>
							<strong class="text-green font-responsive">Pedido Aprovado</strong>
						</div>
						<div class="col-md-2 text-center" style="margin-bottom:1rem;margin-top:1rem;">
							<strong class="font-responsive">Entrega</strong>
							<div class="iconCentral">
								<i class="fa fa-home fa-2x" aria-hidden="true"></i>
							</div>
							<strong class="text-red font-responsive">Pedido Cancelado</strong>
						</div>
						<div class="col-md-1 text-center">&nbsp;</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="alert space-top space-bottom"><strong>Alteração do cadastro:</strong></div>
		</div>
		<div class="accordion-content">
			<p class="text-shadow"> Atualize seus dados cadastrais:</p>
			<div class="row">
				<div class="col-md-6">
					<ul>
						<li><i class="fa fa-user" aria-hidden="true"></i><a href="#"> Alterar dados</a></li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul>
						<li><i class="fa fa-unlock-alt" aria-hidden="true"></i><a href="#"> Alterar senha</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="alert space-top space-bottom"><strong>Histórico de Pedidos:</strong></div>
		</div>
		<div class="accordion-content">
		<?php
		$query_PedidoCliente = $objModelCentralCustomer->SelectIdsPedido($objConn,$clienteId);
		while($fetch_PedidoCliente = $query_PedidoCliente->fetch(PDO::FETCH_ASSOC)){
			?><button class="historicopedidos" onclick="javascript: var idPedido = '<?php echo $fetch_PedidoCliente['id_pedido']; ?>';  printPedido(idPedido) "><?php echo $fetch_PedidoCliente['id_pedido']?></button><?php
		}
		?>
		</div>
		<div class="row">
			<div class="alert space-top space-bottom"><strong>Atendimento:</strong></div>
		</div>
		<div class="accordion-content">
			<p class="text-shadow">Utilize um dos canais abaixo para entrar em contato:</p>
			<div class="row">
			<div class="col-md-4">
				<ul>
					<li><i class="fa fa-phone" aria-hidden="true"></i> (19) 3241-5341  </li>
				</ul>
			</div>
			<div class="col-md-4">
				<ul>
					<li><i class="fa fa-at" aria-hidden="true"></i> sac@autopec.com.br</li>
				</ul>
			</div>
			<div class="col-md-4">
			<ul>
				<li><a href="<?php print_r($objFunctionClass->UrlFixed()); ?>/contato/"><i class="fa fa-envelope-o" aria-hidden="true"></i> Contato</a></li>
			</ul>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="alert space-top space-bottom"><strong>Documentos de auxílio ao usuário:</strong></div>
		</div>
		<div class="accordion-content">
			<p class="text-shadow">Caso tenha alguma dúvida, utilize os documentos abaixo:</p>
			<div class="row">
				<div class="col-md-6">
					<ul>
						<li><a class="efeito-hover" href="<?php print_r($objFunctionClass->UrlFixed()); ?>/politicadeseguranca/"><i class="fa fa-lock" aria-hidden="true"></i> Politica de Segurança</a></li>
						<li><a class="efeito-hover" href="<?php print_r($objFunctionClass->UrlFixed()); ?>/trocasedevolucoes/"><i class="fa fa-refresh" aria-hidden="true"></i> Trocas e Devoluções</a></li>
						<li><a class="efeito-hover" href="<?php print_r($objFunctionClass->UrlFixed()); ?>/comocomprar/"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Como Comprar</a></li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul>
						<li><a class="efeito-hover" href="<?php print_r($objFunctionClass->UrlFixed()); ?>/formasdepagamentos/"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Formas de Pagamento</a></li>
						<li><a class="efeito-hover" href="<?php print_r($objFunctionClass->UrlFixed()); ?>/termosdevendas/"><i class="fa fa-book" aria-hidden="true"></i> Termos de Venda</a></li>
						<li><a class="efeito-hover" href="<?php print_r($objFunctionClass->UrlFixed()); ?>/"><i class="fa fa-question" aria-hidden="true"></i> Perguntas Frequentes</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="space-bottom"></div>

<?php print_r($objComponentsClass->Footer($objFunctionClass->UrlFixed()));?>

<a href="javascript:void(window.open('http://c4publicidade.com.br/autopec/chat/chat.php','','width=660,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="chat"><img width="60%" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_chat.png"></a>
<!-- Core JavaScript -->
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript">
$("#returnDadosPedido").hide();
function printPedido(idPedido){
$.ajax({
	url: newURL+"/Library/vendor/ajax/ajax.centralcustomer.php",
	type: 'POST',
	data:'idPedido='+idPedido,
	dataType: 'json',
	success: function(data){
		if(data != false){
		$("#returnEstaticoDadosPedido").hide();
		$("#returnDadosPedido").show();
		$("#returnDadosPedido").html(data.tabela);
		$('#id_pedido').html('Número do Pedido: '+data.id_pedido);
		$('#dataPedido').html('Data do pedido: '+data.dthr_venda);
		$('#StatusCaptura').html('Status: '+data.StatusCaptura);
		$('#FormaPagto').html('Forma de Pagamento: '+data.FormaPagto);
		$('#totalProduto').html('PRODUTO(S): R$'+data.totalProduto);
		$('#vl_frete').html('FRETE: R$'+data.vl_frete);
		$('#totalCompra').html('TOTAL COMPRA: R$'+data.totalCompra);
		$('html, body').animate({scrollTop: $("#centralDoCliente").offset().top}, 'slow');
		}
		else{alert('error');}
		}
	});
}
</script>
<script language="JavaScript" type="text/javascript">$(document).ready(function(){var idCar = <?=$_SESSION['idCar']?>;$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},function(returnIdCar){if(returnIdCar != false){$('#car-sun').html(returnIdCar).show();}else{$('#car-sun').html('0.00').show();}});});</script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/sessiondestroy.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.ui.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownuser.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/collapse-centralcustomer.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect-input.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/autoredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/bestsellers.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/modal-sales.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/render-menu-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/render-time-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/validator-newsletter.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/start-modal-function.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/popper/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/bootstrap/js/tooltip.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/flickity/flickity-docs.min.js"></script>



</body>
</html>