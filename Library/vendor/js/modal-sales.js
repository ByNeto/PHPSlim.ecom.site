function modalSales(ValueFull,ValueParts,SessionIdCar,ClienteId,CepId,StorageQtd,DataTargetModal,ProductUrlImage,ProductDescription,ProductAplication,ProductCod,ProductManufacturing,Multiple,ProductDescriptionAbbreviation,ProductValue,ProductValuePlot){
var ValueFull=ValueFull;
var ValueParts=ValueParts;
var SessionIdCar=SessionIdCar;
var ClienteId=ClienteId;
var CepId=CepId;
var StorageQtd=StorageQtd;
var DataTargetModal=DataTargetModal;
var ProductUrlImage=ProductUrlImage;
var ProductDescription=ProductDescription;
var ProductAplication=ProductAplication;
var ProductCod=ProductCod;
var ProductManufacturing=ProductManufacturing;
var Multiple=Multiple;
var ProductDescriptionAbbreviation=ProductDescriptionAbbreviation;
var ProductValue=ProductValue;
var ProductValuePlot=ProductValuePlot;
var estoq = StorageQtd;

$.ajax({url:newURL+"/Library/vendor/ajax/ajax.modalsales.php?StorageQtd="+StorageQtd+"&DataTargetModal="+DataTargetModal+"&ProductUrlImage="+ProductUrlImage+"&ProductDescription="+ProductDescription+"&ProductAplication="+ProductAplication+"&ProductCod="+ProductCod+"&ProductManufacturing="+ProductManufacturing+"&ProductDescriptionAbbreviation="+ProductDescriptionAbbreviation+"&ProductValue="+ProductValue+"&ProductValuePlot="+ProductValuePlot,type: 'GET',dataType: 'html',success: function (DataReturn){
var DataReturn = DataReturn.split("=>");
if(DataReturn[0] >= 1){
var valSimbN = 0;var valSimbP = 1;
	if(Multiple == 0){min=1;var viewmultiple=' ';}
	else{min = Multiple*1;var viewmultiple='<p class="text-center">Este produto só pode ser vendido por múltiplos de <strong>'+Multiple+'</strong></p><p class="text-center">Valor Unitário R$ <strong>'+DataReturn[9]+'</strong></p>';}
$('#modal-body-return').html('<div class="modal-body"><img class="img-responsive" src="'+DataReturn[2]+'" style="width:100%;"><h4 class="text-white">'+DataReturn[3]+'</h4><h4><strong>'+DataReturn[4]+'</strong></h4><div class="codigo">'+DataReturn[5]+'</div><div class="marca">'+DataReturn[6]+'</div><hr class="barra_hr"><div class="descri">'+DataReturn[7]+'</div><div class="preco">R$'+ValueFull+'</div><div class="parcela_pag">'+ValueParts+'</div></div><center><div class="alert"><h3 class="text-center"><span class="badge badge-secondary">Selecione a quantidade</span></h3><button style="border-radius: 0px;padding-top: 10px;" class="btn btn-xs cursor-class" onclick="javascript:calcQtd('+valSimbN+','+min+','+estoq+')"><img src="'+newURL+'/Library/imagens/icons/icon_cart_menos.png" alt="carrinho" /></button>&nbsp;<input class="input-style-number" type="number" step="'+ min +'" min="' + min + '" max="' + estoq + '" value="'+min+'" name="discount_credits" id="discount_credits" disabled/>&nbsp;<button style="border-radius: 0px;padding-top: 10px;" class="btn btn-xs cursor-class" onclick="javascript:calcQtd('+valSimbP+','+min+','+estoq+')"><img src="'+newURL+'/Library/imagens/icons/icon_cart_mais.png" alt="carrinho" /></button></div><div id="msg_discount_credits"></div></center>'+viewmultiple+'<div class="modal-footer"><button class="btn_comprar cursor-class" onclick="javascript:SelectCheckCar('+SessionIdCar+','+ClienteId+','+CepId+','+ProductCod+','+Multiple+');" >Adicionar e voltar as compras</button><button class="btn_detalhes cursor-class" onclick="javascript:SelectCheckCarAd('+SessionIdCar+','+ClienteId+','+CepId+','+ProductCod+','+Multiple+');"><img src="'+newURL+'/Library/imagens/icons/icon_mais.png" disable>Adicionar ao carrinho</button></div>');
}
else{$('#modal-body-return').html('<div class="modal-body"><h3 class="page-header text-shadow">'+DataReturn[3]+'</h3><div class="codigo">'+DataReturn[5]+'</div><div class="marca">'+DataReturn[6]+'</div><hr class="barra_hr"><div class="descri">'+DataReturn[7]+'</div></div><div class="alert alert-default" role="alert"><h2 class="text-center text-danger">Produto Indisponível</h2><center><span>Deixe seus dados e avisaremos quando o produto estiver disponivel</span></center><div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" style="font-size: 12px;"></i></span><input id="email" type="email" class="form-control" name="email" value="" placeholder="Email válido"></div><div class="input-group"><span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span><input id="text" type="text" class="form-control" name="text" value="" placeholder="Nome Completo" required></div><center><button class="btn_comprar cursor-class">Enviar</button> <button data-dismiss="modal" aria-label="Close" class="btn_detalhes cursor-class">Cancelar</button></center></div>');}},
	error:function(error){$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>ModalSales</strong></div>');}});
}

function calcQtd(e,min,estoq){
	$('#msg_discount_credits').hide();
	var min;
	var estoq;
	var valueInput = $('#discount_credits').val();
	if(e === 0){
	valueChange = valueInput - min;
		if(valueChange >= min){
			$('#discount_credits').val(valueChange);
		}
		else{$('#msg_discount_credits').html("<div class='alert alert-danger' role='alert'>Quantidade Inválida</div>").show().slideUp(3000);}
	}
	else{
		valueChange = (valueInput*1) + min;
		if(valueChange <= estoq){
			$('#discount_credits').val(valueChange);
		}
		else{$('#msg_discount_credits').html("<div class='alert alert-danger' role='alert'>Quantidade Inválida</div>").show().slideUp(3000);}
	}
}

function SelectCheckCar(a,b,c,d,e){
	$('#loader').show();
	var idCar = a;
	var idCliente = b;
	var idCEP = c;
	var ProductCod = d;
	var Multiple = e;
	$.post(newURL+"/Library/vendor/ajax/ajax.selectcheckcar.php",{idCar:idCar},
	function(returnIdCar){
		if(returnIdCar != false){
			UpdateCarIni(idCar,idCliente,idCEP,ProductCod,Multiple);
			}
		else{
			InsertCarIni(idCar,idCliente,idCEP,ProductCod,Multiple);
		}
	});
	return false;
}

function UpdateCarIni(idCar,idCliente,idCEP,ProductCod,Multiple){
	var Car = idCar;
	var Cliente = idCliente;
	var CEP = idCEP;
	var ProductCod = ProductCod;
	var Multiple = Multiple;
	$.post(newURL+"/Library/vendor/ajax/ajax.updatecarini.php",{Car:Car,Cliente:Cliente,CEP:CEP},
	function(returnUpdateCarIni){
		if(returnUpdateCarIni != false){
			SelectCheckProduct(Car,ProductCod,Multiple);
		}
		else{
			$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>modal-sales / UpdateCarIni</strong></div>');
		}
	});
	return false;
}

function InsertCarIni(idCar,idCliente,idCEP,ProductCod,Multiple){
	var Car = idCar;var Cliente = idCliente;var CEP = idCEP;var ProductCod = ProductCod;var Multiple = Multiple;
	$.post(newURL+"/Library/vendor/ajax/ajax.insertcarini.php",{Car:Car,Cliente:Cliente,CEP:CEP},
	function(returnInsertCarIni){
		if(returnInsertCarIni != false){
			SelectCheckProduct(Car,ProductCod,Multiple);
		}
		else{
			$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>modal-sales / InsertCarIni</strong></div>');
		}
	});
	return false;
}

function SelectCheckProduct(Car,ProductCod,Multiple){
	var idCar = Car;var ProductCod = ProductCod;var Multiple = Multiple;var qtdProduct = $('#discount_credits').val();
	$.post(newURL+"/Library/vendor/ajax/ajax.selectcheckproduct.php",{idCar:idCar,ProductCod:ProductCod},
	function(returnSelectCheckProduct){
		if(returnSelectCheckProduct != false){
			UpdateProductIni(idCar,ProductCod,qtdProduct,Multiple);
			}
		else{
			InsertProductIni(idCar,ProductCod,qtdProduct,Multiple);
		}
	});
	return false;
}

function UpdateProductIni(Car,ProductCod,qtdProduct,Multiple){
	var idCar = Car;var ProductCod = ProductCod;var qtdProduct = qtdProduct;var Multiple = Multiple;
	$.post(newURL+"/Library/vendor/ajax/ajax.updateproductini.php",{idCar:idCar,ProductCod:ProductCod,qtdProduct:qtdProduct,Multiple:Multiple},
	function(returnUpdateProductIni){
		if(returnUpdateProductIni != false){
			SelectCheckProductStorage(idCar);
		}
		else{
			$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>modal-sales / UpdateProductIni</strong></div>');
		}
	});
	return false;
}

function InsertProductIni(Car,ProductCod,qtdProduct,Multiple){
	var idCar = Car;var ProductCod = ProductCod;var qtdProduct = qtdProduct;var Multiple = Multiple;
	$.post(newURL+"/Library/vendor/ajax/ajax.insertproductini.php",{idCar:idCar,ProductCod:ProductCod,qtdProduct:qtdProduct,Multiple:Multiple},
	function(returnInsertProductIni){
		if(returnInsertProductIni != false){
			SelectCheckProductStorage(idCar);
		}
		else{
			$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>modal-sales / InsertProductIni</strong></div>');
		}
	});
	return false;
}

function SelectCheckProductStorage(idCar){
	var idCar = idCar;
	$.post(newURL+"/Library/vendor/ajax/ajax.selectcheckproductstorage.php",{idCar:idCar},
	function(returnSelectCheckProductStorage){
		if(returnSelectCheckProductStorage != false){
			$('#loader').hide();
			$('#car-return').html(returnSelectCheckProductStorage).show();
			$('#ModalComprar').modal('hide');
			$('#ModalSuccessCar').modal('show');
			SumCarProducts(idCar);
		}
		else{$('#car-return').html(returnSelectCheckProductStorage).show();}
	});
	return false;
}

function SumCarProducts(idCar){
	var idCar = idCar;
	$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},
	function(returnIdCar){
		if(returnIdCar != false)
		{
		$('#car-sun').html(returnIdCar).show();
		}
		else{$('#car-sun').html('0.00').show();}
	});
}

//======================================================//

function SelectCheckCarAd(a,b,c,d,e){
	$('#loader').show();//alert(a);
	var idCar = a;
	var idCliente = b;
	var idCEP = c;
	var ProductCod = d;
	var Multiple = e;
	$.post(newURL+"/Library/vendor/ajax/ajax.selectcheckcar.php",{idCar:idCar},
	function(returnIdCar){
		if(returnIdCar != false){
			UpdateCarIniAd(idCar,idCliente,idCEP,ProductCod,Multiple);
			}
		else{
			InsertCarIniAd(idCar,idCliente,idCEP,ProductCod,Multiple);
		}
	});
	return false;
}

function UpdateCarIniAd(idCar,idCliente,idCEP,ProductCod,Multiple){
	var Car = idCar;
	var Cliente = idCliente;
	var CEP = idCEP;
	var ProductCod = ProductCod;
	var Multiple = Multiple;
	$.post(newURL+"/Library/vendor/ajax/ajax.updatecarini.php",{Car:Car,Cliente:Cliente,CEP:CEP},
	function(returnUpdateCarIni){
		if(returnUpdateCarIni != false){
			SelectCheckProductAd(Car,ProductCod,Multiple);
		}
		else{
			$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>modal-sales / InsertCarIni</strong></div>');
		}
	});
	return false;
}

function InsertCarIniAd(idCar,idCliente,idCEP,ProductCod,Multiple){
	var Car = idCar;var Cliente = idCliente;var CEP = idCEP;var ProductCod = ProductCod;var Multiple = Multiple;
	$.post(newURL+"/Library/vendor/ajax/ajax.insertcarini.php",{Car:Car,Cliente:Cliente,CEP:CEP},
	function(returnInsertCarIni){
		if(returnInsertCarIni != false){
			SelectCheckProductAd(Car,ProductCod,Multiple);
		}
		else{
			$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>modal-sales / InsertCarIni</strong></div>');
		}
	});
	return false;
}

function SelectCheckProductAd(Car,ProductCod,Multiple){
	var idCar = Car;var ProductCod = ProductCod;var Multiple = Multiple;var qtdProduct = $('#discount_credits').val();
	$.post(newURL+"/Library/vendor/ajax/ajax.selectcheckproduct.php",{idCar:idCar,ProductCod:ProductCod},
	function(returnSelectCheckProduct){
		if(returnSelectCheckProduct != false){
			UpdateProductIniAd(idCar,ProductCod,qtdProduct,Multiple);
			}
		else{//returnIdCar=0
			InsertProductIniAd(idCar,ProductCod,qtdProduct,Multiple);
		}
	});
	return false;
}

function UpdateProductIniAd(Car,ProductCod,qtdProduct,Multiple){
	var idCar = Car;var ProductCod = ProductCod;var qtdProduct = qtdProduct;var Multiple = Multiple;
	$.post(newURL+"/Library/vendor/ajax/ajax.updateproductini.php",{idCar:idCar,ProductCod:ProductCod,qtdProduct:qtdProduct,Multiple:Multiple},
	function(returnUpdateProductIni){
		if(returnUpdateProductIni != false){
			SelectCheckProductStorageAd(idCar);
		}
		else{//returnIdCar=0
			$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>modal-sales / UpdateProductIni</strong></div>');
		}
	});
	return false;
}

function InsertProductIniAd(Car,ProductCod,qtdProduct,Multiple){
	var idCar = Car;var ProductCod = ProductCod;var qtdProduct = qtdProduct;var Multiple = Multiple;
	$.post(newURL+"/Library/vendor/ajax/ajax.insertproductini.php",{idCar:idCar,ProductCod:ProductCod,qtdProduct:qtdProduct,Multiple:Multiple},
	function(returnInsertProductIni){
		if(returnInsertProductIni != false){
			SelectCheckProductStorageAd(idCar);
		}
		else{
			$('#modal-body-return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Erro <strong>modal-sales / InsertProductIni</strong></div>');
		}
	});
	return false;
}

function SelectCheckProductStorageAd(idCar){
	var idCar = idCar;
	$.post(newURL+"/Library/vendor/ajax/ajax.selectcheckproductstorage.php",{idCar:idCar},
	function(returnSelectCheckProductStorage){
		if(returnSelectCheckProductStorage != false){
			$('#loader').hide();
			$('#ModalComprar').modal('hide');
			SumCarProductsAd(idCar);
			window.location=newURL+"/carrinho/"+idCar+"/";
		}
		else{$('#car-return').html(returnSelectCheckProductStorage).show();}
	});
	return false;
}

function SumCarProductsAd(idCar){
	var idCar = idCar;
	$.post(newURL+"/Library/vendor/ajax/ajax.sumcarproducts.php",{idCar:idCar},
	function(returnIdCar){
		if(returnIdCar != false)
		{
		$('#car-sun').html(returnIdCar).show();
		}
		else{$('#car-sun').html('0.00').show();}
	});
}