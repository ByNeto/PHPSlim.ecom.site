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
		<h1 class="font-bold text-red font-uppercase space-top space-bottom space-left-rem">TRABALHE CONOSCO</h1>
	</div>
	<div class="rows">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Nome completo</label>
								<input type="text" name="nameContact" id="nameContact" class="form-control input-sm" placeholder="Nome completo" onblur="nameContact()" required />
								<span id="msg-nameContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* CPF</label>
								<input type="text" onblur="javascript:var cpfElemento = document.getElementById('cpfContact').value; cpfContact(cpfElemento);" name="cpfContact" id="cpfContact" class="form-control input-sm" placeholder="CPF" required />
								<span id="msg-cpfContact"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label style="margin-bottom:0px;">* Data de Nascimento</label>
								<input type="text" name="datepicker" id="datepicker" class="form-control input-sm" placeholder="Data de Nascimento" onblur="datepickers();" required />
								<span id="msg-datepickerContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Sexo</label>
								<select id="sexContact" name="sexContact" onblur="sexContact()" required>
									<option value="">Selecione a opção</option>
									<option value="M">Masculino</option>
									<option value="F">Feminino</option>
								</select>
								<span id="msg-sexContact"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Estado Civil</label>
								<select id="maritalContact" name="maritalContact" onblur="maritalContact()" required>
									<option value="">Selecione a opção</option>
									<option value="Solteiro">Solteiro</option>
									<option value="Casado">Casado</option>
									<option value="Viúvo">Viúvo</option>
									<option value="Separado">Separado</option>
									<option value="Divorciado">Divorciado</option>
								</select>
								<span id="msg-maritalContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>Idiomas</label>
								<input type="text" name="languagesContact" id="languagesContact" class="form-control input-sm" placeholder="Idiomas (separados por virgula)." required />
								<span id="msg-languagesContact"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* CEP</label>
								<input type="text" onblur="javascript:var cepElemento = document.getElementById('cepContact').value; cepAutocomplete(cepElemento);cepContact();" name="cepContact" id="cepContact" class="form-control input-sm" placeholder="CEP" required />
								<span id="msg-cepContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Endereço</label>
								<input type="text" onblur="logradouroContact()" name="logradouroContact" id="logradouroContact" class="form-control input-sm" placeholder="Endereço" required />
								<span id="msg-logradouroContact"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>* Numero</label>
								<input type="text" onblur="numberContact()" name="numberContact" id="numberContact" class="form-control input-sm" placeholder="Numero" required />
								<span id="msg-numberContact"></span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>Complemento</label>
								<input type="completeContact" name="completeContact" id="completeContact" class="form-control input-sm" placeholder="Complemento" required />
								<span id="msg-dept"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-12 col-md-6">
							<div class="form-group">
								<label>* Bairro</label>
								<input type="text" onblur="neighborhoodContact()" name="neighborhoodContact" id="neighborhoodContact" class="form-control input-sm" placeholder="Bairro" required />
								<span id="msg-neighborhoodContact"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Cidade</label>
								<input type="text" onblur="cityContact()" name="cityContact" id="cityContact" class="form-control input-sm" placeholder="Cidade" required />
								<span id="msg-cityContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Estado</label>
								<input type="text" onblur="ufContact()" name="ufContact" id="ufContact" class="form-control input-sm" placeholder="Estado" required />
								<span id="msg-ufContact"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Telefone</label>
								<input type="tel" onblur="telContact()" name="telContact" id="telContact" class="form-control input-sm" placeholder="Telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
								<span id="msg-telContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Celular</label>
								<input type="tel" onblur="celContact()" name="celContact" id="celContact" class="form-control input-sm" placeholder="Celular" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
								<span id="msg-celContact"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Email válido</label>
								<input type="email" onblur="emailContact()" name="emailContact" id="emailContact" class="form-control input-sm" placeholder="Email válido" required />
								<span id="msg-emailContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>Site pessoal</label>
								<input type="text" name="siteContact" id="siteContact" class="form-control input-sm" placeholder="Url Website" required />
								<span id="msg-siteContact"></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Linkedin</label>
						<input type="text" name="linkedinContact" id="linkedinContact" class="form-control input-sm" placeholder="Url Linkedin" required />
						<span id="msg-linkedinContact"></span>
					</div>
					<div class="form-group">
						<label>Facebook</label>
						<input type="text" name="facebookContact" id="facebookContact" class="form-control input-sm" placeholder="Url Facebook" required />
						<span id="msg-facebookContact"></span>
					</div>
					<div class="rows">
						<label>Outras formas de contato</label>
						<textarea id="otherContact" name="otherContact" class="form-control" rows="7" placeholder="Caso possua coloque (Skype, Linkedin, Facebook, Twitter e outros, separados por virgula). " required ></textarea>
						<span id="msg-otherContact"></span>
					</div>
					<br/>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Está trabalhando atualmente?</label>
								<select id="jobContact" name="jobContact"  onblur="jobContact()" required>
									<option value="">Selecione a opção</option>
									<option value="s">Sim</option>
									<option value="n">Não</option>
								</select>
								<span id="msg-jobContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>Cargo / Vaga de Interesse</label>
								<select id="vacancyContact" required>
									<option value="">Selecione a opção</option>
									<option value="Auxiliar Administrativo">Auxiliar Administrativo</option>
									<option value="Assistente de Garantia">Assistente de Garantia</option>
									<option value="Assistente de Marketing">Assistente de Marketing</option>
									<option value="Atendente SAC">Atendente SAC</option>
									<option value="Auxiliar de Compras">Auxiliar de Compras</option>
									<option value="Auxiliar de TI">Auxiliar de TI</option>
									<option value="Auxiliar E-commerce">Auxiliar E-commerce</option>
									<option value="Caixa">Caixa</option>
									<option value="Comprador">Comprador</option>
									<option value="Consultor de Vendas Atacado">Consultor de Vendas Atacado</option>
									<option value="Consultor de Vendas Varejo">Consultor de Vendas Varejo</option>
									<option value="Estoquista">Estoquista</option>
									<option value="Faxineira">Faxineira</option>
									<option value="Motoboy">Motoboy</option>
									<option value="Outro">Outro</option>
								</select>
								<span id="msg-vacancyContact"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>Outro qual?</label>
								<input type="text" name="otherVacancyContact" id="otherVacancyContact" class="form-control input-sm" placeholder="Carga / Vaga" required />
								<span id="msg-otherVacancyContact"></span>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<label>* Pretensão Salarial</label>
								<input type="text" onblur="salaryContact()" name="salaryContact" id="salaryContact" class="form-control input-sm" placeholder="Pretensão Salarial" required />
								<span id="msg-salaryContact"></span>
							</div>
						</div>
					</div>
					<div class="rows">
						<label>Experiência Profissional</label>
						<textarea name="experienceContact" id="experienceContact" class="form-control" rows="7" placeholder="Experiência Profissional" required ></textarea>
						<span id="msg-experienceContact"></span>
					</div>
					<br/>
					<div class="rows">
						<label>Formação Acadêmica</label>
						<textarea name="formationContact" id="formationContact" class="form-control" rows="7" placeholder="Formação Acadêmica" required ></textarea>
						<span id="msg-formationContact"></span>
					</div>
					<br/>
					<div class="rows">
						<label>Informações complementares</label>
						<textarea id="informationContact" name="informationContact" class="form-control" rows="7" placeholder="Informações complementares(Cursos ou Especializações)." required ></textarea>
						<span id="msg-informationContact"></span>
					</div>
				</div>
			</div>
			<div id="return"></div>
		<div id="button-submit"></div>
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
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/validator-workwithus.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/render-menu-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/validator-newsletter.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/js/render-time-site.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/popper/popper.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/bootstrap.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/bootstrap-datepicker.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/datepicker.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php print_r($objFunctionClass->UrlFixed()); ?>/Library/vendor/bootstrap/js/tooltip.js"></script>
</body>
</html>