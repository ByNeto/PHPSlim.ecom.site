<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
require_once('../../../Models/model.Cart.php');// inclui a classe da model Cart.

$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$objModelCart = new ModelCart();

$dados ="";
$retornoDelete=false;
$retornoUpdate=false;
if($query_UpdateQuantidade=$objModelCart->UpdateProductStorage($objConn,0,$objFunctionClass->CheckParameter($_POST['codAutopec']),$objFunctionClass->CheckParameter($_POST['idSession']))){$retornoUpdate=true;}
if($query_DeleteCartProduct=$objModelCart->DeleteCartProduct($objConn,$objFunctionClass->CheckParameter($_POST['idSession']),$objFunctionClass->CheckParameter($_POST['codAutopec']))){$retornoDelete=true;}
$dados['retornoDelete']=$retornoDelete;
$dados['retornoUpdate']=$retornoUpdate;
echo json_encode($dados);

?>
