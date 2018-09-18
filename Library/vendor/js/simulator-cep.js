$('#cep').mask('00000-000',{reverse: true});
function RequireCep(c,p,v){
if(c === ""){$('#returnCep').html('<div class="alert alert-danger text-center" role="alert">Campo <strong>CEP</strong> vazio!</div>');}
else{var cep = c.replace("-","");var cepForm = cep.trim();var pesoForm = p.trim();var valueForm = v.trim();$('#returnCep').html('<br><div class="alert alert-success text-center" role="alert"> <i class="fa fa-spinner fa-pulse fa-fw"></i><strong> Calculando, por favor aguarde! </strong></div>');
$.ajax({url: newURL+"/Library/vendor/ajax/ajax.calcfreight.php?cep="+cepForm+"&peso="+pesoForm+"&value="+valueForm,type: 'GET',dataType: 'html',success: function (Return){$('#returnCep').html(Return);},error: function (error){$('#returnCep').html('<div class="alert alert-danger text-center" role="alert">Erro <strong>Cep Inválido</strong></div>');}});}
}
