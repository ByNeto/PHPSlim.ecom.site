$("#autocomplete").click("click",function(){var tamanho = $("#autocomplete").val().length;if(tamanho === 0){$.post(newURL+"/Library/vendor/ajax/ajax.bestsellers.php",function(resposta){if(resposta != false){$("#return-best-sellers").html(resposta).fadeIn(4000).show();return false;}else{$("#return-best-sellers").html('Error return best sellers').slideDown(2000);return false;}});return false;}else{closeBestSellers();return false;}});function closeBestSellers(){$("#return-best-sellers").hide();return false;}