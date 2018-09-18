<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Home.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelHome = new ModelHome();//inicia a classe ModelHome.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$query_SelectCheckProductStorage = $objModelHome->SelectCheckProductStorage($objConn,$objFunctionClass->CheckParameter($_POST['idCar']));
while($fetch_SelectCheckProductStorage = $query_SelectCheckProductStorage->fetch(PDO::FETCH_ASSOC)){
	if($fetch_SelectCheckProductStorage['quantidade'] > $fetch_SelectCheckProductStorage['Estoque']){
		$query_UpdateProductStorage = $objModelHome->UpdateProductStorage($objConn,$objFunctionClass->CheckParameter($fetch_SelectCheckProductStorage['id_carrinho']),$objFunctionClass->CheckParameter($fetch_SelectCheckProductStorage['Estoque']),$objFunctionClass->CheckParameter($fetch_SelectCheckProductStorage['CodAutopec']));
		$query_UpdateCarStorage = $objModelHome->UpdateCarStorage($objConn,$objFunctionClass->CheckParameter($fetch_SelectCheckProductStorage['id_carrinho']));
		$query_DeleteCarStorage = $objModelHome->DeleteCarStorage($objConn,$objFunctionClass->CheckParameter($fetch_SelectCheckProductStorage['id_carrinho']));
		if(!$query_UpdateProductStorage){
			echo'<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">';
				echo'Error <strong>query_UpdateProductStorage</strong>';
			echo'</div>';
		}
		if(!$query_UpdateCarStorage){
			echo'<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">';
				echo'Error <strong>query_UpdateCarStorage</strong>';
			echo'</div>';
		}
		if(!$query_DeleteCarStorage){
			echo'<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">';
				echo'Error <strong>query_DeleteCarStorage</strong>';
			echo'</div>';
		}
		echo'<br>';
			echo'<div class="alert alert-danger alert-dismissible fade show font-responsive-menu text-shadow cursor-class" role="alert">';
				echo'<img width="16px" height="16px" class="img-responsive rotaciona" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_loading.png"/>&nbsp;&nbsp; Produto <strong>'.$fetch_SelectCheckProductStorage['Descricao'].'</strong> - <strong>'.$fetch_SelectCheckProductStorage['CodAutopec'].'</strong>. Consta <strong>'.$fetch_SelectCheckProductStorage['Estoque'].'</strong> unidade(s) em nosso estoque.<br>A quantidade solicitada de <strong>'.$fetch_SelectCheckProductStorage['quantidade'].'</strong> unidade(s) ultrapassa o que temos em nosso estoque atual.';
			echo'</div>';
		echo'<br>';
	}
	elseif($fetch_SelectCheckProductStorage['quantidade'] == $fetch_SelectCheckProductStorage['Estoque']){
		echo'<div class="alert alert-warning alert-dismissible fade show font-responsive-menu text-shadow cursor-class" role="alert" title="'.$fetch_SelectCheckProductStorage['quantidade'].' unidade(s) solicitada(s)." data-toggle="tooltip" data-placement="right">';
				echo'<img width="16px" height="16px" class="img-responsive rotaciona" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_loading.png"/>&nbsp;&nbsp; <strong>'.$fetch_SelectCheckProductStorage['Descricao'].'</strong> - <strong>'.$fetch_SelectCheckProductStorage['CodAutopec'].'</strong><br></a>';
		echo'</div>';
	}
	else{
		echo'<div class="alert alert-warning alert-dismissible fade show font-responsive-menu text-shadow cursor-class" role="alert" title="'.$fetch_SelectCheckProductStorage['quantidade'].' unidade(s) solicitada(s)." data-toggle="tooltip" data-placement="right">';
				echo'<img width="16px" height="16px" class="img-responsive rotaciona" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_loading.png"/>&nbsp;&nbsp; <strong>'.$fetch_SelectCheckProductStorage['Descricao'].'</strong> - <strong>'.$fetch_SelectCheckProductStorage['CodAutopec'].'</strong><br></a>';
		echo'</div>';
	}
}

?>

