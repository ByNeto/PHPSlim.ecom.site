$("#button-submit").html('<button onclick="validaInputWorkWithUs()" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;">Enviar</button>');
$('#nameContact').keyup(function (){this.value = this.value.replace(/[^a-zA-Z.]/g,' ');});
$('#datepicker').mask('00/00/0000',{reverse: true});
$('#cepContact').mask('00000-000',{reverse: true});
$('#salaryContact').mask("#.##0,00 R$", {reverse: true});
$('#cpfContact').mask("000.000.000-00", {reverse: true});
$('#telContact').mask('(00) 0000-0000');
$('#celContact').mask('(00) 00000-0000');
function nameContact(){
	if($("#nameContact").val() === ""){
	$("#msg-nameContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome completo</strong> não pode ser vazio!</div>');
		document.getElementById("nameContact").placeholder = "Preencha o Campo!";
		document.getElementById("nameContact").style.borderColor = "#ff0000";
		document.getElementById("nameContact").style.outline = "#ff0000";
		document.getElementById("nameContact").focus();
	return false;
	}
	if($("#nameContact").val().length < 5){
	$("#msg-nameContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome completo</strong> deve conter mais de 5 caracteres!</div>');
		document.getElementById("nameContact").placeholder = "Minimo 5 caracteres!";
		document.getElementById("nameContact").style.borderColor = "#ff0000";
		document.getElementById("nameContact").style.outline = "#ff0000";
		document.getElementById("nameContact").focus();
	return false;
	}
	else{
		$("#msg-nameContact").hide();return false;
	}
}
function cpfContact(cpf){
	if($("#cpfContact").val() === ""){
	$("#msg-cpfContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CPF</strong> não pode ser vazio!</div>');
		document.getElementById("cpfContact").placeholder = "Preencha o Campo!";
		document.getElementById("cpfContact").style.borderColor = "#ff0000";
		document.getElementById("cpfContact").style.outline = "#ff0000";
		document.getElementById("cpfContact").focus();
	return false;
	}
	c = cpf.replace('.', '');
	c = c.replace('.', '');
	c = c.replace('-', '');
	var i; s = c;
	var c = s.substr(0,9);
	var dv = s.substr(9,2);
	var d1 = 0;
	var v = false;
	for (i = 0; i < 9; i++){
		d1 += c.charAt(i)*(10-i);
	}
	if(d1 == 0){
	$("#msg-cpfContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Numero de <strong>CPF</strong> inválido!</div>');
		document.getElementById("cpfContact").placeholder = "Preencha com um CPF válido!";
		document.getElementById("cpfContact").style.borderColor = "#ff0000";
		document.getElementById("cpfContact").style.outline = "#ff0000";
		document.getElementById("cpfContact").focus();
	v = true;
	return false;
	}
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(0) != d1){
	$("#msg-cpfContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Numero de <strong>CPF</strong> inválido!</div>');
		document.getElementById("cpfContact").placeholder = "Preencha com um CPF válido!";
		document.getElementById("cpfContact").style.borderColor = "#ff0000";
		document.getElementById("cpfContact").style.outline = "#ff0000";
		document.getElementById("cpfContact").focus();
	v = true;
	return false;
	}
	d1 *= 2;
	for (i = 0; i < 9; i++){
		d1 += c.charAt(i)*(11-i);
	}
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(1) != d1){
	$("#msg-cpfContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Numero de <strong>CPF</strong> inválido!</div>');
		document.getElementById("cpfContact").placeholder = "Preencha com um CPF válido!";
		document.getElementById("cpfContact").style.borderColor = "#ff0000";
		document.getElementById("cpfContact").style.outline = "#ff0000";
		document.getElementById("cpfContact").focus();
	v = true;
	return false;
	}
	if(!v){$("#msg-cpfContact").hide();return false;}
}
function datepickers(){
	if($("#datepicker").val() === ""){
	$("#msg-datepickerContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Data de Nascimento</strong> não pode ser vazio!</div>');
		document.getElementById("datepicker").placeholder = "Preencha o Campo!";
		document.getElementById("datepicker").style.borderColor = "#ff0000";
		document.getElementById("datepicker").style.outline = "#ff0000";
		document.getElementById("datepicker").focus();
	return false;
	}
	else{
		$("#msg-datepickerContact").hide();return false;
	}
}
function sexContact(){
	if($("#sexContact").val() === ""){
	$("#msg-sexContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Selecione o <strong>Sexo</strong>!</div>');
		document.getElementById("sexContact").placeholder = "Selecione a opção!";
		document.getElementById("sexContact").style.borderColor = "#ff0000";
		document.getElementById("sexContact").style.outline = "#ff0000";
		document.getElementById("sexContact").focus();
	return false;
	}
	else{
		$("#msg-sexContact").hide();return false;
	}
}
function maritalContact(){
	if($("#maritalContact").val() === ""){
	$("#msg-maritalContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Selecione o <strong>Estado Civil</strong>!</div>');
		document.getElementById("maritalContact").placeholder = "Selecione a opção!";
		document.getElementById("maritalContact").style.borderColor = "#ff0000";
		document.getElementById("maritalContact").style.outline = "#ff0000";
		document.getElementById("maritalContact").focus();
	return false;
	}
	else{
		$("#msg-maritalContact").hide();return false;
	}
}
function cepContact(){
	if($("#cepContact").val() === ""){
	$("#msg-cepContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CEP</strong> não pode ser vazio!</div>');
		document.getElementById("cepContact").placeholder = "Preencha o Campo!";
		document.getElementById("cepContact").style.borderColor = "#ff0000";
		document.getElementById("cepContact").style.outline = "#ff0000";
		document.getElementById("cepContact").focus();
	return false;
	}
	else{
		$("#msg-cepContact").hide();return false;
	}
}
function cepAutocomplete(x){
	document.getElementById("cepContact").placeholder = "Preencha o Campo!";
	$.ajax({
		url: "https://viacep.com.br/ws/"+x+"/json/",
		type: 'GET',
		dataType: 'html',
		contentType: 'application/json;',
		success: function (result){
		var array = result.split(',');
		cep = array[0].split(':');cepFormat = cep[1].replace('"', '');cepValid = cepFormat.replace('"', '');
		logradouro = array[1].split(':');logradouroFormat = logradouro[1].replace('"', '');logradouroValid = logradouroFormat.replace('"', '');
		bairro = array[3].split(':');bairroFormat = bairro[1].replace('"', '');bairroValid = bairroFormat.replace('"', '');
		localidade = array[4].split(':');localidadeFormat = localidade[1].replace('"', '');localidadeValid = localidadeFormat.replace('"', '');
		uf = array[5].split(':');ufFormat = uf[1].replace('"', '');ufValid = ufFormat.replace('"', '');
		$('#logradouroContact').val(logradouroValid);
		$('#neighborhoodContact').val(bairroValid);
		$('#cityContact').val(localidadeValid);
		$('#ufContact').val(ufValid);
		},
		error: function (error) {
		$("#msg-cepContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Endereço <strong>não</strong> encontrado!</div>');
			document.getElementById("cepContact").placeholder = "Preencha o Campo!";
			document.getElementById("cepContact").style.borderColor = "#ff0000";
			document.getElementById("cepContact").style.outline = "#ff0000";
			document.getElementById("cepContact").focus();
	return false;
		}
	});
}
function logradouroContact(){
	if($("#logradouroContact").val() === ""){
	$("#msg-logradouroContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Endereço</strong> não pode ser vazio!</div>');
		document.getElementById("logradouroContact").placeholder = "Preencha o Campo!";
		document.getElementById("logradouroContact").style.borderColor = "#ff0000";
		document.getElementById("logradouroContact").style.outline = "#ff0000";
		document.getElementById("logradouroContact").focus();
	return false;
	}
	else{
		$("#msg-logradouroContact").hide();return false;
	}
}
function numberContact(){
	if($("#numberContact").val() === ""){
	$("#msg-numberContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero</strong> não pode ser vazio!</div>');
		document.getElementById("numberContact").placeholder = "Preencha o Campo!";
		document.getElementById("numberContact").style.borderColor = "#ff0000";
		document.getElementById("numberContact").style.outline = "#ff0000";
		document.getElementById("numberContact").focus();
	return false;
	}
	else{
		$("#msg-numberContact").hide();return false;
	}
}
function neighborhoodContact(){
	if($("#neighborhoodContact").val() === ""){
	$("#msg-neighborhoodContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Bairro</strong> não pode ser vazio!</div>');
		document.getElementById("neighborhoodContact").placeholder = "Preencha o Campo!";
		document.getElementById("neighborhoodContact").style.borderColor = "#ff0000";
		document.getElementById("neighborhoodContact").style.outline = "#ff0000";
		document.getElementById("neighborhoodContact").focus();
	return false;
	}
	else{
		$("#msg-neighborhoodContact").hide();return false;
	}
}
function cityContact(){
	if($("#cityContact").val() === ""){
	$("#msg-cityContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Cidade</strong> não pode ser vazio!</div>');
		document.getElementById("cityContact").placeholder = "Preencha o Campo!";
		document.getElementById("cityContact").style.borderColor = "#ff0000";
		document.getElementById("cityContact").style.outline = "#ff0000";
		document.getElementById("cityContact").focus();
	return false;
	}
	else{
		$("#msg-cityContact").hide();return false;
	}
}
function ufContact(){
	if($("#ufContact").val() === ""){
	$("#msg-ufContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Estado</strong> não pode ser vazio!</div>');
		document.getElementById("ufContact").placeholder = "Preencha o Campo!";
		document.getElementById("ufContact").style.borderColor = "#ff0000";
		document.getElementById("ufContact").style.outline = "#ff0000";
		document.getElementById("ufContact").focus();
	return false;
	}
	else{
		$("#msg-ufContact").hide();return false;
	}
}
function telContact(){
	if($("#telContact").val() === ""){
	$("#msg-telContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Telefone</strong> não pode ser vazio!</div>');
		document.getElementById("telContact").placeholder = "Preencha o Campo!";
		document.getElementById("telContact").style.borderColor = "#ff0000";
		document.getElementById("telContact").style.outline = "#ff0000";
		document.getElementById("telContact").focus();
	return false;
	}
	else{
		$("#msg-telContact").hide();return false;
	}
}
function celContact(){
	if($("#celContact").val() === ""){
	$("#msg-celContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Celular</strong> não pode ser vazio!</div>');
		document.getElementById("celContact").placeholder = "Preencha o Campo!";
		document.getElementById("celContact").style.borderColor = "#ff0000";
		document.getElementById("celContact").style.outline = "#ff0000";
		document.getElementById("celContact").focus();
	return false;
	}
	else{
		$("#msg-celContact").hide();return false;
	}
}
function emailContact(){
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
	else{
		$("#msg-emailContact").hide();return false;
	}
}
function jobContact(){
	if($("#jobContact").val() === ""){
	$("#msg-jobContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Selecione</strong> a opção!</div>');
		document.getElementById("jobContact").placeholder = "Selecione a opção!";
		document.getElementById("jobContact").style.borderColor = "#ff0000";
		document.getElementById("jobContact").style.outline = "#ff0000";
		document.getElementById("jobContact").focus();
	return false;
	}
	else{
		$("#msg-jobContact").hide();return false;
	}
}
function salaryContact(){
	if($("#salaryContact").val() === ""){
	$("#msg-salaryContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Pretensão Salarial</strong> não pode ser vazio!</div>');
		document.getElementById("salaryContact").placeholder = "Preencha o Campo!";
		document.getElementById("salaryContact").style.borderColor = "#ff0000";
		document.getElementById("salaryContact").style.outline = "#ff0000";
		document.getElementById("salaryContact").focus();
	return false;
	}
	else{
		$("#msg-salaryContact").hide();return false;
	}
}
function validaInputWorkWithUs(){
	if($("#nameContact").val() === ""){
	$("#msg-nameContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome completo</strong> não pode ser vazio!</div>');
		document.getElementById("nameContact").placeholder = "Preencha o Campo!";
		document.getElementById("nameContact").style.borderColor = "#ff0000";
		document.getElementById("nameContact").style.outline = "#ff0000";
		document.getElementById("nameContact").focus();
	return false;
	}
	if($("#cpfContact").val() === ""){
	$("#msg-cpfContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CPF</strong> não pode ser vazio!</div>');
		document.getElementById("cpfContact").placeholder = "Preencha o Campo!";
		document.getElementById("cpfContact").style.borderColor = "#ff0000";
		document.getElementById("cpfContact").style.outline = "#ff0000";
		document.getElementById("cpfContact").focus();
	return false;
	}
	if($("#datepicker").val() === ""){
	$("#msg-datepickerContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Data de Nascimento</strong> não pode ser vazio!</div>');
		document.getElementById("datepicker").placeholder = "Preencha o Campo!";
		document.getElementById("datepicker").style.borderColor = "#ff0000";
		document.getElementById("datepicker").style.outline = "#ff0000";
		document.getElementById("datepicker").focus();
	return false;
	}
	if($("#sexContact").val() === ""){
	$("#msg-sexContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Selecione o <strong>Sexo</strong>!</div>');
		document.getElementById("sexContact").placeholder = "Selecione a opção!";
		document.getElementById("sexContact").style.borderColor = "#ff0000";
		document.getElementById("sexContact").style.outline = "#ff0000";
		document.getElementById("sexContact").focus();
	return false;
	}
	if($("#maritalContact").val() === ""){
	$("#msg-maritalContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Selecione o <strong>Estado Civil</strong>!</div>');
		document.getElementById("maritalContact").placeholder = "Selecione a opção!";
		document.getElementById("maritalContact").style.borderColor = "#ff0000";
		document.getElementById("maritalContact").style.outline = "#ff0000";
		document.getElementById("maritalContact").focus();
	return false;
	}
	if($("#cepContact").val() === ""){
	$("#msg-cepContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CEP</strong> não pode ser vazio!</div>');
		document.getElementById("cepContact").placeholder = "Preencha o Campo!";
		document.getElementById("cepContact").style.borderColor = "#ff0000";
		document.getElementById("cepContact").style.outline = "#ff0000";
		document.getElementById("cepContact").focus();
	return false;
	}
	if($("#logradouroContact").val() === ""){
	$("#msg-logradouroContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Endereço</strong> não pode ser vazio!</div>');
		document.getElementById("logradouroContact").placeholder = "Preencha o Campo!";
		document.getElementById("logradouroContact").style.borderColor = "#ff0000";
		document.getElementById("logradouroContact").style.outline = "#ff0000";
		document.getElementById("logradouroContact").focus();
	return false;
	}
	if($("#numberContact").val() === ""){
	$("#msg-numberContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero</strong> não pode ser vazio!</div>');
		document.getElementById("numberContact").placeholder = "Preencha o Campo!";
		document.getElementById("numberContact").style.borderColor = "#ff0000";
		document.getElementById("numberContact").style.outline = "#ff0000";
		document.getElementById("numberContact").focus();
	return false;
	}
	if($("#neighborhoodContact").val() === ""){
	$("#msg-neighborhoodContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Bairro</strong> não pode ser vazio!</div>');
		document.getElementById("neighborhoodContact").placeholder = "Preencha o Campo!";
		document.getElementById("neighborhoodContact").style.borderColor = "#ff0000";
		document.getElementById("neighborhoodContact").style.outline = "#ff0000";
		document.getElementById("neighborhoodContact").focus();
	return false;
	}
	if($("#cityContact").val() === ""){
	$("#msg-cityContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Cidade</strong> não pode ser vazio!</div>');
		document.getElementById("cityContact").placeholder = "Preencha o Campo!";
		document.getElementById("cityContact").style.borderColor = "#ff0000";
		document.getElementById("cityContact").style.outline = "#ff0000";
		document.getElementById("cityContact").focus();
	return false;
	}
	if($("#ufContact").val() === ""){
	$("#msg-ufContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Estado</strong> não pode ser vazio!</div>');
		document.getElementById("ufContact").placeholder = "Preencha o Campo!";
		document.getElementById("ufContact").style.borderColor = "#ff0000";
		document.getElementById("ufContact").style.outline = "#ff0000";
		document.getElementById("ufContact").focus();
	return false;
	}
	if($("#telContact").val() === ""){
	$("#msg-telContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Telefone</strong> não pode ser vazio!</div>');
		document.getElementById("telContact").placeholder = "Preencha o Campo!";
		document.getElementById("telContact").style.borderColor = "#ff0000";
		document.getElementById("telContact").style.outline = "#ff0000";
		document.getElementById("telContact").focus();
	return false;
	}
	if($("#celContact").val() === ""){
	$("#msg-celContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Celular</strong> não pode ser vazio!</div>');
		document.getElementById("celContact").placeholder = "Preencha o Campo!";
		document.getElementById("celContact").style.borderColor = "#ff0000";
		document.getElementById("celContact").style.outline = "#ff0000";
		document.getElementById("celContact").focus();
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
	if($("#jobContact").val() === ""){
	$("#msg-jobContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Selecione</strong> a opção!</div>');
		document.getElementById("jobContact").placeholder = "Selecione a opção!";
		document.getElementById("jobContact").style.borderColor = "#ff0000";
		document.getElementById("jobContact").style.outline = "#ff0000";
		document.getElementById("jobContact").focus();
	return false;
	}
	if($("#salaryContact").val() === ""){
	$("#msg-salaryContact").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Pretensão Salarial</strong> não pode ser vazio!</div>');
		document.getElementById("salaryContact").placeholder = "Preencha o Campo!";
		document.getElementById("salaryContact").style.borderColor = "#ff0000";
		document.getElementById("salaryContact").style.outline = "#ff0000";
		document.getElementById("salaryContact").focus();
	return false;
	}
	else{
	var nameContact = $("#nameContact").val();
	var cpfContact = $("#cpfContact").val();
	var datepicker = $("#datepicker").val();
	var sexContact = $("#sexContact").val();
	var maritalContact = $("#maritalContact").val();
	var languagesContact = $("#languagesContact").val();
	var cepContact = $("#cepContact").val();
	var logradouroContact = $("#logradouroContact").val();
	var numberContact = $("#numberContact").val();
	var completeContact = $("#completeContact").val();
	var neighborhoodContact = $("#neighborhoodContact").val();
	var cityContact = $("#cityContact").val();
	var ufContact = $("#ufContact").val();
	var telContact = $("#telContact").val();
	var celContact = $("#celContact").val();
	var emailContact = $("#emailContact").val();
	var siteContact = $("#siteContact").val();
	var linkedinContact = $("#linkedinContact").val();
	var facebookContact = $("#facebookContact").val();
	var otherContact = $("#otherContact").val();
	var jobContact = $("#jobContact").val();
	var vacancyContact = $("#vacancyContact").val();
	var otherVacancyContact = $("#otherVacancyContact").val();
	var salaryContact = $("#salaryContact").val();
	var experienceContact = $("#experienceContact").val();
	var formationContact = $("#formationContact").val();
	var informationContact = $("#informationContact").val();
	$("#button-submit").html('<button onclick="validaInputWorkWithUs()" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;"><i class="fa fa-spinner fa-pulse fa-fw"></i>  Enviando</button>');
	$.post('../Library/vendor/ajax/ajax.workwithus.php',{nameContact:nameContact,cpfContact:cpfContact,datepicker:datepicker,sexContact:sexContact,maritalContact:maritalContact,languagesContact:languagesContact,cepContact:cepContact,logradouroContact:logradouroContact,numberContact:numberContact,completeContact:completeContact,neighborhoodContact:neighborhoodContact,cityContact:cityContact,ufContact:ufContact,telContact:telContact,celContact:celContact,emailContact:emailContact,siteContact:siteContact,linkedinContact:linkedinContact,facebookContact:facebookContact,otherContact:otherContact,jobContact:jobContact,vacancyContact:vacancyContact,otherVacancyContact:otherVacancyContact,salaryContact:salaryContact,experienceContact:experienceContact,formationContact:formationContact,informationContact:informationContact},
	function(resposta){
	if(resposta != false){
			$("#return").html(resposta).slideDown(3000);
			$("#button-submit").html('<button onclick="validaInputWorkWithUs()" type="submit" class="btn_comprar cursor-class" style="padding:1.5%;width:30%;">Enviar</button>');
			$("#nameContact").val("");
			$("#cpfContact").val("");
			$("#datepicker").val("");
			$("#sexContact").val("");
			$("#maritalContact").val("");
			$("#languagesContact").val("");
			$("#cepContact").val("");
			$("#logradouroContact").val("");
			$("#numberContact").val("");
			$("#completeContact").val("");
			$("#neighborhoodContact").val("");
			$("#cityContact").val("");
			$("#ufContact").val("");
			$("#telContact").val("");
			$("#celContact").val("");
			$("#emailContact").val("");
			$("#siteContact").val("");
			$("#linkedinContact").val("");
			$("#facebookContact").val("");
			$("#otherContact").val("");
			$("#jobContact").val("");
			$("#vacancyContact").val("");
			$("#otherVacancyContact").val("");
			$("#salaryContact").val("");
			$("#experienceContact").val("");
			$("#formationContact").val("");
			$("#informationContact").val("");
		}
		else{
			$("#nameContact").val("");
			$("#cpfContact").val("");
			$("#datepicker").val("");
			$("#sexContact").val("");
			$("#maritalContact").val("");
			$("#languagesContact").val("");
			$("#cepContact").val("");
			$("#logradouroContact").val("");
			$("#numberContact").val("");
			$("#completeContact").val("");
			$("#neighborhoodContact").val("");
			$("#cityContact").val("");
			$("#ufContact").val("");
			$("#telContact").val("");
			$("#celContact").val("");
			$("#emailContact").val("");
			$("#siteContact").val("");
			$("#linkedinContact").val("");
			$("#facebookContact").val("");
			$("#otherContact").val("");
			$("#jobContact").val("");
			$("#vacancyContact").val("");
			$("#otherVacancyContact").val("");
			$("#salaryContact").val("");
			$("#experienceContact").val("");
			$("#formationContact").val("");
			$("#informationContact").val("");
		}
	});
	return false;
	}
}