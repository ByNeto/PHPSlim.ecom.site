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
		<h1 class="font-bold text-red font-uppercase space-top space-bottom space-left-rem">CADASTRE SE</h1>
	</div>
	<div class="row nav nav-tabs" role="tablist" style="border-bottom:0;">
		<a class="bol_icon_cart_active nav-item" style="border:2px solid #717171;" data-toggle="tab" href="#pf" role="tab"><i style="font-size:1.5em;margin-left:0.2rem;" class="fa fa-user text-white" aria-hidden="true"></i></a>
		<a class="bol_icon_cart nav-item" style="border:2px solid #717171;" data-toggle="tab" href="#pj" role="tab"><i style="font-size: 1.5em;margin-left:-0.1rem;" class="fa fa-users text-gray-max" aria-hidden="true"></i></a>
		<hr class="tracejada" style="transform:translateY(-50px);"></hr>
	</div>
	<div class="rows">
<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="pf" role="tabpanel">
		<div class="row">
			<h3 class="font-bold text-red font-uppercase space-top space-bottom space-left-rem"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Pessoa Fisica</h3>
		</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<label>* Nome completo <span style="display:none;" id="times-nameRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-nameRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input onblur="nameRegisterPf();" type="text" name="nameRegisterPf" id="nameRegisterPf" class="form-control input-sm" placeholder="Nome completo" required />
								<span id="msg-nameRegisterPf"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* RG <span style="display:none;" id="times-rgRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-rgRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="rgRegisterPf()" name="rgRegisterPf" id="rgRegisterPf" class="form-control input-sm" placeholder="RG" required />
								<span id="msg-rgRegisterPf"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* CPF <span style="display:none;" id="times-cpfRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-cpfRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="javascript:cpfRegisterPf(); var cpfElementoPf = document.getElementById('cpfRegisterPf').value;cpfCheckDataBasePf(cpfElementoPf);" name="cpfRegisterPf" id="cpfRegisterPf" class="form-control input-sm" placeholder="CPF" required />
								<span id="msg-cpfRegisterPf"></span>
								<span id="valid-cpfRegisterPf"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* CEP <span style="display:none;" id="times-cepRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-cepRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span><span id="loaderCepPf"></span></label>
								<input type="text" onblur="javascript:cepRegisterPf();" name="cepRegisterPf" id="cepRegisterPf" class="form-control input-sm" placeholder="CEP" required />
								<span id="msg-cepRegisterPf"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Endereço <span style="display:none;" id="times-logradouroRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-logradouroRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="logradouroRegisterPf()" name="logradouroRegisterPf" id="logradouroRegisterPf" class="form-control input-sm" placeholder="Endereço" required />
								<span id="msg-logradouroRegisterPf"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>* Numero <span style="display:none;" id="times-numberRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-numberRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="numberRegisterPf()" name="numberRegisterPf" id="numberRegisterPf" class="form-control input-sm" placeholder="Numero" required />
								<span id="msg-numberRegisterPf"></span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>Complemento</label>
								<input type="completeRegisterPf" name="completeRegisterPf" id="completeRegisterPf" class="form-control input-sm" placeholder="Complemento" required />
								<span id="msg-completeRegisterPf"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="form-group">
								<label>* Bairro <span style="display:none;" id="times-neighborhoodRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-neighborhoodRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="neighborhoodRegisterPf()" name="neighborhoodRegisterPf" id="neighborhoodRegisterPf" class="form-control input-sm" placeholder="Bairro" required />
								<span id="msg-neighborhoodRegisterPf"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Cidade <span style="display:none;" id="times-cityRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-cityRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="cityRegisterPf()" name="cityRegisterPf" id="cityRegisterPf" class="form-control input-sm" placeholder="Cidade" required />
								<span id="msg-cityRegisterPf"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Estado <span style="display:none;" id="times-ufRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-ufRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="ufRegisterPf()" name="ufRegisterPf" id="ufRegisterPf" class="form-control input-sm" placeholder="Estado" required />
								<span id="msg-ufRegisterPf"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Telefone <span style="display:none;" id="times-telRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-telRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="tel" onblur="input()" name="telRegisterPf" id="telRegisterPf" class="form-control input-sm" placeholder="Telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
								<span id="msg-telRegisterPf"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Celular <span style="display:none;" id="times-celRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-celRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="tel" onblur="input()" name="celRegisterPf" id="celRegisterPf" class="form-control input-sm" placeholder="Celular" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
								<span id="msg-celRegisterPf"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<label>* Email válido <span style="display:none;" id="times-emailRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-emailRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="email" onblur="emailRegisterPf()" name="emailRegisterPf" id="emailRegisterPf" class="form-control input-sm" placeholder="Email válido" required />
								<span id="msg-emailRegisterPf"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Senha <span style="display:none;" id="times-passwordRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-passwordRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="password" onblur="passwordRegisterPf();" name="passwordRegisterPf" id="passwordRegisterPf" class="form-control input-sm" placeholder="Senha" required />
								<div id="progress"> <div></div></div>
								<span id="msg-passwordRegisterPf"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Repetir Senha <span style="display:none;" id="times-passwordRepitRegisterPf"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-passwordRepitRegisterPf"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="password" onblur="passwordRepitRegisterPf()" name="passwordRepitRegisterPf" id="passwordRepitRegisterPf" class="form-control input-sm" placeholder="Repetir Senha" required />
								<span id="msg-passwordRepitRegisterPf"></span>
							</div>
						</div>
					</div>
					<div class="rows">
						<label>Outras formas de contato</label>
						<textarea id="otherRegisterPf" name="otherRegisterPf" class="form-control" rows="7" placeholder="Caso possua coloque (Skype, Linkedin, Facebook, Twitter e outros, separados por virgula). " required ></textarea>
						<span id="msg-otherRegisterPf"></span>
					</div>
				</div>
			</div>
			<div id="return-pf"></div>
		<div id="button-submit-pf"></div>
	</div>

	<div class="tab-pane" id="pj" role="tabpanel">
		<div class="row">
			<h3 class="font-bold text-red font-uppercase space-top space-bottom space-left-rem"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Pessoa Juridica</h3>
		</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Nome empresa <span style="display:none;" id="times-enterpriseRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-enterpriseRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" name="enterpriseRegisterPj" id="enterpriseRegisterPj" class="form-control input-sm" placeholder="Nome empresa" onblur="enterpriseRegisterPj()" required />
								<span id="msg-enterpriseRegisterPj"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Nome pessoa p/ contato <span style="display:none;" id="times-nameRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-nameRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" name="nameRegisterPj" id="nameRegisterPj" class="form-control input-sm" placeholder="Nome pessoa p/ contato" onblur="nameRegisterPj()" required />
								<span id="msg-nameRegisterPj"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-3">
							<div class="btn-group contribuinte">
				 				<label class="btn-checked btn-default" style="cursor:pointer;">
									<input style="margin-top:0.5em;margin-bottom:0.5em;width:0%;visibility:hidden;" type="radio" autocomplete="off" id="checkBoxInscPj" name="checkBoxInscPj" value="nc" onblur="checkBoxInscPj()" required ><span id="checkBoxInscPjNc"></span>&nbsp;Não contribuinte &nbsp;&nbsp; 
								</label>
								<label class="btn-checked btn-default" style="cursor:pointer;">
									<input style="margin-top:0.5em;margin-bottom:0.5em;width:0%;visibility:hidden;" type="radio" autocomplete="off" id="checkBoxInscPj" name="checkBoxInscPj" value="sc" onblur="checkBoxInscPj()" required ><span id="checkBoxInscPjSc"></span>&nbsp;Contribuinte
								</label>
							</div>
							<span id="msg-checkBoxInscPj"></span>
						</div>
						<div class="col-xs-3 col-sm-6 col-md-3">
							<div class="form-group">
								<label>* Insc. Estadual <span style="display:none;" id="times-stateRegistrationPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-stateRegistrationPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<span id="inputStateRegistrationPj"></span>
								<span id="msg-stateRegistrationPj"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* CNPJ <span style="display:none;" id="times-cnpjRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-cnpjRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="javascript:var cnpjElemento = document.getElementById('cnpjRegisterPj').value; cnpjRegisterPj(cnpjElemento); cnpjCheckDataBasePj(cnpjElemento);" name="cnpjRegisterPj" id="cnpjRegisterPj" class="form-control input-sm" placeholder="CNPJ" required />
								<span id="msg-cnpjRegisterPj"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* CEP <span style="display:none;" id="times-cepRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-cepRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span><span id="loaderCepPj"></span></label>
								<input type="text" onblur="javascript:var cepElemento = document.getElementById('cepRegisterPj').value; cepAutocompletePj(cepElemento);cepRegisterPj();" name="cepRegisterPj" id="cepRegisterPj" class="form-control input-sm" placeholder="CEP" required />
								<span id="msg-cepRegisterPj"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Endereço <span style="display:none;" id="times-logradouroRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-logradouroRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="logradouroRegisterPj()" name="logradouroRegisterPj" id="logradouroRegisterPj" class="form-control input-sm" placeholder="Endereço" required />
								<span id="msg-logradouroRegisterPj"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>* Numero <span style="display:none;" id="times-numberRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-numberRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="numberRegisterPj()" name="numberRegisterPj" id="numberRegisterPj" class="form-control input-sm" placeholder="Numero" required />
								<span id="msg-numberRegisterPj"></span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>Complemento</label>
								<input type="completeRegisterPj" name="completeRegisterPj" id="completeRegisterPj" class="form-control input-sm" placeholder="Complemento" required />
								<span id="msg-completeRegisterPj"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="form-group">
								<label>* Bairro <span style="display:none;" id="times-neighborhoodRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-neighborhoodRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="neighborhoodRegisterPj()" name="neighborhoodRegisterPj" id="neighborhoodRegisterPj" class="form-control input-sm" placeholder="Bairro" required />
								<span id="msg-neighborhoodRegisterPj"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>* Cidade <span style="display:none;" id="times-cityRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-cityRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="cityRegisterPj()" name="cityRegisterPj" id="cityRegisterPj" class="form-control input-sm" placeholder="Cidade" required />
								<span id="msg-cityRegisterPj"></span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>* Estado <span style="display:none;" id="times-ufRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-ufRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="text" onblur="ufRegisterPj()" name="ufRegisterPj" id="ufRegisterPj" class="form-control input-sm" placeholder="Estado" required />
								<span id="msg-ufRegisterPj"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="form-group">
							<label>* Segmento <span style="display:none;" id="times-segmentPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-segmentPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<select id="segmentPj" name="segmentPj" onblur="segmentPj()" required>
									<option value="" selected="">Selecione uma opção</option>
									<option value="1">Autopeças</option>
									<option value="10">Carro Particular</option>
									<option value="4">Condutor Escolar</option>
									<option value="7">Cooperativa</option>
									<option value="6">Frota Comercio</option>
									<option value="9">Internet</option>
									<option value="2">Oficina Mecanica</option>
									<option value="8">Órgãos Publicos</option>
									<option value="3">Transportadora</option>
									<option value="5">Transporte Particular e Eventos</option>
								</select>
								<span id="msg-segmentPj"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Telefone Comercial <span style="display:none;" id="times-telRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-telRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="tel" onblur="telRegisterPj()" name="telRegisterPj" id="telRegisterPj" class="form-control input-sm" placeholder="Telefone Comercial" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
								<span id="msg-telRegisterPj"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label> Telefone Alternativo</label>
								<input type="tel" onblur="" name="celRegisterPj" id="celRegisterPj" class="form-control input-sm" placeholder="Telefone Alternativo" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
								<span id="msg-celRegisterPj"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Email válido <span style="display:none;" id="times-emailRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-emailRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="email" onblur="emailRegisterPj()" name="emailRegisterPj" id="emailRegisterPj" class="form-control input-sm" placeholder="Email válido" required />
								<span id="msg-emailRegisterPj"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Email válido NF-e <span style="display:none;" id="times-emailRegisterNfePj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-emailRegisterNfePj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="email" onblur="emailRegisterNfePj()" name="emailRegisterNfePj" id="emailRegisterNfePj" class="form-control input-sm" placeholder="Email válido NF-e" required />
								<span id="msg-emailRegisterNfePj"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Senha <span style="display:none;" id="times-passwordRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-passwordRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="password" onblur="passwordRegisterPj();" name="passwordRegisterPj" id="passwordRegisterPj" class="form-control input-sm" placeholder="Senha" required />
								<div id="progressPj"> <div></div></div>
								<span id="msg-passwordRegisterPj"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Repetir Senha <span style="display:none;" id="times-passwordRepitRegisterPj"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-passwordRepitRegisterPj"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
								<input type="password" onblur="passwordRepitRegisterPj()" name="passwordRepitRegisterPj" id="passwordRepitRegisterPj" class="form-control input-sm" placeholder="Repetir Senha" required />
								<span id="msg-passwordRepitRegisterPj"></span>
							</div>
						</div>
					</div>
					<div class="rows">
						<label>Outras formas de contato</label>
						<textarea id="otherRegisterPj" name="otherRegisterPj" class="form-control" rows="7" placeholder="Caso possua coloque (Skype, Linkedin, Facebook, Twitter e outros, separados por virgula). " required ></textarea>
						<span id="msg-otherRegisterPj"></span>
					</div>
				</div>
			</div>
			<div id="return-pj"></div>
		<div id="button-submit-pj"></div>
	</div>
</div>

	</div>
</div>
<p><div class="space-top"></p>
<p><div class="space"></p>
<p><div class="space-bottom"></p>
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
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/validator-registerphysicalperson.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/validator-registerlegalperson.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/check-registerstateregistration.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/render-menu-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/validator-newsletter.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/render-time-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/popper/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/bootstrap-datepicker.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/tooltip.js"></script>

<script>
	$(document).ready(function(){
		$(".nav-tabs a").click(function(){
			$(".nav-tabs a").removeClass("bol_icon_cart_active");
			$(".nav-tabs a").addClass("bol_icon_cart");
			$(".nav-tabs a").find("i").removeClass("text-white");
			$(".nav-tabs a").find("i").addClass("text-gray-max");

			$(this).removeClass("bol_icon_cart");
			$(this).addClass("bol_icon_cart_active");
			$(this).find("i").removeClass("text-gray-max");
			$(this).find("i").addClass("text-white");
		});
	});
</script>

</body>
</html>