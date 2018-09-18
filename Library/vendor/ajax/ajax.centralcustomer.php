<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.CentralCustomer.php');// inclui a classe da model CentralCustomer.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

$objModelCentralCustomer = new ModelCentralCustomer();// inicia a classe CentralCustomer
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.

$dados="";
$query_Select2=$objModelCentralCustomer->SelectCabecalhoAjaxPedido($objConn, $objFunctionClass->CheckParameter($_POST['idPedido']));
if($query_Select2){while($fetch_Select2 = $query_Select2->fetch(PDO::FETCH_ASSOC)){$dados['id_pedido'] = $fetch_Select2['id_pedido'];$dados['dthr_venda'] = date("d/m/Y",strtotime(substr($fetch_Select2['dthr_venda'], 0, 10)));$dados['StatusCaptura'] = utf8_encode($fetch_Select2['StatusCaptura']);$dados['FormaPagto'] = utf8_encode($fetch_Select2['FormaPagto']);$dados['vl_frete'] = number_format($fetch_Select2['vl_frete'],2,',','.');}}
else{print_r('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Não possui pedidos</strong></div>');}
$query_Select=$objModelCentralCustomer->SelectTabelaAjaxProdutos($objConn, $objFunctionClass->CheckParameter($_POST['idPedido']));
if($query_Select){$tabela = "";$total = 0;$totalProduto = 0;while($fetch_Select = $query_Select->fetch(PDO::FETCH_ASSOC)){$total = $fetch_Select['vl_unit']*$fetch_Select['quantidade'];$totalProduto= $totalProduto + $total;$tabela .='<tr><td>'.$fetch_Select['CodProduto'].'</td><td>'.utf8_encode($fetch_Select['Produto']).'</td><td>R$'.number_format($fetch_Select['vl_unit'], 2, ',', '.').'</td><td>'.$fetch_Select['quantidade'].'</td><td>R$'.number_format($fetch_Select['vl_unit']*$fetch_Select['quantidade'], 2, ',', '.').'</td></tr>';}$dados['tabela'] = $tabela;$dados['totalProduto'] = number_format($totalProduto, 2, ',', '.');$dados['totalCompra'] = number_format($totalProduto+$dados['vl_frete'], 2, ',', '.');}
else{print_r('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Não possui pedidos</strong></div>');}
echo json_encode($dados);

?>
