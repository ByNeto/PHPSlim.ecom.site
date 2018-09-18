$(document).ready(function(){
	$("#checkBoxInscPjNc").html('<i class="fa fa-square-o" aria-hidden="true"></i>');
	$("#checkBoxInscPjSc").html('<i class="fa fa-square-o" aria-hidden="true"></i>');
	$("#inputStateRegistrationPj").html('<input type="text" name="stateRegistrationPj" id="stateRegistrationPj" class="form-control input-sm" placeholder="Insc. Estadual" onblur="stateRegistrationPjOne()" disabled />').show();
	$("input[name$='checkBoxInscPj']").click(function(){
	var opc = $(this).val();
	if (opc === 'sc'){
		$("#check-stateRegistrationPj").hide();
		$("#checkBoxInscPjNc").html('<i class="fa fa-square-o" aria-hidden="true"></i>');
		$("#checkBoxInscPjSc").html('<i class="fa fa-check-square-o" aria-hidden="true"></i>');
		$("#inputStateRegistrationPj").html('<input type="text" name="stateRegistrationPj" id="stateRegistrationPj" class="form-control input-sm" placeholder="Insc. Estadual" onblur="stateRegistrationPj()" required />').show();
	}
	else{
		$("#check-stateRegistrationPj").show();
		$("#times-stateRegistrationPj").hide();
		$("#msg-stateRegistrationPj").hide();
		document.getElementById("stateRegistrationPj").style.borderColor = "green";
		document.getElementById("stateRegistrationPj").style.outline = "green";
		$("#checkBoxInscPjSc").html('<i class="fa fa-square-o" aria-hidden="true"></i>');
		$("#checkBoxInscPjNc").html('<i class="fa fa-check-square-o" aria-hidden="true"></i>');
		$("#inputStateRegistrationPj").html('<input type="text" name="stateRegistrationPj" id="stateRegistrationPj" class="form-control input-sm" value="ISENTO" placeholder="ISENTO" disabled />').show();
		}
	});
});