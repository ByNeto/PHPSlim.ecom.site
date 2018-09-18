<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Menu.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da model Functions.

$objModelMenu = new ModelMenu();
$objFunctionClass = new FunctionClass();

$value=$_GET['b'] != '' ? $_GET['b'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert">Erro Parametro<strong> Submenu</strong></div>';$NomeMontadora=$_GET['a'];$query_SubMenuAutomakers=$objModelMenu->SubMenuAutomakers($objConn,$value);$rowCount_check_exist_SubMenuAutomakers = $query_SubMenuAutomakers->rowCount();if($rowCount_check_exist_SubMenuAutomakers != 0){while($fetch_SubMenuAutomakers=$query_SubMenuAutomakers->fetch(PDO::FETCH_ASSOC)){echo'<div class="col-md-6 float-up"><a href="'.$objFunctionClass->UrlFixed().'/montadora/'.$objFunctionClass->ClearURL($NomeMontadora).'/'.$value.'/carro/'.$objFunctionClass->ClearURL(utf8_encode($fetch_SubMenuAutomakers['SubCategoria'])).'/'.utf8_encode($fetch_SubMenuAutomakers['CodSubCategoria']).'"><h5 aria-label="Close" class="mega-dropdown-sub" style="color:#fff;"><img class="img-responsive" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/menu/'.$value.'.png"></img>&nbsp; &nbsp<span class="text-white text-shadow">'.utf8_encode($fetch_SubMenuAutomakers['SubCategoria']).'</span></h5></a></div>';}}else{echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">Nenhum <strong>Carro</strong> encontrado para <strong>Montadora</strong> <img width="15%" class="img-responsive" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/menu/'.$value.'.png"></img></div>';}

?>