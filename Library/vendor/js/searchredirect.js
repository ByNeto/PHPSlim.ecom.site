function searchRedirect(y){window.location= newURL+'/produtos/pesquisa/'+y;if(document.getElementById("autocomplete").value != ""){$("#autocomplete").hide();$("#replace").html('<input type="text" id="autocomplete" name="autocomplete" placeholder="Pesquisar" class="inp_pesq" >').show();return false;}}