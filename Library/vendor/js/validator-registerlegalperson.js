$("#button-submit-pj").html('<button onclick="validaInputRegisterPj();" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;">Enviar</button>&nbsp;&nbsp;<button onclick="" type="button" class="btn_cancelar cursor-class" style="padding:1.5%;width:30%;float: right;">Cancelar</button>');
$('#nameRegisterPj').keyup(function (){this.value = this.value.replace(/[^a-zA-Z.]/g,' ');});
function enterpriseRegisterPj(){
	if($("#enterpriseRegisterPj").val() === ""){
		$("#check-enterpriseRegisterPj").hide();
		$("#times-enterpriseRegisterPj").show();
		$("#msg-enterpriseRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome empresa</strong> não pode ser vazio!</div>');
		document.getElementById("enterpriseRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("enterpriseRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("enterpriseRegisterPj").style.outline = "#ff0000";
		document.getElementById("enterpriseRegisterPj").focus();
	return false;
	}
	if($("#enterpriseRegisterPj").val().length < 5){
		$("#check-enterpriseRegisterPj").hide();
		$("#times-enterpriseRegisterPj").show();
		$("#msg-enterpriseRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome empresa</strong> deve conter mais de 5 caracteres!</div>');
		document.getElementById("enterpriseRegisterPj").placeholder = "Minimo 5 caracteres!";
		document.getElementById("enterpriseRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("enterpriseRegisterPj").style.outline = "#ff0000";
		document.getElementById("enterpriseRegisterPj").focus();
	return false;
	}
	else{
		$("#check-enterpriseRegisterPj").show();
		$("#times-enterpriseRegisterPj").hide();
		$("#msg-enterpriseRegisterPj").hide();
		document.getElementById("enterpriseRegisterPj").style.borderColor = "green";
		document.getElementById("enterpriseRegisterPj").style.outline = "green";
	return false;
	}
}
function nameRegisterPj(){
	if($("#nameRegisterPj").val() === ""){
		$("#check-nameRegisterPj").hide();
		$("#times-nameRegisterPj").show();
		$("#msg-nameRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome pessoa p/ contato</strong> não pode ser vazio!</div>');
		document.getElementById("nameRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("nameRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("nameRegisterPj").style.outline = "#ff0000";
		document.getElementById("nameRegisterPj").focus();
	return false;
	}
	if($("#nameRegisterPj").val().length < 5){
		$("#check-nameRegisterPj").hide();
		$("#times-nameRegisterPj").show();
		$("#msg-nameRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome pessoa p/ contato</strong> deve conter mais de 5 caracteres!</div>');
		document.getElementById("nameRegisterPj").placeholder = "Minimo 5 caracteres!";
		document.getElementById("nameRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("nameRegisterPj").style.outline = "#ff0000";
		document.getElementById("nameRegisterPj").focus();
	return false;
	}
	else{
		$("#check-nameRegisterPj").show();
		$("#times-nameRegisterPj").hide();
		$("#msg-nameRegisterPj").hide();
		document.getElementById("nameRegisterPj").style.borderColor = "green";
		document.getElementById("nameRegisterPj").style.outline = "green";
	return false;
	}
}
function stateRegistrationPj(){
	if($("#stateRegistrationPj").val() === ""){
		$("#check-stateRegistrationPj").hide();
		$("#times-stateRegistrationPj").show();
		$("#msg-stateRegistrationPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Insc. Estadual</strong> não pode ser vazio!</div>');document.getElementById("stateRegistrationPj").placeholder = "Preencha o Campo!";
		document.getElementById("stateRegistrationPj").style.borderColor = "#ff0000";
		document.getElementById("stateRegistrationPj").style.outline = "#ff0000";
		document.getElementById("stateRegistrationPj").focus();
	return false;
	}
	else{
		$("#check-stateRegistrationPj").show();
		$("#times-stateRegistrationPj").hide();
		$("#msg-stateRegistrationPj").hide();
		document.getElementById("stateRegistrationPj").style.borderColor = "green";
		document.getElementById("stateRegistrationPj").style.outline = "green";
	return false;
	}
}

$('#cnpjRegisterPj').mask("00.000.000/0000-00",{reverse: true});
function cnpjRegisterPj(c){
	if($("#cnpjRegisterPj").val() === ""){
		$("#check-cnpjRegisterPj").hide();
		$("#times-cnpjRegisterPj").show();
		$("#msg-cnpjRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CNPJ</strong> não pode ser vazio!</div>');
		document.getElementById("cnpjRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("cnpjRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cnpjRegisterPj").style.outline = "#ff0000";
		document.getElementById("cnpjRegisterPj").focus();
	return false;
	}
	var b = [6,5,4,3,2,9,8,7,6,5,4,3,2];
	if((c = c.replace(/[^\d]/g,"")).length != 14){
		$("#check-cnpjRegisterPj").hide();
		$("#times-cnpjRegisterPj").show();
		$("#msg-cnpjRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CNPJ</strong> inválido!</div>');
		document.getElementById("cnpjRegisterPj").placeholder = "Insira um CNPJ válido!";
		document.getElementById("cnpjRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cnpjRegisterPj").style.outline = "#ff0000";
		document.getElementById("cnpjRegisterPj").focus();
	return false;
	}
	if(/0{14}/.test(c)){
		$("#check-cnpjRegisterPj").hide();
		$("#times-cnpjRegisterPj").show();
		$("#msg-cnpjRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CNPJ</strong> inválido!</div>');
		document.getElementById("cnpjRegisterPj").placeholder = "Insira um CNPJ válido!";
		document.getElementById("cnpjRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cnpjRegisterPj").style.outline = "#ff0000";
		document.getElementById("cnpjRegisterPj").focus();
	return false;
	}
	for (var i = 0, n = 0; i < 12; n += c[i] * b[++i]);
	if(c[12] != (((n %= 11) < 2) ? 0 : 11 - n)){
		$("#check-cnpjRegisterPj").hide();
		$("#times-cnpjRegisterPj").show();
		$("#msg-cnpjRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CNPJ</strong> inválido!</div>');
		document.getElementById("cnpjRegisterPj").placeholder = "Insira um CNPJ válido!";
		document.getElementById("cnpjRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cnpjRegisterPj").style.outline = "#ff0000";
		document.getElementById("cnpjRegisterPj").focus();
	return false;
	}
	for (var i = 0, n = 0; i <= 12; n += c[i] * b[i++]);
	if(c[13] != (((n %= 11) < 2) ? 0 : 11 - n)){
		$("#check-cnpjRegisterPj").hide();
		$("#times-cnpjRegisterPj").show();
		$("#msg-cnpjRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CNPJ</strong> inválido!</div>');
		document.getElementById("cnpjRegisterPj").placeholder = "Insira um CNPJ válido!";
		document.getElementById("cnpjRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cnpjRegisterPj").style.outline = "#ff0000";
		document.getElementById("cnpjRegisterPj").focus();
	return false;
	}
	else{
		$("#check-cnpjRegisterPj").show();
		$("#times-cnpjRegisterPj").hide();
		$("#msg-cnpjRegisterPj").hide();
		document.getElementById("cnpjRegisterPj").style.borderColor = "green";
		document.getElementById("cnpjRegisterPj").style.outline = "green";
		cnpjCheckDataBasePj(c);
	return false;
	}
return true;
}

function cnpjCheckDataBasePj(x){
		var cnpjRegisterPj = $("#cnpjRegisterPj").val().replace(/[^0-9]/g, '').toString();
		$.ajax({
				dataType: 'html',
				type:'POST',
				data:{cnpjRegisterPj:cnpjRegisterPj},
				url: newURL+"/Library/vendor/ajax/ajax.registercnpj.php",
				success: function(data){
					if(data === 'returnNull'){
					return true;
					}
					else{
						$("#check-cnpjRegisterPj").hide();
						$("#times-cnpjRegisterPj").show();
						$("#msg-cnpjRegisterPj").hide();
						$("#valid-cnpjRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CNPJ</strong> já cadastrado no sistema!</div>');
							document.getElementById("cnpjRegisterPj").placeholder = "CNPJ já cadastrado no sistema!";
							document.getElementById("cnpjRegisterPj").style.borderColor = "#ff0000";
							document.getElementById("cnpjRegisterPj").style.outline = "#ff0000";
							document.getElementById("cnpjRegisterPj").focus();
						return false;
					}
				},
				error: function(data){
					alert('Erro: '+data);// tratar retorno no html.
				}
		});
		return false;
	}

$('#cepRegisterPj').mask('00000-000',{reverse: true});
function cepRegisterPj(){
	if($("#cepRegisterPj").val() === ""){
		$("#check-cepRegisterPj").hide();
		$("#times-cepRegisterPj").show();
		$("#msg-cepRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CEP</strong> não pode ser vazio!</div>');
		document.getElementById("cepRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("cepRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cepRegisterPj").style.outline = "#ff0000";
		document.getElementById("cepRegisterPj").focus();
	return false;
	}
	else{
		$("#check-cepRegisterPj").show();
		$("#times-cepRegisterPj").hide();
		$("#msg-cepRegisterPj").hide();
		document.getElementById("cepRegisterPj").style.borderColor = "green";
		document.getElementById("cepRegisterPj").style.outline = "green";
		cepAutocompletePf($("#cepRegisterPj").val());
		return false;
	}
}
function cepAutocompletePj(x){
	document.getElementById("cepRegisterPj").placeholder = "Preencha o Campo!";
	$("#loaderCepPj").html('&nbsp;&nbsp; Buscando Endereço <i class="fa fa-spinner fa-pulse fa-fw"></i>');
	$.ajax({
		url: "https://viacep.com.br/ws/"+x+"/json/",
		type: 'GET',
		dataType: 'html',
		contentType: 'application/json;',
		success: function (result){
		var arrayError = result.split('{');
			arrayErrorFormatOne = arrayError[1].replace('"', '');
			arrayErrorFormatTwo = arrayErrorFormatOne.replace('"', '');
			arrayErrorFormatThree = arrayErrorFormatTwo.replace('}', '');
			arrayErrorFormatFour = arrayErrorFormatThree.replace('true', '');
			errorFormat = arrayErrorFormatFour.trim();
		if(errorFormat == "erro:"){
			$("#check-cepRegisterPj").hide();
			$("#check-logradouroRegisterPj").hide();
			$("#loaderCepPj").html('&nbsp;&nbsp;<font class="text-red">Endereço não localizado!</font>');
			$("#times-logradouroRegisterPj").show();
			$("#check-logradouroRegisterPj").hide();
			document.getElementById("logradouroRegisterPj").value = "";
			document.getElementById("logradouroRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("logradouroRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("logradouroRegisterPj").style.outline = "#ff0000";
			document.getElementById("logradouroRegisterPj").focus();
			$("#times-numberRegisterPj").show();
			$("#check-numberRegisterPj").hide();
			document.getElementById("numberRegisterPj").value = "";
			document.getElementById("numberRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("numberRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("numberRegisterPj").style.outline = "#ff0000";
			$("#times-neighborhoodRegisterPj").show();
			$("#check-neighborhoodRegisterPj").hide();
			document.getElementById("neighborhoodRegisterPj").value = "";
			document.getElementById("neighborhoodRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("neighborhoodRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("neighborhoodRegisterPj").style.outline = "#ff0000";
			$("#times-cityRegisterPj").show();
			$("#check-cityRegisterPj").hide();
			document.getElementById("cityRegisterPj").value = "";
			document.getElementById("cityRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("cityRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("cityRegisterPj").style.outline = "#ff0000";
			$("#times-ufRegisterPj").show();
			$("#check-ufRegisterPj").hide();
			document.getElementById("ufRegisterPj").value = "";
			document.getElementById("ufRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("ufRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("ufRegisterPj").style.outline = "#ff0000";
		return false;
		}
		else{
		var array = result.split(',');
		cep = array[0].split(':');cepFormat = cep[1].replace('"', '');cepValid = cepFormat.replace('"', '');
		logradouro = array[1].split(':');logradouroFormat = logradouro[1].replace('"', '');logradouroValid = logradouroFormat.replace('"', '');
		bairro = array[3].split(':');bairroFormat = bairro[1].replace('"', '');bairroValid = bairroFormat.replace('"', '');
		localidade = array[4].split(':');localidadeFormat = localidade[1].replace('"', '');localidadeValid = localidadeFormat.replace('"', '');
		uf = array[5].split(':');ufFormat = uf[1].replace('"', '');ufValid = ufFormat.replace('"', '');
		$("#loaderCepPj").html('&nbsp;&nbsp;<font class="text-green">Endereço localizado!</font>');$('#logradouroRegisterPj').val(logradouroValid);$('#neighborhoodRegisterPj').val(bairroValid);$('#cityRegisterPj').val(localidadeValid);$('#ufRegisterPj').val(ufValid);
		$("#msg-cepRegisterPj").hide();
		$("#times-cepRegisterPj").hide();
		$("#check-cepRegisterPj").show();
		document.getElementById("cepRegisterPj").style.borderColor = "green";
		document.getElementById("cepRegisterPj").style.outline = "green";
		if(logradouroValid==null || logradouroValid==0 || logradouroValid=='' || logradouroValid==""){
			$("#times-logradouroRegisterPj").show();
			$("#check-logradouroRegisterPj").hide();
			document.getElementById("logradouroRegisterPj").value = "";
			document.getElementById("logradouroRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("logradouroRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("logradouroRegisterPj").style.outline = "#ff0000";
		}
		numberRegisterPj();
		if(bairroValid==null || bairroValid==0 || bairroValid=='' || bairroValid==""){
			$("#times-neighborhoodRegisterPj").show();
			$("#check-neighborhoodRegisterPj").hide();
			document.getElementById("neighborhoodRegisterPj").value = "";
			document.getElementById("neighborhoodRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("neighborhoodRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("neighborhoodRegisterPj").style.outline = "#ff0000";
		}
		if(localidadeValid==null || localidadeValid==0 || localidadeValid=='' || localidadeValid==""){
			$("#times-cityRegisterPj").show();
			$("#check-cityRegisterPj").hide();
			document.getElementById("cityRegisterPj").value = "";
			document.getElementById("cityRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("cityRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("cityRegisterPj").style.outline = "#ff0000";
		}
		if(ufValid==null || ufValid==0 || ufValid=='' || ufValid==""){
			$("#times-ufRegisterPj").show();
			$("#check-ufRegisterPj").hide();
			document.getElementById("ufRegisterPj").value = "";
			document.getElementById("ufRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("ufRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("ufRegisterPj").style.outline = "#ff0000";
		}
	}},
		error: function (error){
			$("#check-cepRegisterPj").hide();
			$("#check-logradouroRegisterPj").hide();
			$("#loaderCepPj").html('&nbsp;&nbsp;<font class="text-red">Endereço não localizado!</font>');
			$("#times-logradouroRegisterPj").show();
			$("#check-logradouroRegisterPj").hide();
			document.getElementById("logradouroRegisterPj").value = "";
			document.getElementById("logradouroRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("logradouroRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("logradouroRegisterPj").style.outline = "#ff0000";
			document.getElementById("logradouroRegisterPj").focus();
			$("#times-numberRegisterPj").show();
			$("#check-numberRegisterPj").hide();
			document.getElementById("numberRegisterPj").value = "";
			document.getElementById("numberRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("numberRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("numberRegisterPj").style.outline = "#ff0000";
			$("#times-neighborhoodRegisterPj").show();
			$("#check-neighborhoodRegisterPj").hide();
			document.getElementById("neighborhoodRegisterPj").value = "";
			document.getElementById("neighborhoodRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("neighborhoodRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("neighborhoodRegisterPj").style.outline = "#ff0000";
			$("#times-cityRegisterPj").show();
			$("#check-cityRegisterPj").hide();
			document.getElementById("cityRegisterPj").value = "";
			document.getElementById("cityRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("cityRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("cityRegisterPj").style.outline = "#ff0000";
			$("#times-ufRegisterPj").show();
			$("#check-ufRegisterPj").hide();
			document.getElementById("ufRegisterPj").value = "";
			document.getElementById("ufRegisterPj").placeholder = "Preencha o Campo!";
			document.getElementById("ufRegisterPj").style.borderColor = "#ff0000";
			document.getElementById("ufRegisterPj").style.outline = "#ff0000";
		return false;
		}
	});
}
function logradouroRegisterPj(){
	if($("#logradouroRegisterPj").val() === ""){
	$("#check-logradouroRegisterPj").hide();
	$("#times-logradouroRegisterPj").show();
	$("#msg-logradouroRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Endereço</strong> não pode ser vazio!</div>');
		document.getElementById("logradouroRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("logradouroRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("logradouroRegisterPj").style.outline = "#ff0000";
		document.getElementById("logradouroRegisterPj").focus();
	}
	else{
		$("#check-logradouroRegisterPj").show();
		$("#times-logradouroRegisterPj").hide();
		$("#msg-logradouroRegisterPj").hide();
		document.getElementById("logradouroRegisterPj").style.borderColor = "green";
		document.getElementById("logradouroRegisterPj").style.outline = "green";
	}
}
function numberRegisterPj(){
	if($("#numberRegisterPj").val() === ""){
		$("#check-numberRegisterPj").hide();
		$("#times-numberRegisterPj").show();
		$("#msg-numberRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero</strong> não pode ser vazio!</div>');
		document.getElementById("numberRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("numberRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("numberRegisterPj").style.outline = "#ff0000";
		document.getElementById("numberRegisterPj").focus();
	}
	else{
		$("#check-numberRegisterPj").show();
		$("#times-numberRegisterPj").hide();
		$("#msg-numberRegisterPj").hide();
		document.getElementById("numberRegisterPj").style.borderColor = "green";
		document.getElementById("numberRegisterPj").style.outline = "green";
	}
}
function neighborhoodRegisterPj(){
	if($("#neighborhoodRegisterPj").val() === ""){
		$("#check-neighborhoodRegisterPj").hide();
		$("#times-neighborhoodRegisterPj").show();
		$("#msg-neighborhoodRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Bairro</strong> não pode ser vazio!</div>');
		document.getElementById("neighborhoodRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("neighborhoodRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("neighborhoodRegisterPj").style.outline = "#ff0000";
		document.getElementById("neighborhoodRegisterPj").focus();
	}
	else{
		$("#check-neighborhoodRegisterPj").show();
		$("#times-neighborhoodRegisterPj").hide();
		$("#msg-neighborhoodRegisterPj").hide();
		document.getElementById("neighborhoodRegisterPj").style.borderColor = "green";
		document.getElementById("neighborhoodRegisterPj").style.outline = "green";
	}
}
function cityRegisterPj(){
	if($("#cityRegisterPj").val() === ""){
		$("#check-cityRegisterPj").hide();
		$("#times-cityRegisterPj").show();
		$("#msg-cityRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Cidade</strong> não pode ser vazio!</div>');
		document.getElementById("cityRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("cityRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cityRegisterPj").style.outline = "#ff0000";
		document.getElementById("cityRegisterPj").focus();
	}
	else{
		$("#check-cityRegisterPj").show();
		$("#times-cityRegisterPj").hide();
		$("#msg-cityRegisterPj").hide();
		document.getElementById("cityRegisterPj").style.borderColor = "green";
		document.getElementById("cityRegisterPj").style.outline = "green";
	}
}
function ufRegisterPj(){
	if($("#ufRegisterPj").val() === ""){
		$("#check-ufRegisterPj").hide();
		$("#times-ufRegisterPj").show();
		$("#msg-ufRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Estado</strong> não pode ser vazio!</div>');
		document.getElementById("ufRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("ufRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("ufRegisterPj").style.outline = "#ff0000";
		document.getElementById("ufRegisterPj").focus();
	}
	else{
		$("#check-ufRegisterPj").show();
		$("#times-ufRegisterPj").hide();
		$("#msg-ufRegisterPj").hide();
		document.getElementById("ufRegisterPj").style.borderColor = "green";
		document.getElementById("ufRegisterPj").style.outline = "green";
	}
}
function segmentPj(){
	if($("#segmentPj").val() === ""){
		$("#check-segmentPj").hide();
		$("#times-segmentPj").show();
		$("#msg-segmentPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Selecione uma <strong>opção!</strong></div>');
		document.getElementById("segmentPj").placeholder = "Selecione uma opção";
		document.getElementById("segmentPj").style.borderColor = "#ff0000";
		document.getElementById("segmentPj").style.outline = "#ff0000";
		document.getElementById("segmentPj").focus();
	}
	else{
		$("#check-segmentPj").show();
		$("#times-segmentPj").hide();
		$("#msg-segmentPj").hide();
		document.getElementById("segmentPj").style.borderColor = "green";
		document.getElementById("segmentPj").style.outline = "green";
	}
}

$('#telRegisterPj').mask('(00) 0000-0000');
$('#celRegisterPj').mask('(00) 00000-0000');

function telRegisterPj(){
	if($("#telRegisterPj").val() === ""){
		$("#check-telRegisterPj").hide();
		$("#times-telRegisterPj").show();
		$("#msg-telRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Telefone</strong> não pode ser vazio!</div>');
		document.getElementById("telRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("telRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("telRegisterPj").style.outline = "#ff0000";
		document.getElementById("telRegisterPj").focus();
	}
	else{
		$("#check-telRegisterPj").show();
		$("#times-telRegisterPj").hide();
		$("#msg-telRegisterPj").hide();
		document.getElementById("telRegisterPj").style.borderColor = "green";
		document.getElementById("telRegisterPj").style.outline = "green";
	}
}

function emailRegisterPj(){
	if($("#emailRegisterPj").val() === ""){
		$("#check-emailRegisterPj").hide();
		$("#times-emailRegisterPj").show();
		$("#msg-emailRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email</strong> não pode ser vazio!</div>');
		document.getElementById("emailRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("emailRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterPj").style.outline = "#ff0000";
		document.getElementById("emailRegisterPj").focus();
	return false;
	}
	if($("#emailRegisterPj").val().indexOf('@')==-1 || $("#emailRegisterPj").val().indexOf('.')==-1){
		$("#check-emailRegisterPj").hide();
		$("#times-emailRegisterPj").show();
		$("#msg-emailRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Insira um <strong>Email</strong> válido!</div>');
		document.getElementById("emailRegisterPj").placeholder = "Preencha com um e-mail válido!";
		document.getElementById("emailRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterPj").style.outline = "#ff0000";
		document.getElementById("emailRegisterPj").focus();
	return false;
	}
	else{
		$("#check-emailRegisterPj").show();
		$("#times-emailRegisterPj").hide();
		$("#msg-emailRegisterPj").hide();
		document.getElementById("emailRegisterPj").style.borderColor = "green";
		document.getElementById("emailRegisterPj").style.outline = "green";
	return false;
	}
}
function emailRegisterNfePj(){
	if($("#emailRegisterNfePj").val() === ""){
		$("#check-emailRegisterNfePj").hide();
		$("#times-emailRegisterNfePj").show();
		$("#msg-emailRegisterNfePj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email NF-e</strong> não pode ser vazio!</div>');
		document.getElementById("emailRegisterNfePj").placeholder = "Preencha o Campo!";
		document.getElementById("emailRegisterNfePj").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterNfePj").style.outline = "#ff0000";
		document.getElementById("emailRegisterNfePj").focus();
	return false;
	}
	if($("#emailRegisterNfePj").val().indexOf('@')==-1 || $("#emailRegisterNfePj").val().indexOf('.')==-1){
		$("#check-emailRegisterNfePj").hide();
		$("#times-emailRegisterNfePj").show();
		$("#msg-emailRegisterNfePj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Insira um <strong>Email NF-e</strong> válido!</div>');
		document.getElementById("emailRegisterNfePj").placeholder = "Preencha com um e-mail válido!";
		document.getElementById("emailRegisterNfePj").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterNfePj").style.outline = "#ff0000";
		document.getElementById("emailRegisterNfePj").focus();
	return false;
	}
	else{
		$("#check-emailRegisterNfePj").show();
		$("#times-emailRegisterNfePj").hide();
		$("#msg-emailRegisterNfePj").hide();
		document.getElementById("emailRegisterNfePj").style.borderColor = "green";
		document.getElementById("emailRegisterNfePj").style.outline = "green";
	return false;
	}
}

function passwordRegisterPj(){
	if($("#passwordRegisterPj").val() === ""){
		$("#check-passwordRegisterPj").hide();
		$("#times-passwordRegisterPj").show();
		$("#msg-passwordRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Senha</strong> não pode ser vazio!</div>');
		document.getElementById("passwordRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("passwordRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("passwordRegisterPj").style.outline = "#ff0000";
		document.getElementById("passwordRegisterPj").focus();
	return false;
	}
	if($("#passwordRegisterPj").val().length < 6){
		$("#check-passwordRegisterPj").hide();
		$("#times-passwordRegisterPj").show();
		$("#msg-passwordRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Senha</strong> deve conter 6 ou mais caracteres!</div>');
		document.getElementById("passwordRegisterPj").placeholder = "Minimo 6 caracteres!";
		document.getElementById("passwordRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("passwordRegisterPj").style.outline = "#ff0000";
		document.getElementById("passwordRegisterPj").focus();
	return false;
	}
	else{
		$("#check-passwordRegisterPj").show();
		$("#times-passwordRegisterPj").hide();
		$("#msg-passwordRegisterPj").hide();
		document.getElementById("passwordRegisterPj").style.borderColor = "green";
		document.getElementById("passwordRegisterPj").style.outline = "green";
	return false;
	}
}
function passwordRepitRegisterPj(){
	if($("#passwordRepitRegisterPj").val() === ""){
		$("#check-passwordRepitRegisterPj").hide();
		$("#times-passwordRepitRegisterPj").show();
		$("#msg-passwordRepitRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Repetir Senha</strong> não pode ser vazio!</div>');
		document.getElementById("passwordRepitRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("passwordRepitRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("passwordRepitRegisterPj").style.outline = "#ff0000";
	return false;
	}
	if($("#passwordRepitRegisterPj").val() != $("#passwordRegisterPj").val()){
		$("#check-passwordRepitRegisterPj").hide();
		$("#times-passwordRepitRegisterPj").show();
		$("#msg-passwordRepitRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>As <strong>Senhas</strong> devem ser iguais!</div>');
		document.getElementById("passwordRepitRegisterPj").placeholder = "Senha não confere!";
		document.getElementById("passwordRepitRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("passwordRepitRegisterPj").style.outline = "#ff0000";
	return false;
	}
	else{
		$("#check-passwordRepitRegisterPj").show();
		$("#times-passwordRepitRegisterPj").hide();
		$("#msg-passwordRepitRegisterPj").hide();
		document.getElementById("passwordRepitRegisterPj").style.borderColor = "green";
		document.getElementById("passwordRepitRegisterPj").style.outline = "green";
	return false;
	}
}
function progressPj(percent, $element, velocity){
	percent = percent >= 100 ? 100 : percent;
	var progressBarWidth = percent * $element.width() / 100;
	$element.find('div').stop().animate({ width: progressBarWidth }, velocity, "linear").html(percent + "% ");
}
$('#passwordRegisterPj').on('input', function(){
	var value = $(this).val();
	var progressValue = $('#progressPj div');
	var color, percent = 0;
	var passw= /^[A-Za-z]\w{7,14}$/;
	var passw2= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	var paswd3= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
if($('#passwordRegisterPj').val() === ""){$('#progressPj').hide();}
else if(value.length <= 5){$('#progressPj').hide();}
else if(value.length <= 6){color = "#8B0000";percent = 15;$('#progressPj').show();}
else if(value.match(passw)){color = "#EE0000";percent = 30;$('#progressPj').show();}
else if(value.match(passw2)){color = "#CD6600";percent = 45;$('#progressPj').show();}
else if(value.match(passw3)){color = "#FFA500";percent = 60;$('#progressPj').show();}
else if(value.match(passw) && value.match(passw2) && value.match(passw3)){color = "#FFD700";percent = 75;$('#progressPj').show();}
else if(value.length <= 8 && value.match(passw) && value.match(passw2) && value.match(passw3)){color = "#008B00";percent = 90;$('#progressPj').show();}
else if(value.length <= 10 && value.match(passw) && value.match(passw2) && value.match(passw3)){color = "#458B00";percent = 100;$('#progressPj').show();}
else{color = "#458B00";percent = 100;$('#progressPj').show();}
progressPj(percent, $('#progressPj'), 300);
progressValue.css("background", color);
$('#progressPj').css("border", "1px solid " + color);
})


function validaInputRegisterPj(){
	if($("#enterpriseRegisterPj").val() === ""){
		$("#msg-enterpriseRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome empresa</strong> não pode ser vazio!</div>');
		document.getElementById("enterpriseRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("enterpriseRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("enterpriseRegisterPj").style.outline = "#ff0000";
		document.getElementById("enterpriseRegisterPj").focus();
		$('#enterpriseRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#nameRegisterPj").val() === ""){
	$("#msg-nameRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome pessoa p/ contato</strong> não pode ser vazio!</div>');
		document.getElementById("nameRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("nameRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("nameRegisterPj").style.outline = "#ff0000";
		document.getElementById("nameRegisterPj").focus();
		$('#nameRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#cnpjRegisterPj").val() === ""){
	$("#msg-cnpjRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CNPJ</strong> não pode ser vazio!</div>');
		document.getElementById("cnpjRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("cnpjRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cnpjRegisterPj").style.outline = "#ff0000";
		document.getElementById("cnpjRegisterPj").focus();
		$('#cnpjRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#cepRegisterPj").val() === ""){
	$("#msg-cepRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CEP</strong> não pode ser vazio!</div>');
		document.getElementById("cepRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("cepRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cepRegisterPj").style.outline = "#ff0000";
		document.getElementById("cepRegisterPj").focus();
		$('#cepRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#logradouroRegisterPj").val() === ""){
	$("#msg-logradouroRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Endereço</strong> não pode ser vazio!</div>');
		document.getElementById("logradouroRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("logradouroRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("logradouroRegisterPj").style.outline = "#ff0000";
		document.getElementById("logradouroRegisterPj").focus();
		$('#logradouroRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#numberRegisterPj").val() === ""){
	$("#msg-numberRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero</strong> não pode ser vazio!</div>');
		document.getElementById("numberRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("numberRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("numberRegisterPj").style.outline = "#ff0000";
		document.getElementById("numberRegisterPj").focus();
		$('#numberRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#neighborhoodRegisterPj").val() === ""){
	$("#msg-neighborhoodRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Bairro</strong> não pode ser vazio!</div>');
		document.getElementById("neighborhoodRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("neighborhoodRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("neighborhoodRegisterPj").style.outline = "#ff0000";
		document.getElementById("neighborhoodRegisterPj").focus();
		$('#neighborhoodRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#cityRegisterPj").val() === ""){
	$("#msg-cityRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Cidade</strong> não pode ser vazio!</div>');
		document.getElementById("cityRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("cityRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("cityRegisterPj").style.outline = "#ff0000";
		document.getElementById("cityRegisterPj").focus();
		$('#cityRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#ufRegisterPj").val() === ""){
	$("#msg-ufRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Estado</strong> não pode ser vazio!</div>');
		document.getElementById("ufRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("ufRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("ufRegisterPj").style.outline = "#ff0000";
		document.getElementById("ufRegisterPj").focus();
		$('#ufRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#segmentPj").val() === ""){
		$("#msg-segmentPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Selecione uma <strong>opção!</strong></div>');
		document.getElementById("segmentPj").placeholder = "Selecione uma opção";
		document.getElementById("segmentPj").style.borderColor = "#ff0000";
		document.getElementById("segmentPj").style.outline = "#ff0000";
		document.getElementById("segmentPj").focus();
		$('#segmentPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#telRegisterPj").val() === ""){
	$("#msg-telRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Telefone</strong> não pode ser vazio!</div>');
		document.getElementById("telRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("telRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("telRegisterPj").style.outline = "#ff0000";
		document.getElementById("telRegisterPj").focus();
		$('#telRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#emailRegisterPj").val() === ""){
	$("#msg-emailRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email válido</strong> não pode ser vazio!</div>');
		document.getElementById("emailRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("emailRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterPj").style.outline = "#ff0000";
		document.getElementById("emailRegisterPj").focus();
		$('#emailRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#emailRegisterNfePj").val() === ""){
	$("#msg-emailRegisterNfePj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email NF-e válido</strong> não pode ser vazio!</div>');
		document.getElementById("emailRegisterNfePj").placeholder = "Preencha o Campo!";
		document.getElementById("emailRegisterNfePj").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterNfePj").style.outline = "#ff0000";
		document.getElementById("emailRegisterNfePj").focus();
		$('#emailRegisterNfePj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#passwordRegisterPj").val() === ""){
	$("#msg-passwordRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Senha</strong> não pode ser vazio!</div>');
		document.getElementById("passwordRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("passwordRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("passwordRegisterPj").style.outline = "#ff0000";
		document.getElementById("passwordRegisterPj").focus();
		$('#passwordRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#passwordRepitRegisterPj").val() === ""){
	$("#msg-passwordRepitRegisterPj").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Repetir Senha</strong> não pode ser vazio!</div>');
		document.getElementById("passwordRepitRegisterPj").placeholder = "Preencha o Campo!";
		document.getElementById("passwordRepitRegisterPj").style.borderColor = "#ff0000";
		document.getElementById("passwordRepitRegisterPj").style.outline = "#ff0000";
		document.getElementById("passwordRepitRegisterPj").focus();
		$('#passwordRepitRegisterPj').animate({scrollTop:0}, 'slow');
	return false;
	}
	else{
		formRegisterLegalPerson();
	}
}







	function formRegisterLegalPerson(){
	var enterpriseRegisterPj = $("#enterpriseRegisterPj").val();
	var nameRegisterPj = $("#nameRegisterPj").val();
	var stateRegistrationPj = $("#stateRegistrationPj").val();
	var cnpjRegisterPj = $("#cnpjRegisterPj").val();
	var cepRegisterPj = $("#cepRegisterPj").val();
	var logradouroRegisterPj = $("#logradouroRegisterPj").val();
	var numberRegisterPj = $("#numberRegisterPj").val();
	var completeRegisterPj = $("#completeRegisterPj").val();
	var neighborhoodRegisterPj = $("#neighborhoodRegisterPj").val();
	var cityRegisterPj = $("#cityRegisterPj").val();
	var ufRegisterPj = $("#ufRegisterPj").val();
	var segmentPj = $("#segmentPj").val();
	var telRegisterPj = $("#telRegisterPj").val();
	var celRegisterPj = $("#celRegisterPj").val();
	var emailRegisterPj = $("#emailRegisterPj").val();
	var emailRegisterNfePj = $("#emailRegisterNfePj").val();
	var passwordRegisterPj = $("#passwordRegisterPj").val();
	var otherRegisterPj = $("#otherRegisterPj").val();
	$("#button-submit-pf").html('<button onclick="validaInputRegisterPj();" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;"><i class="fa fa-spinner fa-pulse fa-fw"></i>  Enviando</button>&nbsp;&nbsp;<button onclick="" type="button" class="btn_cancelar cursor-class" style="padding:1.5%;width:30%;float: right;">Cancelar</button>');
	$.post(newURL+"/Library/vendor/ajax/ajax.registerlegalperson.php",{enterpriseRegisterPj:enterpriseRegisterPj,nameRegisterPj:nameRegisterPj,stateRegistrationPj:stateRegistrationPj,cnpjRegisterPj:cnpjRegisterPj,cepRegisterPj:cepRegisterPj,logradouroRegisterPj:logradouroRegisterPj,numberRegisterPj:numberRegisterPj,completeRegisterPj:completeRegisterPj,neighborhoodRegisterPj:neighborhoodRegisterPj,cityRegisterPj:cityRegisterPj,ufRegisterPj:ufRegisterPj,segmentPj:segmentPj,telRegisterPj:telRegisterPj,celRegisterPj:celRegisterPj,emailRegisterPj:emailRegisterPj,emailRegisterNfePj:emailRegisterNfePj,passwordRegisterPj:passwordRegisterPj,otherRegisterPj:otherRegisterPj},
	function(resposta){
		if(resposta != false){
			$("#return-pj").html(resposta).slideDown(3000);
			$("#button-submit-pj").html('<button onclick="validaInputRegisterPj();" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;">Enviar</button>&nbsp;&nbsp;<button onclick="" type="button" class="btn_cancelar cursor-class" style="padding:1.5%;width:30%;float: right;">Cancelar</button>');
			$("#enterpriseRegisterPj").reset();
			$("#nameRegisterPj").reset();
			$("#stateRegistrationPj").reset();
			$("#cnpjRegisterPj").reset();
			$("#cepRegisterPj").reset();
			$("#logradouroRegisterPj").reset();
			$("#numberRegisterPj").reset();
			$("#completeRegisterPj").reset();
			$("#neighborhoodRegisterPj").reset();
			$("#cityRegisterPj").reset();
			$("#ufRegisterPj").reset();
			$("#segmentPj").reset();
			$("#telRegisterPj").reset();
			$("#celRegisterPj").reset();
			$("#emailRegisterPj").reset();
			$("#emailRegisterNfePj").reset();
			$("#passwordRegisterPj").reset();
			$("#otherRegisterPj").reset();
			}
			else{
			$("#enterpriseRegisterPj").reset();
			$("#nameRegisterPj").reset();
			$("#stateRegistrationPj").reset();
			$("#cnpjRegisterPj").reset();
			$("#cepRegisterPj").reset();
			$("#logradouroRegisterPj").reset();
			$("#numberRegisterPj").reset();
			$("#completeRegisterPj").reset();
			$("#neighborhoodRegisterPj").reset();
			$("#cityRegisterPj").reset();
			$("#ufRegisterPj").reset();
			$("#segmentPj").reset();
			$("#telRegisterPj").reset();
			$("#celRegisterPj").reset();
			$("#emailRegisterPj").reset();
			$("#emailRegisterNfePj").reset();
			$("#passwordRegisterPj").reset();
			$("#otherRegisterPj").reset();
			}
	});
	return false;
}