<?php
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Menu.php');// inclui a classe da model Menu.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
require_once('Models/model.Automakers.php');// inclui a classe da model Home.
$objModelMenu = new ModelMenu();
$objModelAutocomplete = new ModelAutocomplete();
$objModelAutomakers = new ModelAutomakers();
?>
<?php print_r($objComponentsClass->Scope($objFunctionClass->UrlFixed(),$objFunctionClass->URLSeo($_SERVER["REQUEST_URI"])));?>

<body>
<div id="loader" class="loader"><center><img class="img-responsive rotaciona top" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon_loading.png"/></center></div>
<div id="loader_products"></div>
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
if(empty($carroName)){$carroName = "";}
if(empty($carroId)){$carroId = "";}
if(empty($nameGrupo)){$nameGrupo = "";}
if(empty($nameSubGrupo)){$nameSubGrupo = "";}
if(empty($codGrupo)){$codGrupo = "";}
if(empty($codSubGrupo)){$codSubGrupo = "";}
?>
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

<div class="container" style="margin-top:5%;margin-bottom:5%;">
	<div class="row-center">
		<div class="col-md-3 col-xs-6">
			<a href="" class="btn btn-menu" data-toggle="modal" data-target="#MenuModal"><span class="font-responsive-menu text-shadow"><span id="menu_label"></span></span></a>
<!-- MenuModal -->
<div class="modal fade bd-example-modal-lg" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title text-white text-shadow" id="exampleModalLabel"><span id="menu_model"></span></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row"><?php $query_MenuAutomakers=$objModelMenu->MenuAutomakers($objConn);while($fetch_MenuAutomakers=$query_MenuAutomakers->fetch(PDO::FETCH_ASSOC)){?><div class="col-md-4 col-xs-12"><a data-dismiss="modal" aria-label="Close" onclick="javascript:var a='<?php echo $fetch_MenuAutomakers['Categoria'];?>';var b='<?php echo $fetch_MenuAutomakers['CodCategoria'];?>';urlDirect(a,b);labelFabricator(a,b);codFabricator(a,b);labelCategoriaAM(b);labelCategoriaSubAM(b);"><?php print_r($objFunctionClass->RenderMenuAutomakers($fetch_MenuAutomakers['Categoria'],$fetch_MenuAutomakers['CodCategoria']));?></div><?php }?></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
			</div>
		</div>
	</div>
</div>
<!-- MenuModal -->
		</div>
		<div class="col-md-3 col-xs-6">
			<a href="" class="btn btn-menu" data-toggle="modal" data-target="#SubMenuModal"><span class="font-responsive-menu text-shadow"><span id="menu_label_sub"></span></span></a>
<!-- SubMenuModal -->
<div class="modal fade bd-example-modal-lg" id="SubMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title text-white text-shadow" id="exampleModalLabel"><span id="menu_model_sub"></span></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<a width="100%" id="submenu" class="center-block"></a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
			</div>
		</div>
	</div>
</div>
<!-- SubMenuModal -->
		</div>
		<div class="col-md-3 col-xs-6">
			<a href="" onclick="javascript:var a ='<?php print_r($montadoraName);?>';var b ='<?php print_r($montadoraId);?>';var c ='<?php print_r($carroName);?>';var d ='<?php print_r($carroId);?>';var e ='<?php print_r($nameGrupo);?>';SubMenuAutomakersCategoria(a,b,c,d,e);" class="btn btn-menu" data-toggle="modal" data-target="#SubMenuModalCategoria"><span class="font-responsive-menu text-shadow"><span id="menu_label_sub_categoria"></span></span></a>
<!-- SubMenuModalCategoria -->
<div class="modal fade bd-example-modal-lg" id="SubMenuModalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title text-white text-shadow" id="exampleModalLabel"><span id="menu_model_sub_categoria"></span></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<a width="100%" id="submenu_categoria" class="center-block"></a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
			</div>
		</div>
	</div>
