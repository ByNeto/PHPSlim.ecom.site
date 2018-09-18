<?php
error_reporting(0);
ini_set('display_errors', 0);
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Menu.php');// inclui a classe da model Menu.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
require_once('Models/model.Products.php');// inclui a classe da model Home.
$objModelMenu = new ModelMenu();
$objModelAutocomplete = new ModelAutocomplete();
$objModelProducts = new ModelProducts();
?>
<meta http-equiv="Content-Security-Policy: default-src 'self' https://*.autopec.com.br; script-src 'self';style-src 'self';">
<?php print_r($objComponentsClass->Scope($objFunctionClass->UrlFixed(),$objFunctionClass->URLSeo($_SERVER["REQUEST_URI"])));?>

<body>
<div id="loader" class="loader"><center><img class="img-responsive rotaciona top" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_loading.png"/></center></div>
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
					<!--<li><a class="text-shadow" href="<?php //print_r($objFunctionClass->UrlFixed());?>/blog/">Blog</a></li>-->
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

<?php print_r($objComponentsClass->AutomakersMenu($objModelMenu->MenuAutomakers($objConn),$objFunctionClass));?>

<?php
$string = strpos($_SERVER["REQUEST_URI"], '?');
if($string == true){print_r($objFunctionClass->InvalidParameter(200));}
if(ctype_alnum($productId) != 1){print_r($objFunctionClass->InvalidParameter(200));}
//$productId=$objFunctionClass->ClearLettersAndCharacters($productId);
$productId= htmlspecialchars($productId);
$productId= htmlentities($productId);
$productId= strip_tags($productId);
$productId = filter_var($productId);
$productName= htmlspecialchars($productName);
$productName= htmlentities($productName);
$productName= strip_tags($productName);
$productName = filter_var($productName);
$productName = $objFunctionClass->XssClean($productName);

