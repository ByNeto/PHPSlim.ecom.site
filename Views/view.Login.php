<?php
require_once('Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('Models/model.Login.php');// inclui a classe da model Login.
require_once('Models/model.Menu.php');// inclui a classe da model Menu.
require_once('Models/model.Autocomplete.php');// inclui a classe da model Autocomplete.
$objModelLogin = new ModelLogin();//inicia a classe ModelLogin.
$objModelMenu = new ModelMenu();//inicia a classe ModelMenu.
$objModelAutocomplete = new ModelAutocomplete();//inicia a classe ModelAutocomplete.
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

<?php print_r($objComponentsClass->AutomakersMenu($objModelMenu->MenuAutomakers($objConn),$objFunctionClass));?>

<div class="container">
	<div class="row">
		<div class="bol_icon_cart" style="border:2px solid #717171;"><i style="font-size: 1.5em;" class="fa fa-cart-arrow-down text-gray-max" aria-hidden="true"></i></div>
		<div class="bol_icon_cart_active" style="border:2px solid #717171;"><i style="font-size:1.5em;margin-left:0.1rem;" class="fa fa-unlock text-white" aria-hidden="true"></i></div>
		<div class="bol_icon_cart" style="border:2px solid #717171;"><i style="font-size: 1.5em;margin-left:-0.2rem;" class="fa fa-credit-card-alt text-gray-max" aria-hidden="true"></i></div>
		<hr class="tracejada"></hr>
	</div>
	<div class="pag_forms">
		<h2>JÁ POSSUO CADASTRO</h2>
		<h3>Acessar minha conta:</h3>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						<label>* Email: <span style="display:none;" id="times-emailLogin"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-emailLogin"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
						<span id="inputEmailLogin"></span>
						<span id="msg-emailLogin"></span>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						<label>* Senha: <span style="display:none;" id="times-senhaLogin"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-senhaLogin"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
						<input onblur="checkSenhaLogin();" type="password" name="senhaLogin" id="senhaLogin" class="form-control input-sm" placeholder="Senha:" required />
						<span id="msg-senhaLogin"></span>
						<span id="return-loginCentralCustomer"></span>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
					<span id="button-submit-loginCentralCustomer"></span>
					</div>
				</div>
			</div>
		<h3>Recuperar Senha:</h3>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						<label>Email cadastrado <span style="display:none;" id="times-emailRecoverPassword"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-emailRecoverPassword"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
						<input onblur="emailRecoverPassword();" type="emailRecoverPassword" name="emailRecoverPassword" id="emailRecoverPassword" class="form-control input-sm" placeholder="Email cadastrado" required />
						<span id="msg-emailRecoverPassword"></span>
						<span id="return-emailRecoverPassword"></span>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						<span id="button-submit-emailRecoverPassword"></span>
					</div>
				</div>
			</div>
		<h2>NÃO SOU CADASTRADO</h2>
		<h3>Cadastre-se:</h3>
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						<label>Email válido <span style="display:none;" id="times-emailRegister"><i class="fa fa-times text-red" aria-hidden="true"></i></span><span style="display:none;" id="check-emailRegister"><i class="fa fa-check text-green" aria-hidden="true"></i></span></label>
						<input onblur="emailRegister();" type="email" name="emailRegister" id="emailRegister" class="form-control input-sm" placeholder="Email cadastrado" required />
						<span id="msg-emailRegister"></span>
						<span id="return-emailRegister"></span>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class="form-group">
						<span id="button-submit-emailRegister"></span>
					</div>
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
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/dropdownuser.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/validator-logincentralcustomer.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/validator-loginrecoverpassword.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/validator-loginemailregister.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect-input.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/searchredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/autoredirect.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/bestsellers.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/render-menu-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/render-time-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/validator-newsletter.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/js/start-modal-function.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/popper/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed());?>/Library/vendor/bootstrap/js/tooltip.js"></script>
<?php if($urlId == 'autopec'){ ?>
<script language="JavaScript" type="text/javascript">$('#inputEmailLogin').html('<input onblur="checkEmailLogin();" type="email" name="emailLogin" id="emailLogin" class="form-control input-sm" placeholder="Email cadastrado" required />').show();</script>
<?php } else{
$query_CheckEmail_Select = $objModelLogin->SelectRecoverPassword($objConn,base64_decode($urlId));
if($fetch_CheckEmail = $query_CheckEmail_Select->fetch(PDO::FETCH_ASSOC)){
?>
<script language="JavaScript" type="text/javascript">$('#inputEmailLogin').html("<input type='email' name='emailLogin' id='emailLogin' class='form-control input-sm' value='<?php print_r(strtolower($fetch_CheckEmail['Email'])); ?>' placeholder='Email cadastrado' required />").show();</script>
<?php }
else{print_r($objFunctionClass->InvalidParameter(200));}
} ?>
</body>
</html>