</div>
<!-- SubMenuModalCategoria -->
		</div>
		<div class="col-md-3 col-xs-6">
			<a href="" onclick="javascript: var a ='<?php print_r($montadoraName); ?>';var b ='<?php print_r($montadoraId);?>'; var c ='<?php print_r($carroName);?>'; var d ='<?php print_r($carroId);?>'; var e ='<?php print_r($nameGrupo);?>'; var f ='<?php print_r($codGrupo);?>';SubMenuAutomakersSubCategoria(a,b,c,d,e,f);"class="btn btn-menu" data-toggle="modal" data-target="#SubMenuModalSubCategoria"><span class="font-responsive-menu text-shadow"><span id="menu_label_sub_subcategoria"></span></span></a>
<!-- SubMenuModalSubCategoria -->
<div class="modal fade bd-example-modal-lg" id="SubMenuModalSubCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title text-white text-shadow" id="exampleModalLabel"><span id="menu_model_sub_subcategoria"></span></h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span class="text-white" aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<a width="100%" id="submenu_subcategoria" class="center-block"></a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>
			</div>
		</div>
	</div>
</div>
<!-- SubMenuModalSubCategoria -->
		</div>
	</div>
</div>

<?php
if(isset($montadoraId) AND $carroId=="" AND $codGrupo=="" AND $codSubGrupo==""){$perpage=9;if(isset($_GET['page']) AND !empty($_GET['page'])){$curpage = $_GET['page'];}else{$curpage=1;}$totalRows=$objModelAutomakers->ProductsAutomakersCarsCountMontadoraId($objConn,$objFunctionClass->InjectionSQL($montadoraId));$endpage=ceil($totalRows/$perpage);$startpage=1;$nextpage=$curpage + 1;$previouspage=$curpage - 1;$ReadSql=$objModelAutomakers->ProductsAutomakersCarsMontadoraId($objConn,$objFunctionClass->InjectionSQL($montadoraId),$curpage,$perpage);}
elseif(isset($montadoraId) AND isset($carroId) AND $codGrupo=="" AND $codSubGrupo==""){$perpage=9;if(isset($_GET['page']) AND !empty($_GET['page'])){$curpage = $_GET['page'];}else{$curpage=1;}$totalRows=$objModelAutomakers->ProductsAutomakersCarsCountMontadoraIdCarroId($objConn,$objFunctionClass->InjectionSQL($montadoraId),$objFunctionClass->InjectionSQL($carroId));$endpage=ceil($totalRows/$perpage);$startpage=1;$nextpage=$curpage + 1;$previouspage=$curpage - 1;$ReadSql=$objModelAutomakers->ProductsAutomakersCarsMontadoraIdCarroId($objConn,$objFunctionClass->InjectionSQL($montadoraId),$objFunctionClass->InjectionSQL($carroId),$curpage,$perpage);}
elseif(isset($montadoraId) AND isset($carroId) AND isset($codGrupo) AND $codSubGrupo==""){$perpage=9;if(isset($_GET['page']) AND !empty($_GET['page'])){$curpage = $_GET['page'];}else{$curpage=1;}$totalRows=$objModelAutomakers->ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo($objConn,$objFunctionClass->InjectionSQL($montadoraId),$objFunctionClass->InjectionSQL($carroId),$objFunctionClass->InjectionSQL($codGrupo));$endpage=ceil($totalRows/$perpage);$startpage=1;$nextpage=$curpage + 1;$previouspage=$curpage - 1;$ReadSql=$objModelAutomakers->ProductsAutomakersCarsMontadoraIdCarroIdCodGrupo($objConn,$objFunctionClass->InjectionSQL($montadoraId),$objFunctionClass->InjectionSQL($carroId),$objFunctionClass->InjectionSQL($codGrupo),$curpage,$perpage);}
elseif(isset($montadoraId) AND isset($carroId) AND isset($codGrupo) AND isset($codSubGrupo)){$perpage=9;if(isset($_GET['page']) & !empty($_GET['page'])){$curpage = $_GET['page'];}else{$curpage=1;}$totalRows=$objModelAutomakers->ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo($objConn,$objFunctionClass->InjectionSQL($montadoraId),$objFunctionClass->InjectionSQL($carroId),$objFunctionClass->InjectionSQL($codGrupo),$objFunctionClass->InjectionSQL($codSubGrupo));$endpage=ceil($totalRows/$perpage);$startpage=1;$nextpage=$curpage + 1;$previouspage=$curpage - 1;$ReadSql=$objModelAutomakers->ProductsAutomakersCarsMontadoraIdCarroIdCodGrupoCodSubGrupo($objConn,$objFunctionClass->InjectionSQL($montadoraId),$objFunctionClass->InjectionSQL($carroId),$objFunctionClass->InjectionSQL($codGrupo),$objFunctionClass->InjectionSQL($codSubGrupo),$curpage,$perpage);}
?>

