<?php
Class ModelMenu{
	private static $objConn;
	private static $MenuAutomakers;
	private static $SubMenuAutomakers;
	private static $SubMenuAutomakersCategoria;
	private static $SubMenuAutomakersSubCategoria;

/* @Param MenuAutomakers @Functions MenuAutomakers model.Menu.php*/
public function MenuAutomakers($objConn){
	$MenuAutomakers = $objConn->query('SELECT Categoria,CodCategoria FROM VIEW_MONTADORAS ORDER BY Categoria ASC');
return $MenuAutomakers;}

/* @Param SubMenuAutomakers @Functions SubMenuAutomakers model.Menu.php*/
public function SubMenuAutomakers($objConn,$value){
	$SubMenuAutomakers = $objConn->query('SELECT VMC.CodCategoria, VMC.CodSubCategoria, VC.SubCategoria FROM View_Montadora_Carro VMC INNER JOIN View_Carros VC ON VC.CodSubCategoria = VMC.CodSubCategoria WHERE CodCategoria = '.$value.' ORDER BY VC.SubCategoria ASC');
return $SubMenuAutomakers;}

/* @Param SubMenuAutomakersCategoria @Functions SubMenuAutomakersCategoria model.Menu.php*/
public function SubMenuAutomakersCategoria($objConn,$value){
	$SubMenuAutomakersCategoria = $objConn->query('SELECT DISTINCT CodGrupo, Grupo, CodCategoria, Categoria, CodSubCategoria, SubCategoria FROM V_Categorizacao WHERE CodSubCategoria = '.$value.' ORDER BY Grupo ASC');
return $SubMenuAutomakersCategoria;}

/* @Param SubMenuAutomakersSubCategoria @Functions SubMenuAutomakersSubCategoria model.Menu.php*/
public function SubMenuAutomakersSubCategoria($objConn,$valueOne,$valueTwo){
	$SubMenuAutomakersSubCategoria = $objConn->query('SELECT DISTINCT CodSubGrupo, SubGrupo, CodGrupo, Grupo, CodCategoria, Categoria, CodSubCategoria, SubCategoria FROM V_Categorizacao WHERE CodSubCategoria = '.$valueOne.' AND CodGrupo ='.$valueTwo.' ORDER BY SubGrupo ASC');
return $SubMenuAutomakersSubCategoria;}


}
?>