<?php
require_once("./veiculo.php");

$veiculo = new Veículo;
echo $veiculo->consulta("referência");
?>