<?php
if($totalRows == 0){print_r('<center><h1 class="text-shadow">Nenhum produto encontrado.</h1><img width="10%" class="img-responsive" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/animacao.gif"/><h2 class="text-shadow">Refaça sua busca!</h2></center>');$fetch_ProductAutomakers = NULL;}
else{?><nav aria-label="page navigation"><ul class="pagination justify-content-center"><?php if($curpage != $startpage){?><li class="page-item"><a class="page-link" href="?page=<?php echo $startpage; ?>" tabindex="-1" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span><span class="sr-only">First</span></a></li><?php }?><?php if($curpage >= 2){?><li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage; ?>"><?php echo $previouspage; ?></a></li><?php }?><li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage; ?>"><?php echo $curpage; ?></a></li><?php if($curpage != $endpage){?><li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>"><?php echo $nextpage; ?></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $endpage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><?php }?></ul></nav><div class="container"><div class="row"><?php while($fetch_ProductAutomakers = $ReadSql->fetch(PDO::FETCH_ASSOC)){if($fetch_ProductAutomakers['Multiplo']==0){$multiplos=1;}else{$multiplos=$fetch_ProductAutomakers['Multiplo'];}$ValueFull=number_format($fetch_ProductAutomakers['VendaVarejo']*$multiplos,2,',','.');$ValueParts=$objFunctionClass->PlotVerify($fetch_ProductAutomakers['VendaVarejo']*$multiplos, 20);?><div itemscope itemtype="http://schema.org/Product" class="col-md-4 product-random float-up"><a href="<?php print_r($objFunctionClass->UrlFixed().'/produtos/'.$objFunctionClass->ClearURL(substr(utf8_encode($fetch_ProductAutomakers['DescricaoAbrv']),0,25)).'/'.utf8_encode($fetch_ProductAutomakers['CodProduto']));?>"><img itemprop="image" class="img-responsive image-random-home" src="<?php print_r($objFunctionClass->CheckPicture($fetch_ProductAutomakers['Imagem1'],"b"));?>" style="width: 100%;"></a><h4 itemprop="name"><?php print_r($objFunctionClass->LimitText(ucfirst(mb_strtolower(utf8_encode($fetch_ProductAutomakers['DescricaoAbrv']))),35));?></h4><h4><strong><?php print_r($objFunctionClass->LimitText(utf8_encode($fetch_ProductAutomakers['Aplicacao']),39));?></strong></h4><div itemprop="productID" class="codigo"><?php print_r(utf8_encode($fetch_ProductAutomakers['CodOriginal']));?></div><div itemprop="brand" class="marca" data-toggle="tooltip" title="<?php print_r(utf8_encode($fetch_ProductAutomakers['Fabricante']));?>"><?php print_r($objFunctionClass->LimitText(utf8_encode($fetch_ProductAutomakers['Fabricante']),14));?></div><div class="barra_hr"></div><div itemprop="description" class="descri"><?php print_r($objFunctionClass->LimitText(ucfirst(mb_strtolower(utf8_encode($fetch_ProductAutomakers['DescricaoAbrv']))),119));?></div><div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="preco"><span itemprop="priceCurrency" content="BRL"></span>R$<span itemprop="price" content="<?php print_r(number_format(trim($fetch_ProductAutomakers['VendaVarejo'])*$multiplos,2,'.',''));?>"><?php print_r(number_format($fetch_ProductAutomakers['VendaVarejo']*$multiplos, 2, ',', '.'));?></span></div><div class="parcela_pag"><?php print_r($objFunctionClass->PlotVerify($fetch_ProductAutomakers['VendaVarejo']*$multiplos,20));?></div><button type="button" class="btn_comprar cursor-class" data-toggle="modal" data-target="#ModalComprar" onclick="javascript: var ValueFull='<?php echo $ValueFull;?>';var ValueParts='<?php echo $ValueParts;?>';var SessionIdCar='<?php echo $_SESSION['idCar'];?>';var ClienteId='<?php echo $_SESSION['clienteId'];?>';var CepId='<?php echo $CepId;?>';var StorageQtd='<?php echo $fetch_ProductAutomakers['Estoque'];?>';var DataTargetModal='ModalComprar';var ProductUrlImage='<?php echo $objFunctionClass->CheckPicture($fetch_ProductAutomakers['Imagem1'],"b");?>';var ProductDescription='<?php echo utf8_encode(ucfirst(strtolower($fetch_ProductAutomakers['Descricao'])));?>';var ProductAplication='<?php echo utf8_encode($fetch_ProductAutomakers['Aplicacao']);?>';var ProductCod='<?php echo utf8_encode($fetch_ProductAutomakers['CodProduto']);?>';var ProductManufacturing='<?php echo utf8_encode($fetch_ProductAutomakers['Fabricante']);?>'; var Multiple='<?php echo utf8_encode($fetch_ProductAutomakers['Multiplo']);?>'; var ProductDescriptionAbbreviation='<?php echo utf8_encode(ucfirst(strtolower($fetch_ProductAutomakers['DescricaoAbrv'])));?>';var ProductValue='<?php echo number_format($fetch_ProductAutomakers['VendaVarejo'],2,',','.');?>';var ProductValuePlotfetch_ProductAutomakers='<?php echo $objFunctionClass->PlotVerify($fetch_ProductAutomakers['VendaVarejo'],20);?>';var ProductValuePlot='<?php echo $objFunctionClass->PlotVerify($fetch_ProductAutomakers['VendaVarejo'],20);?>';modalSales(ValueFull,ValueParts,SessionIdCar,ClienteId,CepId,StorageQtd,DataTargetModal,ProductUrlImage,ProductDescription,ProductAplication,ProductCod,ProductManufacturing,Multiple,ProductDescriptionAbbreviation,ProductValue,ProductValuePlot);">Comprar</button><a href="<?php print_r($objFunctionClass->UrlFixed().'/produtos/'.$objFunctionClass->ClearURL(substr(utf8_encode($fetch_ProductAutomakers['DescricaoAbrv']),0,25)).'/'.utf8_encode($fetch_ProductAutomakers['CodProduto']));?>" itemprop="url"><div class="btn_detalhes cursor-class"><img src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/imagens/icons/icon_mais.png">Detalhes</div></a></div><?php }?></div></div><nav aria-label="page navigation"><ul class="pagination justify-content-center"><?php if($curpage != $startpage){?><li class="page-item"><a class="page-link" href="?page=<?php echo $startpage; ?>" tabindex="-1" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-double-left" aria-hidden="true"></i></span><span class="sr-only">First</span></a></li><?php }?><?php if($curpage >= 2){?><li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage; ?>"><?php echo $previouspage; ?></a></li><?php }?><li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage; ?>"><?php echo $curpage; ?></a></li><?php if($curpage != $endpage){?><li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>"><?php echo $nextpage; ?></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><li class="page-item"><a class="page-link" href="?page=<?php echo $endpage; ?>" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><span class="sr-only">Last</span></a></li><?php }?></ul></nav><?php }
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
<script language="JavaScript" type="text/javascript" charset="utf-8">
$(document).ready(function(){
var montadoraName='<?php print_r(strtoupper($montadoraName));?>';
var montadoraId='<?php print_r($montadoraId);?>';
var carroName='<?php print_r(strtoupper($carroName));?>';
var nameGrupo='<?php print_r($objFunctionClass->LimitText(strtoupper($objFunctionClass->ClearNameGrupoLink($nameGrupo)),14));?>';
var nameGrupoC='<?php print_r(strtoupper(utf8_encode($objFunctionClass->ClearNameGrupoLink($nameGrupo))));?>';
var nameSubGrupo='<?php print_r($objFunctionClass->LimitText(strtoupper($objFunctionClass->ClearNameGrupoLink($nameSubGrupo)), 14));?>';
var nameSubGrupoC='<?php print_r(strtoupper(utf8_encode($objFunctionClass->ClearNameGrupoLink($nameSubGrupo))));?>';
var a=montadoraName;var b=montadoraId;var c=montadoraName;var d=montadoraId;var e=carroName;
labelFabricatorAM(a,b,e);codFabricator(c,d);
if(nameGrupo.length === 0){
$('#menu_label_sub_categoria').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+montadoraId+'.png"><span>&nbsp; &nbsp;CATEGORIA</span>').show();
$('#menu_model_sub_categoria').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+montadoraId+'.png"><span>&nbsp; &nbsp;CATEGORIA</span>').show();
$('#submenu_categoria').html('<div class="alert alert-danger" role="alert">Nenhuma <strong>Categoria</strong> encontrada para <strong>Montadora</strong> <img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"></div>');
}
else{
$('#menu_label_sub_categoria').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+montadoraId+'.png"><span>&nbsp; &nbsp;'+nameGrupo+'</span>').show();
$('#menu_model_sub_categoria').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+montadoraId+'.png"><span>&nbsp; &nbsp;'+nameGrupoC+'</span>').show();
}
if(nameSubGrupo.length === 0){
$('#menu_label_sub_subcategoria').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;SUBCATEGORIA</span>').show();
$('#menu_model_sub_subcategoria').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;SUBCATEGORIA</span>').show();
$('#submenu_subcategoria').html('<div class="alert alert-danger" role="alert">Nenhuma <strong>SubCategoria</strong> encontrada para <strong>Montadora</strong><img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"></div>');
}
else{
$('#menu_label_sub_subcategoria').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+montadoraId+'.png"><span>&nbsp; &nbsp;'+nameSubGrupo+'</span>').show();
$('#menu_model_sub_subcategoria').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+montadoraId+'.png"><span>&nbsp; &nbsp;'+nameSubGrupoC+'</span>').show();
}
});

