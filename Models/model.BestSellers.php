<?php
Class ModelBestSellers{
	private static $ViewBestSellers;

/* @Param ViewBestSellers @Functions ViewBestSellers model.BestSellers.php*/
public function ViewBestSellers($objConn,$value){
	$ViewBestSellers=$objConn->query("SELECT TOP $value * FROM View_MaisVendidos ORDER BY qtdprod DESC");
return $ViewBestSellers;}

}
?>