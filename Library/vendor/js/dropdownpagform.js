$(document).ready(function(){$("#formCartao").hide();$(".cartao").click(function(){$(".boleto img").removeClass("active");$(".cartao img").removeClass("active");$(this).find("img").addClass("active");$("#formCartao").show();$("#inputEndSales").html('<input type="submit" onclick="javascript:EndSales();" value="Concluir Compra"/>').show();var button = $(this);var bandeira = button.find("input").val();$("#bandeira").val(bandeira);});$(".boleto").click(function(){$(".cartao img").removeClass("active");$(this).find("img").addClass("active");$("#formCartao").hide();$("#inputEndSales").html('<input type="submit" onclick="javascript:EndSales();" value="Concluir Compra"/>').show();var button = $(this);var bandeira = button.find("input").val();$("#bandeira").val(bandeira);});});