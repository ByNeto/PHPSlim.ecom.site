<?php
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Menu.php');// inclui a classe da model Menu.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
require_once('Models/model.Cart.php');// inclui a classe da model Cart.
$objModelMenu = new ModelMenu();
$objModelAutocomplete = new ModelAutocomplete();
$objModelCart = new ModelCart();
?>

<?php print_r($objComponentsClass->Scope($objFunctionClass->UrlFixed(),$objFunctionClass->URLSeo($_SERVER["REQUEST_URI"])));?>

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

<?php
	$query_SelectCartProducts = $objModelCart->SelectCartProducts($objConn, $objFunctionClass->CheckParameter($_SESSION['idCar']));
	$rowCountProdutos = $query_SelectCartProducts->rowCount();
	if($rowCountProdutos != 0){
?>
<div class="container" id="carrinho">
	<div class="row">
		<div class="bol_icon_cart_active" style="border:2px solid #717171;"><i style="font-size: 1.5em;" class="fa fa-cart-arrow-down text-white" aria-hidden="true"></i></div>
		<div class="bol_icon_cart" style="border:2px solid #717171;"><i style="font-size:1.5em;margin-left:0.1rem;" class="fa fa-unlock text-gray-max" aria-hidden="true"></i></div>
		<div class="bol_icon_cart" style="border:2px solid #717171;"><i style="font-size: 1.5em;margin-left:-0.2rem;" class="fa fa-credit-card-alt text-gray-max" aria-hidden="true"></i></div>
		<hr class="tracejada"></hr>
	</div>
	<div class="row bg-submenu">
		<div class="col-md-6 col-sm-6 col-xs-2 item text-left"><h2>Produto</h2></div>
		<div class="col-md-2 col-sm-2 col-xs-3 item text-left"><h2>Preço</h2></div>
		<div class="col-md-2 col-sm-2 col-xs-3 item text-left"><h2>Quantidade</h2></div>
		<div class="col-md-2 col-sm-2 col-xs-3 item text-left"><h2>Total</h2></div>
	</div>
		<?php if($query_SelectCartProducts){$idContOne=0;$contador=1;while($fetch_SelectCartProducts = $query_SelectCartProducts->fetch(PDO::FETCH_ASSOC)){$idContOne=$contador++;$imagem_produto=trim($fetch_SelectCartProducts['img']);$imagem_produto=str_replace("_d","",$imagem_produto);?>
		<?php if($fetch_SelectCartProducts['quantidade'] != 0 && $fetch_SelectCartProducts['quantidade'] != NULL && $fetch_SelectCartProducts['Estoque'] >= 1){?>
		<div class="row produto">
			<div class="col-sm-12 col-xs-12 menu-responsivo"><h4>Produto</h4></div>
			<div class="col-md-1 col-sm-4 col-xs-12 imagem text-left"><img class="img-responsive" src="<?php echo $objFunctionClass->CheckPicture($imagem_produto,"d") ?>" style="width: 100%;"></div>
			<div class="col-md-5 col-sm-8 col-xs-12 descricao prod text-left">
				<span style="display:none" id="CodAutopec<?php echo $idContOne ?>" ><?php echo $fetch_SelectCartProducts['CodAutopec']?></span>
				<h3><?php echo utf8_encode(($fetch_SelectCartProducts['Descricao']));?></h3>
				<p><?php echo utf8_encode(($fetch_SelectCartProducts['Aplicacao']));?></p>
				<span><?php echo utf8_encode(($fetch_SelectCartProducts['Fabricante']));?>- Ref:<?php echo $fetch_SelectCartProducts['CodOriginal'];?>- Clas. Fiscal:<?php echo $fetch_SelectCartProducts['ClFiscal'];?></span>
			</div>
			<div class="col-sm-12 col-xs-12 menu-responsivo"><h4>Preço</h4></div>
			<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">
				<h3 id="preco<?php echo $idContOne?>">R$ <?php echo number_format($fetch_SelectCartProducts['vl_unit'], 2, ',', '.')?></h3>
			</div>
			<div class="col-sm-12 col-xs-12 menu-responsivo"><h4>Quantidade</h4></div>
			<div class="col-md-2 col-sm-6 col-xs-12 quantidade">
				<ul class="list-inline">
					<li class="contador" onclick="menos(<?php echo $idContOne.','.$fetch_SelectCartProducts['Multiplo'].','.$fetch_SelectCartProducts['Estoque'];?>)">-<img src="<?php echo $objFunctionClass->UrlFixed()?>/Library/imagens/icons/icon_cart_menos.png" alt="carrinho" /></li>
					<li><input id="<?php echo $idContOne?>" class="qtd<?php echo $idContOne?>" type="text" name="qtd" value="<?php echo $fetch_SelectCartProducts['quantidade'];?>" size="number" readonly="readonly"/></li>
					<li class="contador" onclick="javascript:mais(<?php echo $idContOne.','.$fetch_SelectCartProducts['Multiplo'].','.$fetch_SelectCartProducts['Estoque'] ?>);">+<img src="<?php echo $objFunctionClass->UrlFixed()?>/Library/imagens/icons/icon_cart_mais.png" alt="carrinho" /></li>
				</ul>
			</div>
			<div class="col-sm-12 col-xs-12 menu-responsivo"><h4>Total</h4></div>
			<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">
				<h3 id="total<?php echo $idContOne ?>">R$ <?php echo number_format($fetch_SelectCartProducts['vl_unit']*$fetch_SelectCartProducts['quantidade'], 2, ',', '.')?>
				</h3>
				<i style="float:right;color:#e2001a;cursor:pointer;margin-top:-28px;font-size: 1.5rem;" class="float-up fa fa-trash" aria-hidden="true" data-toggle="tooltip" title="Remover do carrinho" onclick="javascript: var idSession = '<?php echo $_SESSION['idCar']; ?>'; var codAutopec = '<?php echo  $fetch_SelectCartProducts['CodAutopec']; ?>';  removeCart(idSession,codAutopec) "></i>
			</div>
		</div>
		<?php }else{
			print_r('<div class="row"><div id="indisponivel" class="alert alert-danger alert-dismissible fade show" style="width:100%;role="alert"><button style="padding:2px 5px;" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>O Produto '.utf8_encode($fetch_SelectCartProducts['Descricao']).' -'.$fetch_SelectCartProducts['CodAutopec'].' esta indisponível</strong></div></div>');
			echo "<script>
			window.onload = function(){
			document.getElementById('continuar').innerHTML='';
			setTimeout(function(){
				removeCart(".$_SESSION['idCar'].",".$fetch_SelectCartProducts['CodAutopec'].");
			},3000);
		}
			</script>";
		}?>
	<?php
		}
	}
	else{print_r('<div class="row"><div class="alert alert-danger alert-dismissible fade shows" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Sua sessão expirou</strong></div></div>');}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12" style="padding:0;" id="retornoQuantidade"></div>
		<div id="car-return" class="col-md-12 col-sm-12 col-xs-12" style="padding:0;"></div><!--Retorno Verificação do Estoque -->
	</div>
	<div class="row total">
		<div class="col-md-3 offset-md-6 col-sm-6 col-xs-6 texto border-top"><h3>SUBTOTAL</h3></div>
		<div class="col-md-3 col-sm-6 col-xs-6 valor border-top"><h3 id="subtotal"></h3></div>
		<div class="col-md-3 offset-md-6 col-sm-6 col-xs-6 texto"><h3>FRETE PARA</h3></div>
		<div class="col-md-3 col-sm-6 col-xs-6 valor">
			<input id="cep" type="text" name="cep" value="" placeholder="Digite o CEP"/>
			<input type="submit" value="Calcular" onclick="javascript: var idSession = '<?php echo $_SESSION['idCar']; ?>';  calcFreight(idSession) " />
			<span id="return"></span>
			<input type="hidden" id='txtSession' value="<?php echo $_SESSION['idCar']; ?>">
		</div>
		<div class="col-md-6 offset-md-6 col-sm-6 col-xs-6 texto" id="retornaCep" style="border-right: 1px solid #bbc4cb;"></div>
		<div class="col-md-3 offset-md-6 col-sm-6 col-xs-6 texto border-bottom"><h3>TIPO DE ENTREGA</h3></div>
		<div class="col-md-3 col-sm-6 col-xs-6 valor border-bottom">
			<select id="tipoEntrega"><option value="0">Calcule o frete</option></select>
		</div>
		<div class="col-md-3 offset-md-6 col-sm-6 col-xs-6 texto-cinza"><h3>TOTAL</h3></div>
		<div class="col-md-3 col-sm-6 col-xs-6 valor-cinza"><h3 id="totalPedido">--</h3></div>
		<div class="col-md-3 offset-md-6 col-sm-6 col-xs-6 inserir">
			<input type="submit" value="Continuar Comprando" onclick="javascript:window.location.href='<?php print_r($objFunctionClass->UrlFixed());?>';"/>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-6 continuar" id="continuar">
			<input type="submit" value="Continuar" onclick="advanceConfirmation()" />
		</div>
	</div>
</div>
<!--Fim do Carrinho -->
<?php
}else{print_r('<div class="container" style="margin-top:15%;margin-bottom:3%;"><div class="row"><div class="alert alert-danger alert-dismissible fade show" style="width:100%;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="redirecionar()"><spanaria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Você não possui produtos adicionados ao carrinho</strong></div></div></div>');}?>
<?php print_r($objComponentsClass->Footer($objFunctionClass->UrlFixed()));?>

