<?php
require_once("./veiculo.php");

$veiculo = new Veículo;
if (isset($_GET["tipo"], $_GET["marca"])) {
    $veiculo->setTipo($_GET["tipo"]);
    $veiculo->setMarca($_GET["marca"]);
}
echo $veiculo->consulta("modelo");
?>