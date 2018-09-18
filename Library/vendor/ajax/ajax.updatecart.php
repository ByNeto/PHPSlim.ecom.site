
<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
require_once('../../../Models/model.Cart.php');// inclui a classe da model Cart.

$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$objModelCart = new ModelCart();


$codAutopec = $objFunctionClass->CheckParameter($_POST['codAutopec']);
$sessionCarrinho = $objFunctionClass->CheckParameter($_POST['sessionCarrinho']);

$idHtmlPadrao = $objFunctionClass->CheckParameter($_POST['idHtmlPadrao']);
$quantidadeProdutos = $objFunctionClass->CheckParameter($_POST['quantidadeProdutos']);
$precoUnitario = $objFunctionClass->CheckParameter($_POST['precoUnitario']);

$precoUnitarioFormatado = trim(str_replace("R$","",$precoUnitario));
$precoUnitarioFormatado = (float)$precoUnitarioFormatado;
$verificaSoma = 0;
//$quantidadeProdutos = (float) $quantidadeProdutos;

$query_UpdateProductStorage = $objModelCart->UpdateProductStorage($objConn,$quantidadeProdutos,$codAutopec,$sessionCarrinho);

$query_SelectCheckProductStorageCart = $objModelCart->SelectCheckProductStorageCart($objConn,$sessionCarrinho,$codAutopec);
if($fetch_SelectCheckProductStorageCart = $query_SelectCheckProductStorageCart->fetch(PDO::FETCH_ASSOC)){
	$quantidadeProdutos = $fetch_SelectCheckProductStorageCart['quantidade'];
	$estoque = $fetch_SelectCheckProductStorageCart['Estoque'];

	if($quantidadeProdutos >$estoque && $fetch_SelectCheckProductStorageCart['Multiplo'] == 0){
		$quantidadeProdutos = $estoque;
		$query_UpdateProductStorageTwoo = $objModelCart->UpdateProductStorage($objConn,$quantidadeProdutos,$codAutopec,$sessionCarrinho);
	}else{}
}

$query_UpdateCartFreigh = $objModelCart->UpdateCartFreigh($objConn,$sessionCarrinho);
$query_SelectFreight = $objModelCart->SelectCarTotal($objConn,$sessionCarrinho);
$freteAtualizado = 0.00;
if($fetch_SelectFreight = $query_SelectFreight->fetch(PDO::FETCH_ASSOC)){
	$freteAtualizado = $fetch_SelectFreight['vl_freteEscolhido'];
}

//Traz o Total do carrinho e retorna para o Ajax
$query_SelectCartProducts = $objModelCart->SelectCartProducts($objConn,$sessionCarrinho);
	if($query_SelectCartProducts){
	$total = 0;
	$subtotal=0;
	$totalPedido = 0;
		while($fetch_SelectCartProducts = $query_SelectCartProducts->fetch(PDO::FETCH_ASSOC)){
				$total = $fetch_SelectCartProducts['vl_unit']*$fetch_SelectCartProducts['quantidade'];
				$subtotal=$subtotal+$total;
		}
		$totalPedido = $subtotal +$freteAtualizado;
	}

$query_SelectCartProductsLinha = $objModelCart->SelectCheckProductStorageCart($objConn,$sessionCarrinho,$codAutopec);
$totalLinha = 0;
if($fetch_SelectCartProductsLinha = $query_SelectCartProductsLinha->fetch(PDO::FETCH_ASSOC)){
	$totalLinha = $fetch_SelectCartProductsLinha['vl_unit']*$fetch_SelectCartProductsLinha['quantidade'];
}

//$totalAtualizado = $precoUnitarioFormatado * $quantidadeProdutos;
$totalAtualizado = $totalLinha;
$totalAtualizado = number_format($totalAtualizado, 2, ',', '.');
$dados['totalAtualizado'] = $totalAtualizado;
$dados['quantidade'] = $quantidadeProdutos;
$dados['verificaSoma'] = $verificaSoma;
$dados['subtotal'] = number_format($subtotal, 2, ',', '.');
$dados['totalPedido'] = number_format($totalPedido, 2, ',', '.');
echo json_encode($dados);

?>
