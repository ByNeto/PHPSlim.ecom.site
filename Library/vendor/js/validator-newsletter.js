function validaInputNewsletter(){
	if($("#email").val() === ""){
	$("#msg-email").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email</strong> não pode ser vazio!</div>');
		document.getElementById("email").placeholder = "Preencha o Campo!";
		document.getElementById("email").style.borderColor = "#ff0000";
		document.getElementById("email").style.outline = "#ff0000";
		document.getElementById("email").focus();
	return false;
	}
	if($("#email").val().indexOf('@')==-1 || $("#email").val().indexOf('.')==-1){
	$("#msg-email").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Insira um <strong>Email</strong> válido!</div>');
		document.getElementById("email").placeholder = "Preencha com um e-mail válido!";
		document.getElementById("email").style.borderColor = "#ff0000";
		document.getElementById("email").style.outline = "#ff0000";
		document.getElementById("email").focus();
	return false;
	}
	else{
		formNewsletter();
	}
}
function formNewsletter(){
	var email = $("#email").val();
	$("#msg-email").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><i class="fa fa-spinner fa-pulse fa-fw"></i> <strong>Enviando</strong></div>');
	$.post(newURL+"/Library/vendor/ajax/ajax.newsletter.php",{email:email},
	function(resposta){
		if(resposta != false){
			$("#msg-email").hide();
			$("#msg-newsletter").html(resposta).slideDown(2000);
			document.getElementById("email").placeholder = "Insira seu e-mail";
			$("#email").val("");
			$('#ModalNewsletter').modal('show');//setInterval(function(){$('#ModalNewsletter').modal('hide');},6500);
			}
			else{$("#email").val("");}
	});
	return false;
}