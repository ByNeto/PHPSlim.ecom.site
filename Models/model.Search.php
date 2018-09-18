<?php
Class ModelSearch{
	private static $objConn;
	private static $ProductsSearchCount;
	private static $ProductsSearch;


/* @Param ProductsSearchCount @Functions ProductsSearchCount model.Search.php*/
public function ProductsSearchCount($objConn,$keywordId){
	$ProductsSearchCount = $objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS WHERE Descricao LIKE '%$keywordId%'");$ProductsSearchCount = count($ProductsSearchCount->fetchAll());
return $ProductsSearchCount;}

/* @Param ProductsSearch @Functions ProductsSearch model.Search.php*/
public function ProductsSearch($objConn,$keywordId,$Start,$Perpage){
	$ProductsSearch = $objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Multiplo,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS WHERE Descricao LIKE '%$keywordId%' ORDER BY CodProduto OFFSET (($Start - 1) * $Perpage) ROWS FETCH NEXT $Perpage ROWS ONLY");
return $ProductsSearch;}

}
?>

