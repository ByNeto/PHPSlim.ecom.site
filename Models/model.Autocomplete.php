<?php
Class ModelAutocomplete{
	private static $AutoComplete1;
	private static $AutoComplete2;
	private static $ViewBestSellers;

/* @Param ViewBestSellers @Functions ViewBestSellers model.BestSellers.php*/
public function ViewBestSellers($objConn,$value){
	$ViewBestSellers = $objConn->query("SELECT TOP $value * FROM View_MaisVendidos ORDER BY qtdprod DESC");
return $ViewBestSellers;}


/* @Param AutoComplete1 @Functions AutoComplete1 model.AutoComplete.php*/
public function AutoComplete1($objConn,$value){
	$AutoComplete1 = $objConn->query("SELECT TOP 7 CodProduto,Descricao,DescricaoAbrv,VendaVarejo, Imagem1, Estoque FROM VIEW_PRODUTOS WHERE $value ORDER BY Descricao");
return $AutoComplete1;}

/* @Param AutoComplete2 @Functions AutoComplete2 model.AutoComplete.php*/
public function AutoComplete2($objConn,$value){
	$AutoComplete2 = $objConn->query("SELECT TOP 3 CodProduto,Descricao,DescricaoAbrv,VendaVarejo, Imagem1, Estoque FROM VIEW_PRODUTOS WHERE $value ORDER BY Descricao");
return $AutoComplete2;}
}
?>