function SubMenuAutomakersCategoria(montadoraName,montadoraId,carroName,carroId,nameGrupo){
if(carroId.length === 0){$('#submenu_categoria').html('<div class="alert alert-danger" role="alert">Nenhuma <strong>Categoria</strong> encontrada para <strong>Montadora</strong> <img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"></div>');}
else{$.post(newURL+"/Library/vendor/ajax/ajax.submenucategoria.php",{montadoraName:montadoraName,montadoraId:montadoraId,carroName:carroName,carroId:carroId},function(returnSubMenuAutomakersCategoria){if(returnSubMenuAutomakersCategoria != false){$('#submenu_categoria').html(returnSubMenuAutomakersCategoria).show();}else{return false;}});}
}
function SubMenuAutomakersSubCategoria(montadoraName,montadoraId,carroName,carroId,nameGrupo,codGrupo){
if(codGrupo.length === 0){$('#submenu_subcategoria').html('<div class="alert alert-danger" role="alert">Nenhuma <strong>SubCategoria</strong> encontrada para <strong>Montadora</strong><img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"></div>');}
else{$.post(newURL+"/Library/vendor/ajax/ajax.submenusubcategoria.php",{montadoraName:montadoraName,montadoraId:montadoraId,carroName:carroName,carroId:carroId,nameGrupo:nameGrupo,codGrupo:codGrupo},function(returnSubMenuAutomakersSubCategoria){if(returnSubMenuAutomakersSubCategoria != false){$('#submenu_subcategoria').html(returnSubMenuAutomakersSubCategoria).show();}else{return false;}});}
}
</script>
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
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/flickity/flickity-docs.min.js"></script>

</body>
</html>