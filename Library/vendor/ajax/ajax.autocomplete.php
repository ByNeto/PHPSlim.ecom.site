<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Autocomplete.php');// inclui a classe da model Model Autocomplete.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelAutocomplete = new ModelAutocomplete();//inicia a classe ModelAutocomplete.
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$q=strtolower($_GET["q"]);
if(!$q) return;

$q=$objFunctionClass->ClearString($q);

$pSub=str_replace(" de ", ' ', str_replace("-", " ", strtolower(trim($q))));
$pSub=str_replace(" da ", ' ', $pSub);
$pSub=str_replace(" para ", ' ', $pSub);
$pSub=str_replace(" com ", ' ', $pSub);
$pSub=str_replace(" p/ ", ' ', $pSub);
$pSub=str_replace(" c/ ", ' ', $pSub);
$pSub=str_replace("  ", ' ', $pSub);
$pSub=str_replace("'", '', $pSub);
$pSub=str_replace('"', '', $pSub);
$pesSQL=explode(" ", $pSub);
$completSQL = "";
$completSQL = "";

for($i=0;$i<=count($pesSQL)-1;$i++){$completSQL .= "(PesqSite COLLATE Latin1_General_CI_AI like '%". $pesSQL[$i] ."%') and ";}
$completSQL=substr($completSQL, 0, -5);
$q=$completSQL;

$query_AutoComplete=$objModelAutocomplete->AutoComplete1($objConn,$q);
?><script language="JavaScript" type="text/javascript">$("#return-best-sellers").hide();</script><?php
if($query_AutoComplete->fetch(PDO::FETCH_ASSOC) == NULL){echo '<div class="alert alert-danger" role="alert"><strong>Ops! Não encontramos o que você escreveu!</strong></div>';exit;}
echo'<div class="row space-top space-left space-bottom space-right">';
echo'<div class="col-md-4">';
echo'<h4 class="text-black text-shadow"> <img src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_marker.png" class="img-responsive"> Você quis dizer:</h4>';
echo'<ul>';
while($fetch_AutoComplete = $query_AutoComplete->fetch(PDO::FETCH_ASSOC)){
echo'<li data-toggle="tooltip" data-placement="top" title="'.$fetch_AutoComplete['Descricao'].'" onclick="javascript:var cod1='.$fetch_AutoComplete['CodProduto'].';searchRedirect(cod1);" style="border: 0.1rem solid #BBC4CB;" class="alert alert-danger font-responsive text-shadow on-hover-alert cursor-class aumenta-fonte"><img width="16px" height="16px" class="img-responsive rotaciona" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_loading.png"/>&nbsp;&nbsp;'.$objFunctionClass->LimitText(utf8_encode(ucfirst($fetch_AutoComplete['DescricaoAbrv'])), 32).'</li>';
}
echo'</ul>';
echo'</div>';

$query_AutoComplete2=$objModelAutocomplete->AutoComplete2($objConn,$q);
?><script language="JavaScript" type="text/javascript">$("#return-best-sellers").hide();</script><?php
echo'<div class="col-md-8">';
echo'<h4 class="text-black text-shadow"> <img src="'.$objFunctionClass->UrlFixed().'/Library/imagens/icons/icon_marker.png" class="img-responsive"> Produtos sugeridos:</h4>';
echo'<ul><li>';
echo'<div class="row-center margin-left-right-0">';
while($fetch_AutoComplete2=$query_AutoComplete2->fetch(PDO::FETCH_ASSOC)){
echo'<div class="card card-body cursor-class" onclick="javascript:var cod2='.$fetch_AutoComplete2['CodProduto'].';autoRedirect(cod2);">';
echo'<center><img src="'.$objFunctionClass->CheckPicture($fetch_AutoComplete2['Imagem1'],"d").'" class="img-responsive img-fluid float-up"></center>';
echo'<font class="font-responsive text-center">'.$objFunctionClass->LimitText(utf8_encode(ucfirst($fetch_AutoComplete2['Descricao'])), 40).'</font></a>';
echo'<div class="text-center text-red text-shadow">R$'.number_format($fetch_AutoComplete2['VendaVarejo'], 2, ',', '.').'</div>';
echo'</div>';
}
echo'</div>';
echo'</li></ul>';
echo'</div>';
echo'</div>';
?>