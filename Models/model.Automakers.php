<?php
Class ModelAutomakers{
	private static $objConn;
	private static $ProductsAutomakers;
	private static $ProductsAutomakersCarsCountMontadoraId;
	private static $ProductsAutomakersCarsMontadoraId;
	private static $ProductsAutomakersCarsCountMontadoraIdCarroId;
	private static $ProductsAutomakersCarsMontadoraIdCarroId;
	private static $ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo;
	private static $ProductsAutomakersCarsMontadoraIdCarroIdCodGrupo;
	private static $ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo;
	private static $ProductsAutomakersCarsMontadoraIdCarroIdCodGrupoCodSubGrupo;

/* @Param ProductsAutomakers @Functions ProductsAutomakers model.Automakers.php*/
public function ProductsAutomakers($objConn,$value){
	$ProductsAutomakers = $objConn->query('SELECT TOP '.$value.' CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS ORDER BY Estoque DESC, NEWID();');
return $ProductsAutomakers;}

/* @Param ProductsAutomakersCarsCountMontadoraId @Functions ProductsAutomakersCarsCountMontadoraId model.Automakers.php*/
public function ProductsAutomakersCarsCountMontadoraId($objConn,$Automakers){
if(!is_numeric($Automakers)){$Automakers=0;}
else{$ProductsAutomakersCarsCountMontadoraId = $objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS_MONTADORAS WHERE CodCategoria=$Automakers");
$ProductsAutomakersCarsCountMontadoraId=count($ProductsAutomakersCarsCountMontadoraId->fetchAll());
return $ProductsAutomakersCarsCountMontadoraId;}
}
/* @Param ProductsAutomakersCarsMontadoraId @Functions ProductsAutomakersCarsMontadoraId model.Automakers.php*/
public function ProductsAutomakersCarsMontadoraId($objConn,$Automakers,$Start,$Perpage){
if(!is_numeric($Automakers)){$Automakers=0;}
else{$ProductsAutomakersCarsMontadoraId=$objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Multiplo,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS_MONTADORAS WHERE CodCategoria=$Automakers ORDER BY Estoque DESC, CodProduto OFFSET (($Start - 1) * $Perpage) ROWS FETCH NEXT $Perpage ROWS ONLY");
return $ProductsAutomakersCarsMontadoraId;}
}

/* @Param ProductsAutomakersCarsCountMontadoraIdCarroId @Functions ProductsAutomakersCarsCountMontadoraIdCarroId model.Automakers.php*/
public function ProductsAutomakersCarsCountMontadoraIdCarroId($objConn,$Automakers,$Cars){
if(!is_numeric($Automakers) OR !is_numeric($Cars)){$Automakers=0;$Cars=0;}
else{$ProductsAutomakersCarsCountMontadoraIdCarroId=$objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS_MONTADORAS_CARROS WHERE CodCategoria=$Automakers and CodSubCategoria=$Cars ORDER BY Estoque DESC");
$ProductsAutomakersCarsCountMontadoraIdCarroId=count($ProductsAutomakersCarsCountMontadoraIdCarroId->fetchAll());
return $ProductsAutomakersCarsCountMontadoraIdCarroId;}
}
/* @Param ProductsAutomakersCarsMontadoraIdCarroId @Functions ProductsAutomakersCarsMontadoraIdCarroId model.Automakers.php*/
public function ProductsAutomakersCarsMontadoraIdCarroId($objConn,$Automakers,$Cars,$Start,$Perpage){
if(!is_numeric($Automakers) OR !is_numeric($Cars)){$Automakers=0;$Cars=0;}
else{$ProductsAutomakersCarsMontadoraIdCarroId=$objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Multiplo,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS_MONTADORAS_CARROS  WHERE CodCategoria=$Automakers and CodSubCategoria=$Cars ORDER BY Estoque DESC, CodProduto OFFSET (($Start - 1) * $Perpage) ROWS FETCH NEXT $Perpage ROWS ONLY");
return $ProductsAutomakersCarsMontadoraIdCarroId;}
}

/* @Param ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo @Functions ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo model.Automakers.php*/
public function ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo($objConn,$Automakers,$Cars,$CodGrupo){
if(!is_numeric($Automakers) OR !is_numeric($Cars) OR !is_numeric($CodGrupo)){$Automakers = 0;$Cars = 0;$CodGrupo = 0;}
else{$ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo=$objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS_MONTADORAS_CARROS WHERE CodCategoria=$Automakers and CodSubCategoria=$Cars and CodGrupo=$CodGrupo ORDER BY Estoque DESC");
$ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo=count($ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo->fetchAll());
return $ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupo;}
}
/* @Param ProductsAutomakersCarsMontadoraIdCarroIdCodGrupo @Functions ProductsAutomakersCarsMontadoraIdCarroIdCodGrupo model.Automakers.php*/
public function ProductsAutomakersCarsMontadoraIdCarroIdCodGrupo($objConn,$Automakers,$Cars,$CodGrupo,$Start,$Perpage){
if(!is_numeric($Automakers) OR !is_numeric($Cars) OR !is_numeric($CodGrupo)){$Automakers=0;$Cars=0;$CodGrupo=0;}
else{$ProductsAutomakersCarsMontadoraIdCarroIdCodGrupo = $objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Multiplo,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS_MONTADORAS_CARROS WHERE CodCategoria=$Automakers and CodSubCategoria=$Cars and CodGrupo=$CodGrupo ORDER BY Estoque DESC, CodProduto OFFSET (($Start - 1) * $Perpage) ROWS FETCH NEXT $Perpage ROWS ONLY");
return $ProductsAutomakersCarsMontadoraIdCarroIdCodGrupo;}
}

/* @Param ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo @Functions ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo model.Automakers.php*/
public function ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo($objConn,$Automakers,$Cars,$CodGrupo,$CodSubGrupo){
if(!is_numeric($Automakers) OR !is_numeric($Cars) OR !is_numeric($CodGrupo)){$Automakers = 0;$Cars = 0;$CodGrupo = 0;$CodSubGrupo = 0;}
else{$ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo = $objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS_MONTADORAS_CARROS WHERE CodCategoria = $Automakers and CodSubCategoria = $Cars and CodGrupo = $CodGrupo and CodSubGrupo = $CodSubGrupo ORDER BY Estoque DESC");
$ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo = count($ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo->fetchAll());
return $ProductsAutomakersCarsCountMontadoraIdCarroIdCodGrupoCodSubGrupo;}
}
/* @Param ProductsAutomakersCarsMontadoraIdCarroIdCodGrupoCodSubGrupo @Functions ProductsAutomakersCarsMontadoraIdCarroIdCodGrupoCodSubGrupo model.Automakers.php*/
public function ProductsAutomakersCarsMontadoraIdCarroIdCodGrupoCodSubGrupo($objConn,$Automakers,$Cars,$CodGrupo,$CodSubGrupo,$Start,$Perpage){
if(!is_numeric($Automakers) OR !is_numeric($Cars) OR !is_numeric($CodGrupo)){$Automakers = 0;$Cars = 0;$CodGrupo = 0;$CodSubGrupo = 0;}
else{$ProductsAutomakersCarsMontadoraIdCarroIdCodGrupoCodSubGrupo = $objConn->query("SELECT CodProduto,CodOriginal,Descricao,DescricaoAbrv,Aplicacao,Fabricante,Multiplo,Estoque,VendaVarejo,Foto,Imagem1 FROM VIEW_PRODUTOS_MONTADORAS_CARROS  WHERE CodCategoria = $Automakers and CodSubCategoria = $Cars and CodGrupo = $CodGrupo and CodSubGrupo = $CodSubGrupo ORDER BY Estoque DESC, CodProduto OFFSET (($Start - 1) * $Perpage) ROWS FETCH NEXT $Perpage ROWS ONLY");
return $ProductsAutomakersCarsMontadoraIdCarroIdCodGrupoCodSubGrupo;}
}

}
?>

