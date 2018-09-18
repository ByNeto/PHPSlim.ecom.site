$("#button-submit-pf").html('<button onclick="validaInputRegisterPf();" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;">Enviar</button>&nbsp;&nbsp;<button onclick="" type="button" class="btn_cancelar cursor-class" style="padding:1.5%;width:30%;float: right;">Cancelar</button>');
$('#nameRegisterPf').keyup(function (){this.value = this.value.replace(/[^a-zA-Z.]/g,' ');});
function nameRegisterPf(){
	if($("#nameRegisterPf").val() === ""){
		$("#check-nameRegisterPf").hide();
		$("#times-nameRegisterPf").show();
		$("#msg-nameRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome completo</strong> não pode ser vazio!</div>').show().slideDown(2000);
		document.getElementById("nameRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("nameRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("nameRegisterPf").style.outline = "#ff0000";
		document.getElementById("nameRegisterPf").focus();
	return false;
	}
	else if($("#nameRegisterPf").val().length < 5){
		$("#check-nameRegisterPf").hide();
		$("#times-nameRegisterPf").show();
		$("#msg-nameRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome completo</strong> deve conter mais de 5 caracteres!</div>');
		document.getElementById("nameRegisterPf").placeholder = "Minimo 5 caracteres!";
		document.getElementById("nameRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("nameRegisterPf").style.outline = "#ff0000";
		document.getElementById("nameRegisterPf").focus();
	return false;
	}
	else{
		$("#check-nameRegisterPf").show();
		$("#times-nameRegisterPf").hide();
		$("#msg-nameRegisterPf").hide();
		document.getElementById("nameRegisterPf").style.borderColor = "green";
		document.getElementById("nameRegisterPf").style.outline = "green";
		return false;
	}
}

$('#rgRegisterPf').mask("00.000.000-0",{reverse: true});
function rgRegisterPf(){
	if($("#rgRegisterPf").val() === ""){
		$("#check-rgRegisterPf").hide();
		$("#times-rgRegisterPf").show();
		$("#msg-rgRegisterPf").html('<div class="alert alert-danger" role="alert"><button type="button" class="close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>RG</strong> não pode ser vazio!</div>');
		document.getElementById("rgRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("rgRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("rgRegisterPf").style.outline = "#ff0000";
		document.getElementById("rgRegisterPf").focus();
	return false;
	}
	else if($("#rgRegisterPf").val().length < 8){
		$("#check-rgRegisterPf").hide();
		$("#times-rgRegisterPf").show();
		$("#msg-rgRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>RG</strong> deve conter mais de 8 caracteres!</div>');
		document.getElementById("rgRegisterPf").placeholder = "Minimo 8 caracteres!";
		document.getElementById("rgRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("rgRegisterPf").style.outline = "#ff0000";
		document.getElementById("rgRegisterPf").focus();
	return false;
	}
	else{
		$("#check-rgRegisterPf").show();
		$("#times-rgRegisterPf").hide();
		$("#msg-rgRegisterPf").hide();
		document.getElementById("rgRegisterPf").style.borderColor = "green";
		document.getElementById("rgRegisterPf").style.outline = "green";
		return false;
	}
}

$('#cpfRegisterPf').mask("000.000.000-00", {reverse: true});
function cpfRegisterPf(){
	if($("#cpfRegisterPf").val() === ""){
		$("#check-cpfRegisterPf").hide();
		$("#times-cpfRegisterPf").show();
		$("#valid-cpfRegisterPf").hide();
		$("#msg-cpfRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CPF</strong> não pode ser vazio!</div>').show();
		document.getElementById("cpfRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("cpfRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cpfRegisterPf").style.outline = "#ff0000";
		document.getElementById("cpfRegisterPf").focus();
	return false;
	}
	if($("#cpfRegisterPf").val() === "000.000.000-00" || $("#cpfRegisterPf").val() === "111.111.111-11" || $("#cpfRegisterPf").val() === "222.222.222-22" || $("#cpfRegisterPf").val() === "333.333.333-33" || $("#cpfRegisterPf").val() === "444.444.444-44" || $("#cpfRegisterPf").val() === "555.555.555-55" || $("#cpfRegisterPf").val() === "666.666.666-66" || $("#cpfRegisterPf").val() === "777.777.777-77" || $("#cpfRegisterPf").val() === "888.888.888-88" || $("#cpfRegisterPf").val() === "999.999.999-99"){
		$("#check-cpfRegisterPf").hide();
		$("#times-cpfRegisterPf").show();
		$("#valid-cpfRegisterPf").hide();
		$("#msg-cpfRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CPF</strong> inválido!</div>').show();
		document.getElementById("cpfRegisterPf").placeholder = "Insira um CPF válido!";
		document.getElementById("cpfRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cpfRegisterPf").style.outline = "#ff0000";
		document.getElementById("cpfRegisterPf").focus();
	return false;
	}
	else{
		var cpf = $('#cpfRegisterPf').val().replace(/[^0-9]/g, '').toString();
		if(cpf.length == 11){
			var v = [];
			v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
			v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
			v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
			v[0] = v[0] % 11;
			v[0] = v[0] % 10;
			v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
			v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
			v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
			v[1] = v[1] % 11;
			v[1] = v[1] % 10;

	if((v[0] != cpf[9]) || (v[1] != cpf[10])){
		$("#check-cpfRegisterPf").hide();
		$("#times-cpfRegisterPf").show();
		$("#msg-cpfRegisterPf").hide();
		$("#valid-cpfRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CPF</strong> inválido!</div>').show();
		document.getElementById("cpfRegisterPf").placeholder = "Insira um CPF válido!";
		document.getElementById("cpfRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cpfRegisterPf").style.outline = "#ff0000";
		document.getElementById("cpfRegisterPf").focus();
	return false;
	}
}
	else{
		$("#check-cpfRegisterPf").hide();
		$("#times-cpfRegisterPf").show();
		$("#msg-cpfRegisterPf").hide();
		$("#valid-cpfRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CPF</strong> inválido!</div>').show();
		document.getElementById("cpfRegisterPf").placeholder = "Insira um CPF válido!";
		document.getElementById("cpfRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cpfRegisterPf").style.outline = "#ff0000";
		document.getElementById("cpfRegisterPf").focus();
	return false;
	}
		$("#check-cpfRegisterPf").show();
		$("#times-cpfRegisterPf").hide();
		$("#msg-cpfRegisterPf").hide();
		$("#valid-cpfRegisterPf").hide();
		document.getElementById("cpfRegisterPf").style.borderColor = "green";
		document.getElementById("cpfRegisterPf").style.outline = "green";
		return false;
	}
}
function cpfCheckDataBasePf(x){
	var cpfRegisterPf = x.replace(/[^0-9]/g, '').toString();
	$.ajax({
			dataType: 'html',
			type:'POST',
			data: { cpfRegisterPf:cpfRegisterPf }, 
			url: newURL+"/Library/vendor/ajax/ajax.registercpf.php",
			success: function(data){
				if(data === 'returnNull'){
				return true;
				}
				else{
					$("#check-cpfRegisterPf").hide();
					$("#times-cpfRegisterPf").show();
					$("#msg-cpfRegisterPf").hide();
					$("#valid-cpfRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>CPF</strong> já cadastrado no sistema!</div>').show();
						document.getElementById("cpfRegisterPf").placeholder = "CPF já cadastrado no sistema!";
						document.getElementById("cpfRegisterPf").style.borderColor = "#ff0000";
						document.getElementById("cpfRegisterPf").style.outline = "#ff0000";
						document.getElementById("cpfRegisterPf").focus();
					return false;
				}
			},
			error: function(data){
				alert('Erro: '+data);
			}
	});
	return false;
}

$('#cepRegisterPf').mask('00000-000',{reverse: true});
function cepRegisterPf(){
	if($("#cepRegisterPf").val() === ""){
		$("#check-cepRegisterPf").hide();
		$("#times-cepRegisterPf").show();
		$("#msg-cepRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CEP</strong> não pode ser vazio!</div>');
		document.getElementById("cepRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("cepRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cepRegisterPf").style.outline = "#ff0000";
		document.getElementById("cepRegisterPf").focus();
	return false;
	}
	else{
		$("#check-cepRegisterPf").show();
		$("#times-cepRegisterPf").hide();
		$("#msg-cepRegisterPf").hide();
		document.getElementById("cepRegisterPf").style.borderColor = "green";
		document.getElementById("cepRegisterPf").style.outline = "green";
		cepAutocompletePf($("#cepRegisterPf").val());
		return false;
	}
}
function cepAutocompletePf(x){
	document.getElementById("cepRegisterPf").placeholder = "Preencha o Campo!";
	$("#loaderCepPf").html('&nbsp;&nbsp; Buscando Endereço <i class="fa fa-spinner fa-pulse fa-fw"></i>');
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
			$("#check-cepRegisterPf").hide();
			$("#check-logradouroRegisterPf").hide();
			$("#loaderCepPf").html('&nbsp;&nbsp;<font class="text-red">Endereço não localizado!</font>');
			$("#times-logradouroRegisterPf").show();
			$("#check-logradouroRegisterPf").hide();
			document.getElementById("logradouroRegisterPf").value = "";
			document.getElementById("logradouroRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("logradouroRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("logradouroRegisterPf").style.outline = "#ff0000";
			document.getElementById("logradouroRegisterPf").focus();
			$("#times-numberRegisterPf").show();
			$("#check-numberRegisterPf").hide();
			document.getElementById("numberRegisterPf").value = "";
			document.getElementById("numberRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("numberRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("numberRegisterPf").style.outline = "#ff0000";
			$("#times-neighborhoodRegisterPf").show();
			$("#check-neighborhoodRegisterPf").hide();
			document.getElementById("neighborhoodRegisterPf").value = "";
			document.getElementById("neighborhoodRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("neighborhoodRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("neighborhoodRegisterPf").style.outline = "#ff0000";
			$("#times-cityRegisterPf").show();
			$("#check-cityRegisterPf").hide();
			document.getElementById("cityRegisterPf").value = "";
			document.getElementById("cityRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("cityRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("cityRegisterPf").style.outline = "#ff0000";
			$("#times-ufRegisterPf").show();
			$("#check-ufRegisterPf").hide();
			document.getElementById("ufRegisterPf").value = "";
			document.getElementById("ufRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("ufRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("ufRegisterPf").style.outline = "#ff0000";
		return false;
		}
		else{
		var array = result.split(',');
		cep = array[0].split(':');cepFormat = cep[1].replace('"', '');cepValid = cepFormat.replace('"', '');
		logradouro = array[1].split(':');logradouroFormat = logradouro[1].replace('"', '');logradouroValid = logradouroFormat.replace('"', '');
		bairro = array[3].split(':');bairroFormat = bairro[1].replace('"', '');bairroValid = bairroFormat.replace('"', '');
		localidade = array[4].split(':');localidadeFormat = localidade[1].replace('"', '');localidadeValid = localidadeFormat.replace('"', '');
		uf = array[5].split(':');ufFormat = uf[1].replace('"', '');ufValid = ufFormat.replace('"', '');
		$("#loaderCepPf").html('&nbsp;&nbsp;<font class="text-green">Endereço localizado!</font>');$('#logradouroRegisterPf').val(logradouroValid);$('#neighborhoodRegisterPf').val(bairroValid);$('#cityRegisterPf').val(localidadeValid);$('#ufRegisterPf').val(ufValid);
		$("#msg-cepRegisterPf").hide();
		$("#times-cepRegisterPf").hide();
		$("#check-cepRegisterPf").show();
		document.getElementById("cepRegisterPf").style.borderColor = "green";
		document.getElementById("cepRegisterPf").style.outline = "green";
		if(logradouroValid==null || logradouroValid==0 || logradouroValid=='' || logradouroValid==""){
			$("#times-logradouroRegisterPf").show();
			$("#check-logradouroRegisterPf").hide();
			document.getElementById("logradouroRegisterPf").value = "";
			document.getElementById("logradouroRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("logradouroRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("logradouroRegisterPf").style.outline = "#ff0000";
		}
		numberRegisterPf();
		if(bairroValid==null || bairroValid==0 || bairroValid=='' || bairroValid==""){
			$("#times-neighborhoodRegisterPf").show();
			$("#check-neighborhoodRegisterPf").hide();
			document.getElementById("neighborhoodRegisterPf").value = "";
			document.getElementById("neighborhoodRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("neighborhoodRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("neighborhoodRegisterPf").style.outline = "#ff0000";
		}
		if(localidadeValid==null || localidadeValid==0 || localidadeValid=='' || localidadeValid==""){
			$("#times-cityRegisterPf").show();
			$("#check-cityRegisterPf").hide();
			document.getElementById("cityRegisterPf").value = "";
			document.getElementById("cityRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("cityRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("cityRegisterPf").style.outline = "#ff0000";
		}
		if(ufValid==null || ufValid==0 || ufValid=='' || ufValid==""){
			$("#times-ufRegisterPf").show();
			$("#check-ufRegisterPf").hide();
			document.getElementById("ufRegisterPf").value = "";
			document.getElementById("ufRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("ufRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("ufRegisterPf").style.outline = "#ff0000";
		}
	}},
		error: function (error){
			$("#check-cepRegisterPf").hide();
			$("#check-logradouroRegisterPf").hide();
			$("#loaderCepPf").html('&nbsp;&nbsp;<font class="text-red">Endereço não localizado!</font>');
			$("#times-logradouroRegisterPf").show();
			$("#check-logradouroRegisterPf").hide();
			document.getElementById("logradouroRegisterPf").value = "";
			document.getElementById("logradouroRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("logradouroRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("logradouroRegisterPf").style.outline = "#ff0000";
			document.getElementById("logradouroRegisterPf").focus();
			$("#times-numberRegisterPf").show();
			$("#check-numberRegisterPf").hide();
			document.getElementById("numberRegisterPf").value = "";
			document.getElementById("numberRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("numberRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("numberRegisterPf").style.outline = "#ff0000";
			$("#times-neighborhoodRegisterPf").show();
			$("#check-neighborhoodRegisterPf").hide();
			document.getElementById("neighborhoodRegisterPf").value = "";
			document.getElementById("neighborhoodRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("neighborhoodRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("neighborhoodRegisterPf").style.outline = "#ff0000";
			$("#times-cityRegisterPf").show();
			$("#check-cityRegisterPf").hide();
			document.getElementById("cityRegisterPf").value = "";
			document.getElementById("cityRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("cityRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("cityRegisterPf").style.outline = "#ff0000";
			$("#times-ufRegisterPf").show();
			$("#check-ufRegisterPf").hide();
			document.getElementById("ufRegisterPf").value = "";
			document.getElementById("ufRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("ufRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("ufRegisterPf").style.outline = "#ff0000";
		return false;
		}
	});
}

function logradouroRegisterPf(){
	if($("#logradouroRegisterPf").val() === ""){
	$("#check-logradouroRegisterPf").hide();
	$("#times-logradouroRegisterPf").show();
	$("#msg-logradouroRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Endereço</strong> não pode ser vazio!</div>');
		document.getElementById("logradouroRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("logradouroRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("logradouroRegisterPf").style.outline = "#ff0000";
		document.getElementById("logradouroRegisterPf").focus();
	}
	else{
		$("#check-logradouroRegisterPf").show();
		$("#times-logradouroRegisterPf").hide();
		$("#msg-logradouroRegisterPf").hide();
		document.getElementById("logradouroRegisterPf").style.borderColor = "green";
		document.getElementById("logradouroRegisterPf").style.outline = "green";
	}
}
function numberRegisterPf(){
	if($("#numberRegisterPf").val() === ""){
		$("#check-numberRegisterPf").hide();
		$("#times-numberRegisterPf").show();
		$("#msg-numberRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero</strong> não pode ser vazio!</div>');
		document.getElementById("numberRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("numberRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("numberRegisterPf").style.outline = "#ff0000";
		document.getElementById("numberRegisterPf").focus();
	}
	else{
		$("#check-numberRegisterPf").show();
		$("#times-numberRegisterPf").hide();
		$("#msg-numberRegisterPf").hide();
		document.getElementById("numberRegisterPf").style.borderColor = "green";
		document.getElementById("numberRegisterPf").style.outline = "green";
	}
}
function neighborhoodRegisterPf(){
	if($("#neighborhoodRegisterPf").val() === ""){
		$("#check-neighborhoodRegisterPf").hide();
		$("#times-neighborhoodRegisterPf").show();
		$("#msg-neighborhoodRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Bairro</strong> não pode ser vazio!</div>');
		document.getElementById("neighborhoodRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("neighborhoodRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("neighborhoodRegisterPf").style.outline = "#ff0000";
		document.getElementById("neighborhoodRegisterPf").focus();
	}
	else{
		$("#check-neighborhoodRegisterPf").show();
		$("#times-neighborhoodRegisterPf").hide();
		$("#msg-neighborhoodRegisterPf").hide();
		document.getElementById("neighborhoodRegisterPf").style.borderColor = "green";
		document.getElementById("neighborhoodRegisterPf").style.outline = "green";
	}
}
function cityRegisterPf(){
	if($("#cityRegisterPf").val() === ""){
		$("#check-cityRegisterPf").hide();
		$("#times-cityRegisterPf").show();
		$("#msg-cityRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Cidade</strong> não pode ser vazio!</div>');
		document.getElementById("cityRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("cityRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cityRegisterPf").style.outline = "#ff0000";
		document.getElementById("cityRegisterPf").focus();
	}
	else{
		$("#check-cityRegisterPf").show();
		$("#times-cityRegisterPf").hide();
		$("#msg-cityRegisterPf").hide();
		document.getElementById("cityRegisterPf").style.borderColor = "green";
		document.getElementById("cityRegisterPf").style.outline = "green";
	}
}
function ufRegisterPf(){
	if($("#ufRegisterPf").val() === ""){
		$("#check-ufRegisterPf").hide();
		$("#times-ufRegisterPf").show();
		$("#msg-ufRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Estado</strong> não pode ser vazio!</div>');
		document.getElementById("ufRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("ufRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("ufRegisterPf").style.outline = "#ff0000";
		document.getElementById("ufRegisterPf").focus();
	}
	else{
		$("#check-ufRegisterPf").show();
		$("#times-ufRegisterPf").hide();
		$("#msg-ufRegisterPf").hide();
		document.getElementById("ufRegisterPf").style.borderColor = "green";
		document.getElementById("ufRegisterPf").style.outline = "green";
	}
}
$('#telRegisterPf').mask('(00) 0000-0000');
$('#celRegisterPf').mask('(00) 00000-0000');
function input(){
	if(($("#telRegisterPf").val() === "") && ($("#celRegisterPf").val() === "")){
			$("#check-celRegisterPf").hide();
			$("#times-celRegisterPf").show();
			$("#msg-celRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Celular</strong> não pode ser vazio!</div>');
			document.getElementById("celRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("celRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("celRegisterPf").style.outline = "#ff0000";

			$("#check-telRegisterPf").hide();
			$("#times-telRegisterPf").show();
			$("#msg-telRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Telefone</strong> não pode ser vazio!</div>');
			document.getElementById("telRegisterPf").placeholder = "Preencha o Campo!";
			document.getElementById("telRegisterPf").style.borderColor = "#ff0000";
			document.getElementById("telRegisterPf").style.outline = "#ff0000";
	}
	if($("#telRegisterPf").val() != ""){
			$("#times-celRegisterPf").hide();
			$("#msg-celRegisterPf").hide();
			$("#check-telRegisterPf").show();
			$("#times-telRegisterPf").hide();
			$("#msg-telRegisterPf").hide();
			document.getElementById("telRegisterPf").style.borderColor = "green";
			document.getElementById("telRegisterPf").style.outline = "green";
		return false;
	}
	if($("#celRegisterPf").val() != ""){
			$("#times-telRegisterPf").hide();
			$("#msg-telRegisterPf").hide();
			$("#check-celRegisterPf").show();
			$("#times-celRegisterPf").hide();
			$("#msg-celRegisterPf").hide();
			document.getElementById("celRegisterPf").style.borderColor = "green";
			document.getElementById("celRegisterPf").style.outline = "green";
		return false;
	}
}

function emailRegisterPf(){
	if($("#emailRegisterPf").val() === ""){
		$("#check-emailRegisterPf").hide();
		$("#times-emailRegisterPf").show();
		$("#msg-emailRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email</strong> não pode ser vazio!</div>');
		document.getElementById("emailRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("emailRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterPf").style.outline = "#ff0000";
		document.getElementById("emailRegisterPf").focus();
	return false;
	}
	if($("#emailRegisterPf").val().indexOf('@')==-1 || $("#emailRegisterPf").val().indexOf('.')==-1){
		$("#check-emailRegisterPf").hide();
		$("#times-emailRegisterPf").show();
		$("#msg-emailRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Insira um <strong>Email</strong> válido!</div>');
		document.getElementById("emailRegisterPf").placeholder = "Preencha com um e-mail válido!";
		document.getElementById("emailRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterPf").style.outline = "#ff0000";
		document.getElementById("emailRegisterPf").focus();
	return false;
	}
	else{
		$("#check-emailRegisterPf").show();
		$("#times-emailRegisterPf").hide();
		$("#msg-emailRegisterPf").hide();
		document.getElementById("emailRegisterPf").style.borderColor = "green";
		document.getElementById("emailRegisterPf").style.outline = "green";
	return false;
	}
}

function passwordRegisterPf(){
	if($("#passwordRegisterPf").val() === ""){
		$("#check-passwordRegisterPf").hide();
		$("#times-passwordRegisterPf").show();
		$("#msg-passwordRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Senha</strong> não pode ser vazio!</div>');
		document.getElementById("passwordRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("passwordRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("passwordRegisterPf").style.outline = "#ff0000";
		document.getElementById("passwordRegisterPf").focus();
	return false;
	}
	if($("#passwordRegisterPf").val().length < 6){
		$("#check-passwordRegisterPf").hide();
		$("#times-passwordRegisterPf").show();
		$("#msg-passwordRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Senha</strong> deve conter 6 ou mais caracteres!</div>');
		document.getElementById("passwordRegisterPf").placeholder = "Minimo 6 caracteres!";
		document.getElementById("passwordRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("passwordRegisterPf").style.outline = "#ff0000";
		document.getElementById("passwordRegisterPf").focus();
	return false;
	}
	else{
		$("#check-passwordRegisterPf").show();
		$("#times-passwordRegisterPf").hide();
		$("#msg-passwordRegisterPf").hide();
		document.getElementById("passwordRegisterPf").style.borderColor = "green";
		document.getElementById("passwordRegisterPf").style.outline = "green";
	return false;
	}
}

function passwordRepitRegisterPf(){
	if($("#passwordRepitRegisterPf").val() === ""){
		$("#check-passwordRepitRegisterPf").hide();
		$("#times-passwordRepitRegisterPf").show();
		$("#msg-passwordRepitRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Repetir Senha</strong> não pode ser vazio!</div>');
		document.getElementById("passwordRepitRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("passwordRepitRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("passwordRepitRegisterPf").style.outline = "#ff0000";
	return false;
	}
	if($("#passwordRepitRegisterPf").val() != $("#passwordRegisterPf").val()){
		$("#check-passwordRepitRegisterPf").hide();
		$("#times-passwordRepitRegisterPf").show();
		$("#msg-passwordRepitRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>As <strong>Senhas</strong> devem ser iguais!</div>');
		document.getElementById("passwordRepitRegisterPf").placeholder = "Senha não confere!";
		document.getElementById("passwordRepitRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("passwordRepitRegisterPf").style.outline = "#ff0000";
	return false;
	}
	else{
		$("#check-passwordRepitRegisterPf").show();
		$("#times-passwordRepitRegisterPf").hide();
		$("#msg-passwordRepitRegisterPf").hide();
		document.getElementById("passwordRepitRegisterPf").style.borderColor = "green";
		document.getElementById("passwordRepitRegisterPf").style.outline = "green";
	return false;
	}
}

function progress(percent, $element, velocity){
	percent = percent >= 100 ? 100 : percent;
	var progressBarWidth = percent * $element.width() / 100;
	$element.find('div').stop().animate({ width: progressBarWidth }, velocity, "linear").html(percent + "% ");
}
$('#passwordRegisterPf').on('input', function(){
	var value = $(this).val();
	var progressValue = $('#progress div');
	var color, percent = 0;
	var passw= /^[A-Za-z]\w{7,14}$/;
	var passw2= /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	var paswd3= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
if($('#passwordRegisterPf').val() === ""){$('#progress').hide();}
else if(value.length <= 5){$('#progress').hide();}
else if(value.length <= 6){color = "#8B0000";percent = 15;$('#progress').show();}
else if(value.match(passw)){color = "#EE0000";percent = 30;$('#progress').show();}
else if(value.match(passw2)){color = "#CD6600";percent = 45;$('#progress').show();}
else if(value.match(passw3)){color = "#FFA500";percent = 60;$('#progress').show();}
else if(value.match(passw) && value.match(passw2) && value.match(passw3)){color = "#FFD700";percent = 75;$('#progress').show();}
else if(value.length <= 8 && value.match(passw) && value.match(passw2) && value.match(passw3)){color = "#008B00";percent = 90;$('#progress').show();}
else if(value.length <= 10 && value.match(passw) && value.match(passw2) && value.match(passw3)){color = "#458B00";percent = 100;$('#progress').show();}
else{color = "#458B00";percent = 100;$('#progress').show();}
progress(percent, $('#progress'), 300);
progressValue.css("background", color);
$('#progress').css("border", "1px solid " + color);
})


function validaInputRegisterPf(){
	if($("#nameRegisterPf").val() === ""){
		$("#msg-nameRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome completo</strong> não pode ser vazio!</div>');
		document.getElementById("nameRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("nameRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("nameRegisterPf").style.outline = "#ff0000";
		document.getElementById("nameRegisterPf").focus();
		$('#nameRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#rgRegisterPf").val() === ""){
		$("#msg-rgRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>RG</strong> não pode ser vazio!</div>');
		document.getElementById("rgRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("rgRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("rgRegisterPf").style.outline = "#ff0000";
		document.getElementById("rgRegisterPf").focus();
		$('#rgRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#cpfRegisterPf").val() === ""){
		$("#msg-cpfRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CPF</strong> não pode ser vazio!</div>');
		document.getElementById("cpfRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("cpfRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cpfRegisterPf").style.outline = "#ff0000";
		document.getElementById("cpfRegisterPf").focus();
		$('#cpfRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#cepRegisterPf").val() === ""){
		$("#msg-cepRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CEP</strong> não pode ser vazio!</div>');
		document.getElementById("cepRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("cepRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cepRegisterPf").style.outline = "#ff0000";
		document.getElementById("cepRegisterPf").focus();
		$('#cepRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#logradouroRegisterPf").val() === ""){
		$("#msg-logradouroRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Endereço</strong> não pode ser vazio!</div>');
		document.getElementById("logradouroRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("logradouroRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("logradouroRegisterPf").style.outline = "#ff0000";
		document.getElementById("logradouroRegisterPf").focus();
		$('#logradouroRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#numberRegisterPf").val() === ""){
		$("#msg-numberRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero</strong> não pode ser vazio!</div>');
		document.getElementById("numberRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("numberRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("numberRegisterPf").style.outline = "#ff0000";
		document.getElementById("numberRegisterPf").focus();
		$('#numberRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#neighborhoodRegisterPf").val() === ""){
	$("#msg-neighborhoodRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Bairro</strong> não pode ser vazio!</div>');
		document.getElementById("neighborhoodRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("neighborhoodRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("neighborhoodRegisterPf").style.outline = "#ff0000";
		document.getElementById("neighborhoodRegisterPf").focus();
	return false;
	}
	if($("#cityRegisterPf").val() === ""){
	$("#msg-cityRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Cidade</strong> não pode ser vazio!</div>');
		document.getElementById("cityRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("cityRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("cityRegisterPf").style.outline = "#ff0000";
		document.getElementById("cityRegisterPf").focus();
		$('#cityRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#ufRegisterPf").val() === ""){
	$("#msg-ufRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Estado</strong> não pode ser vazio!</div>');
		document.getElementById("ufRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("ufRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("ufRegisterPf").style.outline = "#ff0000";
		document.getElementById("ufRegisterPf").focus();
		$('#ufRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if(($("#telRegisterPf").val() === "") && ($("#celRegisterPf").val() === "")){
		$("#msg-telRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Telefone</strong> não pode ser vazio!</div>');
		document.getElementById("telRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("telRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("telRegisterPf").style.outline = "#ff0000";
		$("#msg-celRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Celular</strong> não pode ser vazio!</div>');
		document.getElementById("celRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("celRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("celRegisterPf").style.outline = "#ff0000";
		$('#telRegisterPf').animate({scrollTop:0}, 'slow');
		$('#celRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#emailRegisterPf").val() === ""){
		$("#msg-emailRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email</strong> não pode ser vazio!</div>');
		document.getElementById("emailRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("emailRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("emailRegisterPf").style.outline = "#ff0000";
		document.getElementById("emailRegisterPf").focus();
		$('#emailRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#passwordRegisterPf").val() === ""){
	$("#msg-passwordRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Senha</strong> não pode ser vazio!</div>');
		document.getElementById("passwordRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("passwordRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("passwordRegisterPf").style.outline = "#ff0000";
		document.getElementById("passwordRegisterPf").focus();
		$('#passwordRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	if($("#passwordRepitRegisterPf").val() === ""){
		$("#msg-passwordRepitRegisterPf").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Repetir Senha</strong> não pode ser vazio!</div>');
		document.getElementById("passwordRepitRegisterPf").placeholder = "Preencha o Campo!";
		document.getElementById("passwordRepitRegisterPf").style.borderColor = "#ff0000";
		document.getElementById("passwordRepitRegisterPf").style.outline = "#ff0000";
		document.getElementById("passwordRepitRegisterPf").focus();
		$('#passwordRepitRegisterPf').animate({scrollTop:0}, 'slow');
	return false;
	}
	else{
		formRegisterPhysicalPerson();
	}
}
	function formRegisterPhysicalPerson(){
	var nameRegisterPf = $("#nameRegisterPf").val();
	var rgRegisterPf = $("#rgRegisterPf").val();
	var cpfRegisterPf = $("#cpfRegisterPf").val();
	var cepRegisterPf = $("#cepRegisterPf").val();
	var logradouroRegisterPf = $("#logradouroRegisterPf").val();
	var numberRegisterPf = $("#numberRegisterPf").val();
	var completeRegisterPf = $("#completeRegisterPf").val();
	var neighborhoodRegisterPf = $("#neighborhoodRegisterPf").val();
	var cityRegisterPf = $("#cityRegisterPf").val();
	var ufRegisterPf = $("#ufRegisterPf").val();
	var telRegisterPf = $("#telRegisterPf").val();
	var celRegisterPf = $("#celRegisterPf").val();
	var emailRegisterPf = $("#emailRegisterPf").val();
	var otherRegisterPf = $("#otherRegisterPf").val();
	var passwordRegisterPf = $("#passwordRegisterPf").val();
	$("#button-submit-pf").html('<button onclick="validaInputRegisterPf();" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;"><i class="fa fa-spinner fa-pulse fa-fw"></i>  Enviando</button>&nbsp;&nbsp;<button onclick="" type="button" class="btn_cancelar cursor-class" style="padding:1.5%;width:30%;float: right;">Cancelar</button>');
	$.post(newURL+"/Library/vendor/ajax/ajax.registerphysicalperson.php",{nameRegisterPf:nameRegisterPf,rgRegisterPf:rgRegisterPf,cpfRegisterPf:cpfRegisterPf,cepRegisterPf:cepRegisterPf,logradouroRegisterPf:logradouroRegisterPf,numberRegisterPf:numberRegisterPf,completeRegisterPf:completeRegisterPf,neighborhoodRegisterPf:neighborhoodRegisterPf,cityRegisterPf:cityRegisterPf,ufRegisterPf:ufRegisterPf,telRegisterPf:telRegisterPf,celRegisterPf:celRegisterPf,emailRegisterPf:emailRegisterPf,otherRegisterPf:otherRegisterPf,passwordRegisterPf:passwordRegisterPf},
	function(resposta){
		if(resposta != false){
			$("#return-pf").html(resposta).slideDown(3000);
			$("#button-submit-pf").html('<button onclick="validaInputRegisterPf();" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;">Enviar</button>&nbsp;&nbsp;<button onclick="" type="button" class="btn_cancelar cursor-class" style="padding:1.5%;width:30%;float: right;">Cancelar</button>');
			$("#nameRegisterPf").reset();
			$("#rgRegisterPf").reset();
			$("#cpfRegisterPf").reset();
			$("#cepRegisterPf").reset();
			$("#logradouroRegisterPf").reset();
			$("#numberRegisterPf").reset();
			$("#completeRegisterPf").reset();
			$("#neighborhoodRegisterPf").reset();
			$("#cityRegisterPf").reset();
			$("#ufRegisterPf").reset();
			$("#telRegisterPf").reset();
			$("#celRegisterPf").reset();
			$("#emailRegisterPf").reset();
			$("#otherRegisterPf").reset();
			$("#passwordRegisterPf").reset();
			}
			else{
			$("#nameRegisterPf").reset();
			$("#rgRegisterPf").reset();
			$("#cpfRegisterPf").reset();
			$("#cepRegisterPf").reset();
			$("#logradouroRegisterPf").reset();
			$("#numberRegisterPf").reset();
			$("#completeRegisterPf").reset();
			$("#neighborhoodRegisterPf").reset();
			$("#cityRegisterPf").reset();
			$("#ufRegisterPf").reset();
			$("#telRegisterPf").reset();
			$("#celRegisterPf").reset();
			$("#emailRegisterPf").reset();
			$("#otherRegisterPf").reset();
			$("#passwordRegisterPf").reset();
			}
	});
	return false;
}