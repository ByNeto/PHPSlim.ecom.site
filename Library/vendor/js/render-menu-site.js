$('#menu_label').html('<i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; MONTADORAS');
$('#menu_model').html('<i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; MONTADORAS');
$('#menu_label_sub').html('<i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; CARROS');
$('#menu_model_sub').html('<i class="fa fa-bars" aria-hidden="true"></i>&nbsp;&nbsp; CARROS');
$('#submenu').html('<div class="alert alert-danger" role="alert">Selecione a <strong>Montadora!</strong></div>');

function labelFabricator(a,b){
$('#menu_label').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;'+a+'</span>').show();
$('#menu_model').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;'+a+'</span>').show();
$('#menu_label_sub').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;CARROS</span>').show();
$('#menu_model_sub').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;CARROS</span>').show();
}

function labelFabricatorAM(a,b,c){
var c;
$('#menu_label').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;'+a+'</span>').show();
$('#menu_model').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;'+a+'</span>').show();
if(c.length === 0){
$('#menu_label_sub').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;CARROS</span>').show();
$('#menu_model_sub').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;CARROS</span>').show();
}
else{
$('#menu_label_sub').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;'+c+'</span>').show();
$('#menu_model_sub').html('<img width="15%" class="img-responsive" src="'+newURL+'/Library/imagens/menu/'+b+'.png"><span>&nbsp; &nbsp;'+c+'</span>').show();
}
}

function urlDirect(a,b){
var automakers=a.toLowerCase();
var urlRefresh=newURL+'/montadora/'+automakers+'/'+b;window.location.assign(urlRefresh);
$('#loader_products').html('<div class="loader"><center><img class="img-responsive rotaciona top" src="'+newURL+'/Library/imagens/icons/icon_loading.png"/><p>&nbsp;</p><h1 class="text-shadow text-white">Aguarde...</h1><h3 class="text-shadow text-white alert alert-danger" role="alert">Carregando produtos da montadora '+a+'</h3></center>').show();
}

function codFabricator(a,b){
var a=a;
var b=b;
$.ajax({url:newURL+"/Library/vendor/ajax/ajax.submenu.php?b="+b+"&a="+a,type:'GET',dataType:'html',success:function(data){$('#submenu').html(data);},error: function(error){$('#submenu').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button> Selecione a <strong>Montadora!</strong></div>');}});
}