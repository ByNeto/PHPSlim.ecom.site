$("#button-submit").html('<button onclick="validaInput()" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;">Enviar</button>');
$("#tel").mask("(00) 0000-00000");
function validaInput(){
	if($("#name").val() === ""){
	$("#msg-name").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome</strong> não pode ser vazio!</div>');
		document.getElementById("name").placeholder = "Preencha o Campo!";
		document.getElementById("name").style.borderColor = "#ff0000";
		document.getElementById("name").style.outline = "#ff0000";
		document.getElementById("name").focus();
	return false;
	}
	if($("#name").val().length < 5){
	$("#msg-name").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome</strong> deve conter mais de 5 caracteres!</div>');
		document.getElementById("name").placeholder = "Minimo 5 caracteres!";
		document.getElementById("name").style.borderColor = "#ff0000";
		document.getElementById("name").style.outline = "#ff0000";
		document.getElementById("name").focus();
	return false;
	}
	if($("#emailContact").val() === ""){
	$("#msg-emailContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email</strong> não pode ser vazio!</div>');
		document.getElementById("emailContact").placeholder = "Preencha o Campo!";
		document.getElementById("emailContact").style.borderColor = "#ff0000";
		document.getElementById("emailContact").style.outline = "#ff0000";
		document.getElementById("emailContact").focus();
	return false;
	}
	if($("#emailContact").val().indexOf('@')==-1 || $("#emailContact").val().indexOf('.')==-1){
	$("#msg-emailContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Insira um <strong>Email</strong> válido!</div>');
		document.getElementById("emailContact").placeholder = "Preencha com um e-mail válido!";
		document.getElementById("emailContact").style.borderColor = "#ff0000";
		document.getElementById("emailContact").style.outline = "#ff0000";
		document.getElementById("emailContact").focus();
	return false;
	}
	if($("#segmento").val() === ""){
	$("#msg-segmento").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Selecione uma opção!</strong></div>');
		document.getElementById("segmento").placeholder = "Selecione a opção";
		document.getElementById("segmento").style.borderColor = "#ff0000";
		document.getElementById("segmento").style.outline = "#ff0000";
		document.getElementById("segmento").focus();
	return false;
	}
	if($("#tel").val() === ""){
	$("#msg-tel").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Telefone</strong> não pode ser vazio!</div>');
		document.getElementById("tel").placeholder = "Preencha o Campo!";
		document.getElementById("tel").style.borderColor = "#ff0000";
		document.getElementById("tel").style.outline = "#ff0000";
		document.getElementById("tel").focus();
	return false;
	}
	if($("#dept").val() === ""){
	$("#msg-dept").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Selecione uma opção!</strong></div>');
		document.getElementById("dept").placeholder = "Preencha o Campo!";
		document.getElementById("dept").style.borderColor = "#ff0000";
		document.getElementById("dept").style.outline = "#ff0000";
		document.getElementById("dept").focus();
	return false;
	}

	if($("#msg").val() === ""){
	$("#msg-msg").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Mensagem</strong> não pode ser vazio!</div>');
		document.getElementById("msg").placeholder = "Preencha o Campo!";
		document.getElementById("msg").style.borderColor = "#ff0000";
		document.getElementById("msg").style.outline = "#ff0000";
		document.getElementById("msg").focus();
	return false;
	}
	else{
		formContact();
	}
}
function formContact(){
	var name = $("#name").val();
	var emailContact = $("#emailContact").val();
	var segmento = $("#segmento").val();
	var tel = $("#tel").val();
	var dept = $("#dept").val();
	var msg = $("#msg").val();
	$("#button-submit").html('<button onclick="validaInput()" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;"><i class="fa fa-spinner fa-pulse fa-fw"></i>  Enviando</button>');
	$.post('../Library/vendor/ajax/ajax.contact.php',{name: name,emailContact: emailContact,segmento: segmento,tel: tel,dept: dept,msg: msg},
	function(resposta){
		if (resposta != false){
				$("#return").html(resposta).slideDown(2000);
				$("#button-submit").html('<button onclick="validaInput()" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;">Enviar</button>');
				$("#name").val("");
				$("#emailContact").val("");
				$("#segmento").val("");
				$("#tel").val("");
				$("#dept").val("");
				$("#msg").val("");
			}
			else{
				$("#name").val("");
				$("#emailContact").val("");
				$("#segmento").val("");
				$("#tel").val("");
				$("#dept").val("");
				$("#msg").val("");
			}
	});
	return false;
}