<a href="javascript:void(window.open('http://c4publicidade.com.br/autopec/chat/chat.php','','width=660,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="chat"><img width="60%" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_chat.png"></a>

<!-- Core JavaScript -->
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript">$(document).ready(function(){var idCar = <?=$_SESSION['idCar']?>;$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},function(returnIdCar){if(returnIdCar != false){$('#car-sun').html(returnIdCar).show();}else{$('#car-sun').html('0.00').show();}});});</script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/sessiondestroy.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownuser.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/modal-mobile.js"></script>
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
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.mask.min.js"></script>

<script>
var idCar = '<?php echo $_SESSION['idCar'];?>';
var verifica = 0;
$('#retornaCep').hide();

$(document).ready(function(){var idCar = <?=$_SESSION['idCar']?>;$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},function(returnIdCar){if(returnIdCar != false){$('#subtotal,#totalPedido').html("R$ "+returnIdCar).show();}else{$('#subtotal,#totalPedido').html('R$ 0.00').show();}});});

function updateCart(quantidadeProdutos,precoUnitario,idHtmlPadrao,codAutopec,idCar){
	$.ajax({
	url:newURL+"/Library/vendor/ajax/ajax.updatecart.php", 
	type:'POST',
	data:'quantidadeProdutos='+quantidadeProdutos+'&precoUnitario='+precoUnitario+'&idHtmlPadrao='+idHtmlPadrao+'&codAutopec='+codAutopec+'&sessionCarrinho='+idCar,
	dataType: 'json',
	success: function(data){
	$("#total"+idHtmlPadrao).html('R$ '+data.totalAtualizado);
	$(".qtd"+idHtmlPadrao).val(data.quantidade);
	$("#subtotal").text("R$ "+data.subtotal);
	$("#totalPedido").text("R$ "+data.totalPedido);
	$("#tipoEntrega").html('<option value="0">Calcule o frete</option>');
	}
});
}

