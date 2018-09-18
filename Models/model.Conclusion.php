<?php
Class ModelConclusion{

	private static $SelectFinalPedido;
	private static $SelectFinalProduto;

/* @Param SelectFinalPedido @Functions SelectFinalPedido model.Home.php*/
public function SelectFinalPedido($objConn,$value){
	$SelectFinalPedido = $objConn->query("SELECT
	cli.RazaoSocial,
	cli.NomeFantasia,
	cli.email,
	cli.TipoCliente,
	dbo.ped_observacoes.obs,
	(cli.endereco + ', ' + cli.Numero) AS enda,
	(cli.bairro + ' - ' + cli.cidade +'/' +cli.estado + ' - ' + cli.cep) AS endb,
	ped.vl_venda,
	ped.vl_frete,
	ped.vl_desconto,
	(SELECT Sum(pro.VL_ICMSST) FROM ped_produtos AS pro WHERE pro.id_pedido = ped.id_pedido) as VL_ICMSST,
	CONVERT(VARCHAR(10), ped.dthr_venda, 103) AS dthvenda,
	dbo.FormaPagtoCompra.FormaPagto,
	dbo.FormaPagtoCompra.Codigo,
	ped.n_parcelas,
	ped.CodForPag,
	ped.cancelado,
	ped.tp_envio,
	ped.praEntrega
	FROM
	dbo.ped_resumido AS ped
	left JOIN dbo.Clientes AS cli ON ped.CodCliSite = cli.CodCliSite
	left JOIN dbo.ped_observacoes ON ped.id_pedido = dbo.ped_observacoes.id_pedido
	left JOIN dbo.FormaPagtoCompra ON ped.CodForPag = dbo.FormaPagtoCompra.CodForPag
	WHERE ped.id_pedido = '$value' ");
return $SelectFinalPedido;}



/* @Param SelectFinalProduto @Functions SelectFinalProduto model.Home.php*/
public function SelectFinalProduto($objConn,$value){
	$SelectFinalProduto = $objConn->query("
SELECT
	pr.id_pedido,
	pr.CodProduto,
	pr.Produto,
	pr.vl_unit,
	pr.quantidade,
	(pr.vl_unit * pr.quantidade) as vlt, 
	pr.Peso,
	pr.CodSubGrupo,
	pr.CodGrupo,
	pr.CodMarca,
	pr.VL_ICMSST,
	pro.Multiplo
		FROM
	dbo.ped_produtos AS pr
		INNER JOIN dbo.V_ProdSite AS pro ON pr.CodProduto = pro.CodAutopec
		WHERE
	pr.id_pedido  = '$value'");
return $SelectFinalProduto;}


}
?>