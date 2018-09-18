$("#button-submit-emailRegister").html('<a onclick="javascript:formEmailRegister();" class="btns_pagi_login cursor-class">Cadastrar</a>').show();
function emailRegister(){
	if($("#emailRegister").val() === ""){
		$("#check-emailRegister").hide();
		$("#times-emailRegister").show();
		$("#msg-emailRegister").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email cadastrado</strong> não pode ser vazio!</div>');
		document.getElementById("emailRegister").placeholder = "Preencha o Campo!";
		document.getElementById("emailRegister").style.borderColor = "#ff0000";
		document.getElementById("emailRegister").style.outline = "#ff0000";
		document.getElementById("emailRegister").focus();
	return false;
	}
	if($("#emailRegister").val().indexOf('@')==-1 || $("#emailRegister").val().indexOf('.')==-1){
		$("#check-emailRegister").hide();
		$("#times-emailRegister").show();
		$("#msg-emailRegister").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Insira um <strong>Email cadastrado</strong> válido!</div>');
		document.getElementById("emailRegister").placeholder = "Preencha com um Email válido!";
		document.getElementById("emailRegister").style.borderColor = "#ff0000";
		document.getElementById("emailRegister").style.outline = "#ff0000";
		document.getElementById("emailRegister").focus();
	return false;
	}
	else{
		$("#check-emailRegister").show();
		$("#times-emailRegister").hide();
		$("#msg-emailRegister").hide();
		document.getElementById("emailRegister").style.borderColor = "green";
		document.getElementById("emailRegister").style.outline = "green";
	formEmailRegister();
	}
function formEmailRegister(){
	var emailRegister = $("#emailRegister").val();
	$("#button-submit-emailRegister").html('<a class="btns_pagi_login cursor-class"><i class="fa fa-spinner fa-pulse fa-fw"></i>  Consultando</a>').show();
	$.post(newURL+"/Library/vendor/ajax/ajax.loginemailregister.php",{emailRegister:emailRegister},
	function(resposta){
		if(resposta != 'returnNull'){
			//$("#return-emailRegister").html(resposta).slideDown(3000);
			$("#check-emailRegister").show();
			$("#times-emailRegister").hide();
			$("#msg-emailRegister").hide();
			document.getElementById("emailRegister").style.borderColor = "green";
			document.getElementById("emailRegister").style.outline = "green";
			$("#return-emailRegister").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Email </strong>cadastrado em nossa base! Acesse sua conta!</div>').slideDown(3000);
			$("#button-submit-emailRegister").html('<a onclick="javascript:formEmailRegister();" class="btns_pagi_login cursor-class">Cadastrar</a>').show();
			$("#emailRegister").reset();
		}
		if(resposta === 'returnNull'){
			$("#check-emailRegister").hide();
			$("#times-emailRegister").show();
			document.getElementById("emailRegister").placeholder = "Preencha o Campo!";
			document.getElementById("emailRegister").style.borderColor = "#ff0000";
			document.getElementById("emailRegister").style.outline = "#ff0000";
			document.getElementById("emailRegister").focus();
			window.location.href= newURL+"/cadastrese/";
			$("#return-emailRegister").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Email não </strong>cadastrado em nossa base!</div>').slideDown(3000);
			$("#button-submit-emailRegister").html('<a onclick="javascript:formEmailRegister();" class="btns_pagi_login cursor-class">Cadastrar</a>').show();
			$("#emailRegister").reset();
		}
		else{
			$("#return-emailRegister").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Erro</strong> ao enviar, tente novamente!</div>').slideDown(3000);
			$("#emailRegister").reset();
		}
	});
	return false;
	}
}