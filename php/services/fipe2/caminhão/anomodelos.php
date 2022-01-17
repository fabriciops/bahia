<?php
require_once("../tabela_referencia.php");

require_once("../veiculo.php");

$veiculo = new Veículo;
$veiculo->setTipo($_GET["tipo"]);
$veiculo->setMarca($_GET["marca"]);
$veiculo->setModelo($_GET["modelo"]);
echo $veiculo->consulta("anomodelo");
?>