function cartSelectCheckProductStorage(idCar,codAutopec,id_qnt){
	var idCar = idCar;
	var codAutopec = codAutopec;
	var id_qnt = id_qnt;
	$.post(newURL+"/Library/vendor/ajax/ajax.cartselectcheckproductstorage.php",{idCar:idCar,codAutopec:codAutopec,id_qnt:id_qnt},
	function(returnSelectCheckProductStorage){
		if(returnSelectCheckProductStorage != false){
			$('#car-return').html(returnSelectCheckProductStorage).show();
			var quantidadeEstoque = $("#quantidade"+id_qnt).text();
			$(".qtd"+id_qnt).text(quantidadeEstoque);
		}
		else{$('#car-return').html(returnSelectCheckProductStorage).show();}
	});
	return false;
}

function id(el){
	return document.getElementById(el);
}
function menos(id_qnt,multiplo,estoque){
	var qnt = parseInt(id(id_qnt).value);
	if(qnt > 1){
		if(multiplo != 0){
			if(qnt > multiplo){
				id(id_qnt).value = qnt - multiplo*1;
				$("#retornoQuantidade").html('');
			}else{
				$("#retornoQuantidade").html('<div class="alert alert-danger alert-dismissible fade show" style="width:100%;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Quantidade mínima é de '+multiplo+' unidades</strong></div>');
			}
		}else{
			id(id_qnt).value = qnt - 1;
			$("#retornoQuantidade").html('');
		}
	}else{
		$("#retornoQuantidade").html('<div class="alert alert-danger alert-dismissible fade show" style="width:100%;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Quantidade mínima é de '+qnt+' unidade.</strong></div>');
	}
	var preco = $("#preco"+id_qnt).text();
	var precoFormatado = preco.replace(",", ".");
	var codAutopec = $("#CodAutopec"+id_qnt).text();
	cartSelectCheckProductStorage(idCar,codAutopec,id_qnt);
	updateCart(id(id_qnt).value,precoFormatado,id_qnt,codAutopec,idCar);
}
function mais(id_qnt,multiplo,estoque){
	var quantidade =0;
	var resto = 0;
	if(multiplo != 0){
		resto = quantidade % multiplo;
		quantidade = parseInt(id(id_qnt).value) + multiplo*1;
		if(resto === 0 && quantidade <= estoque){
			id(id_qnt).value = quantidade;
			$("#retornoQuantidade").html('');
		}else{
			$("#retornoQuantidade").html('<div class="alert alert-danger alert-dismissible fade show" style="width:100%;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Quantidade inválida.</strong></div>');
		}
	}else{
		if(quantidade <= estoque){
		id(id_qnt).value = parseInt(id(id_qnt).value) + 1;
		$("#retornoQuantidade").html('');
		}
	}
	var preco = $("#preco"+id_qnt).text();
	var precoFormatado = preco.replace(",", ".");
	var codAutopec = $("#CodAutopec"+id_qnt).text();
	cartSelectCheckProductStorage(idCar,codAutopec,id_qnt);
	updateCart(id(id_qnt).value,precoFormatado,id_qnt,codAutopec,idCar);
}
$('#cep').mask('00000-000',{reverse: true});
function calcFreight(idSession){

	var idSession = idSession;
	var c = $("#cep").val();
	var cep = c.replace("-","");
	$("#tipoEntrega").html('<option value="0">CALCULANDO...</option>');
	if(cep === ''){$("#cep").focus();}
	$.ajax({type:'GET',url:newURL+"/Library/vendor/ajax/ajax.calcfreight.php",data:'cep=' + cep + '&idSession=' + idSession + '&tipoEntrega=transp',success:function(msgs){if(msgs != 'error'){$('#tipoEntrega').html('<option value="0">Selecione</option>'+ msgs);}}})
}

