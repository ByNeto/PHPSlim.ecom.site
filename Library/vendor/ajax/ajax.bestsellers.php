<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.BestSellers.php');// inclui a classe da model Model BestSellers.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelModelBestSellers = new ModelBestSellers();//inicia a classe ModelBestSellers.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$query_BestSellers = $objModelModelBestSellers->ViewBestSellers($objConn,10);
echo'<br/><ul><br/><li style="border: 0.1rem solid #BBC4CB;"id="bg-blackberry" class="alert alert-default font-responsive-menu text-shadow text-black"> <img src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_marker.png" class="img-responsive"> Top 10 mais vendidos: <a style="cursor:pointer;" title="Fechar" data-toggle="tooltip" data-placement="right" class="close" onclick="closeBestSellers();" aria-label="close">&times;</a></li>';
while($fetch_BestSellers = $query_BestSellers->fetch(PDO::FETCH_ASSOC)){
echo'<li style="border: 0.1rem solid #BBC4CB;" class="alert alert-danger font-responsive-menu text-shadow on-hover-alert"><a href="'.$objFunctionClass->UrlFixed().'/produtos/maisvendidos/'.utf8_encode($fetch_BestSellers['CodProduto']).'"><img width="16px" height="16px" class="img-responsive rotaciona" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_loading.png"/>&nbsp;&nbsp;'.utf8_encode($fetch_BestSellers['Produto']).'</a></li>';
}
echo'</ul>';
?>