@$query_ProductsSelect=$objModelProducts->SelectProducts($objConn,$objFunctionClass->InjectionSQL($objFunctionClass->XssClean($productId)));if($fetch_ProductsSelect = $query_ProductsSelect->fetch(PDO::FETCH_ASSOC)){$fetch_ProductsSelect['CodOriginal'];$fetch_ProductsSelect['Descricao'];$fetch_ProductsSelect['DescricaoAbrv'];$fetch_ProductsSelect['Aplicacao'];$fetch_ProductsSelect['Fabricante'];$fetch_ProductsSelect['Estoque'];$fetch_ProductsSelect['VendaVarejo'];$fetch_ProductsSelect['Foto'];$fetch_ProductsSelect['PesoB'];$fetch_ProductsSelect['Imagem1'];}else if($fetch_ProductsSelect['CodOriginal'] == ""){print_r($objFunctionClass->InvalidParameter(200));}else{print_r($objFunctionClass->InvalidParameter(200));}
?>
<div class="container">
<div itemscope itemtype="http://schema.org/Product" class="justify-content-md-center">
	<div class="row">
		<div class="col-md-2 col-sm-4">
			<div><a title="<?php print_r($fetch_ProductsSelect['Descricao'].' - Imagem 1');?>" data-toggle="tooltip" data-placement="bottom" onclick="javascript: var a ='<?php print_r($objFunctionClass->CheckPicture($fetch_ProductsSelect['Imagem1'],"b"));?>';img(a)"><img itemprop="image" class="img-min-products img-responsive float-up" src="<?php print_r($objFunctionClass->CheckPicture($fetch_ProductsSelect['Imagem1'],"b"));?>" /></a></div>
			<div><a title="<?php print_r($fetch_ProductsSelect['Descricao'].' - Imagem 2');?>" data-toggle="tooltip" data-placement="bottom" onclick="javascript: var a ='<?php print_r($objFunctionClass->CheckPictureOne($fetch_ProductsSelect['Imagem1']));?>';img1(a)"><img class="img-min-products img-responsive float-up" src="<?php print_r($objFunctionClass->CheckPictureOne($fetch_ProductsSelect['Imagem1']));?>" /></a></div>
			<div><a title="<?php print_r($fetch_ProductsSelect['Descricao'].' - Imagem 3');?>" data-toggle="tooltip" data-placement="bottom" onclick="javascript: var a ='<?php print_r($objFunctionClass->CheckPictureTwo($fetch_ProductsSelect['Imagem1']));?>';img2(a)"><img class="img-min-products img-responsive float-up" src="<?php print_r($objFunctionClass->CheckPictureTwo($fetch_ProductsSelect['Imagem1']));?>" /></a></div>
			<div><a title="<?php print_r($fetch_ProductsSelect['Descricao'].' - Imagem 4');?>" data-toggle="tooltip" data-placement="bottom" onclick="javascript: var a ='<?php print_r($objFunctionClass->CheckPictureThree($fetch_ProductsSelect['Imagem1']));?>';img3(a)"><img class="img-min-products img-responsive float-up" src="<?php print_r($objFunctionClass->CheckPictureThree($fetch_ProductsSelect['Imagem1']));?>" /></a></div>
		</div>
		<body onload="javascript: var a ='<?php print_r($objFunctionClass->CheckPicture($fetch_ProductsSelect['Imagem1'],"b"));?>';img(a)"></body>
		<div class="col-md-4 col-sm-6"><a class="parentimage" id="imgzoom"></a></div>
		<div class="col-md-6 col-sm-12">
			<div class="opcoes_compra_prod" itemprop="url" content="<?php echo $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"] ?>">
				<h1 itemprop="name"><?php print_r($objFunctionClass->LimitText(ucfirst(mb_strtolower(utf8_encode($fetch_ProductsSelect['DescricaoAbrv']))), 35));?></h1>
				<span itemprop="productID" content=" <?php echo $fetch_ProductsSelect['CodOriginal'] ?>"><?php print_r(utf8_encode($fetch_ProductsSelect['CodOriginal']).' - </span><span itemprop="brand">'.utf8_encode($fetch_ProductsSelect['Fabricante']));?></span>
				<?php if($fetch_ProductsSelect['Estoque'] >= 1){ ?>
				<div class="area_preco" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><!--<span class="area_preco_de">DE: R$ 314,96</span><br>  SelectCheckCarAd-->
				<?php if($fetch_ProductsSelect['Multiplo']==0){$multiplos=1;}else{$multiplos=$fetch_ProductsSelect['Multiplo'];}?>
				<span itemprop="priceCurrency" content="BRL"></span><strong itemprop="price" content="<?php number_format(trim($fetch_ProductsSelect['VendaVarejo'])*$multiplos, 2, '.', '');?>"><br>POR: R$ <?php echo number_format($fetch_ProductsSelect['VendaVarejo']*$multiplos, 2, ',', '.');?></strong><br><br>
				<sub><?php $objFunctionClass->PlotVerify($fetch_ProductsSelect['VendaVarejo']*$multiplos,20);?></sub></h1>
				</div>
				<div class="area_btns">
					<a onclick="javascript:var SessionIdCar = '<?php echo $_SESSION['idCar'];?>';var ClienteId = '<?php echo $_SESSION['clienteId'];?>';var CepId = '<?php echo $CepId;?>';var ProductCod ='<?php echo utf8_encode($fetch_ProductsSelect['CodProduto']);?>';var Multiple = '<?php echo utf8_encode($fetch_ProductsSelect['Multiplo']);?>';SelectCheckCarAd(SessionIdCar,ClienteId,CepId,ProductCod,Multiple);"><div class="btn_comprar cursor-class">Comprar</div></a>
					<a data-toggle="modal" data-target="#SimularFrete"><div class="btn_detalhes cursor-class" >Simular frete</div></a>
				</div>
				<div class="parcelas_border">
					<div id="btnparcelas" class="btn_parcelas">VER PARCELAS <i class="fa fa-caret-down" aria-hidden="true"></i></div>
					<div class="display_parcelas" id="menuparcelas"><?php print_r($objFunctionClass->PlotVerifyMultiValue($fetch_ProductsSelect['VendaVarejo']*$multiplos,20));?></div>
				</div>
				<?php } else{ ?><br/>
					<div class="jumbotron">
						<div class="alert alert-danger text-center text-shadow">Ops! Já vendemos todo o estoque.</div>
						<div class="parcela_pag">&nbsp;</div>
						<button type="button" class="btn-empty cursor-class" data-toggle="modal" data-target="#ModalEmpty">Avise me quando chegar</button>
					</div>
				<?php } ?>
				<div class="produto_social">
					<a href="https://www.facebook.com/autopec.1" target="_blank"><img src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_fb.jpg" class="img-responsive float-up"></a>
					<a href="https://www.facebook.com/autopec.1" target="_blank"><img src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_twtr.jpg" class="img-responsive float-up"></a>
					<a href="https://www.facebook.com/autopec.1" target="_blank"><img src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_msg.jpg" class="img-responsive float-up"></a>
				&nbsp;Compartilhe este produto!
				</div>
			</div>
		</div>
	</div>
