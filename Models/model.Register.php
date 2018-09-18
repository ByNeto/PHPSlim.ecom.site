<?php
Class ModelRegister{
	private static $objConn;
	private static $InsertRegisterPhysicalPerson;
	private static $InsertRegisterLegalPerson;
	private static $SelectRegisterCpf;
	private static $SelectRegisterCnpj;

/* @Param InsertRegisterPhysicalPerson @Functions InsertRegisterPhysicalPerson model.ModelRegister.php*/
public function InsertRegisterPhysicalPerson($objConn,$CodCliente,$RazaoSocial,$NomeFantasia, $endereco, $Numero, $bairro, $cidade, $cep, $estado, $fone, $fone2, $email, $cnpj, $DataCadastro, $TipoCliente, $VisivelRepresentante, $Origem, $DeOnde, $CNPJSemMask, $Pass, $OutrosContatos, $RG, $Complemento){
	$InsertRegisterPhysicalPerson = $objConn->query("INSERT INTO Clientes (CodCliente, RazaoSocial, NomeFantasia, endereco, Numero, bairro, cidade, cep, estado, fone, fone2, email, cnpj, DataCadastro, TipoCliente, VisivelRepresentante, Origem, DeOnde, CNPJSemMask, Pass, OutrosContatos, RG, Complemento) VALUES('$CodCliente', '$RazaoSocial', '$NomeFantasia', '$endereco', '$Numero', '$bairro', '$cidade', '$cep', '$estado', '$fone', '$fone2', '$email', '$cnpj',GETDATE(), '$TipoCliente', '$VisivelRepresentante', '$Origem', '$DeOnde', '$CNPJSemMask', '$Pass', '$OutrosContatos', '$RG','$Complemento' )");
return $InsertRegisterPhysicalPerson;}

/* @Param InsertRegisterLegalPerson @Functions InsertRegisterLegalPerson model.ModelRegister.php*/
public function InsertRegisterLegalPerson($objConn,$CodCliente,$RazaoSocial,$NomeFantasia,$endereco,$Numero,$bairro,$cidade,$cep,$estado,$fone,$fone2,$email,$ie,$cnpj,$Contato,$DataCadastro,$TipoCliente,$VisivelRepresentante,$Origem,$DeOnde,$CodSegmento,$CNPJSemMask,$Pass,$OutrosContatos,$Complemento,$emlNFe){
	$InsertRegisterPhysicalPerson = $objConn->query("INSERT INTO Clientes (CodCliente,RazaoSocial,NomeFantasia,endereco,Numero,bairro,cidade,cep,estado,fone,fone2,email,ie,cnpj,Contato,DataCadastro,TipoCliente,VisivelRepresentante,Origem,DeOnde,CodSegmento,CNPJSemMask,Pass,OutrosContatos,Complemento,emlNFe) VALUES ('$CodCliente','$RazaoSocial','$NomeFantasia','$endereco','$Numero','$bairro','$cidade','$cep','$estado','$fone','$fone2','$email','$ie','$cnpj','$Contato',GETDATE(),'$TipoCliente','$VisivelRepresentante','$Origem','$DeOnde','$CodSegmento','$CNPJSemMask','$Pass','$OutrosContatos','$Complemento','$emlNFe')");
return $InsertRegisterPhysicalPerson;}

/* @Param SelectRegisterCpf @Functions SelectRegisterCpf model.ModelRegister.php*/
public function SelectRegisterCpf($objConn,$Value){
	$InsertRegisterPhysicalPerson = $objConn->query("SELECT CNPJ FROM CLIENTES WHERE CNPJSemMask = '$Value'");
return $InsertRegisterPhysicalPerson;}

/* @Param SelectRegisterCnpj @Functions SelectRegisterCnpj model.ModelRegister.php*/
public function SelectRegisterCnpj($objConn,$Value){
	$InsertRegisterPhysicalPerson = $objConn->query("SELECT CNPJ FROM CLIENTES WHERE CNPJSemMask = '$Value'");
return $InsertRegisterPhysicalPerson;}

}
?>
