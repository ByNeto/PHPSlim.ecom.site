function validaInputNewsletterView(){
	if($("#name").val() === ""){
	$("#msg-name").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><center>Campo <strong>Nome</strong> não pode ser vazio!</center></div>');
		document.getElementById("name").placeholder = "Preencha o Campo!"
		document.getElementById("name").style.borderColor = "#ff0000";
		document.getElementById("name").style.outline = "#ff0000";
		document.getElementById("name").focus();
	return false;
	}
	if($("#name").val().length < 5){
	$("#msg-name").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><center>Campo <strong>Nome</strong> deve conter mais de 5 caracteres!</center></div>');
		document.getElementById("name").placeholder = "Minimo 5 caracteres!";
		document.getElementById("name").style.borderColor = "#ff0000";
		document.getElementById("name").style.outline = "#ff0000";
		document.getElementById("name").focus();
	return false;
	}
	else{
		formNewsletterView();
	}
}
function formNewsletterView(){
	var name = $("#name").val();
	var email = $("#email").val();
	$("#msg-name").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><i class="fa fa-spinner fa-pulse fa-fw"></i> <strong>Enviando</strong></div>');
	$.post(newURL+'/Library/vendor/ajax/ajax.newsletterView.php',{name:name,email:email},
	function(resposta){
		if(resposta != false){
			$("#spider-man").hide();
			$("#msg-name").hide();
			$("#msg-newsletter-register").html(resposta).slideDown(2000);
			document.getElementById("name").placeholder = "Insira seu Nome";
			$("#name").val("");
			}
			else{$("#name").val("");}
	});
	return false;
}