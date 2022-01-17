<?php
require_once("./veiculo.php");

$veiculo = new Veículo;
if (isset($_GET["tipo"], $_GET["marca"], $_GET["modelo"])) {
    $veiculo->setTipo($_GET["tipo"]);
    $veiculo->setMarca($_GET["marca"]);
    $veiculo->setModelo($_GET["modelo"]);
}
echo $veiculo->consulta("anomodelo");
?>