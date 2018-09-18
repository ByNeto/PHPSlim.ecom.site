<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Newsletter.php');// inclui a classe da model Newsletter.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelNewsletter = new ModelNewsletter();
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.


$Name = $_POST['name'] != '' ? $_POST['name'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><center>Campo <strong>Nome</strong> não pode ser vazio!</center></div>';
$Name = $objFunctionClass->InjectionSQL($Name);
$Email = $_POST['email'] != '' ? $_POST['email'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><center>Campo <strong>Email</strong> não pode ser vazio!</center></div>';


$query_Newsletter = $objModelNewsletter->UpdateNewsletter($objConn,$Name,$Email,date('d-m-Y'),date('H:i:s'));

if($query_Newsletter){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><center>Cadastro realizado com <strong>Sucesso</strong>!</center></div>';
echo'<meta http-equiv="refresh" content="2;url='.$objFunctionClass->UrlFixed().'">';
}
else{
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><center>Cadastro <strong>não</strong> realizado!</center></div>';
echo'<meta http-equiv="refresh" content="2;url='.$objFunctionClass->UrlFixed().'">';
}
?>