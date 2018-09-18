<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Menu.php');// inclui a classe da model Home.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da model Functions.

$objModelMenu = new ModelMenu();
$objFunctionClass = new FunctionClass();
$montadoraName=$_POST['montadoraName'];$montadoraId=$_POST['montadoraId'];$carroName=$_POST['carroName'];$carroId=$_POST['carroId'];

$query_SubMenuAutomakersCategoria=$objModelMenu->SubMenuAutomakersCategoria($objConn,$carroId);while($fetch_SubMenuAutomakersCategoria=$query_SubMenuAutomakersCategoria->fetch(PDO::FETCH_ASSOC)){$NameGrupo=$fetch_SubMenuAutomakersCategoria['Grupo'];echo'<div class="col-md-6 float-up"><a href="'.$objFunctionClass->UrlFixed().'/montadora/'.$objFunctionClass->ClearURL($montadoraName).'/'.$montadoraId.'/carro/'.$objFunctionClass->ClearURL(utf8_encode($carroName)).'/'.utf8_encode($carroId).'/'.strtolower($objFunctionClass->ClearNameGrupo($objFunctionClass->ClearString(utf8_encode($NameGrupo)))).'/'.$fetch_SubMenuAutomakersCategoria['CodGrupo'].'"> <h5 aria-label="Close" class="mega-dropdown-sub" style="color:#fff;"><img class="img-responsive" src="'.$objFunctionClass->UrlFixed().'/Library/imagens/menu/'.$montadoraId.'.png"></img>&nbsp; &nbsp<span class="text-white text-shadow">'.utf8_encode($fetch_SubMenuAutomakersCategoria['Grupo']).'</span></h5></a></div>';}
?>