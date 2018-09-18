$("#button-submit-emailRecoverPassword").html('<a onclick="javascript:formEmailRecoverPassword();" class="btns_pagi_login cursor-class">Recuperar Senha</a>').show();
function emailRecoverPassword(){
	if($("#emailRecoverPassword").val() === ""){
		$("#check-emailRecoverPassword").hide();
		$("#times-emailRecoverPassword").show();
		$("#msg-emailRecoverPassword").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email cadastrado</strong> não pode ser vazio!</div>');
		document.getElementById("emailRecoverPassword").placeholder = "Preencha o Campo!";
		document.getElementById("emailRecoverPassword").style.borderColor = "#ff0000";
		document.getElementById("emailRecoverPassword").style.outline = "#ff0000";
		document.getElementById("emailRecoverPassword").focus();
	return false;
	}
	if($("#emailRecoverPassword").val().indexOf('@')==-1 || $("#emailRecoverPassword").val().indexOf('.')==-1){
		$("#check-emailRecoverPassword").hide();
		$("#times-emailRecoverPassword").show();
		$("#msg-emailRecoverPassword").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Insira um <strong>Email cadastrado</strong> válido!</div>');
		document.getElementById("emailRecoverPassword").placeholder = "Preencha com um Email válido!";
		document.getElementById("emailRecoverPassword").style.borderColor = "#ff0000";
		document.getElementById("emailRecoverPassword").style.outline = "#ff0000";
		document.getElementById("emailRecoverPassword").focus();
	return false;
	}
	else{
		$("#check-emailRecoverPassword").show();
		$("#times-emailRecoverPassword").hide();
		$("#msg-emailRecoverPassword").hide();
		document.getElementById("emailRecoverPassword").style.borderColor = "green";
		document.getElementById("emailRecoverPassword").style.outline = "green";
	formEmailRecoverPassword();
	}
function formEmailRecoverPassword(){
	var emailRecoverPassword = $("#emailRecoverPassword").val();
	$("#button-submit-emailRecoverPassword").html('<a class="btns_pagi_login cursor-class"><i class="fa fa-spinner fa-pulse fa-fw"></i>  Enviando</a>').show();
	$.post(newURL+"/Library/vendor/ajax/ajax.loginrecoverpassword.php",{emailRecoverPassword:emailRecoverPassword},
	function(resposta){
		if(resposta != 'returnNull'){
			$("#return-emailRecoverPassword").html(resposta).slideDown(3000);
			$("#button-submit-emailRecoverPassword").html('<a onclick="javascript:formEmailRecoverPassword();" class="btns_pagi_login cursor-class">Recuperar Senha</a>').show();
			$("#emailRecoverPassword").reset();
		}
		if(resposta === 'returnNull'){
			$("#check-emailRecoverPassword").hide();
			$("#times-emailRecoverPassword").show();
			document.getElementById("emailRecoverPassword").placeholder = "Preencha o Campo!";
			document.getElementById("emailRecoverPassword").style.borderColor = "#ff0000";
			document.getElementById("emailRecoverPassword").style.outline = "#ff0000";
			document.getElementById("emailRecoverPassword").focus();
			$("#return-emailRecoverPassword").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Email não </strong>cadastrado em nossa base!</div>').slideDown(3000);
			$("#button-submit-emailRecoverPassword").html('<a onclick="javascript:formEmailRecoverPassword();" class="btns_pagi_login cursor-class">Recuperar Senha</a>').show();
			$("#emailRecoverPassword").reset();
		}
		else{
			$("#return-emailRecoverPassword").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Erro</strong> ao enviar, tente novamente!</div>').slideDown(3000);
			$("#emailRecoverPassword").reset();
		}
	});
	return false;
	}
}