function SelectCheckCarAd(a,b,c,d,e){
	$('#loader').show();
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
	var idCar = Car;var ProductCod = ProductCod;var Multiple = Multiple;var qtdProduct = Multiple*1;
	if(qtdProduct === 0){qtdProduct = 1;}
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