$("#tipoEntrega").change(function(){
	var idSession = $('#txtSession').val();
	if(($("#tipoEntrega").val() != 0 ) && ($("#tipoEntrega").val() != 'Selecione')){
		var tpEntrega = $("#tipoEntrega").val();
		$.ajax({type:'POST',url:newURL+"/Library/vendor/ajax/ajax.selectfreight.php",data:'idFrete=' + tpEntrega + '&idSession=' + idSession,success: function(msgs){$('#totalPedido').html(msgs);}})
	}
});

function advanceConfirmation(){
	if(($("#tipoEntrega").val() != 0) && ($("#tipoEntrega").val() != 'Selecione')){
		var idSession = $('#txtSession').val();
		$.ajax({type:'POST',url:newURL+"/Library/vendor/ajax/ajax.selectinfoclient.php",data:'idSession=' + idSession,success: function(msgs){window.location=newURL+msgs;}})
	}
	else{
		$('#retornaCep').show();
		$('#retornaCep').html('<div class="alert alert-danger alert-dismissible fade show" style="width:100%;" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Escolha uma forma de envio</strong></div>');
	}
}

function removeCart(idSession,codAutopec){
	$.ajax({url:newURL+"/Library/vendor/ajax/ajax.removecart.php",type:'POST',data:'idSession='+idSession+'&codAutopec='+codAutopec,dataType: 'json',success: function(data){if(data.retornoDelete === true && data.retornoUpdate === true){location.reload();}}});
}
</script>

</body>
</html>