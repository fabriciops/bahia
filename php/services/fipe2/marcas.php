<?php
require_once("./veiculo.php");

$veiculo = new Veículo;
if (isset($_GET["tipo"])) {
    $veiculo->setTipo($_GET["tipo"]);
}
echo $veiculo->consulta("marca");
?>