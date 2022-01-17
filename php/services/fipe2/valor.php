<?php
require_once("./veiculo.php");
$veiculo = new Veículo;
if (isset($_GET["tipo"], $_GET["marca"], $_GET["modelo"], $_GET["ano"], $_GET["combustível"])) {
    $veiculo->setTipo($_GET["tipo"]);
    $veiculo->setMarca($_GET["marca"]);
    $veiculo->setModelo($_GET["modelo"]);
    $veiculo->setAno($_GET["ano"]);
    $veiculo->setCombustível($_GET["combustível"]);
}
echo $veiculo->consulta("valor");
?>