</div>
<!--ModalSimularFrete-->
<div class="modal fade bd-example-modal-lg" id="SimularFrete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content-white">
			<div class="modal-header">
				<h5 class="modal-title"><img class="img-responsive" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/logos/logo-min.png"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<center><span class="text-default">Informe o CEP para calculo da taxa de entrega</span></center>
					</div>
					<div class="col-md-6 col-xs-6">
						<div class="input-group" style="margin-top:0%;">
							<span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
							<input type="text" id="cep" name="cep" class="form-control" placeholder="CEP para Entrega" maxlength="9" require />
						</div>
					</div>
				</div>
			</div>
			<div class="rows"><div id="loading"></div><div id="returnCep"></div></div>
			<div class="row" style="margin-top:5%;margin-bottom:5%;">
				<div class="col-md-12 col-xs-12">
					<center><button type="button" class="btn btn-simulator cursor-class" onclick="javascript: var c = document.getElementById('cep').value; var p = '<?php print_r($fetch_ProductsSelect['PesoB']); ?>'; var v = '<?php print_r($fetch_ProductsSelect['VendaVarejo']); ?>';RequireCep(c,p,v);"><i class="fa fa-calculator" aria-hidden="true"></i> Calcular</button></center>
				</div>
			</div>
		</div>
	</div>
</div>
<!--ModalSimularFrete-->
	<div class="row center"><img class="img-responsive" width="80%" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/img/texto.jpg"></div><hr class="produto_border"><div class="produ_compativel"><h1>Compatível com os modelos:</h1><?php if(@$query_ProductsYears=$objModelProducts->ProductsYears($objConn,$objFunctionClass->InjectionSQL($objFunctionClass->XssClean($productId)))){$rowCount_check_exist_query_ProductsYears=$query_ProductsYears->rowCount();if($rowCount_check_exist_query_ProductsYears != 0){while($fetch_ProductsYears=$query_ProductsYears->fetch(PDO::FETCH_ASSOC)){print_r(utf8_encode($fetch_ProductsYears['SubCategoria']).' - '. rtrim($fetch_ProductsYears['Anos'],',') . '<br/><br/>');}}else{print_r($objFunctionClass->InvalidParameter(200));}}?></div><hr class="produto_border"><div class="produ_compativel"><h1>Informações sobre o produto:</h1><?php print_r(ucfirst(mb_strtolower(utf8_encode($fetch_ProductsSelect['DescricaoCompleta']))));?></div>
