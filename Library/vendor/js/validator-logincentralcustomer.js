$("#button-submit-loginCentralCustomer").html('<a onclick="javascript:loginCentralCustomer();" class="btns_pagi_login cursor-class">Entrar</a>').show();
function checkEmailLogin(){
	if($("#emailLogin").val() === ""){
		$("#check-emailLogin").hide();
		$("#times-emailLogin").show();
		$("#msg-emailLogin").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email cadastrado</strong> não pode ser vazio!</div>');
		document.getElementById("emailLogin").placeholder = "Preencha o Campo!";
		document.getElementById("emailLogin").style.borderColor = "#ff0000";
		document.getElementById("emailLogin").style.outline = "#ff0000";
		document.getElementById("emailLogin").focus();
	return false;
	}
	if($("#emailLogin").val().indexOf('@')==-1 || $("#emailLogin").val().indexOf('.')==-1){
		$("#check-emailLogin").hide();
		$("#times-emailLogin").show();
		$("#msg-emailLogin").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Insira um <strong>Email cadastrado</strong> válido!</div>');
		document.getElementById("emailLogin").placeholder = "Preencha com um Email válido!";
		document.getElementById("emailLogin").style.borderColor = "#ff0000";
		document.getElementById("emailLogin").style.outline = "#ff0000";
		document.getElementById("emailLogin").focus();
	return false;
	}
	else{
		$("#check-emailLogin").show();
		$("#times-emailLogin").hide();
		$("#msg-emailLogin").hide();
		document.getElementById("emailLogin").style.borderColor = "green";
		document.getElementById("emailLogin").style.outline = "green";
	}
	return false;
}
function checkSenhaLogin(){
	if($("#senhaLogin").val() === ""){
		$("#check-senhaLogin").hide();
		$("#times-senhaLogin").show();
		$("#msg-senhaLogin").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Senha</strong> não pode ser vazio!</div>');
		document.getElementById("senhaLogin").placeholder = "Preencha o Campo!";
		document.getElementById("senhaLogin").style.borderColor = "#ff0000";
		document.getElementById("senhaLogin").style.outline = "#ff0000";
		document.getElementById("senhaLogin").focus();
	return false;
	}
	else{
		$("#check-senhaLogin").show();
		$("#times-senhaLogin").hide();
		$("#msg-senhaLogin").hide();
		document.getElementById("senhaLogin").style.borderColor = "green";
		document.getElementById("senhaLogin").style.outline = "green";
	}
	return false;
}
function loginCentralCustomer(){
	checkEmailLogin();
	checkSenhaLogin();
	var emailLogin = $("#emailLogin").val();
	var senhaLogin = $("#senhaLogin").val();
	$("#button-submit-loginCentralCustomer").html('<a class="btns_pagi_login cursor-class"><i class="fa fa-spinner fa-pulse fa-fw"></i>  Entrando</a>').show();
	$.post(newURL+"/Library/vendor/ajax/ajax.logincentralcustomer.php",{emailLogin:emailLogin, senhaLogin:senhaLogin},
	function(resposta){
		if(resposta != 'returnNull'){
			$("#check-senhaLogin").show();
			$("#times-senhaLogin").hide();
			$("#msg-senhaLogin").hide();
			document.getElementById("senhaLogin").style.borderColor = "green";
			document.getElementById("senhaLogin").style.outline = "green";
			$("#check-emailLogin").show();
			$("#times-emailLogin").hide();
			$("#msg-emailLogin").hide();
			document.getElementById("emailLogin").style.borderColor = "green";
			document.getElementById("emailLogin").style.outline = "green";
			window.location.href= newURL+resposta;
			$("#return-loginCentralCustomer").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Login</strong> realizado com sucesso!</div>').slideDown(3000);
			$("#button-submit-loginCentralCustomer").html('<a onclick="javascript:loginCentralCustomer();" class="btns_pagi_login cursor-class">Entrar</a>').show();
			$("#emailLogin").reset();
			$("#senhaLogin").reset();
		return false;
		}
		if(resposta === 'returnNull'){
			$("#check-senhaLogin").hide();
			$("#times-senhaLogin").show();
			$("#msg-senhaLogin").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Dados</strong> inválidos!</div>');
			document.getElementById("senhaLogin").placeholder = "Preencha o Campo!";
			document.getElementById("senhaLogin").style.borderColor = "#ff0000";
			document.getElementById("senhaLogin").style.outline = "#ff0000";
			$("#check-emailLogin").hide();
			$("#times-emailLogin").show();
			$("#msg-emailLogin").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Dados</strong> inválidos!</div>');
			document.getElementById("emailLogin").placeholder = "Preencha o Campo!";
			document.getElementById("emailLogin").style.borderColor = "#ff0000";
			document.getElementById("emailLogin").style.outline = "#ff0000";
			$("#return-loginCentralCustomer").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Dados de <strong>Login</strong> inválidos!</div>').slideDown(3000);
			$("#button-submit-loginCentralCustomer").html('<a onclick="javascript:loginCentralCustomer();" class="btns_pagi_login cursor-class">Entrar</a>').show();
			$("#emailLogin").reset();
			$("#senhaLogin").reset();
		return false;
		}
		else{
			$("#return-loginCentralCustomer").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Erro</strong> ao realizar o Login!</div>').slideDown(3000);
			$("#emailLogin").reset();
			$("#senhaLogin").reset();
		return false;
		}
	});
	return false;
	}