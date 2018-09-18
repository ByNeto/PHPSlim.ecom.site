<?php
Class ComponentsClass{
	private static $Scope;
	private static $MenuCar;
	private static $Banner;
	private static $AutomakersMenu;
	private static $Footer;

/*@Param Scope @Functions Scope function.ComponentsClass.php*/
public function Scope($UrlFixed,$pagina){
$url = explode('/',$pagina);
switch($url[0]){
	case '':$title='Autopec | Peças para vans e importados';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='autopec,auto peças campinas,peças para vans,auto peças campinas,peças ducato,peças besta,peças sprinter,peças ducato';$canonical='';break;
	case 'sobrenos':$title='Autopec | Sobre nós';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Sobre a Autopec, Autopeças';$canonical='/sobrenos/';break;
	case 'contato':$title='Autopec | Contato';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Contato, Fale com a Autopec,Telefone Autopec';$canonical='/contato/';break;
	case 'localizacao':$title='Autopec | Localização';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Autopec como chegar,localização';$canonical='/localizacao/';break;
	case 'blog':$title='Autopec | Blog';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Blog Autopec,Notícias Autopec';$canonical='/blog/';break;
	case 'login':$title='Autopec | Login';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Login';$canonical='/login/';break;
	case 'centraldocliente':$title='Autopec | Central do Cliente';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Central do Cliente, Central do Cliente Autopec';$canonical='/centraldocliente/';break;
	case 'trabalheconosco':$title='Autopec | Trabalhe Conosco';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Trabalhe Conosco,Trabalhar na Autopec';$canonical='/trabalheconosco/';break;
	case 'politicadeseguranca':$title='Autopec | Política de Segurança';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Política de Segurança,Política de Segurança Autopec';$canonical='/politicadeseguranca/';break;
	case 'comocomprar':$title='Autopec | Como Comprar';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Como Comprar, Como Comprar na Autopec';$canonical='/comocomprar/';break;
	case 'trocasedevolucoes':$title='Autopec | Trocas e Devoluções';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Trocas e Devoluções, Como trocar Autopec';$canonical='/trocasedevolucoes/';break;
	case 'termosdevendas':$title='Autopec | Termos de Vendas';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Termos de Vendas, Termos de Vendas Autopec';$canonical='/termosdevendas/';break;
	case 'formasdepagamentos':$title='Autopec | Formas de Pagamento';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Formas de Pagamento, Formas de Pagamento Autopec';$canonical='/formasdepagamentos/';break;
	case 'carrinho':$title='Autopec | Carrinho';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='carrinho autopec';$canonical='/carrinho/';break;
	case 'confirmacao':$title='Autopec | Confirmação';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='confirmacao autopec';$canonical='/confirmacao/';break;
	case 'concluido':$title='Autopec | Concluído';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='concluido autopec';$canonical='/concluido/';break;
	case 'pesquisa':$title='Autopec | Pesquisa';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='pesquisa autopec';$canonical='/pesquisa/';break;
	case 'produtos':$title='Autopec | '.ucwords(str_replace('-',' ',$url[1])).' - '.$url[2];$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords= str_replace('-',' ',$url[1]).',autopec';$canonical='/'.$pagina;break;
	case 'montadora':$title='Autopec | '.ucwords(str_replace('-',' ',$url[1]));$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords= str_replace('-',' ',$url[1]).',autopec';$canonical='/'.$pagina;break;
	case 'cadastrese':$title='Autopec | Cadastre-se';$description='Autopec tradição qualidade e melhor preço no mercado de peças para vans e Importado';$keywords='Cadastre-se na Autopec,cadastrar na autopec';$canonical='/cadastrese/';break;
default:$title='';$description='';$keywords='';$canonical='';break;
}

$return='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br"> <!--<![endif]-->
<head>
	<title>'.$title.'</title>
	<meta name="author" content="ti@autopec.com.br, Davi Arantes, Diego Nascimento, Lindolpho Neto"/>
	<meta name="description" content="'.$description.'"/>
	<meta name="keywords" content="'.$keywords.'"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,chrome=IE9">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="HandheldFriendly" content="true"/>
	<meta name="MobileOptimized" content="320"/>
	<!-- Mobile Internet Explorer ClearType Technology -->
	<!--[if IEMobile]> <meta http-equiv="cleartype" content="on"> <![endif]-->
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
	<!-- Fav Icon -->
	<link rel="canonical" href="'.$UrlFixed.$canonical.'"/>
	<link rel="shortcut icon" href="'.$UrlFixed.'/Library/imagens/icons/favicon/favicon.png">
	<link rel="apple-touch-icon" href="'.$UrlFixed.'/Library/imagens/icons/favicon/favicon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="'.$UrlFixed.'/Library/imagens/icons/favicon/favicon72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="'.$UrlFixed.'/Library/imagens/icons/favicon/favicon114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="'.$UrlFixed.'/Library/imagens/icons/favicon/favicon144x144.png">
	<link rel="apple-touch-startup-image" href="'.$UrlFixed.'/Library/imagens/icons/favicon/favicon320x460.png"/><!----320x460.png--->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,900"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="'.$UrlFixed.'/Library/vendor/bootstrap/css/bootstrap.min.css" media="screen"/>
	<!-- Custom Style core CSS -->
	<link rel="stylesheet" href="'.$UrlFixed.'/Library/vendor/custom/style.css" media="screen"/>
	<!-- Style Slider core CSS -->
	<link rel="stylesheet" href="'.$UrlFixed.'/Library/vendor/custom/flickity.css" media="screen"/>
	<script language="JavaScript" type="text/javascript" src="'.$UrlFixed.'/Library/vendor/js/render-time-site-scope.js"></script>
	<script language="JavaScript" type="text/javascript" src="'.$UrlFixed.'/Library/vendor/js/url-path.js"></script>
	<script language="JavaScript" type="text/javascript" src="'.$UrlFixed.'/Library/vendor/jquery/jquery-1.4.2.js"></script>
	<script language="JavaScript" type="text/javascript" src="'.$UrlFixed.'/Library/vendor/jquery/jquery.autocomplete.js"></script>
	<script language="JavaScript" type="text/javascript" src="'.$UrlFixed.'/Library/vendor/js/autocomplete.js"></script>
	<style>.ac_loading{background:#f9f9f9 url("'.$UrlFixed.'/Library/imagens/loading/loading.gif") right center no-repeat;color:#000;}</style>
</head>';
return $return;
}

/*@Param MenuCar @Functions MenuCar function.ComponentsClass.php*/
public function MenuCar($UrlFixed,$label,$idSession){
	echo'<div class="menu_cli_bg"><div class="content" style="overflow:initial;"><div class="bg_inpesq"><span id="replace"></span>';?><input type="text" id="autocomplete" name="autocomplete" placeholder="Pesquisar" class="inp_pesq" onkeydown="javascript:var search=document.getElementById('autocomplete').value;if(event.keyCode == 13) searchInputRedirect(search);"/><button onclick="javascript:var search = document.getElementById('autocomplete').value;searchInputRedirect(search);" class="busca" title="Buscar" data-toggle="tooltip" data-placement="right"><i class="fa fa-search" aria-hidden="true"></i></button><?php echo'</div><ul class="menu_cli">'.$label.'<li title="Atendimento pelo Chat" data-toggle="tooltip"><a href="javascript:void(window.open("http://c4publicidade.com.br/autopec/chat/chat.php","","width=660,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes"))"><i style="margin-right:.1em;font-size:1.1em;" class="fa fa-comments-o margin-top-icon" aria-hidden="true"></i><p>Atendimento</p></a></li></ul><a><div class="resumo_car"><div class="res_car_bg"></div><a href="'.$UrlFixed.'/carrinho/'.$idSession.'/"><p><i style="margin-right:.3em;" class="fa fa-cart-arrow-down text-white" aria-hidden="true"></i> R$ <span id="car-sun"></span></p></a></div></a><span id="return-best-sellers"></span></div></div>';
}

/*@Param Banner @Functions Banner function.ComponentsClass.php*/
public function Banner($UrlFixed){
	$return='<div class="space"><div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"><li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li><li data-target="#carouselExampleIndicators" data-slide-to="1"></li><li data-target="#carouselExampleIndicators" data-slide-to="2"></li><li data-target="#carouselExampleIndicators" data-slide-to="3"></li><li data-target="#carouselExampleIndicators" data-slide-to="4"></li></ol><div class="carousel-inner" role="listbox"><div class="carousel-item active"><img class="img-responsive" src="'.$UrlFixed.'/Library/imagens/banner/banner5.jpg" style="width:100%;"/></div><div class="carousel-item"><img class="img-responsive" src="'.$UrlFixed.'/Library/imagens/banner/banner4.jpg" style="width:100%;"/></div><div class="carousel-item"><img class="img-responsive" src="'.$UrlFixed.'/Library/imagens/banner/banner3.jpg" style="width:100%;"/></div><div class="carousel-item"><img class="img-responsive" src="'.$UrlFixed.'/Library/imagens/banner/banner2.jpg" style="width:100%;"/></div><div class="carousel-item"><img class="img-responsive" src="'.$UrlFixed.'/Library/imagens/banner/banner1.jpg" style="width:100%;"/></div></div><a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"><span class="carousel-control-prev-icon arrow_slider" aria-hidden="true" title="Anterior" data-toggle="tooltip" data-placement="right"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"><span class="carousel-control-next-icon arrow_slider" aria-hidden="true" title="Próximo" data-toggle="tooltip" data-placement="left"></span><span class="sr-only">Next</span></a></div></div>';
return $return;
}

/*@Param Banner @Functions Banner function.ComponentsClass.php*/
public function AutomakersMenu($query_MenuAutomakers,$objFunctionClass){
echo'<div class="container" style="margin-top:5%;margin-bottom:5%;">';
	echo'<div class="row-center">';
		echo'<div class="col-md-3 col-xs-6"><!-- ButtonMontadora -->';
			echo'<a href="" class="btn btn-menu" data-toggle="modal" data-target="#ButtonMontadora"><span class="font-responsive-menu text-shadow"><span id="menu_label"></span></span></a>';
			echo'<div class="modal fade bd-example-modal-lg" id="ButtonMontadora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
				echo'<div class="modal-dialog modal-lg" role="document">';
					echo'<div class="modal-content">';
						echo'<div class="modal-header">';
							echo'<h3 class="modal-title text-white text-shadow" id="exampleModalLabel"><span id="menu_model"></span></h3>';
							echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>';
						echo'</div>';
						echo'<div class="modal-body">';
							echo'<div class="container-fluid">';
								echo'<div class="row">';
								while($fetch_MenuAutomakers = $query_MenuAutomakers->fetch(PDO::FETCH_ASSOC)){
									echo'<div class="col-md-4 col-xs-12 float-up">';
										?><a data-dismiss="modal" aria-label="Close" onclick="javascript: var a ='<?php echo $fetch_MenuAutomakers['Categoria']; ?>';var b ='<?php echo $fetch_MenuAutomakers['CodCategoria'];?>';labelFabricator(a,b);codFabricator(a,b);" ><?php print_r($objFunctionClass->RenderMenu($fetch_MenuAutomakers['Categoria'], $fetch_MenuAutomakers['CodCategoria']));?><?php
									echo'</div>';
									}
								echo'</div>';
							echo'</div>';
						echo'</div>';
						echo'<div class="modal-footer">';
							echo'<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>';
						echo'</div>';
					echo'</div>';
				echo'</div>';
			echo'</div><!-- ButtonMontadora -->';
		echo'</div>';
		echo'<div class="col-md-3 col-xs-6"><!-- ButtonCarros -->';
			echo'<a href="" class="btn btn-menu" data-toggle="modal" data-target="#ButtonCarros"><span class="font-responsive-menu text-shadow"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; CARROS</span></a>';
			echo'<div class="modal fade bd-example-modal-lg" id="ButtonCarros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
				echo'<div class="modal-dialog modal-lg" role="document">';
					echo'<div class="modal-content">';
						echo'<div class="modal-header">';
							echo'<h3 class="modal-title text-white text-shadow" id="exampleModalLabel"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; CARROS</h3>';
							echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>';
						echo'</div>';
						echo'<div class="modal-body">';
							echo'<div class="container-fluid">';
								echo'<div class="row">';
									echo'<span class="alert alert-danger center-block" role="alert"><h1 class="text-shadow">Selecione a <b>Montadora!</b></h1></span>';
								echo'</div>';
							echo'</div>';
						echo'</div>';
						echo'<div class="modal-footer">';
							echo'<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>';
						echo'</div>';
					echo'</div>';
				echo'</div>';
			echo'</div><!-- ButtonCarros -->';
		echo'</div>';
		echo'<div class="col-md-3 col-xs-6"><!-- ButtonCategoria -->';
			echo'<a href="" class="btn btn-menu" data-toggle="modal" data-target="#ButtonCategoria"><span class="font-responsive-menu text-shadow"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; CATEGORIA</span></a>';
			echo'<div class="modal fade bd-example-modal-lg" id="ButtonCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
				echo'<div class="modal-dialog modal-lg" role="document">';
					echo'<div class="modal-content">';
						echo'<div class="modal-header">';
							echo'<h3 class="modal-title text-white text-shadow" id="exampleModalLabel"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; CATEGORIA</h3>';
							echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>';
						echo'</div>';
						echo'<div class="modal-body">';
							echo'<div class="container-fluid">';
								echo'<div class="row">';
									echo'<span class="alert alert-danger center-block" role="alert"><h1 class="text-shadow">Selecione a <b>Montadora!</b></h1></span>';
								echo'</div>';
							echo'</div>';
						echo'</div>';
						echo'<div class="modal-footer">';
							echo'<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>';
						echo'</div>';
					echo'</div>';
				echo'</div>';
			echo'</div><!-- ButtonCategoria -->';
		echo'</div>';
		echo'<div class="col-md-3 col-xs-6"><!-- ButtonSubCategoria -->';
			echo'<a href="" class="btn btn-menu" data-toggle="modal" data-target="#ButtonSubCategoria"><span class="font-responsive-menu text-shadow"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; SUBCATEGORIA</span></a>';
			echo'<div class="modal fade bd-example-modal-lg" id="ButtonSubCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
				echo'<div class="modal-dialog modal-lg" role="document">';
					echo'<div class="modal-content">';
						echo'<div class="modal-header">';
							echo'<h3 class="modal-title text-white text-shadow" id="exampleModalLabel"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; SUBCATEGORIA</h3>';
							echo'<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button>';
						echo'</div>';
						echo'<div class="modal-body">';
							echo'<div class="container-fluid">';
								echo'<div class="row">';
									echo'<span class="alert alert-danger center-block" role="alert"><h1 class="text-shadow">Selecione a <b>Montadora!</b></h1></span>';
								echo'</div>';
							echo'</div>';
						echo'</div>';
						echo'<div class="modal-footer">';
							echo'<button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button>';
						echo'</div>';
					echo'</div>';
				echo'</div>';
			echo'</div><!-- ButtonSubCategoria -->';
		echo'</div>';
	echo'</div>';
echo'</div>';
}

/*@Param Footer @Functions Footer function.ComponentsClass.php*/
public function Footer($UrlFixed){
	$return='<footer class="bg-black"><div class="container"><br/><div class="row footer-icons-scope"><div class="col-md-3"><a href="'.$UrlFixed.'/contato/"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_email.png" class="img-responsive img-fluid float-up"/><font class="font-responsive font-hover"> ENVIE UM E-MAIL</font></a></div><div class="col-md-3"><a href="'.$UrlFixed.'/blog/"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_blog.png" class="img-responsive img-fluid float-up"/><font class="font-responsive font-hover"> BLOG AUTOPEC</font></a></div><div class="col-md-3"><a href="http://siacg.com.br/" target="_blank"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_siagc.png" class="img-responsive img-fluid float-up"/><font class="font-responsive font-hover"> PRODUTOS SIAGC</font></a></div><br/></div></div><div class="container"><div class="row"><img class="img-responsive img-fluid center-block" src="'.$UrlFixed.'/Library/imagens/bg/bg-footer.png"/></div></div><div class="bg-grey"><br/><div class="container"><div class="row"><div class="col-md-3 col-responsive"><ul><li><h1 class="titulo_rodape"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_item.png" class="img-responsive img-fluid"/> Cadastre seu e-mail</h1></li><li><p><span> Novidades, promoções e dicas<br><span>de manutenção por e-mail.</span></p></li><li><div class="cadastro_rss"><input class="input-newsletter" id="email" name="email" placeholder="Insira seu e-mail" type="email"><a onclick="validaInputNewsletter();"><img class="img-newsletter img-responsive img-fluid" src="'.$UrlFixed.'/Library/imagens/icons/icon-newsletter-arrow.jpg"/></a><span id="msg-email"></span></div></li></ul></div><!--ModalNewsletter--><div class="modal fade bd-example-modal-lg" id="ModalNewsletter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><img class="img-responsive img-fluid" src="'.$UrlFixed.'/Library/imagens/logos/logo-min.png"/></h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="text-white" aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="container-fluid"><div class="row"><h4 class="jumbotron"><span id="msg-newsletter"></span></h4></div></div></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">FECHAR</button></div></div></div></div><!--ModalNewsletter--><div class="col-md-2"><ul><li><h1 class="titulo_rodape"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_item.png" class="img-responsive img-fluid"/> Empresa</h1></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/sobrenos/"> Quem somos</a></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/localizacao/"> Localização</a></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/trabalheconosco/"> Trabalhe conosco</a></li><!--<li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/blog/"> Blog</a></li>--></ul></div><div class="col-md-2"><ul><li><h1 class="titulo_rodape"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_item.png" class="img-responsive img-fluid"/> Atendimento</h1></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/contato/"> Contato</a></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/politicadeseguranca/"> Política de segurança</a></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/comocomprar/"> Como Comprar</a></li></ul></div><div class="col-md-2"><ul><li><h1 class="titulo_rodape"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_item.png" class="img-responsive img-fluid"> Compras</h1></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/trocasedevolucoes/"> Trocas e devoluções</a></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/termosdevendas/"> Termos de vendas</a></li><li class="space-bottom"><a class="font-red-hover" href="'.$UrlFixed.'/formasdepagamentos/"> Formas de Pagamento</a></li></ul></div><div class="col-md-3 col-responsive"><ul><li><h1 class="titulo_rodape"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_item.png" class="img-responsive img-fluid"/> Acompanhe</h1></li><li><div class="row center-block"><a href="https://plus.google.com/+AutopecBr/" target="_blank"><img class="img-responsive img-fluid space-left float-up" src="'.$UrlFixed.'/Library/imagens/icons/icon_googlemais.jpg"/></a><a href="https://www.facebook.com/autopec.1" target="_blank"><img class="img-responsive img-fluid space-left float-up" src="'.$UrlFixed.'/Library/imagens/icons/icon_facebook.jpg"/></a><a href="https://twitter.com/autopec" target="_blank"><img class="img-responsive img-fluid space-left float-up" src="'.$UrlFixed.'/Library/imagens/icons/icon_twitter.jpg"/></a><a href="https://www.youtube.com/user/autopec1" target="_blank"><img class="img-responsive img-fluid space-left float-up" src="'.$UrlFixed.'/Library/imagens/icons/icon_youtube.jpg"/></a></div></li></ul></div></div></div></div><div class="container"><br/><div class="row"><div class="col-md-4"><ul><li><h1 class="titulo_rodape text-white font-red-hover"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_item2.png" class="img-responsive img-fluid"/> Formas de pagamento</h1></li><li><p class="bandeiras_pag text-white">Cartões de crédito:<span class="mg45left">Boleto:</span></p></li><li><img src="'.$UrlFixed.'/Library/imagens/rotulo/visa_rodp.jpg" class="img-responsive img-fluid"/><img src="'.$UrlFixed.'/Library/imagens/rotulo/master_rodp.jpg" class="mg5left" class="img-responsive img-fluid"/> <img src="'.$UrlFixed.'/Library/imagens/rotulo/boleto_rodp.jpg" class="mg45left" class="img-responsive img-fluid"/></li><li><p style="-webkit-margin-after: -3%;" class="bandeiras_pag text-red">Condições de pagamento</p><p class="bandeiras_pag text-white">Até 12 vezes sem juros no cartão de crédito.</p></li></ul></div><div class="col-md-4"><ul><li><h1 class="titulo_rodape text-white font-red-hover"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_item2.png" class="img-responsive img-fluid"/> Certificações e segurança</h1></li><li><img src="'.$UrlFixed.'/Library/imagens/rotulo/sb.png" class="img-responsive"/> <img src="'.$UrlFixed.'/Library/imagens/rotulo/ssl.gif" width="20%" class="img-responsive img-fluid"/> <img src="'.$UrlFixed.'/Library/imagens/rotulo/bsi.png" class="img-responsive img-fluid"/></li></ul></div><div class="col-md-4"><ul><li><h1 class="titulo_rodape text-white font-red-hover"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_tel.png" class="img-responsive img-fluid"/> <strong>Televendas</strong><p class="font11" style="margin-left:14%;margin-top: -3%;">(19) 3241-5341</p><p class="font11" style="margin-left:14%;margin-top: -3%;">sac@autopec.com.br</p></h1></li><li><h1 class="titulo_rodape text-white font-red-hover"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_pointer.png" class="img-responsive pull-left img-fluid"/><p class="font11">Filial: 04.014.192/0002-27</p><p class="font11" style="margin-left:14%;margin-top: -3%;">Rua Sargento João Batista Sarubbi, 77</p><p class="font11" style="margin-left:14%;margin-top: -3%;">Jd. Eulina - Campinas - 13063-340</p></h1></li><li><h1 class="titulo_rodape text-white font-red-hover"><img src="'.$UrlFixed.'/Library/imagens/icons/icon_pointer.png" class="img-responsive pull-left img-fluid"/><p class="font11">Matriz: 04.014.192/0001-46</p><p class="font11" style="margin-left:14%;margin-top: -3%;">Rua Jose Alves Moreira, 136</p><p class="font11" style="margin-left:14%;margin-top: -3%;">Pq. Via Norte - Campinas - 13065-712</p></h1></li></ul></div><div class="col-md-8"><ul><li><hr class="hr_border"><p class="bandeiras_pag text-white">AUTOPEC tradição qualidade e melhor preço no mercado de peças para vans, pick-ups, utilitários e importados.<br>Atendemos à condutores de transportes escolares, frotistas, transportadoras, empresas de transporte executivo, oficinas mecânicas, lojas de autopeças e cooperativa. Nosso estoque possui mais de 8.000 peças para câmbio, motor, freio, suspensão, lataria, elétrica, filtros, lubrificantes, para-choques, acessórios, faróis, ferramentas e muito mais.</p></li></ul></div></div></div></footer><div class="corp"><p><img src="'.$UrlFixed.'/Library/imagens/logos/logo.png"/></p><p>Todos os direitos reservados a Autopec - 2012/2017 - a reprodução total ou parcial do conteúdo do e-commerce é proibida e passível de personalização.<br>Todas as regras, preços, prazos e promoções são válidas apenas para produtos vendidos e entregues pelo e-commerce da Autopec.<br>Logomarcas e nomes dos fabricantes são responsabilidades dos mesmos.</p></div>';
return $return;
}

}
?>