</div>
<div class="container"><div class="liderdevendas"><div class="hrttl_lidervenda"><span class="white">Líderes em vendas</span></div><hr class="liderdevendas_border"><div class="example__demo duo__cell mgt20"><div class="carousel flickity-enabled is-draggable" data-flickity="{ &quot;wrapAround&quot;: true }" tabindex="0"><?php $query_ProductsRandom=$objModelProducts->SelectProductsRandom($objConn,5);while($fetch_ProductRandom=$query_ProductsRandom->fetch(PDO::FETCH_ASSOC)){if($fetch_ProductRandom['Multiplo']==0){$multiplos=1;}else{$multiplos=$fetch_ProductRandom['Multiplo'];}?><a href="<?php print_r($objFunctionClass->UrlFixed().'/produtos/'.$objFunctionClass->ClearURL(substr(utf8_encode($fetch_ProductRandom['Descricao']),0,25)).'/'.utf8_encode($fetch_ProductRandom['CodProduto']));?>"><div class="carousel-cell"><div class="vitrine_lidervenda"><img class="img-responsive" src="<?php print_r($objFunctionClass->CheckPicture($fetch_ProductRandom['Imagem1'],"b"));?>" style="width:50%;"><div class="ttl_lidervenda"><?php print_r($objFunctionClass->LimitText(utf8_encode(ucfirst(strtolower($fetch_ProductRandom['Descricao']))), 35));?></div><div class="preco_lidervenda">R$<?php print_r(number_format($fetch_ProductRandom['VendaVarejo']*$multiplos, 2, ',', '.'));?></div><div class="formapag_lidervenda"><?php print_r($objFunctionClass->PlotVerify($fetch_ProductRandom['VendaVarejo']*$multiplos, 20));?></div></div></div></a><?php }?></div></div></div></div>

<!--ModalEmpty-->
<div class="modal fade bd-example-modal-lg" id="ModalEmpty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content-white">
			<div class="modal-header">
				<h5 class="modal-title"><img class="img-responsive" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/logos/logo-min.png"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h3 class="page-header text-shadow"><?php print_r($objFunctionClass->LimitText(utf8_encode(ucfirst(strtolower($fetch_ProductsSelect['Descricao']))), 35));?></h3>
				<div class="codigo"><?php print_r(utf8_encode($fetch_ProductsSelect['CodOriginal']));?></div>
				<div class="marca"><?php print_r(utf8_encode($fetch_ProductsSelect['Fabricante']));?></div>
				<hr class="barra_hr">
				<div class="descri"><?php print_r(utf8_encode(ucfirst(mb_strtolower($fetch_ProductsSelect['DescricaoAbrv']))));?></div>
			</div>
			<div class="alert alert-default" role="alert">
				<h2 class="text-center text-danger">Produto Indisponível</h2>
				<center><span class="text-center">Deixe seus dados e avisaremos quando o produto estiver disponivel</span></center>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-envelope" aria-hidden="true" style="font-size: 12px;"></i>
					</span>
					<input id="email" type="email" class="form-control" name="email" value="" placeholder="Email válido">
				</div>
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-user" aria-hidden="true"></i>
					</span>
					<input id="text" type="text" class="form-control" name="text" value="" placeholder="Nome Completo" required>
				</div>
				<center>
					<button class="btn_comprar cursor-class">Enviar</button>
					<button data-dismiss="modal" aria-label="Close" class="btn_detalhes cursor-class">Cancelar</button>
				</center>
			</div>
		</div>
	</div>
</div>
<?php print_r($objComponentsClass->Footer($objFunctionClass->UrlFixed()));?>

<a href="javascript:void(window.open('http://c4publicidade.com.br/autopec/chat/chat.php','','width=660,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="chat"><img width="60%" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_chat.png"></a>
<!-- Core JavaScript -->
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript">$(document).ready(function(){var idCar = <?=$_SESSION['idCar']?>;$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},function(returnIdCar){if(returnIdCar != false){$('#car-sun').html(returnIdCar).show();}else{$('#car-sun').html('0.00').show();}});});</script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/sessiondestroy.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/products-sales.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownuser.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect-input.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/autoredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/bestsellers.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.mask.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/simulator-cep.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/products-img.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/menu-parcelas.js"></script>
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