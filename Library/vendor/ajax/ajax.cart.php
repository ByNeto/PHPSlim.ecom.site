
<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Cart.php');// inclui a classe da model Cart.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelCart = new ModelCart();// inicia a classe Cart
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$dados ="";

$query_SelectCartProducts = $objModelCart->SelectCartProducts($objConn, $objFunctionClass->CheckParameter($_POST['sessionCarrinho']));
if($query_SelectCartProducts){
	$idContOne = 0;
	$contador = 1;
	while($fetch_SelectCartProducts = $query_SelectCartProducts->fetch(PDO::FETCH_ASSOC)){
		$idContOne = $contador++;
		$imagem_produto = trim($fetch_SelectCartProducts['img']);
		//$tabela .='
		echo'<div class="row produto">';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
			echo'<h4>Produto</h4>';
		echo'</div>';
		echo'<div class="col-md-1 col-sm-4 col-xs-12 imagem text-left">';
			echo'<img class="img-responsive" src="'.$objFunctionClass->CheckPicture($imagem_produto,"b").'" style="width: 100%;">';
			
		echo'</div>';
		echo'<div class="col-md-5 col-sm-8 col-xs-12 descricao prod text-left">';
		echo'<span style="display:none" id="CodAutopec'.$idContOne.'" >'.$fetch_SelectCartProducts['CodAutopec'].'</span>';

			echo'<h3>'.utf8_encode(($fetch_SelectCartProducts['Descricao'])).'</h3>'; 
			echo'<p> '.utf8_encode(($fetch_SelectCartProducts['Aplicacao'])).'</p>';
			echo'<span>'. utf8_encode(($fetch_SelectCartProducts['Fabricante'])).'- Ref:'.($fetch_SelectCartProducts['CodOriginal']).'- Clas. Fiscal:'.($fetch_SelectCartProducts['ClFiscal']).'</span>';
		echo'</div>';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
			echo'<h4>Preço</h4>';
		echo'</div>';
		echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">';
			echo'<h3 id="preco'.$idContOne.'">R$ '.number_format($fetch_SelectCartProducts['vl_unit'], 2, ',', '.').'</h3>';
		echo'</div>';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
			echo'<h4>Quantidade</h4>';
		echo'</div>';
		echo'<div class="col-md-2 col-sm-6 col-xs-12 quantidade">';
			echo'<ul class="list-inline">';
				echo'<li class="contador" onclick="menos('.$idContOne.')">-<img src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_cart_menos.png" alt="carrinho" /></li>';
				echo'<li><input id="'.$idContOne.'" class="qtd'.$idContOne.'" type="text" name="qtd" value="'. $fetch_SelectCartProducts['quantidade'] .'" size="number" readonly="readonly" /></li>';
				echo'<li class="contador" onclick="javascript:mais('.$idContOne.');">+<img src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_cart_mais.png" alt="carrinho" /></li>';
			echo'</ul>';
		echo'</div>';
		echo'<div class="col-sm-12 col-xs-12 menu-responsivo">';
			echo'<h4>Total</h4>';
		echo'</div>';
		echo'<div class="col-md-2 col-sm-6 col-xs-12 text-left dados">';
			echo'<h3 id="total'.$idContOne.'">R$ '.number_format($fetch_SelectCartProducts['vl_unit']*$fetch_SelectCartProducts['quantidade'], 2, ',', '.').'</h3>';
		echo'</div>';
	echo'</div>';
	
	//';
	}
	// $dados['tabela'] = $tabela;

}
else{
	print_r('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Não possui pedidos</strong></div>');
}

echo $dados;	

?>
