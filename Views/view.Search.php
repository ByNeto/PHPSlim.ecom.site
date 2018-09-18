<?php
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Menu.php');// inclui a classe da model Menu.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
require_once('Models/model.Search.php');// inclui a classe da model Home.
$objModelMenu = new ModelMenu();
$objModelAutocomplete = new ModelAutocomplete();
$objModelSearch = new ModelSearch();
?>

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

<?php $perpage=9;if(isset($_GET['page']) & !empty($_GET['page'])){$curpage = $_GET['page'];}else{$curpage=1;}$totalRows=$objModelSearch->ProductsSearchCount($objConn,$objFunctionClass->InjectionSQL($keywordId));$endpage=ceil($totalRows/$perpage);$startpage=1;$nextpage=$curpage + 1;$previouspage=$curpage - 1;$ReadSql=$objModelSearch->ProductsSearch($objConn,$objFunctionClass->InjectionSQL($keywordId),$curpage,$perpage);?>

<?php
if($totalRows == 0){print_r('<center><h1 class="text-shadow">Nenhum produto encontrado.</h1><img width="10%" class="img-responsive" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/animacao.gif"/><h2 class="text-shadow">Refaça sua busca!</h2></center>');$fetch_ProductAutomakers = NULL;}
else{?>
	<h1 class="text-center">Pesquisa - Palavra-chave: <span class="text-shadow"><?php echo utf8_encode(ucfirst(strtolower($keywordId)));?></span></h1>
	<nav aria-label="page navigation"><ul class="pagination justify-content-center"><?php if($curpage != $startpage){?><li class="page-item"><a class="page-link" href="?page=<?php echo $startpage; ?>" tabindex="-1" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span><span class="sr-only">First</span></a></li><?php }?><?php if($curpage >= 2){?><li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage; ?>"><?php echo $previouspage; ?></a></li><?php }?><li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage; ?>"><?php echo $curpage; ?></a></li><?php if($curpage != $endpage){?><li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>"><?php echo $nextpage; ?></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $endpage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><?php }?></ul></nav><div class="container"><div class="row">
	<?php
	while($fetch_ProductSearch = $ReadSql->fetch(PDO::FETCH_ASSOC)){
		if($fetch_ProductSearch['Multiplo']==0){$multiplos=1;}else{$multiplos=$fetch_ProductSearch['Multiplo'];}
		$ValueFull = number_format($fetch_ProductSearch['VendaVarejo']*$multiplos, 2, ',', '.');
		$ValueParts = $objFunctionClass->PlotVerify($fetch_ProductSearch['VendaVarejo']*$multiplos, 20);
	echo'<div itemscope itemtype="http://schema.org/Product" class="col-md-4 product-random">';
		echo'<a href="'.$objFunctionClass->UrlFixed().'/produtos/'.$objFunctionClass->ClearURL( substr(utf8_encode($fetch_ProductSearch['DescricaoAbrv']),0,25) ).'/'.utf8_encode($fetch_ProductSearch['CodProduto']).'"><img itemprop="image" class="img-responsive image-random-home" src="'.$objFunctionClass->CheckPicture($fetch_ProductSearch['Imagem1'],"b").'" style="width: 100%;"></a>';
		echo'<h4 itemprop="name">'.$objFunctionClass->LimitText( ucfirst( mb_strtolower( utf8_encode($fetch_ProductSearch['DescricaoAbrv']))), 35).'</h4>';
		echo'<h4><strong>'.$objFunctionClass->LimitText(utf8_encode($fetch_ProductSearch['Aplicacao']), 39).'</strong></h4>';
		echo'<div itemprop="productID" class="codigo">'.utf8_encode($fetch_ProductSearch['CodOriginal']).'</div><div itemprop="brand" class="marca" data-toggle="tooltip" title="'.utf8_encode($fetch_ProductSearch['Fabricante']).'">'.$objFunctionClass->LimitText(utf8_encode($fetch_ProductSearch['Fabricante']),14).'</div>';
		echo'<div class="barra_hr"></div>';
		echo'<div itemprop="description" class="descri">'.$objFunctionClass->LimitText( ucfirst( mb_strtolower( utf8_encode($fetch_ProductSearch['DescricaoAbrv']))), 119).'</div>';
		echo'<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="preco"><span itemprop="priceCurrency" content="BRL"></span>R$<span itemprop="price" content="'.number_format(trim($fetch_ProductSearch['VendaVarejo'])*$multiplos, 2, '.', '').'">'.number_format($fetch_ProductSearch['VendaVarejo']*$multiplos, 2, ',', '.').'</span></div>';
		echo'<div class="parcela_pag">'.$objFunctionClass->PlotVerify($fetch_ProductSearch['VendaVarejo']*$multiplos, 20).'</div>';
		?><button type="button" class="btn_comprar cursor-class" data-toggle="modal" data-target="#ModalComprar" onclick="javascript: var ValueFull = '<?php echo $ValueFull;?>'; var ValueParts = '<?php echo $ValueParts;?>'; var SessionIdCar = '<?php echo $_SESSION['idCar'];?>'; var ClienteId = '<?php echo $_SESSION['clienteId'];?>'; var CepId = '<?php echo $CepId;?>'; var StorageQtd ='<?php echo $fetch_ProductSearch['Estoque'];?>';var DataTargetModal ='ModalComprar'; var ProductUrlImage ='<?php echo $objFunctionClass->CheckPicture($fetch_ProductSearch['Imagem1'],"b");?>';var ProductDescription ='<?php echo utf8_encode(ucfirst(strtolower($fetch_ProductSearch['Descricao'])));?>';var ProductAplication ='<?php echo utf8_encode($fetch_ProductSearch['Aplicacao']);?>';var ProductCod ='<?php echo utf8_encode($fetch_ProductSearch['CodProduto']);?>';var ProductManufacturing ='<?php echo utf8_encode($fetch_ProductSearch['Fabricante']);?>'; var Multiple = '<?php echo utf8_encode($fetch_ProductSearch['Multiplo']);?>'; var ProductDescriptionAbbreviation ='<?php echo utf8_encode(ucfirst(strtolower($fetch_ProductSearch['DescricaoAbrv'])));?>';var ProductValue ='<?php echo number_format($fetch_ProductSearch['VendaVarejo'], 2, ',', '.');?>';var ProductValuePlot ='<?php echo $objFunctionClass->PlotVerify($fetch_ProductSearch['VendaVarejo'], 20);?>';modalSales(ValueFull,ValueParts,SessionIdCar,ClienteId,CepId,StorageQtd,DataTargetModal,ProductUrlImage,ProductDescription,ProductAplication,ProductCod,ProductManufacturing,Multiple,ProductDescriptionAbbreviation,ProductValue,ProductValuePlot);">Comprar</button><?php
		echo'<a href="'.$objFunctionClass->UrlFixed().'/produtos/'.$objFunctionClass->ClearURL( substr(utf8_encode($fetch_ProductSearch['DescricaoAbrv']),0,25) ).'/'.utf8_encode($fetch_ProductSearch['CodProduto']).' " itemprop="url"><div class="btn_detalhes cursor-class"><img src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_mais.png">Detalhes</div></a>';
	echo'</div>';
	}
	?></div></div><nav aria-label="page navigation"><ul class="pagination justify-content-center"><?php if($curpage != $startpage){?><li class="page-item"><a class="page-link" href="?page=<?php echo $startpage; ?>" tabindex="-1" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span><span class="sr-only">First</span></a></li><?php }?><?php if($curpage >= 2){?><li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage; ?>"><?php echo $previouspage; ?></a></li><?php }?><li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage; ?>"><?php echo $curpage; ?></a></li><?php if($curpage != $endpage){?><li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>"><?php echo $nextpage; ?></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $endpage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><?php }?></ul></nav><?php
}
?>
<!--ModalComprar-->
<div class="modal fade bd-example-modal-lg" id="ModalComprar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content-white">
			<div class="modal-header">
				<h5 class="modal-title"><img class="img-responsive" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/logos/logo-min.png"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div id="modal-body-return"></div>
		</div>
	</div>
</div>
<!--ModalComprar-->
<!--ModalSuccessCar-->
			<div id="ModalSuccessCar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content" style="background-color:#fff;">
						<div class="modal-header">
							<h5 class="modal-title"><img class="img-responsive" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/logos/logo-min.png"></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="alert" role="alert">
						<h4 class="text-gray"><img src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_marker.png" class="img-responsive"> Produtos inseridos ao Carrinho</h4>
							<span id="car-return"></span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn_detalhes cursor-class" data-dismiss="modal" aria-label="Close">Fechar</button>
						</div>
					</div>
				</div>
			</div>
<!--ModalSuccessCar-->
<?php print_r($objComponentsClass->Footer($objFunctionClass->UrlFixed()));?>

<a href="javascript:void(window.open('http://c4publicidade.com.br/autopec/chat/chat.php','','width=660,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="chat"><img width="60%" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/imagens/icons/icon_chat.png"></a>
<!-- Core JavaScript -->
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/jquery/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript">$(document).ready(function(){var idCar = <?=$_SESSION['idCar']?>;$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},function(returnIdCar){if(returnIdCar != false){$('#car-sun').html(returnIdCar).show();}else{$('#car-sun').html('0.00').show();}});});</script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/sessiondestroy.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownuser.js"></script>
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
</body>
</html>